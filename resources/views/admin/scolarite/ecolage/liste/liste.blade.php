@extends('admin')
@section('title', 'ecolage impayer')

@section('content')
<div class="pagetitle">
    <h1>St joseph</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item">Scolarité</li>
        <li class="breadcrumb-item active">Ecolage impayer</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="container">
    @if ($count != 0)
        <div style="text-align: justify">
            le nombre totale des étudiants qui n'ont pas payer leur scolarités est de : <b style="color:red">{{$count}}</b>
        </div>
    @endif

    <table class="table table-borderless datatable">
        <thead>
          <tr>
                <th scope="col">#</th>
                <th scope="col">Matricule</th>
                <th scope="col">Année d'étude</th>
                
                
          </tr>
        </thead>
            <tbody>
                @forelse ($student as $students)
                    <tr>
                        <th scope="row" style="color: red ; text-align:center">{{$students->id}}</th>
                        <td style="color: blue; text-align:center">{{$students->matricule}}</td>
                        <td style="text-align:center">{{$students->anne_detude}}</td>
                    </tr>
                @empty
                    <tr>
                        <th scope="row"></th>
                        <td>Tous les étudiant en payer leur frais de scolarité</td>
                        <td></td>
                    </tr>
                @endforelse
            </tbody>
            
            
      </table>

  </div>

@endsection