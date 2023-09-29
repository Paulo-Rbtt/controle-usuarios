<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index()
    {
        return Inertia::render('/perfil/{id}');
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return abort(404);
        }

        return Inertia::render('Perfil', [
            'user' => $user
        ]);
    }

    public function update($id, Request $request)
    {
        
        // $user = Auth::user(); // Obtém o usuário autenticado
        $user = User::find($id); // Obtém o usuário desejado

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return response()->json(['message' => 'Perfil atualizado com sucesso']);
    }
}
