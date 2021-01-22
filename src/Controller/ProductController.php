<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route("/add", name="add")
     */
    public function add(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Lamar');
        $product->setPrice(100);
        $product->setDescription('Figurine d\'un personnage de GTA 5 ');
        $product->setMarque('Rockstar Game');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('<h1>Le produit a été enregistré. Son id est' . $product->getId() . '</h1>');
    }
}
