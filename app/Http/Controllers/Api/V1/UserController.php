<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json([
            'status'=>'success',
            'data'=>$users
        ]);
    }

    public function store(UserRequest $request){
        $user = User::create($request->validated());
        return response()->json([
            'status' => 'success',
            'data' => $user
        ], 201);
    }
    
    public function show(User $user){
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function update(UserRequest $request, User $user){
        $user = User::update($request->validated());
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function destroy(User $user){
        $user->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User deleted'
        ]);
    }
}
