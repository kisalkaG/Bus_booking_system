<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\PasswordReset;

class UserPasswordResetController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userPasswordForgot(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json('no user found with the given email.', 404);
        }

        PasswordReset::create([
            'email' => $request->email,
            'token' => $this->_generateRandomString()
        ]);

        $tokenData = PasswordReset::where('email', $request->email)->first();
        $token = $tokenData->token;
        return response()->json(["password_reset_token" => $token]);
    }

    /**
     * @param int $length
     * @return false|string
     */
    private function _generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userPasswordReset(Request $request)
    {
        $credentials = request()->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|confirmed'
        ]);

        $token = $request->token;
        $password = $request->password;
        $tokenData = PasswordReset::where('token', $token)->first();
        if ($tokenData) {
            $user = User::where('email', $tokenData->email)->first();
            if (!$user) {
                return response()->json('no user found');
            } else {
                $user->password = Hash::make($password);
                $user->update();
                Auth::login($user);

                PasswordReset::where('email', $user->email)->delete();
                return response()->json(["msg" => "Password has been successfully changed"]);
            }
        } else {
            return response()->json(["msg" => "no user found"]);
        }
    }
}
