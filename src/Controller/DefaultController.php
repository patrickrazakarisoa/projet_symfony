<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;

class DefaultController extends AbstractController
{

    public function bonjour($nom, $age)
    {
        return new Response("<h1 style='padding: 20px; background-color: green; color: white; border-radius: 10px; text-align: center; box-shadow: 5px 5px 5px grey; width: 30%; margin: auto; margin-top: 10rem; font-family: sans-serif;'>Bonjour je suis $nom ! J'ai $age ans.</1>");
    }

    public function bonjour2($nom, $ville)
    {
        return new Response("<h1 style='padding: 20px; background-color: black; color: white; border-radius: 10px; text-align: center; box-shadow: 5px 5px 5px grey; width: 30%; margin: auto; margin-top: 10rem; font-family: sans-serif;'>Bonjour, je suis $nom. J'habitte à $ville.</1>");
    }

    /**
     * @Route("/deconnexion/{nom?}", name="exit")
     */
    public function deconnexion($nom)
    {
        return new Response("<h1 style='padding: 20px; background-color: steelblue; color: white; border-radius: 10px; text-align: center; box-shadow: 5px 5px 5px grey; width: 30%; margin: auto; margin-top: 10rem; font-family: sans-serif;'>Au revoir $nom!</1>");
    }

    /**
     * @Route("/accueil", name="accueil")
     */
    public function home()
    {
        $nom = "Durand";
        $prenom = "Pierre";
        $age = 15;

        $menu = [
            'entree' => 'salade',
            'plat' => 'lasagnes',
            'dessert' => 'brownie'
        ];

        $users = [
            [
                'name' => 'Hugo',
                'age' => 30
            ],
            [
                'name' => 'Robin',
                'age' => 16
            ],
            [
                'name' => 'Thibault',
                'age' => 45
            ]
        ];

        return $this->render('accueil.html.twig', [
            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age,
            'menu' => $menu,
            'users' => $users
        ]);
    }
}
