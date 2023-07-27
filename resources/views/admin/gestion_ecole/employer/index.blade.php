@extends('admin')

@section('title', 'Nos employer')

@section('content')
<div class="pagetitle">
    <a href="{{route('Admin.employee.create')}}" class="btn btn-success" style="float: right">Ajouter un employer</a>
    <h1>St joseph</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item">Gestion de l'école</li>
        <li class="breadcrumb-item active">Liste de tous nos employers</li>
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
                <th scope="col">Nom</th>
                <th scope="col">Prénon</th>
                <th scope="col">Statut</th>
                <th scope="col">Action</th> 
          </tr>
        </thead>
            <tbody>
                @forelse ($employe as $employes)
                    <tr>
                        <th scope="row" style="color: red ; text-align:center"><a href="{{route('Admin.employee.see', ['id' => $employes->id])}}" style="text-decoration: none">{{$employes->name}}</a></th>
                        <td style="color: blue; text-align:center">{{$employes->last_name}}</td>
                        @php 
                        $job = App\Models\Job::where('id',$employes->status)->value('title');
                        @endphp
                        <td style="text-align:center">{{$job}}</td>
                        <td>
                            <a href="{{route('Admin.employee.edit', ['id' => $employes->id])}}" class="btn btn-primary">Editer</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th scope="row"></th>
                        <td>Nous n'avons pas d'employer pour le moment</td>
                        <td></td>
                    </tr>
                @endforelse
            </tbody>
            
            
      </table>
  </div>
@endsection