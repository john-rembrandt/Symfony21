<?php
namespace App\Controller\Comments;

use App\Form\Type\CommentsType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Comments;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;//dans le but de remplacer le BackController maison
use Symfony\Component\HttpFoundation\Request;//dans le but de remplacer le HTTPRequest maison

class CommentsController extends AbstractController
{

    
    public function createComments(): response
    {
         // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $comments = new Comments();
        $comments->setAuteur('Fabien');
        $comments->setContenu('Ergonomic and stylish!');
        $comments->setDate(new DateTime("12-02-2021"));
        

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($comments);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new comments with id '.$comments->getId());
    }





    public function show(int $id): Response 
    {
       //affiche l'auteur d'un comments en fonction de son id de la table "commentaire" 
        $comments = $this->getDoctrine()
            ->getRepository(Comments::class)
            ->find($id);

        if (!$comments) {
            throw $this->createNotFoundException(
                'No comments found for id '.$id
            );
        }

        return new Response('Check out this great comments: '.$comments->getAuteur());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }




    //rentre en dur dans la db sur table "comments"
    public function formulaire(): Response 
    {
        // creates a task object and initializes some data for this example
        $comments = new Comments();
        $comments->setAuteur('Write a blog post');
        $comments->setContenu('pis comment le formulaire');
        $comments->setDate(new \DateTime('tomorrow'));

        $form = $this->createForm(CommentsType::class, $comments);

        return $this->render('Comments/formulaire.html.twig', [
            'form' => $form->createView(),]);
    }





    public function entryFormulaire(Request $request): Response 
    {
        //crée et insère le fomulaire de commentaire en db, table "comments"

        // just setup a fresh $task object (remove the example data)
        $comments = new Comments();

        $form = $this->createForm(CommentsType::class, $comments);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $comments = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comments);
            $entityManager->flush();

            return $this->redirectToRoute('app_formComments_Out');
        }
    
        return $this->render('Comments/formulaire.html.twig', [
            'form' => $form->createView(),
        ]);
    }




    //page de réponse si formulaire commentaire "ok"
    public function outFormulaire(): Response 
    {
        return $this->render('News/outFormulaire.html.twig');
    }
}