@extends('admin')

@section('title', 'Nos informations')

@section('content')
<div class="pagetitle">
    <a href="{{route('Admin.information.create')}}" class="btn btn-success" style="float: right">Ajouter une information</a>
    <h1>St joseph</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('Admin.information')}}">Les information publié sur notre site</a></li>
        <li class="breadcrumb-item active">Tous nos inforamtion publié</li>
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
              <th scope="col">Titre</th>
              <th scope="col" style="color: red">Action</th>
              
        </tr>
      </thead>
      
          <tbody>
            @foreach ($information as $informations)
            <tr>
              <th scope="row" style="color: blue">{{$informations->id}}</th>
          <td>{{$informations->title}}</td>
          <td>
              <div class="row mb-3 text-center">
                  
                  <div class="col-6 themed-grid-col">
                      <a href="{{route('Admin.information.modify', ['id' => $informations->id])}}" class="btn btn-primary"><i class="bi bi-wrench"></i></a>
                  </div>
                  <div class="col-6 themed-grid-col">
                    <form action="{{route('Admin.information.delete', ['id' => $informations->id])}}" method="post">
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