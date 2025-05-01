<?php

namespace App\Repositories\Contracts;

interface InscriptionInterface{
    public function getInscription();
    public function countInscription();
    // get the inscription for all events (admin)
    public function getAllInscription();
}