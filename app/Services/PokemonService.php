<?php

namespace App\Services;

use App\Models\Pokemons;
use App\Http\Requests\PokemonRequest;

class PokemonService extends Service
{
	private $pokemonModel;

	public function __construct()
	{
		$this->pokemonModel = new Pokemons();
	}

	/*
	* Lista todos os pokemons
	*/
	public function all()
	{
		return $this->pokemonModel->all();
	}

    /*
     * Salva os dados do pokemon.
     *
     * @param $request
     */
	public function store(PokemonRequest $request)
	{
		$pokemon = $this->pokemonModel->create($request->all());

		return $pokemon;
	}

	/*
	 * Atualiza os dados do pokemon.
	 *
	 * @param $request
	 * @param $id
	 */
	public function update(PokemonRequest $request, $id)
	{
		$pokemon = $this->pokemonModel->find($id)->update($request->all());

		return $pokemon;
	}

	/*
	 * Lista os dados de um pokemon específico.
	 *
	 * @param $id
	 */
	public function show($id)
    {
		return $this->pokemonModel->find($id);
	}

	/*
	 * Exclui um pokemon.
	 *
	 * @param $id
	 */
	public function destroy($id)
    {
        $this->pokemonModel->find($id)->delete();
    }
}