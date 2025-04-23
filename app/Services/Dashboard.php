<?php

namespace App\Services;

use App\Repositories\Contracts\EventInterface;
use App\Repositories\Contracts\EventPurchaseInterface;
use App\Repositories\Contracts\UserRepositoryInterface;

class Dashboard{
    private $UserRepository;
    private $EventRepository;
    private $EventPurchaseRipository;
    
    public function __construct(UserRepositoryInterface $UserRepository,EventInterface $EventRepository,EventPurchaseInterface $EventPurchaseRipository)
    {
        $this->UserRepository = $UserRepository;
        $this->EventRepository = $EventRepository;
        $this->EventPurchaseRipository = $EventPurchaseRipository;
    }

    public function userCount(){
        return $this->UserRepository->countUsers();
    }

    public function eventCount(){
        return $this->EventRepository->countEvent();
    }

    public function purchaseCount(){
        return $this->EventPurchaseRipository->countPurchase();
    }
    public function getEventsByCategoryForChart()
    {
        $result = $this->EventRepository->countByCategorie();

        // data format for chart.js
        $labels = $result->pluck('nom')->toArray();
        $data = $result->pluck('total')->toArray();

        return [
            "labels" => $labels,
            "datasets" => [
                [
                    'label'=>'Events by Category',
                    'data' => $data
                ]
            ]
                ];
    }
}