<?php

namespace App\Http\Controllers;

use App\Models\Pokemons;
use App\Services\PokemonService;
use App\Http\Controllers\Controller;
use App\Http\Requests\PokemonRequest;
use App\Util\Messages;
use Illuminate\Http\Request;

class PokemonsController extends Controller
{
    private $pokemonService;

    public function __construct()
    {
    	$this->pokemonService = new PokemonService();
    }

    /*
    * Lista todos pokemons.
    */
    public function index()
    {
    	return $this->pokemonService->all();
    }

    /*
    * Lista um pokemon específico.
	*
	* @param $pokemon
    */
    public function show(Pokemons $pokemon)
    {
    	return $pokemon->find($pokemon);
    }

    /*
    * Salva os dados do pokemon.
    *
    * @param $request
    */
    public function store(PokemonRequest $request)
    {
    	$this->pokemonService->store($request);

    	return response(Messages::SUCCESS, 201);
    }

    /*
    * Atualiza os dados do pokemon.
    *
    * @param $request
    * @param $id
    */
    public function update(PokemonRequest $request, $id)
    {
    	$this->pokemonService->update($request, $id);

    	return response(Messages::UPDATE, 201);
    }

    /*
    * Exclui os dados do pokemon.
    *
    * @param $id
    */
    public function delete($id)
    {

    }
}
