<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Se for ADMIN, ele vê estatísticas do sistema
        if ($user->role === 'admin') {
            $stats = [
                'total_users' => User::count(),
                'active_users' => User::where('active', true)->count(),
                'pending_users' => User::where('active', false)->count(),
            ];
        }

        // Todos (Admin e User) vêem estatísticas da sua própria agenda
        $stats['total_contacts'] = $user->contacts()->count();
        $stats['pessoal'] = $user->contacts()->where('type', 'Pessoal')->count();
        $stats['trabalho'] = $user->contacts()->where('type', 'Trabalho')->count();

        return view('dashboard', compact('stats'));
    }
}