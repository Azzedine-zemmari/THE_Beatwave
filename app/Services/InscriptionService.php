<?php 

namespace App\Services;

use App\Repositories\Contracts\InscriptionInterface;

class InscriptionService{
    private $InscriptionRepository;

    public function __construct(InscriptionInterface $InscriptionRepository)
    {
        $this->InscriptionRepository = $InscriptionRepository;
    }

    public function show(){
        return $this->InscriptionRepository->getInscription();
    }
    public function exportCSV(){
        $data = $this->InscriptionRepository->getInscription();

        $columns = ['Firstname','LastName','Event','transactionId','taketPrice'];

        return response()->stream(function () use ($data,$columns){
            // to open buffer and give it ablity to write
            $handle = fopen('php://output','w');
            //write the titles of the table
            fputcsv($handle,$columns);
            // loop on data to put the data in the table
            foreach($data as $row){
                fputcsv($handle,[
                    $row->Firstname,
                    $row->LastName,
                    $row->nom,
                    $row->transactionId,
                    $row->taketPrice
                ]);
            }
            fclose($handle);
        },200,[
            // Content-Disposition to tell the browser this fill for downloads
            'Content-Type'=>'text-csv',
            'Content-Disposition' => 'attachement;filename="inscription.csv"'
        ]);

    }
    public function showAll(){
        return $this->InscriptionRepository->getAllInscription();
    }
}