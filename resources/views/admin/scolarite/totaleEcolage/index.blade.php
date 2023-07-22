@extends('admin')

@section('title', 'Totale des écolage par année')

@section('content')
<div class="pagetitle">
    <a href="{{route('Admin.ecolage.totale.ajouter')}}" class="btn btn-success" style="float: right">Ajouter un écolage</a>
    <h1>St joseph</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="">Scolarité</a></li>
        <li class="breadcrumb-item active">Liste des écolage cette année</li>
       
    </nav>
</div><!-- End Page Title -->

<div class="container">
    @if(session('success'))
        <div class="alert alert-success" style="text-align: center">
            {{session('success')}}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
          
          <th scope="col">classe</th>
          <th scope="col">Année d'étude</th>
          <th scope="col">prix</th>
          <th scope="col">action</th>
        </tr>
        </thead>

        @forelse ($totale as $totales)
        <tbody>
            <tr>
              
              @php 
            $classe = App\Models\Classe::where('id',$totales->classe)->value('title');
            @endphp
              <td scope="row">{{$classe}}</td>
              <td>{{$totales->anne_detude}}</td>
              <td>{{number_format($totales->prix, thousands_separator: ' ')}} Ar</td>
              <th >
                <form action="{{route('Admin.ecolage.totale.delete', ['id' => $totales->id])}}" method="post">
                    @csrf 
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Suprimer">
                </form>
                     

              </th>
            </tr>
        @empty
            <tr>
                <th scope="row"></th>
                <td></td>
                <td>aucun écolage inscrit pour le moment</td>
                <td></td>
            </tr>
        </tbody>
        @endforelse

        
        
      </table>
      {{$totale->links()}}

</div>
@endsection