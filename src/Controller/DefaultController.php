<?php

namespace App\Controller;

use App\Entity\Offer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="default_index")
     */
    public function index()
    {

        return $this->render('base.html.twig', ['controllerName' => __CLASS__]);
    }

    /**
     * @Route("/create-offer", name="create_offer")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function createOffer(Request $request)
    {
        $offer = new Offer();
        $offer->setApplicationId($request->query->get('application_id'));
        $offer->setCountries($request->query->get('countries', 'en'));
        $offer->setPayout($request->query->get('payuot', 100));
        $offer->setPlatform($request->query->get('platform', 'iOS'));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($offer);
        $entityManager->flush();

        return $this->json(['error' => false]);
    }
}