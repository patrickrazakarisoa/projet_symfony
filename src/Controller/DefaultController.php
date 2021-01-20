<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\Routing\Annotation\Route;


class DefaultController
{
    public function index()
    {
        return new Response('<h1 style="padding: 20px; background-color: steelblue; color: white; border-radius: 10px; text-align: center; box-shadow: 5px 5px 5px grey;">Bienvenue sur la page d\'acceuil</1>');
    }
}
