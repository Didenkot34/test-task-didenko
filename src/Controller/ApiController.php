<?php

namespace App\Controller;

use App\DBAL\Types\PlatformType;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends Controller
{
    /**
     * @Route("/api/data", name="app_offer")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function offer(Request $request)
    {
        //...something do with Request
        $uuid1 = Uuid::uuid1();

        return $this->json([
            'application_id' => $uuid1->toString(),
            'countries' => 'uk',
            'payout' => '100',
            'platform' => PlatformType::ANDROID,
        ]);
    }
}