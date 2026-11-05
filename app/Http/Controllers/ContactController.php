<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ContactController extends Controller
{
    public function index(Request $request)
{
    // 1. Pegamos o termo de busca (se houver)
    $search = $request->input('search');

    // 2. Iniciamos a consulta vinculada ao usuário logado
    $query = auth()->user()->contacts();

    // 3. Se houver busca, aplicamos os filtros (usando o WHERE do SQL)
    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%");
        });
    }

    // 4. Pegamos os resultados ordenados pelo mais recente
    $contacts = $query->latest()->get();

    return view('contacts.index', compact('contacts', 'search'));
}

    public function create()
    {
        return view('contacts.create');
    }

  public function store(Request $request)
{
    // Validar os dados recebidos
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'nullable|email',
        'type' => 'required',
        'notes' => 'nullable',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    // Verificar se uma foto foi enviada
    if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->store('contacts', 'public');
    }

    // Criar contato vinculado ao usuário logado
    auth()->user()->contacts()->create($data);

    return redirect()
        ->route('contacts.index')
        ->with('success', 'Contato criado com sucesso!');
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
    // Verificar se o contato pertence ao usuário
    if ($contact->user_id !== auth()->id()) {
        abort(403, 'Acesso negado.');
    }

    // Validar os dados
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'nullable|email',
        'type' => 'required',
        'notes' => 'nullable',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    // Verificar se uma nova foto foi enviada
    if ($request->hasFile('photo')) {

        // Salvar a nova imagem
        $novaFoto = $request->file('photo')->store('contacts', 'public');

        // Excluir a foto antiga
        if ($contact->photo) {
            Storage::disk('public')->delete($contact->photo);
        }

        // Atualizar o caminho da imagem
        $data['photo'] = $novaFoto;
    }

    // Atualizar os dados do contato
    $contact->update($data);

    return redirect()
        ->route('contacts.index')
        ->with('success', 'Contato atualizado com sucesso!');
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

    public function exportPdf(){
    $contacts = auth()->user()->contacts()->latest()->get();

    // Carrega a view específica para o PDF e passa os contatos
    $pdf = Pdf::loadView('contacts.pdf', compact('contacts'));

    // Faz o download do arquivo com o nome 'agenda.pdf'
    return $pdf->download('minha_agenda.pdf');
}
}
