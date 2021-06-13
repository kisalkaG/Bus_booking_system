<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\SuperAdmin;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Http\Requests\UserRegisterRequest;


class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginAdmin(LoginRequest $request)
    {
        $admin = SuperAdmin::where('email', $request->get('email'))->first();

        if (!$admin || !Hash::check($request->get('password'), $admin->password)) {
            return response()->json([
                "message" => "Input credentials are wrong!!!"
            ]);
        }
        $token = $admin->createToken('access-token')->plainTextToken;
        return response()->json([
            "token" => $token
        ]);
    }

    /**
     * @param UserRegisterRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function registerUser(UserRegisterRequest $request)
    {
        $record = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ];
        $user = User::create($record);
        return response($user, 200);
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginUser(LoginRequest $request)
    {
        $user = User::where('email', $request->get('email'))->first();

        if (!$user || !Hash::check($request->get('password'), $user->password)) {
            return response()->json([
                "message" => "Input credentials are wrong!!!"
            ]);
        }
        $token = $user->createToken('access-token')->plainTextToken;
        return response()->json([
            "token" => $token
        ]);
    }
}
