<?php

namespace Crm\User\Services;

use Crm\Base\Response\traitResponse;
use Crm\User\Events\UserCreation;
use Crm\User\Models\User;
use Crm\User\Resources\UserResource;

class UserService
{
    use traitResponse;

    public function index($request)
    {
        $Users = User::get();
        return $this->successfully('Success', [
            'Users' => UserResource::collection($Users)
        ]);
    }

    public function show($User)
    {
        return $this->successfully('Success', [
            'User' => new UserResource($User)
        ]);
    }

    public function store(array $data)
    {
        $User = User::create($data);

        // event(new UserCreation($User));

        return $this->successfully('Created Successfully', [
            'User' => new UserResource($User),
            'token' => $User->createToken('auth_token')->plainTextToken,
        ]);
    }

    public function update($data, User $User)
    {
        $User->update($data);
        return $this->successfully('Updated Successfully', [
            'User' => new UserResource($User)
        ]);
    }

    public function delete(User $User): bool
    {
        return $User->delete();
    }
}
