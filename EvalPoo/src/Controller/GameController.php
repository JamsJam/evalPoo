<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\GameType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="app_game")
     */
    public function index(): Response
    {
        return $this->render('game/index.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }

    
    
    /**
     * @Route("/game/newGame", name="app_newgame")
     */
    public function newGame(Request $request, EntityManagerInterface $manager):Response
    {
        $Game = new Game;

        dump($Game);
        
        $form = $this->createForm(GameType::class, $Game);
        /* 
        CreateForm() permet de creer un formulaire
            il lui faut 2 arguments : 
                1- la classe de l'objet $bulder
                2- l'objet issu de la classe de l'entité

                3- facultatif ( tableau des options)

                ==> est un objet
        
        */
        //traitement du formulaire permettant
        //request => Methode POST
        //query => methode get
        $form->handleRequest($request);

        //si le formulaire a été soumis ET si il est valide
        if($form->isSubmitted() AND $form-> isValid())
        {

            



            $manager->persist($Game);
            
            //persist() ==> INSERT INTO si l'ID de l'objet existe en base de donnée
            //         ==> UPDATE si l'ID de l'objet existe
            //argument ==> objet issu de la classe/Entity


            $manager -> flush();//envoyer en BBD le resultat de persist()
            //affiche une notification. 2 argument (le type (warning, danger, success ...(voir la doc) -  Le contenue du message)
            $this->addFlash("success","Le Game à bien été ajouté" );
            return $this->redirectToRoute("app_home");

            //la méthode redirectToRoute permet de rediriger avec comme argument obligatoire le nom de la route.
            // une fois qu'il lis la redirection , le code n'est plus lu
        }
        
        return $this-> render("game/newGame.html.twig",[
            "formGame" => $form->createView()
            
        ]);
    }
}
