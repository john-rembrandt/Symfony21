<?php
namespace App\Controller;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\News;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;//dans le but de remplacer le BackController maison
use Symfony\Component\HttpFoundation\Request;//dans le but de remplacer le HTTPRequest maison

class NewsTestController extends AbstractController
{
    public function createNews(): response
    {
         // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $news = new News();
        $news->setAuteur('Fabien');
        $news->setTitre('always symfony');
        $news->setContenu('Ergonomic and stylish!');
        $news->setDateAjout(new DateTime("12-02-2021"));
        $news->setDateModif(new DateTime("12/02/2021"));

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($news);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$news->getId());
    }
    public function show(int $id): Response
    {
        $news = $this->getDoctrine()
            ->getRepository(News::class)
            ->find($id);

        if (!$news) {
            throw $this->createNotFoundException(
                'No news found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$news->getAuteur());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
}