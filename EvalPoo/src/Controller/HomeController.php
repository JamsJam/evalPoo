<?php

namespace App\Controller;

use App\Repository\ContestRepository;
use App\Repository\GameRepository;
use App\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("", name="app_home")
     */
    public function index(ContestRepository $contestRepository, GameRepository $gameRepository, PlayerRepository $playerRepository): Response
    {

        $player = $playerRepository -> findAll();
        $contest = $contestRepository -> findAll();
        $game = $gameRepository -> findAll();

        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'HomeController',
            'players' => $player,
            'games' => $game,
            'contests' => $contest,

        ]);
    }
}
