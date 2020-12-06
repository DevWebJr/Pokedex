<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{
    /**
     * @Route("/pokemons", name="show_all_pokemons")
     */
    public function show_all_pokemons(PokemonRepository $pokemonRepository): Response
    {
        $pokemons = $pokemonRepository->findAll();
        return $this->render('pokemon/show_all_pokemons.html.twig', [
            'pokemons' => $pokemons
        ]);
    }
    
    /**
     * @Route("/pokemon/{id}", name="show_one_pokemon")
     */
    public function show_one_pokemon(Pokemon $pokemon): Response
    {
        return $this->render('pokemon/show_one_pokemon.html.twig', compact('pokemon') );
    }
}
