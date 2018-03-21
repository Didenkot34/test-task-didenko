<?php

namespace App\Service\Offer;


abstract class CreateStrategy
{

    /**
     * The method for creating data in Offer using needed Strategy
     * @param OfferService $offerService
     * @return mixed
     */
    public abstract function create(OfferService $offerService);
}