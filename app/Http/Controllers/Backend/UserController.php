<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Password;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function index()
    {
        return view('backend.change-password');
    }

    public function changePass(Password $request)
    {
        try {
            $user = Auth::user();
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('message', __('messages.success'));
        } catch (Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return redirect()->back()->with('message', __('messages.error'));
        }
    }
}
