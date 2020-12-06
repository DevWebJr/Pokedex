<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Form\PokemonType;
use App\Repository\PokemonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{
    /**
     * @Route("/pokemons", name="show_all_pokemons", methods={"GET"})
     */
    public function show_all_pokemons(PokemonRepository $pokemonRepository): Response
    {
        $pokemons = $pokemonRepository->findAll();
        return $this->render('pokemon/show_all_pokemons.html.twig', [
            'pokemons' => $pokemons
        ]);
    }
    
    /**
     * @Route("/pokemon/{id<[0-9]+>}", name="show_one_pokemon", methods={"GET"})
     */
    public function show_one_pokemon(Pokemon $pokemon): Response
    {
        return $this->render('pokemon/show_one_pokemon.html.twig', compact('pokemon') );
    }
    
    /**
     * @Route("/pokemons/create", name="create_pokemon", methods={"GET","POST"})
     */
    public function create_pokemon(Request $request, EntityManagerInterface $em): Response
    {
        $pokemon = new Pokemon;

        $form = $this->createForm(PokemonType::class, $pokemon);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($pokemon);
            $em->flush();

            $this->addFlash('success', 'Félicitations! Un nouveau Pokémon a été ajouté au Pokédex.');

            return $this->redirectToRoute('show_all_pokemons');
        }

        $form->handleRequest($request);
        return $this->render('pokemon/create_pokemon.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/pokemons/{id<[0-9]+>}/edit", name="edit_pokemon", methods={"GET","PUT"})
     */
    public function edit_pokemon(Pokemon $pokemon, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(PokemonType::class, $pokemon, [
            'method' => 'PUT'
        ]);
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->flush();

            $this->addFlash('success', 'Les données concernant ce Pokémon ont été modifiées dans le pokédex.');

            return $this->redirectToRoute('show_all_pokemons');
        }

        $form->handleRequest($request);
        return $this->render('pokemon/edit_pokemon.html.twig', [
            'pokemon' => $pokemon,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/pokemons/{id<[0-9]+>}/delete", name="delete_pokemon", methods={"DELETE"})
     */
    public function delete(Request $request, Pokemon $pokemon, EntityManagerInterface $em): Response
    {
        if($this->isCsrfTokenValid('pokemon_deletion_'.$pokemon->getId(), $request->request->get('csrf_token')))
        {
            $em->remove($pokemon);
            $em->flush();

            $this->addFlash('info', 'Ce Pokémon a été supprimé de la base de données du pokédex.');
        }  

        return $this->redirectToRoute('show_all_pokemons');
    }
}
