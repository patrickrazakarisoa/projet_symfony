<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;

class ProductController extends AbstractController
{
    public function index()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        return $this->render('parent.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/enfant/{id}", name="page_enfant")
     */
    public function enfant($id)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        return $this->render('enfant.html.twig', [
            'product' => $product
        ]);
    }


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

    /**
     * @Route("/update/{id}", name = "update" )
     */
    public function update($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);

        $product->setPrice(4000);

        $entityManager->flush();

        return new Response('<h2>Mise à jour effectuée</h2>');
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);


        $entityManager->remove($product);
        $entityManager->flush();


        return new Response('<h2>Le produit a été supprimé</h2>');
    }
}
