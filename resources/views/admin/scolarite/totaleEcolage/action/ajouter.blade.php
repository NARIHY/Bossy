@extends('admin')

@section('title', 'Ajouter un écolage pour cette anné')

@section('content')
<div class="pagetitle">
    
    <h1>Bossy</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item">Scolarité</li>
        <li class="breadcrumb-item active">Ajouter un écolage</li>
       
    </nav>
</div><!-- End Page Title -->

<div class="container">
    <form action="" method="post">
        @csrf 
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
        
        <label for="anne_detude">Selectionner une année d'étude</label>
        <select name="anne_detude" id="anne_detude" class="form-control">
            <option value="">Selectionner une date</option>
            @php 
            $date = date('Y');
            @endphp

            @for($i = $date; $i >= 1975; $i--) 
                <option value="{{$i}}-{{$i+1}}">{{$i}}-{{$i+1}}</option>
            @endfor
        </select>
        @error('anne_detude')
            <p style="color: red">{{$message}}</p>
        @enderror

        <label for="prix">Entrer le prix totale d'écolage dans une année d'étude</label>
        <input type="number" name="prix" id="prix" class="form-control @error('prix') is-invalid @enderror">
        @error('prix') 
        <p style="color: red">{{$message}}</p>
        @enderror

        <div class="d-grid gap-2" style="margin-top: 10px">
            <input type="submit" value="Enregistrer" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection