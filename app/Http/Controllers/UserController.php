<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index(): Response
    {
        $data = User::select(['id', 'name', 'job', 'age'])->get();

        return response($data);
    }


    public function store(StoreUserRequest $request): Response
    {
        $data = $request->validated();

        $user = User::create($data);

        return response($user);
    }

    public function show(int $id): Response
    {
        return response(User::find($id));
    }


    public function update(UpdateUserRequest $request, User $user): Response
    {
        $data = $request->validated();
        $user->update($data);
        return response($user);
    }

    public function destroy(User $user): Response
    {
        $user->delete();

        return response([]);
    }
}
