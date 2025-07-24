@extends('admin.layouts.app')

@section('title', 'Projetos')

@section('content')
    <div class="container mx-auto py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Projetos</h1>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Novo Projeto</a>
        </div>
        <div class="bg-white shadow rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Título</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Destaque</th>
                        <th class="px-4 py-2">Ordem</th>
                        <th class="px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td class="px-4 py-2">{{ $project->title }}</td>
                            <td class="px-4 py-2">
                                <span
                                    class="badge {{ $project->status === 'completed' ? 'bg-green-500' : ($project->status === 'in_progress' ? 'bg-yellow-500' : 'bg-gray-400') }}">{{ ucfirst($project->status) }}</span>
                            </td>
                            <td class="px-4 py-2">{{ $project->featured ? 'Sim' : 'Não' }}</td>
                            <td class="px-4 py-2">{{ $project->order }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                    class="btn btn-sm btn-warning">Editar</a>
                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-info">Ver</a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Nenhum projeto encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">{{ $projects->links() }}</div>
        </div>
    </div>
@endsection
