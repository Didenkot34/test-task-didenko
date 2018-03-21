<?php

namespace App\Service\Console\Offer;


use App\Entity\Offer;
use App\Service\Console\CreateStrategy;
use App\Service\Console\Entity;

class JsonOffer extends CreateStrategy
{

    private $entityManager;
    private $data;

    /**
     * Strategy for creating Offer using data in json format
     * @param Entity $offerService
     * @return array
     */
    public function create(Entity $offerService): array
    {
        $this->entityManager = $offerService->getEntityManager();
        $this->data = json_decode($offerService->getData(), true);

        foreach ($this->data as $key => $val) {
            $offer = new Offer();
            $offer->setApplicationId($val[0]['uid']);

            if (array_key_exists('countries', $val[0]) && !empty($val[0]['countries'])) {
                $offer->setCountries(\GuzzleHttp\json_encode($val[0]['countries']));
            }

            if (array_key_exists('country', $val[0]) && !empty($val[0]['country'])) {
                $offer->setCountries(\GuzzleHttp\json_encode($val[0]['country']));
            }

            if (array_key_exists('payout', $val[0]) &&
                !empty($val[0]['payout']) &&
                array_key_exists('currency', $val[0]['payout']) &&
                $val[0]['payout']['currency'] === 'USD'
            ) {
                $offer->setPayout($val[0]['payout']['amount']);
            } else {
                $offer->setPayout(0);
            }

            $offer->setPlatform($val[0]['platform']);

            $this->entityManager->persist($offer);
            $this->entityManager->flush();
        }

        return ['error' => false];
    }
}