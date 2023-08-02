@extends('admin')

@section('title', 'Nos étudiants cette année')

@section('content')
<div class="pagetitle">
    <a href="{{route('Admin.etudiant.create')}}" class="btn btn-success" style="float: right">Ajouter un étudiants</a>
    <h1>Bossy</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('Admin.etudiant')}}">Nos étudiants</a></li>
        <li class="breadcrumb-item active">Liste de tous nos étudiants cette année</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="container">
    <form action="" method="post">
        <h2 class="text-center">Choisir une année d'étude pour voir la liste des écolage impayer</h2>
        @csrf
        @php 
        $date = date('Y');
        @endphp
        <label for="anne_detude">Choisir une année</label>
        <select name="anne_detude" id="anne_detude" class="form-control">
                <option value="">Selectionner une année</option>
                @for($i = $date; $i >= 2020; $i--)
                    <option value="{{$i}}-{{$i+1}}">{{$i}}-{{$i+1}}</option>    
                @endfor
        </select>
        @error('anne_detude')
            <p style="color: red">{{$message}}</p>
        @enderror
        <div class="d-grid gap-2" style="margin-top: 10px">
            <input type="submit" class="btn btn-primary" value="rechercher">
        </div>

    </form>
  </div>
@endsection