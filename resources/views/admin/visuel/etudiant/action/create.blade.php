@extends('admin')

@section('title', 'Ajoutez un étudiants')

@section('content')
<div class="pagetitle">
    <h1>Bossy</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('Admin.etudiant')}}">Nos étudiants</a></li>
        <li class="breadcrumb-item active">Ajouter un étudiants</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <label for="nom">Nom de l'étudiants</label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{@old('nom')}}">
            @error('nom')
                <p style="color: red">{{$message}}</p>
            @enderror

            <label for="prenon">Prénon de l'étudiants</label>
            <input type="text" name="prenon" id="prenon" class="form-control @error('prenon') is-invalid @enderror" value="{{@old('prenon')}}">
            @error('prenon')
                <p style="color: red">{{$message}}</p>
            @enderror

            <label for="matricule">Matricule de l'étudiants</label>
            <input type="number" name="matricule" id="matricule" class="form-control @error('matricule') is-invalid @enderror" value="{{@old('matricule')}}">
            @error('matricule')
                <p style="color: red">{{$message}}</p>
            @enderror

            <label for="promotion">Choisir le promotion</label>
            <select name="promotion" id="promotion" class="form-control">
                <option value="">Selectionner un élément</option>
                @foreach($promotion as $title => $id)
                <option value="{{$title}}">{{$id}}</option>
                @endforeach
            </select>
            @error('promotion')
                <p style="color: red">{{$message}}</p>
            @enderror


            <label for="classe">Choisir la classe</label>
            <select name="classe" id="classe" class="form-control">
                <option value="">Selectionner une classe</option>
                @foreach($classe as $t => $i)
                <option value="{{$t}}">{{$i}}</option>
                @endforeach
            </select>
            @error('classe')
                <p style="color: red">{{$message}}</p>
            @enderror

            @php 
            $date = date('Y');   
            @endphp
            <label for="anne_detude">Choisir une année</label>
            <select name="anne_detude" id="anne_detude" class="form-control">
                <option value="">Selectionner une année</option>
                @for($i = $date; $i >= 1975; $i--)
                    <option value="{{$i}}-{{$i+1}}">{{$i}}-{{$i+1}}</option>    
                @endfor
            </select>
            @error('anne_detude')
            <p style="color: red">{{$message}}</p>
            @enderror

            <label for="picture">Ajouter une photo</label>
            <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror">
            @error('picture')
            <p style="color: red">{{$message}}</p>
            @enderror

            <div class="d-grid gap-2" style="margin-top: 10px">
                <input type="submit" class="btn btn-primary" value="Creér">
            </div>
           
        </form>
  </div>
@endsection