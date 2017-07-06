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

	public function store(PokemonRequest $request)
	{
		$pokemon = $this->pokemonModel->create($request->all());

		return $pokemon;
	}

	public function update(PokemonRequest $request, $id)
	{
		$pokemon = $this->pokemonModel->findOrFail($id)->update($request->all());

		return $pokemon;
	}

	public function show($id)
	{
		dd($id);
		return $this->pokemonModel->findOrFail($id);
	}
}