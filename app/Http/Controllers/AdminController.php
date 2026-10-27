<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        // Pega todos os usuários menos o próprio admin logado
        $users = User::where('id', '!=', auth()->id())->get();
        return view('admin.users', compact('users'));
    }

    public function toggleStatus(User $user){
        // Inverte o status: se 1 vira 0, se 0 vira 1
        $user->active = !$user->active;
        $user->save();

        return back()->with('success', 'Status do usuário atualizado com sucesso!');
    }
}