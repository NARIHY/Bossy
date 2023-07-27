@extends('admin')

@section('title', 'Modification d\'un emploie')

@section('content')
<div class="pagetitle">
    
    <h1>St joseph</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item">Gestion de l'école</li>
        <li class="breadcrumb-item active">Modification d'un emploie</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="container">
    @if(session('success'))
      <div class="alert alert-success" style="text-align: center">
        {{session('success')}}
      </div>
    @endif
    <form action="" method="post">
        @csrf 
        @method('PUT')
        <label for="title">Entrer le nom de l'emploie</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$job->title}}">
        @error('title') 
            <p style="color: red">{{$message}}</p> 
        @enderror

        <div class="d-grid gap-2" style="margin-top: 20px">
            <button class="btn btn-primary" type="submit">Modifier</button>
        </div>
    </form>
  </div>

@endsection