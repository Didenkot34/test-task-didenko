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
        //$uuid1 = Uuid::uuid1();
        $response = json_decode(file_get_contents(__DIR__ . '/apiResource/data.json'), true);
        // print_r(($response[0][0]));
        return $this->json($response);

    }
}