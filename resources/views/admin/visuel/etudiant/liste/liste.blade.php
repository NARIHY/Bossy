@extends('admin')
@section('title', 'Etudiant')

@section('content')
<div class="pagetitle">
    <h1>Bossy</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item">Nos étudiants</li>
        <li class="breadcrumb-item active">Année scolaire {{$anne_detude}}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="container">
    @if ($count != 0)
        <div style="text-align: justify">
            le nombre totale des étudiants qui sont inscrit pour l'année scolaire {{$anne_detude}} est de : <b style="color:red">{{$count}}</b>
        </div>
    @endif

    <table class="table table-borderless datatable">
        <thead>
          <tr>
                <th scope="col">#</th>
                <th scope="col">Matricule</th>
                <th scope="col">Année d'étude</th>
                <th scope="col">Classe</th>
                
                
          </tr>
        </thead>
            <tbody>
                @forelse ($student as $students)
                    <tr>
                        <th scope="row" style="color: red ; text-align:center">{{$students->id}}</th>
                        <td style="color: blue; text-align:center">{{$students->matricule}}</td>
                        <td style="text-align:center">{{$students->anne_detude}}</td>
                        @php 
                        $classe = App\Models\Classe::where('id', $students->anne_detude)->value('title')
                        @endphp
                        <td style="text-align:center">{{$classe}}</td>
                    </tr>
                @empty
                    <tr>
                        <th scope="row"></th>
                        <td>Aucun etudiant n'est inscrit pour cette année scolaire</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforelse
            </tbody>
            
            
      </table>

  </div>

@endsection