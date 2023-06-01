<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function store(Request $request, UserService $userservice)
    {
        try {
            $userservice->register($request);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }

        return redirect()->back();
    }

    public function login()
    {
        return "Login";
    }
}
