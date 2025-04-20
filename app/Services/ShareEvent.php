<?php

namespace App\Services;

use App\Repositories\Contracts\EventSubmissionInterface;
use Jorenvh\Share\Share;

class ShareEvent{
    private $eventrepository;
    private $share;

    public function __construct(EventSubmissionInterface $eventrepository,Share $share)
    {
        $this->eventrepository = $eventrepository;
        $this->share = $share;
    }

    public function share(int $id){
        $event = $this->eventrepository->getSubmitedEvent($id);

        if(!$event){
            return null;
        }

        return $this->share->page(
            route('eventDetails',$id),
            'Check Out this awesome event on Beatwave'
        )->facebook()            
        ->reddit()
        ->twitter()
        ->getRawLinks(); // renders the links as HTML
    }
}