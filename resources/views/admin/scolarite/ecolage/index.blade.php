@extends('admin')
@section('title', 'Payer l\'écolage')

@section('content')
<div class="pagetitle">
    <h1>Bossy</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item">Scolarité</li>
        <li class="breadcrumb-item active">Payer un écolage</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="container">
    @if(session('error'))
      <div class="alert alert-warning" style="text-align: center">
        {{session('error')}}
      </div>
    @endif
    <form action="" method="post">
        @csrf 
        <label for="matricule">Entrer le matricule de l'étudiant</label>
        <input type="number" name="matricule" id="matricule" class="form-control @error('matricule') is-invalid @enderror" value="{{@old('matricule')}}">
        @error('matricule') 
            <p style="color: red">{{$message}}</p> 
        @enderror

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

        <label for="prix">Entrer le montant de l'écolage à payer</label>
        <input type="number" name="prix" id="prix" class="form-control @error('prix') is-invalid @enderror" value="{{@old('prix')}}">
        @error('prix') 
            <p style="color: red">{{$message}}</p> 
        @enderror

        <label for="mois">Choisir la mois à payer</label>
        <select name="mois" id="mois" class="form-control">
                <option value="">Selectionner un mois</option>
                
                <option value="Septembre">Septembre</option>
                <option value="Octobre">Octobre</option>
                <option value="Novembre">Novembre</option>
                <option value="Decembre">Decembre</option>
                <option value="Janvier">Janvier</option>
                <option value="Fevrier">Fevrier</option>
                <option value="Mars">Mars</option>
                <option value="Avril">Avril</option>
                <option value="Mai">Mai</option>
                <option value="Juin">Juin</option>
               
        </select>
        @error('mois')
                <p style="color: red">{{$message}}</p>
        @enderror

        <div class="d-grid gap-2" style="margin-top: 10px">
            <input type="submit" class="btn btn-primary" value="Payer">
        </div>
            
    </form>
  </div>
@endsection