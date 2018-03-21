<?php

namespace App\Controller;

use App\Entity\Offer;
use App\Service\Offer\JsonOffer;
use App\Service\Offer\OfferService;
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
     * @Route("/create-offer-json", name="create_offer_json")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function createOfferJson(Request $request)
    {
        $offerService = new OfferService(
            $request->get('data'),
            $this->getDoctrine()->getManager(),
            new JsonOffer()
        );

        $result = $offerService->create();

        return $this->json($result);
    }
}