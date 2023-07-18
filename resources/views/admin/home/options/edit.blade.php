@extends('admin')

@section('title', 'Création-pub')

@section('content')

    <div class="pagetitle">
       
        <h1>Bossy</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Tableau de bord</a></li>
            <li class="breadcrumb-item"><a href="{{route('Admin.home.bossy')}}">Home</a></li>
            <li class="breadcrumb-item active">Edition de {{$acceuil->title}}</li>
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

        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="title">Titre:</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$acceuil->title}}">
            @error('title')
            <div style="color:red">
                {{$message}}
            </div>
            @enderror

            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{$acceuil->description}}">
            @error('description')
            <div style="color:red">
                {{$message}}
            </div>
            @enderror

            <div class="row mb-3 text-center">
                <div class="col-8 themed-grid-col">
                    <label for="picture" style="float:left">Modifier l' image</label>
                    <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror" >
                    <div style="color:red">
                        @error('picture') {{$message}} @enderror
                    </div>

                    <label for="video" style="float:left; margin-top:30%">Modifier la video</label>
                    <input type="file" name="picture_2" id="picture_2" class="form-control @error('video') is-invalid @enderror" >
                    <div style="color:red">
                        @error('video') {{$message}} @enderror
                    </div>

                    

                </div>
                <div class="col-4 themed-grid-col">
                    <img src="/storage/{{$acceuil->picture}}" alt="" width="100%">
                    <img src="/storage/{{$acceuil->video}}" alt="" width="100%" style="margin-top:10px">
                </div>
                
            </div>
            <label for="content">Contenu de la publication</label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">{{$acceuil->content}}</textarea>
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