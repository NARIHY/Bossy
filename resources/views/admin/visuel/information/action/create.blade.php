@extends('admin')

@section('title', 'creation d\'une information')

@section('content')
<div class="pagetitle">
    <h1>Bossy</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('Admin.information')}}">Les information publié sur notre site</a></li>
        <li class="breadcrumb-item active">Ajouter une information</li>
      </ol>
    </nav>
</div><!-- End Page Title -->  

<div class="container"> 
    <form action="" method="post" enctype="multipart/form-data">
      @csrf
      <label for="title">Entrer le titre de l'information</label>
      <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{@old('title')}}"> 
      @error('title')
      <p style="color: red">{{$message}}</p>
      @enderror

      <label for="content">Entrer le contenu de l'information</label>
      <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">{{@old('content')}}</textarea>
      @error('title')
      <p style="color: red">{{$message}}</p>
      @enderror

      <label for="picture">Ajouter une photo</label>
      <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror">
      @error('picture')
      <p style="color: red">{{$message}}</p>
      @enderror
      <div class="d-grid gap-2" style="margin-top: 20px">
        <button class="btn btn-primary" type="submit">Sauvgarder</button>
      </div>
    </form>

</div>



@endsection