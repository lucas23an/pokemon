<?php

namespace App\Http\Controllers;

use App\Models\Pokemons;
use App\Services\PokemonService;
use App\Http\Controllers\Controller;
use App\Http\Requests\PokemonRequest;
use App\Util\Messages;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    	return response(['data' => $this->pokemonService->all()]);
    }

    /*
    * Lista um pokemon específico.
	*
	* @param $pokemon
    */
    public function show($id)
    {
        $pokemon = $this->pokemonService->show($id);

        if (empty($pokemon)) {
            return response(['data' => ['message' => Messages::NOT_FOUND]], Response::HTTP_NOT_FOUND);
        }

    	return response(['data' => $pokemon]);
    }

    /*
    * Salva os dados do pokemon.
    *
    * @param $request
    */
    public function store(PokemonRequest $request)
    {
    	$this->pokemonService->store($request);

    	return response(['data' => ['message' => Messages::SUCCESS]], Response::HTTP_CREATED);
    }

    /*
    * Atualiza os dados do pokemon.
    *
    * @param $request
    * @param $id
    */
    public function update(PokemonRequest $request, $id)
    {
        $pokemon = $this->pokemonService->show($id);

        if (empty($pokemon)) {
            return response(['data' => ['message' => Messages::NOT_FOUND]], Response::HTTP_NOT_FOUND);
        }

    	$this->pokemonService->update($request, $id);

    	return response(['data' => ['message' => Messages::UPDATE]]);
    }

    /*
    * Exclui os dados do pokemon.
    *
    * @param $id
    */
    public function destroy($id)
    {
        $pokemon = $this->pokemonService->show($id);

        if (empty($pokemon)) {
            return response(['data' => ['message' => Messages::NOT_FOUND]], Response::HTTP_NOT_FOUND);
        }

        $this->pokemonService->destroy($id);

        return response(['data' => ['message' => Messages::DELETE]]);
    }
}
