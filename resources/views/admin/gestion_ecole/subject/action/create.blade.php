@extends('admin')

@section('title', 'Création d\'un nouveau matière')

@section('content')
<div class="pagetitle">
    
    <h1>St joseph</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item">Gestion de l'école</li>
        <li class="breadcrumb-item active">Création d'un nouveau matière</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="container">
    <form action="" method="post">
        @csrf 
        <label for="title">Entrer le nom de l'emploie</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{@old('title')}}">
        @error('title') 
            <p style="color: red">{{$message}}</p> 
        @enderror

        <div class="d-grid gap-2" style="margin-top: 20px">
            <button class="btn btn-primary" type="submit">Enregistrer</button>
        </div>
    </form>
  </div>

@endsection