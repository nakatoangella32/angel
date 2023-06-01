<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountFormRequest;
use App\Services\AccDepositService;
use App\Services\AccWithdrawService;
use App\Services\UserService;

class AccountController extends Controller
{

    public function index()
    {
        return view('dashboard');
    }

    public function store(AccountFormRequest $request, UserService $userService)
    {
        try {
            $userService->register($request);
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function initiateDeposit()
    {
        return view('deposit');
    }

    public function initiateWithdraw()
    {
        return view('withdraw');
    }

    public function deposit(Request $request, AccDepositService $accountService)
    {
        try {
            $accountService->deposit($request->input('amount'));
            return redirect()->back()->with(['success_message' => "Account succefully loaded with Cash"]);
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function withdraw(Request $request, AccWithdrawService $accountService)
    {
        try {
            $accountService->withdraw($request->input('amount'));
            return redirect()->back()->with(['success_message' => "Account successfully withdrawn"]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
