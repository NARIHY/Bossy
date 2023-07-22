@extends('admin')

@section('title', 'Tous les promotion de nos élèves')

@section('content')
<div class="pagetitle">
    <h1>St joseph</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('Admin.etudiant.promotion')}}">Nos promotions</a></li>
        <li class="breadcrumb-item active">Liste de tous les promotion</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="container">
    <form action="" method="post">
        @csrf
        <label for="title">Entrer le nom de promotion</label>
        <input type="text" name="title" id="title" value="{{@old('title')}}" class="form-control @error('title') is-invalid @enderror">
        @error('title')
        <p style="color: red">
            {{$message}}
        </p>
        @enderror
        <div class="d-grid gap-2" style="margin-top: 10px">
            <input type="submit" value="Ajouter" class="btn btn-primary" >
        </div>
    </form>

  </div>
@endsection