@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-5">Ciao {{$user->name}}, questa è la tua pagina da amministratore</h1>

    <a class="me-4" href="{{route('admin.projects.index')}}">Lista dei progetti</a>
    <a class="me-4" href="{{route('admin.types.index')}}">Lista delle tipologie dei progetti</a>
    <a href="{{route('admin.technologies.index')}}">Lista delle tecnologie</a>
</div>
@endsection