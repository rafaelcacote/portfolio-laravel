@extends('admin.layouts.app')

@section('title', 'Editar Projeto')

@section('content')
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Editar Projeto</h1>
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded-lg p-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold mb-1">Título</label>
                    <input type="text" name="title" class="form-input w-full" value="{{ old('title', $project->title) }}" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Tecnologias (separadas por vírgula)</label>
                    <input type="text" name="technologies" class="form-input w-full" value="{{ old('technologies', implode(',', $project->technologies ?? [])) }}">
                </div>
                <div class="md:col-span-2">
                    <label class="block font-semibold mb-1">Descrição Curta</label>
                    <textarea name="short_description" class="form-textarea w-full" rows="2">{{ old('short_description', $project->short_description) }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block font-semibold mb-1">Descrição Completa</label>
                    <textarea name="description" class="form-textarea w-full" rows="6">{{ old('description', $project->description) }}</textarea>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Imagem de Capa</label>
                    <input type="file" name="image" class="form-input w-full">
                    @if ($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="Imagem atual" class="h-24 mt-2">
                    @endif
                </div>
                <div>
                    <label class="block font-semibold mb-1">Galeria de Imagens</label>
                    <input type="file" name="gallery[]" class="form-input w-full" multiple>
                    @if ($project->gallery)
                        <div class="flex flex-wrap gap-2 mt-2">
                            @foreach ((is_array($project->gallery) ? $project->gallery : json_decode($project->gallery, true)) as $img)
                                <img src="{{ asset('storage/' . $img) }}" alt="Galeria" class="h-16">
                            @endforeach
                        </div>
                    @endif
                </div>
                <div>
                    <label class="block font-semibold mb-1">URL do Projeto</label>
                    <input type="url" name="project_url" class="form-input w-full" value="{{ old('project_url', $project->project_url) }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">URL do GitHub</label>
                    <input type="url" name="github_url" class="form-input w-full" value="{{ old('github_url', $project->github_url) }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">URL de Demonstração</label>
                    <input type="url" name="demo_url" class="form-input w-full" value="{{ old('demo_url', $project->demo_url) }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Status</label>
                    <select name="status" class="form-select w-full">
                        <option value="completed" @if ($project->status == 'completed') selected @endif>Concluído</option>
                        <option value="in_progress" @if ($project->status == 'in_progress') selected @endif>Em andamento</option>
                        <option value="planned" @if ($project->status == 'planned') selected @endif>Planejado</option>
                    </select>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Data de Conclusão</label>
                    <input type="date" name="completion_date" class="form-input w-full" value="{{ old('completion_date', $project->completion_date) }}">
                </div>
                <div class="flex items-center space-x-4">
                    <label class="block font-semibold mb-1">Destaque?</label>
                    <input type="checkbox" name="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }}> Sim
                </div>
                <div>
                    <label class="block font-semibold mb-1">Ordem</label>
                    <input type="number" name="order" class="form-input w-full" value="{{ old('order', $project->order) }}">
                </div>
                <div class="flex items-center space-x-4">
                    <label class="block font-semibold mb-1">Ativo?</label>
                    <input type="checkbox" name="active" value="1" {{ old('active', $project->active) ? 'checked' : '' }}> Sim
                </div>
            </div>
            <div class="mt-6 flex items-center">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary ml-2">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
