@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row align-content-center py-5">
        <div class="col-6">
            <h2 >Modifica il progetto</h2>

        </div>
        <div class="col-6">
            <a href="{{route('admin.projects.index')}}" >Torna all'indice</a>

        </div>
    </div>
    <form action="{{route('admin.projects.update' , $project->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
            <label for="title"  class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $project->title}} "  ></input>
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') ?? $project->description}}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Immagine</label>
            <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img" value="{{ old('img') ?? $project->img}}"></input>
            @error('img')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        {{-- <div class="mb-3">
            <label for="tech" class="form-label">Tecnologie utilizzate</label>
            <input class="form-control @error('tech') is-invalid @enderror" id="tech" name="tech" value="{{ old('tech') ?? $project->tech}} "  ></input>
             @error('tech')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div> --}}
        <div class="mb-3">
            <label for="github_url" class="form-label">URL Github</label>
            <input class="form-control @error('github_url') is-invalid @enderror" id="github_url" name="github_url" value="{{ old('github_url') ?? $project->github_url}} " ></input>
            @error('github_url')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="devices" class="form-label">Per quali devices?</label>
            <input type="text" class="form-control @error('devices') is-invalid @enderror" id="devices" name="devices" value="{{ old('devices') ?? $project->devices}}"  ></input>
            @error('devices')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Tipologia</label>
            <select class="form-select" name="type_id" id="type_id">
                <option value=""></option>
                @foreach ($types as $type)
                <option value="{{$type->id}}" {{$type->id == old('type_id', $project->type ? $project->type_id : '') ? 'selected' : ''}}>{{$type->title}}</option>                    
                @endforeach

            </select>
            {{-- @error('devices')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror --}}
        </div>

        <div class="mb-4">
            <label class="mb-2" for="">Tecnologie utilizzate</label>
            <div class="d-flex gap-4">

                @foreach($technologies as $technology)
                <div class="form-check ">
                    <input 
                        type="checkbox" 
                        name="technologies[]"
                        value="{{$technology->id}}" 
                        class="form-check-input" 
                        id="technology-{{$technology->id}}"
                        
                        
                        @if($errors->any())

                        {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}

                        @else 

                        {{ $project->technologies->contains($technology) ? 'checked' : '' }}
                        
                        @endif
                    > 
                    
                    <label for="technology-{{$technology->id}}" class="form-check-label">{{$technology->title}}</label>
                </div>
                @endforeach

            </div>
        </div>
        
        
    
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>

</div>

    
    
@endsection