<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index() {
        return Inertia::render('Register');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'min:5'],
            'email' => ['required'],
            'password' => ['required', 'min:8'],
        ]);

        User::create($request->all());
    }
}
