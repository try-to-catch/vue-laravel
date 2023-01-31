<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $data = User::select(['id', 'name', 'job', 'age'])->get();

        return UserResource::collection($data);
    }


    public function store(StoreUserRequest $request): Response
    {
        $data = $request->validated();

        $user = User::create($data);

        return response([]);
    }

    public function show(int $id): UserResource
    {
        return new UserResource(User::findOrFail($id));
    }


    public function update(UpdateUserRequest $request, User $user): Response
    {
        $data = $request->validated();
        $user->update($data);
        return response([]);
    }

    public function destroy(User $user): Response
    {
        $user->delete();

        return response([]);
    }
}
