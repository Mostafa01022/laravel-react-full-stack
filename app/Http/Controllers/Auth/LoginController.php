<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Setup\Admins;
use App\Models\Setup\AdminGroup;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function store(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();
        $credentials = [
            "admin_name" => $validated['username'],
            "password" => $validated['password']
        ];
        if (!Auth::attempt($credentials, $request->boolean("remember"))) {
            return response()->json([
                'message' => 'Wrong credentials',
            ], 401);
        }

        $userData = Admins::find(auth()->id());

        if (!$userData) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        // Fetch privileges
        $privileges = AdminGroup::where('id', $userData->admin_group_id)->first();

        $user = [
            'full_name' => $userData->first_name . ' ' . $userData->last_name,
            'email' => $userData->email ?? '',
            'group_name' => $privileges ? $privileges->group_name : '',
            'privileges' => $privileges ? $privileges->privilege : '',
        ];

        // Generate API token using Laravel Sanctum
        $token = $userData->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ]);
    }


    public function logout()
    {
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();
        session()->forget('privileges');
        session()->forget('user');
        return redirect('/');
    }

    /**
     * @param $users
     * @return bool
     */
    private function checkAuth($users): bool
    {
        return array_key_exists(request('username'), $users) && $users[request('username')]['password'] === request('password');
    }
}
