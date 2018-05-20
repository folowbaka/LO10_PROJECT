<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrganiserController extends Controller
{
    /**
     * @Route("/organiser", name="organiser")
     */
    public function index()
    {
        return $this->render('organiser/index.html.twig', [
            'controller_name' => 'OrganiserController',
        ]);
    }
}
