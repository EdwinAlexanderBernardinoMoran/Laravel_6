@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Articulo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- Campo Titulo --}}
                        <div class="form-group">
                            <label for="title">Titulo *</label>
                            <input type="text" name="title" id="title" class="form-control" required value="{{ old('title', $post->title) }}">
                        </div>

                        {{-- Campo Imagen --}}
                        <div class="form-group">
                            <label for="file">Imagen</label>
                            <input type="file" name="file" id="file">
                        </div>

                        {{-- Campo contenido --}}
                        <div class="form-group">
                            <label for="body">Contenido *</label>
                            <textarea name="body" id="body" rows="6" class="form-control" required>
                                {{ old('body', $post->body)}}
                            </textarea>
                        </div>

                        {{-- Campo contenido Embebido --}}
                        <div class="form-group">
                            <label for="iframe">Contenido Embebido</label>
                            <textarea name="iframe" id="iframe" class="form-control" required>
                                {{ old('iframe', $post->iframe)}}
                            </textarea>
                        </div>

                        {{-- Boton Submit --}}
                        <div class="form-group">
                            <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
