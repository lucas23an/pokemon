<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Util\Messages;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    /*
    * Salva os dados do user.
    *
    * @param $request
    */
    public function store(UserRequest $request)
    {
        $this->userService->store($request);

        return response(['data' => ['message' => Messages::SUCCESS]], Response::HTTP_CREATED);
    }
}
