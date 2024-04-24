@extends('layouts.app')

@section('content')

<div class="container py-5">
    
    <div class="row align-items-center rounded-3" style="background-image: url('{{asset('storage/' . $project->img)}}'); background-repeat: no-repeat; background-size: cover; background-position: center;">

        <div class="col text-center bg-dark bg-gradient bg-opacity-25 py-5 rounded-2 ">
            <h2 class="text-white">{{$project->title}}</h2>
            <div class="d-flex gap-2 mb-5">
                @foreach ($project->technologies as $technology)
                <span class="badge rounded-pill" style="background-color: {{$technology->color ?? 'rgba(100,300,300,.4)'}}">{{$technology->title}}</span>
                @endforeach
              </div>
        </div>
    </div>
    <hr>
    
    <div class="row justify-content-center py-5">
        <div class="col-6">
            <strong>Tipologia:</strong>
            <p class="pt-1 ps-4">{{$project->type?->title}}</p>
            <strong >Visualizzazione ottimale per:</strong>
            <p class="pt-1 ps-4">{{$project->devices}}</p>
            <strong >Descrizione del progetto:</strong>
            <p class="pt-1 ps-4">{{$project->description}}</p>
            
        </div>
        <div class="col-6 text-center">
            
            <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-warning me-3">Modifica</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Elimina
            </button>

        </div>
    </div>


    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              Sei sicuro di voler eliminare questo progetto?
            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                    @csrf
                    @method("DELETE")                    
                    
                    <button class="btn btn-danger">Elimina</button>
                </form>

            </div>

          </div>
        </div>
    </div>

</div>
    
@endsection