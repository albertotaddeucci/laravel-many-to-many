@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row align-content-center py-5">
        <div class="col-6">
            <h2 >Modifica la tecnologia</h2>

        </div>
        <div class="col-6">
            <a href="{{route('admin.technologies.index')}}" >Torna all'indice</a>

        </div>
    </div>
    <form action="{{route('admin.technologies.update' , $technology->id)}}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
            <label for="title"  class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $technology->title}} "  ></input>
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Colore</label>
            <input type="color" id="color" name="color" value="{{ old('color') ?? $technology->color}}">
            @error('color')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        
        
        
    
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>

</div>

@endsection