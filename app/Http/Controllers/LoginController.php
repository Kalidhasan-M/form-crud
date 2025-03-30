<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticated(Request $request, $user)
    {
        if ($user->is_admin) {
            return redirect('/admin/listuser');
        }
        return redirect('/dashboard');
    }
}
