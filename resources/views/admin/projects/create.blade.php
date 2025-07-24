@extends('admin.layouts.app')

@section('title', 'Novo Projeto')

@section('content')
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Novo Projeto</h1>
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow rounded-lg p-6">
            @csrf
            <div class="mb-4">
                <label class="block font-semibold mb-1">Título</label>
                <input type="text" name="title" class="form-input w-full" value="{{ old('title') }}" required>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Descrição Curta</label>
                <textarea name="short_description" class="form-textarea w-full" rows="2">{{ old('short_description') }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Descrição Completa</label>
                <textarea name="description" class="form-textarea w-full" rows="6">{{ old('description') }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Imagem de Capa</label>
                <input type="file" name="image" class="form-input w-full">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Galeria de Imagens</label>
                <input type="file" name="gallery[]" class="form-input w-full" multiple>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Tecnologias (separadas por vírgula)</label>
                <input type="text" name="technologies" class="form-input w-full" value="{{ old('technologies') }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">URL do Projeto</label>
                <input type="url" name="project_url" class="form-input w-full" value="{{ old('project_url') }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">URL do GitHub</label>
                <input type="url" name="github_url" class="form-input w-full" value="{{ old('github_url') }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">URL de Demonstração</label>
                <input type="url" name="demo_url" class="form-input w-full" value="{{ old('demo_url') }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Status</label>
                <select name="status" class="form-select w-full">
                    <option value="completed">Concluído</option>
                    <option value="in_progress">Em andamento</option>
                    <option value="planned">Planejado</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Data de Conclusão</label>
                <input type="date" name="completion_date" class="form-input w-full" value="{{ old('completion_date') }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Destaque?</label>
                <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}> Sim
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Ordem</label>
                <input type="number" name="order" class="form-input w-full" value="{{ old('order', 0) }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Ativo?</label>
                <input type="checkbox" name="active" value="1" {{ old('active', 1) ? 'checked' : '' }}> Sim
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary ml-2">Cancelar</a>
        </form>
    </div>
@endsection
