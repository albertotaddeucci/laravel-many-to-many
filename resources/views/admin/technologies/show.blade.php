@extends('layouts.app')

@section('content')

<div class="container py-5">
    
    <div class="row align-items-center rounded-3">

        <div class="col text-center py-5 rounded-2 " style="background-color: {{$technology->color}};">
            <h2 class="text-white">{{$technology->title}}</h2>

        </div>
    </div>
    <hr>
    
    <div class="row justify-content-center py-5">
        <div class="col-6">
                                 
            <strong >Colore:</strong>
            <p class="pt-1 ps-4">{{$technology->color}}</p>
            
        </div>
        <div class="col-6 text-center">
            
            <a href="{{route('admin.technologies.edit', $technology->id)}}" class="btn btn-warning me-3">Modifica</a>
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
                <form action="{{route('admin.technologies.destroy', $technology->id)}}" method="POST">
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