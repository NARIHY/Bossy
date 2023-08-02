@extends('admin')

@section('title', 'Tous les promotion de nos élèves')

@section('content')
<div class="pagetitle">
    <a href="{{route('Admin.etudiant.promotion.create')}}" class="btn btn-success" style="float: right">Ajouter une promotion</a>
    <h1>Bossy</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('Admin.etudiant')}}">Nos étudiants</a></li>
        <li class="breadcrumb-item active">Liste de tous les promotion</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="container">
    @if(session('success'))
        <div style="text-align: center" class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom de promotion</th>
          <th scope="col">Action</th>
          
        </tr>
        </thead>
        
            @forelse ($promotion as $prom)
            <tbody>
                <tr>
                    <th scope="row">{{$prom->id}}</th>
                    <td>{{$prom->title}}</td>
                    <td>
                        <a href="{{route('Admin.etudiant.promotion.edit', ['id' => $prom->id])}}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
            @empty
            <tr>
                <th scope="row"></th>
                <td>Aucun promotion pour le moment</td>
                <td>
                    
                </td>
            </tr>
            </tbody>
            @endforelse 
       
      </table>
      {{$promotion->links()}}

  </div>

@endsection