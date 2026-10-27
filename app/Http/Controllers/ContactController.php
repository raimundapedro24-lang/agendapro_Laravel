<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index()
    {
        // Pega apenas os contatos do usuário logado
        $contacts = Auth::user()->contacts()->latest()->get();

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'type' => 'required',
            'notes' => 'nullable',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Salva a foto, caso tenha sido enviada
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                ->store('contacts', 'public');
        }

        // Cria o contato associado ao usuário logado
        auth()->user()->contacts()->create($data);

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contato criado!');
    }

    public function edit(Contact $contact)
    {
        // Verifica se o contato pertence ao usuário
        if ($contact->user_id !== auth()->id()) {
            abort(403, 'Acesso negado.');
        }

        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        // Verifica se o contato pertence ao usuário
        if ($contact->user_id !== auth()->id()) {
            abort(403, 'Acesso negado.');
        }

        // Validação dos dados
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'type' => 'required',
            'notes' => 'nullable',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Substitui a foto somente se uma nova for enviada
        if ($request->hasFile('photo')) {

            // Apaga a foto antiga
            if ($contact->photo) {
                Storage::disk('public')->delete($contact->photo);
            }

            // Salva a nova foto
            $data['photo'] = $request->file('photo')
                ->store('contacts', 'public');
        }

        // Atualiza o contato
        $contact->update($data);

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contato atualizado!');
    }

    public function destroy(Contact $contact)
    {
        // Verifica se o contato pertence ao usuário
        if ($contact->user_id !== auth()->id()) {
            abort(403, 'Acesso negado.');
        }

        // Apaga a foto do disco, se existir
        if ($contact->photo) {
            Storage::disk('public')->delete($contact->photo);
        }

        // Remove o contato
        $contact->delete();

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contato removido com sucesso!');
    }
}
