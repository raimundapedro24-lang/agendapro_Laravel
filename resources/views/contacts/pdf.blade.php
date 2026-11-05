<!DOCTYPE html>
<html>
<head>
    <title>Minha Agenda</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #4f46e5; padding-bottom: 10px; }
        .header h1 { color: #4f46e5; margin: 0; }
        table { width: 100%; border-collapse: collapse; }
        th { background-color: #f3f4f6; color: #374151; padding: 10px; text-align: left; border: 1px solid #e5e7eb; }
        td { padding: 10px; border: 1px solid #e5e7eb; }
        .type-badge { font-weight: bold; text-transform: uppercase; font-size: 10px; color: #666; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 10px; color: #999; }</style>
</head>
<body>
    <div class="header">
        <h1>AgendaPro - Lista de Contatos</h1>
        <p>Usuário: {{ auth()->user()->name }} | Data: {{ date('d/m/Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td><strong>{{ $contact->name }}</strong></td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->email ?? 'N/A' }}</td>
                    <td class="type-badge">{{ $contact->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Gerado automaticamente pelo sistema AgendaPro Laravel.
    </div>
</body>
</html>