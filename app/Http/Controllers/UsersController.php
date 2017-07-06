<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Util\Messages;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{

    /*
    * Salva os dados do usuario.
    *
    * @param $request
    */
    public function store(Request $request)
    {
        $user = new User();
        $user->create($request->all());

        return response(['data' => ['message' => Messages::SUCCESS]], Response::HTTP_CREATED);
    }
}
