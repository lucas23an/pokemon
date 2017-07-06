<?php

namespace App\Services;

use App\Models\User;
use App\Http\Requests\UserRequest;

class UserService extends Service
{
	private $userModel;

	public function __construct()
	{
		$this->userModel = new User();
	}

    /*
     * Salva os dados do usuario.
     *
     * @param $request
     */
	public function store(UserRequest $request)
	{
		$user = new User();

		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);

		$user->save();

		return $user;
	}
}