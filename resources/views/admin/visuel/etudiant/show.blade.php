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
                  <h3> {{$etudiant->nom}} </h3>
                  <h3>{{$etudiant->prenon}}</h3>
                  @php 
                    $promotion = App\Models\Promotion::where('id',$etudiant->promotion)->value('title');
                    $classe = App\Models\Classe::where('id',$etudiant->classe)->value('title');
                  @endphp
                  <h3>{{$etudiant->matricule}}</h3>
                  <h3>{{$promotion}}</h3>
                  <h3>{{$classe}}</h3>
                  <h3>{{$etudiant->anne_detude}}</h3>
                </div>
            </div>
        </div>
      </div>

      <div>
        @php 
        $view = App\Models\Etudiant::where('matricule',  $etudiant->matricule)->paginate(10);
        
        @endphp
        <h4>{{$etudiant->nom}} {{$etudiant->prenon}} a étudié ici depuis l'année scolaire:</h4>
       
         
         <ul style="margin-left: 50%">
            @forelse ($view as $views)
              <li > <p style="color: blue">{{$views->anne_detude}}</p> </li>
            @empty
                L'étudiant a commencé ces étude chez nous que depuis peut
            @endforelse
          
         </ul>

      </div>
      @php 
      $date = date('Y');
      $date1 = $date + 1 ;
      $concat = $date.'-'.$date1;

      $ecolage = new App\Perso\EcolageCount();
      @endphp
      @if($etudiant->anne_detude === $concat)

      <div>

        
        <div class="row mb-3 text-center">
          <div class="col-6 themed-grid-col">
            <h3>Reste des écolages à payer:</h3>
          </div>
          @php 
            $eco = $ecolage->reste($etudiant->matricule, $etudiant->classe);
          @endphp
          <div class="col-6 themed-grid-col">
            @if($eco == 0)
              <h3 style="color:green">Ecolage est payée en totalité</h3>
            @else
              <h3 style="color: red">{{number_format($eco, thousands_separator: ' ')}} Ar</h3>
            @endif
          </div>
        </div>
        
      </div>
      @endif
  
      
  
  

  </div>

  @endsection