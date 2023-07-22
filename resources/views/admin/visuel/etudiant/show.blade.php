@extends('admin')

@section('title', $etudiant->nom)

@section('content')
<div class="pagetitle">
   
    <h1>Bossy</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('Admin.etudiant')}}">Nos étudiants</a></li>
        <li class="breadcrumb-item active">Voir l'etudiant: {{$etudiant->nom}}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="container">
    
      <div class="row mb-3 text-center">
        <div class="col-6 themed-grid-col">
          <img src="/storage/{{$etudiant->picture}}" width="80%" height="90%" alt="Photo d'un etudiant" class="rounded-circle">
        </div>
        <div class="col-6 themed-grid-col">
            <div class="pagetitle">
              <h1>Information sur notre étudiant</h1>
            </div>
            <div class="row mb-3">
                <div class="col-6 themed-grid-col">
                  <h3>Nom:</h3>
                  <h3>Prénon:</h3>
                  <h3>Matricule:</h3>
                  <h3>Promotion:</h3>
                  <h3>Classe:</h3>
                  <h3>Année:</h3>
                </div>
                <div class="col-6 themed-grid-col">
                  <p> {{$etudiant->nom}} </p>
                  <p>{{$etudiant->prenon}}</p>
                  @php 
                    $promotion = App\Models\Promotion::where('id',$etudiant->promotion)->value('title');
                    $classe = App\Models\Classe::where('id',$etudiant->classe)->value('title');
                  @endphp
                  <p>{{$etudiant->matricule}}</p>
                  <p>{{$promotion}}</p>
                  <p>{{$classe}}</p>
                  <p>{{$etudiant->anne_detude}}</p>
                </div>
            </div>
        </div>
      </div>

      <div>
        <h1>A étudier ici depuis:</h1>
      </div>
  
      
  
  

  </div>

  @endsection