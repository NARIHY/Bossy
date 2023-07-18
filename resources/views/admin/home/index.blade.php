@extends('admin')

@section('title', 'Modification de l\'acceuil ')

@section('content')

<div class="pagetitle">
    <a href="{{route('Admin.home.create')}}" class="btn btn-success" style="float: right">Ajouter une publication</a>
    <h1>Bossy</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('Admin.home.bossy')}}">Home</a></li>
        <li class="breadcrumb-item active">Liste de tous les publication dans notre acceuil</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="container">
      @if(session('success'))
          <div class="alert alert-success">
            <p class="text-center">{{session('success')}}</p>
          </div>
      @endif
      @if(session('failed'))
          <div class="alert alert-danger">
            <p class="text-center">{{session('failed')}}</p>
          </div>
      @endif
        <div class="container">
            <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
               
                
                    @forelse ($home as $homes)
                    <tbody>
                        <th style="color: red">{{$homes->id}}</th>
                        <th> {{$homes->title}} </th>
                        <th>
                            <div class="row mb-3 text-center">
                                <div class="col-4 themed-grid-col">
                                  <a href="{{route('Admin.home.edit', ['id' => $homes->id])}}" class="btn btn-primary">Editer</a>
                                </div>
                                <div class="col-4 themed-grid-col">
                                  <form action="{{ route('Admin.home.delete', ['id'=> $homes->id])}}" method="post">
                                    @csrf 
                                    @method("DELETE")
                                    <input type="submit" value="Suprimer" class="btn btn-danger">
                                </form>
                                </div>
                              </div>
                        </th>
                    @empty
                    <th></th>
                    <th>Aucun resultat pour le moments</th>
                    <th></th>
                  </tbody>
                    @endforelse

                    {{$home->links()}}

                
            </table>
    </div>
  </section>

@endsection