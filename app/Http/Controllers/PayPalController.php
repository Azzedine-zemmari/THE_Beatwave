<?php
namespace App\Http\Controllers;

use App\Services\EventSubmissionService;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Log;
class PayPalController extends Controller
{
    private $eventservice;
    public function __construct(EventSubmissionService $eventservice)
    {
        $this->eventservice = $eventservice;
    }
    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request,int $id)
    {
        $price = $this->eventservice->getEventPrice($id)->taketPrice; 
        // add taketPrice because getEventPrice return stdObject and i cant converte object to string that s why 
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        // Create a Guzzle client with SSL disabled
        $guzzleClient = new \GuzzleHttp\Client([
            'verify' => false, // Disables SSL verification
            'curl'   => [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
            ],
    ]);

        // Inject the custom client into PayPal 
        $provider->setClient($guzzleClient);
        $paypalToken = $provider->getAccessToken();
        // dd($paypalToken);
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => (string) $price // switch to string to solve invalid request prb
                    ]
                ]
            ]
        ]);
        // dd($response);
        // Log::info('PayPal response:', $response);
        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('events')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('events')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
          // Create a Guzzle client with SSL disabled
          $guzzleClient = new \GuzzleHttp\Client([
            'verify' => false, // Disables SSL verification
            'curl'   => [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
            ],
    ]);

        // Inject the custom client into PayPal 
        $provider->setClient($guzzleClient);
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        Log::info('Paypal:',$response);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('events')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('events')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}