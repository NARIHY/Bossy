@extends('admin')

@section('title', 'édition d\'une information')

@section('content')
<div class="pagetitle">
    <h1>Bossy</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('Admin.information')}}">Les information publié sur notre site</a></li>
        <li class="breadcrumb-item active">Edition d'une information</li>
      </ol>
    </nav>
</div><!-- End Page Title -->  

<div class="container"> 
    @if(session('success'))
    <div class="alert alert-success" style="text-align: center">
      {{session('success')}}
    </div>
    @endif
    <form action="" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <label for="title">Modifier le titre de l'information</label>
      <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$information->title}}"> 
      @error('title')
      <p style="color: red">{{$message}}</p>
      @enderror

      <label for="content">Modifier le contenu de l'information</label>
      <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">{{$information->content}}</textarea>
      @error('title')
      <p style="color: red">{{$message}}</p>
      @enderror

      <div class="row mb-3" style="margin-top: 20px">
        <div class="col-6 themed-grid-col">
            <label for="picture">Changer la photo</label>
            <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror">
            @error('picture')
            <p style="color: red">{{$message}}</p>
            @enderror
        </div>
        <div class="col-6 themed-grid-col">
            <img src="/storage/{{$information->picture}}" alt="{{$information->title}}" width="100%">
        </div>
      </div>
      
      <div class="d-grid gap-2" style="margin-top: 20px">
        <button class="btn btn-primary" type="submit">Editer</button>
      </div>
    </form>

</div>



@endsection