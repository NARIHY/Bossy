@extends('admin')

@section('title', 'Liste de tous nos matière à enseigner')

@section('content')
<div class="pagetitle">
    <a href="{{route('Admin.subject.create')}}" class="btn btn-success" style="float: right">Ajouter un emploie</a>
    <h1>Bossy</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item">Gestion de l'école</li>
        <li class="breadcrumb-item active">Liste de tous nos matière</li>
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
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Action</th> 
          </tr>
        </thead>
            <tbody>
                @forelse ($subject as $subjects)
                    <tr>
                        <th scope="row" style="color: red ; text-align:center">{{$subjects->id}}</th>
                        <td style="color: blue; text-align:center">{{$subjects->title}}</td>
                       
                        <td>
                            <a href="{{route('Admin.job.edit', ['id' => $subjects->id])}}" class="btn btn-primary">Editer</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th scope="row"></th>
                        <td>Nous n'avons pas de matière a enseigné pour le moment</td>
                        <td></td>
                    </tr>
                @endforelse
            </tbody>
            
            
      </table>
  </div>

@endsection
