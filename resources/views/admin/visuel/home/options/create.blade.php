@extends('admin')

@section('title', 'Création-pub')

@section('content')

    <div class="pagetitle">
       
        <h1>St joseph</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
            <li class="breadcrumb-item"><a href="{{route('Admin.home.St joseph')}}">Home</a></li>
            <li class="breadcrumb-item active">Création d'une nouvelle pub</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <label for="title">Titre:</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{@old('title')}}">
            @error('title')
            <div style="color:red">
                {{$message}}
            </div>
            @enderror

            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{@old('description')}}">
            @error('description')
            <div style="color:red">
                {{$message}}
            </div>
            @enderror

            <label for="picture">Ajouter une photo</label>
            <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror">
            @error('picture')
            <div style="color:red">
                {{$message}}
            </div>
            @enderror
            
            <label for="video">Ajouter une vidéo</label>
            <input type="file" name="video" id="video" class="form-control @error('video') is-invalid @enderror">
            @error('video')
            <div style="color:red">
                {{$message}}
            </div>
            @enderror

            <label for="content">Contenu de la publication</label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">{{@old('title')}}</textarea>
            @error('content')
            <div style="color:red">
                {{$message}}
            </div>
            @enderror
            <div class="d-grid gap-2" style="margin-top: 10px">
                <input type="submit" class="btn btn-primary" value="Publié">
            </div>
        </form>

    </div>
    
  </section>
@endsection