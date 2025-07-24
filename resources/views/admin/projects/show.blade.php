@extends('admin.layouts.app')

@section('title', $project->title)

@section('content')
    <div class="container mx-auto py-6">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-2">{{ $project->title }}</h1>
            <div class="mb-2 text-gray-600">Status: <span
                    class="badge {{ $project->status === 'completed' ? 'bg-green-500' : ($project->status === 'in_progress' ? 'bg-yellow-500' : 'bg-gray-400') }}">{{ ucfirst($project->status) }}</span>
            </div>
            <div class="mb-2 text-gray-600">Destaque: {{ $project->featured ? 'Sim' : 'Não' }}</div>
            <div class="mb-2 text-gray-600">Ordem: {{ $project->order }}</div>
            <div class="mb-2 text-gray-600">Data de Conclusão:
                {{ $project->completion_date ? \Carbon\Carbon::parse($project->completion_date)->format('d/m/Y') : '-' }}
            </div>
            <div class="mb-2 text-gray-600">Tecnologias:
                {{ $project->technologies ? implode(', ', $project->technologies) : '-' }}</div>
            <div class="mb-2 text-gray-600">URL do Projeto: <a href="{{ $project->project_url }}" target="_blank"
                    class="text-blue-600 underline">{{ $project->project_url }}</a></div>
            <div class="mb-2 text-gray-600">URL do GitHub: <a href="{{ $project->github_url }}" target="_blank"
                    class="text-blue-600 underline">{{ $project->github_url }}</a></div>
            <div class="mb-2 text-gray-600">URL de Demonstração: <a href="{{ $project->demo_url }}" target="_blank"
                    class="text-blue-600 underline">{{ $project->demo_url }}</a></div>
            @if ($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="Imagem de capa" class="h-48 mb-4">
            @endif
            @if ($project->gallery)
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach (json_decode($project->gallery, true) as $img)
                        <img src="{{ asset('storage/' . $img) }}" alt="Galeria" class="h-16">
                    @endforeach
                </div>
            @endif
            <div class="prose max-w-none mb-4">{!! nl2br(e($project->description)) !!}</div>
            <div class="mt-6 flex gap-2">
                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                    onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Excluir</button>
                </form>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
@endsection
