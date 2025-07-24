@extends('admin.layouts.app')

@section('title', 'Mensagens de Contato')

@section('content')
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-bold mb-6">Mensagens de Contato</h1>
        <div class="bg-white shadow rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Nome</th>
                        <th class="px-4 py-2">E-mail</th>
                        <th class="px-4 py-2">Assunto</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Recebida em</th>
                        <th class="px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr class="{{ $message->status === 'new' ? 'bg-yellow-50' : '' }}">
                            <td class="px-4 py-2">{{ $message->name }}</td>
                            <td class="px-4 py-2">{{ $message->email }}</td>
                            <td class="px-4 py-2">{{ $message->subject }}</td>
                            <td class="px-4 py-2">
                                <span
                                    class="badge {{ $message->status === 'new' ? 'bg-yellow-500' : 'bg-gray-400' }}">{{ ucfirst($message->status) }}</span>
                            </td>
                            <td class="px-4 py-2">{{ $message->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-info">Ver</a>
                                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Nenhuma mensagem encontrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">{{ $messages->links() }}</div>
        </div>
    </div>
@endsection
