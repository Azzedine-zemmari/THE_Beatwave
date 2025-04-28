<?php 

namespace App\Services;

use App\Repositories\Contracts\CategorieInterface;
use App\Repositories\Contracts\EventInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\ArtistInvitationInterface;
use App\Repositories\Contracts\EventPurchaseInterface;
use App\Repositories\Contracts\InscriptionInterface;
use Error;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class EventService {
    private $eventrepository;
    private $userRepository;
    private $categoryRepository;
    // to send invitation to the artist chosen by organisateur
    private $artistInvitationRepository;
    // for the event inscription count
    private $inscriptionRepository;
    // for the organizer revenue count
    private $eventPurchaseRepository;
    public function __construct(
        EventInterface $eventrepository,
        CategorieInterface $categoryRepository,
        UserRepositoryInterface $userRepository,
        ArtistInvitationInterface $artistInvitationRepository,
        InscriptionInterface $inscriptionRepository,
        EventPurchaseInterface $eventPurchaseRepository
        )
    {
        $this->eventrepository = $eventrepository;
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
        $this->artistInvitationRepository = $artistInvitationRepository;
        $this->inscriptionRepository = $inscriptionRepository;
        $this->eventPurchaseRepository = $eventPurchaseRepository;
    }

    public function all(){
        return $this->eventrepository->all();
    }
    public function createEvent(array $data){

        $validator = Validator::make($data,[
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'taketPrice' => 'required|numeric|min:0',
            'stockeTicket' => 'required|integer|min:1',
            'numberOfPlace' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'artistId' => ['required',Rule::exists('users','id')->where('role_id',2)],
            'categorieId' => 'required|exists:categories,id',
            'place' => 'required|string',
        ]);

        if($validator->fails()){
            Log::error('Validation failed', $validator->errors()->toArray());
            throw new ValidationException($validator);
        }

        if(isset($data['image'])){
            $image = $data['image'];
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads',$imageName);
            $data['image'] = "storage/uploads/$imageName"; // store it in db;
        }

        $data['organizerId'] = auth()->id();

        $event = $this->eventrepository->create($data);

        // to insert into the artistInvitation table
        $this->artistInvitationRepository->create([
            'artistId' => $data['artistId'],
            'organizerId' => auth()->id(),
            'eventsId' => $event->eventId
        ]);

        return $event;

    }
    public function getCategories(){
        return $this->categoryRepository->getAll();
    }
    public function getArtists(){
        return $this->userRepository->findByRole(2);
    }
    public function findEvent(int $id){
        return $this->eventrepository->findById($id);
    }
    public function update(array $data){
        $validate = Validator::make($data,[
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'taketPrice' => 'required|numeric|min:0',
            'stockeTicket' => 'required|integer|min:1',
            'numberOfPlace' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'artistId' => ['required',Rule::exists('users','id')->where('role_id',2)],
            'categorieId' => 'required|exists:categories,id',
            'place' => 'required|string',
        ]);

        if(!$validate){
            throw new ValidationException($validate);
        }

        if(isset($data['image'])){
            $image = $data['image'];
            $imageName = time(). "-".$image->getClientOriginalExtension();
            $image->storeAs('public/uploads',$imageName);
        
            $data['image'] = "storage/uploads/$imageName";
        }

        $data['organizerId'] = auth()->id();

        $event = $this->eventrepository->update($data['eventId'],$data);

        return $event;
    }

    public function destroy(int $id){
        return $this->eventrepository->destroy($id);
    }
    public function eventCount(){
        return $this->eventrepository->EventsCount();
    }
    public function inscriptionCount(){
        return $this->inscriptionRepository->countInscription();
    }
    public function revenuCount(){
        return $this->eventPurchaseRepository->revenue();
    }
    // to show active for admin
    public function showEvents(){
        return $this->eventrepository->allActive();
    }
    // to accept event by admin
    public function acceptEvent(int $id){
        return $this->eventrepository->updateStatus($id,'done');
    }
    // to archive event by admin
    public function refuseEvent(int $id){
        return $this->eventrepository->updateStatus($id,'archive');
    }
    // show events for the final user

    public function showSubmitedEvents(){
        return $this->eventrepository->Events();
    }

    public function EventDetail(int $id){
        return $this->eventrepository->eventdetails($id);
    }

    public function getEventPrice(int $id){
        return $this->eventrepository->getEventPrice($id);
    }
    public function search(string $name){
        $validate = Validator::make(['name'=>$name],[
            'name' => 'required|string|min:5'
        ]);

        if($validate->fails()){
            throw new ValidationException($validate);
        }
        return $this->eventrepository->searchByname($name);
    }
    public function filter(string $category){
        $validate = Validator::make(['category'=>$category],[
            'category' => ['required',Rule::exists('categories','nom')]
        ]);
        if($validate->fails()){
            throw new ValidationException($validate);
        }
        return $this->eventrepository->filterByCategorie($category);
    }
}