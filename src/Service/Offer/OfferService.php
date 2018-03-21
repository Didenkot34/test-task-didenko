<?php

namespace App\Service\Offer;


class OfferService
{

    private $data;
    private $entityManager;
    private $strategy;

    /**
     * OfferService constructor.
     * @param $data
     * @param $entityManager
     * @param CreateStrategy $strategy
     */
    public function __construct($data, $entityManager, CreateStrategy $strategy)
    {
        $this->data = $data;
        $this->entityManager = $entityManager;
        $this->strategy = $strategy;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @return array
     */
    public function create(): array
    {
        return $this->strategy->create($this);
    }


}