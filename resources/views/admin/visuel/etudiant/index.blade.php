@extends('admin')

@section('title', 'Nos étudiants')

@section('content')
<div class="pagetitle">
    <a href="{{route('Admin.etudiant.create')}}" class="btn btn-success" style="float: right">Ajouter un étudiants</a>
    <h1>Bossy</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('Admin.etudiant')}}">Nos étudiants</a></li>
        <li class="breadcrumb-item active">Liste de tous nos étudiants</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="container">
    @if(session('success'))
    <div class="alert alert-success" style="text-align: center">
      {{session('success')}}
    </div>
    @endif

    <table class="table table-borderless datatable">
      <thead>
        <tr>
              <th scope="col">Matricule</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénon</th>
              <th scope="col">Promotion</th>
              <th scope="col">Classe</th>
              <th scope="col">Année d'étude</th>
              <th scope="col"style="color: red">Action</th>
        </tr>
      </thead>
      
          <tbody>
            @foreach ($etudiant as $etudiants)
            <tr>
              <th scope="row" style="color: blue">{{$etudiants->matricule}}</th>
          <td>{{$etudiants->nom}}</td>
          <td>{{$etudiants->prenon}}</td>
          @php 
            $promotion = App\Models\Promotion::where('id',$etudiants->promotion)->value('title');
            $classe = App\Models\Classe::where('id',$etudiants->classe)->value('title');
          @endphp
          <td>{{$promotion}}</td>
          <td>{{$classe}}</td>
          <td>{{$etudiants->anne_detude}}</td>
          <td>
              <div class="row mb-3 text-center">
                  <div class="col-4 themed-grid-col">
                      <a href="{{route('Admin.etudiant.show', ['id' => $etudiants->id])}}" class="btn btn-dark"><i class="bi bi-eye-fill"></i></a>
                  </div>
                  <div class="col-4 themed-grid-col">
                      <a href="{{route('Admin.etudiant.edit', ['id' => $etudiants->id])}}" class="btn btn-primary"><i class="bi bi-wrench"></i></a>
                  </div>
                  <div class="col-4 themed-grid-col">
                    <form action="{{route('Admin.etudiant.delete', ['id' => $etudiants->id])}}" method="post">
                      @csrf 
                      @method('DELETE')
                      <input type="submit" class="btn btn-danger" value="Suprimer">
                    </form>
                      
                  </div>
                </div>
          </td>
            </tr>
            
      
            @endforeach
          </tbody>
          
          
    </table>
    
  </div>
@endsection