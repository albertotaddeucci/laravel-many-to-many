@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row align-content-center py-5">
        <div class="col-6">
            <h2 >Modifica la tipologia</h2>

        </div>
        <div class="col-6">
            <a href="{{route('admin.types.index')}}" >Torna all'indice</a>

        </div>
    </div>
    <form action="{{route('admin.types.update' , $type->id)}}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
            <label for="title"  class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $type->title}} "  ></input>
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') ?? $type->description}}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        
        
        
    
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>

</div>

@endsection