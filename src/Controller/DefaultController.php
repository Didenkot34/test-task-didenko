<?php
/**
 * Created by PhpStorm.
 * User: ura
 * Date: 17.03.2018
 * Time: 14:38
 */

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="default_index")
     */
    public function index()
    {

        return $this->render('base.html.twig', ['controllerName' => __CLASS__]);
    }
}