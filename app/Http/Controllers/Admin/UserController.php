<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    // Liste de tous les utilisateurs
    public function index()
    {
        $users = User::with('offers')->get();

        return view('admin.users.index', compact('users'));
    }

    // Détail d’un utilisateur + ses offres
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // Suppression / bannissement
    public function destroy(User $user)
    {
        if ($user->role === 'admin') {
            abort(403);
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}