<?php

namespace App\Http\Controllers;

use Crm\User\Models\User;
use Crm\User\Requests\CreateUserRequest;
use Crm\User\Requests\UdateUserRequest;
use Crm\User\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $UserService;

    public function __construct(UserService $UserService)
    {
        $this->UserService = $UserService;
    }

    public function index(Request $request)
    {
        return $this->UserService->index($request);
    }

    public function show(User $User)
    {
        return $this->UserService->show($User);
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();
        return $this->UserService->store($data);
    }

    public function update(UdateUserRequest $request, User $User)
    {
        return $this->UserService->update($request->validated(), $User);
    }

    public function destroy($User)
    {
        return $this->UserService->delete($User);
    }
}
