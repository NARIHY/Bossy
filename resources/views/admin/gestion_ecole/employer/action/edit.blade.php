@extends('admin')

@section('title', 'Nos employers')

@section('content')
<div class="pagetitle">
    <h1>Bossy</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item">Gestion de l'école</li>
        <li class="breadcrumb-item active">Ajouter un employer</li>
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
        <label for="name">Le nom de notre employé(e)</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$employee->name}}">
        @error('name')
            <p style="color: red">{{$message}}</p>
        @enderror

        <label for="last_name">Le prénon de notre employé(e)</label>
        <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{$employee->last_name}}">
        @error('last_name')
            <p style="color: red">{{$message}}</p>
        @enderror

        <label for="contact">Le numéro de téléphone de notre employé(e)</label>
        <input type="number" name="contact" id="contact" class="form-control @error('contact') is-invalid @enderror" value="{{$employee->contact}}">
        @error('contact')
            <p style="color: red">{{$message}}</p>
        @enderror

        <label for="birthday">La date d'anniversaire de notre employé(e)</label>
        <input   id="birthday" class="form-control @error('birthday') is-invalid @enderror" name="birthday" type="date" value="{{date('Y-m-d',strtotime($employee->birthday)) }}">
        @error('birthday')
             <p style="color: red">{{$message}}</p>
        @enderror

        <label for="address">L'addresse de notre employé(e)</label>
        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{$employee->address}}">
        @error('address')
            <p style="color: red">{{$message}}</p>
        @enderror

        <label for="email">L'email de notre employé(e)</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{$employee->email}}">
        @error('email')
            <p style="color: red">{{$message}}</p>
        @enderror

        
        <label for="status">Le travaille que notre employé(e) s'occupe</label>
        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
            <option value="">Selectionner le travaille que l'employé(e) occupe</option>
            @foreach($job as $title => $id)
                <option  value="{{$title}}" @if($employee->status == $title) selected @endif>{{$id}}</option>
                @endforeach
        </select>
        @error('status')
            <p style="color: red">{{$message}}</p>
        @enderror

        <label for="subject">La matière que notre employé(e) s'occupe si il est profésseur</label>
        <select name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror">
            <option value="">Selectionner La matière que notre employé(e) s'occupe si il est profésseur</option>
            @foreach($subject as $t => $i)
                <option @if($employee->subject == $t) selected @endif value="{{$t}}">{{$i}}</option>
                @endforeach
        </select>
        @error('subject')
            <p style="color: red">{{$message}}</p>
        @enderror

        <div class="row mb-3 text-center" style="margin-top: 20px">
            <div class="col-6 themed-grid-col">
                <label for="picture" style="float: left; margin-top:30%">Editer cette photo de notre employé(e)</label>
                <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror">
                @error('picture')
                    <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="col-6 themed-grid-col">
                <img src="/storage/{{$employee->picture}}" alt="Photo de {{$employee->last_name}}" width="100%">
            </div>
        </div>

        <label for="action">Notre employé(e) travaille-t-il encore?</label>
        <select name="action" id="action" class="form-control">
            <option value="">Selectionner q'une seul option</option>
            <option @if($employee->action === 'Travaille') selected @endif value="Travaille">Travaille</option>
            <option @if($employee->action === 'Retraiter') selected @endif value="Retraiter">Retraiter</option>
        </select>
        @error('action')
        <p style="color: red">{{$message}}</p>
        @enderror
        <div class="d-grid gap-2" style="margin-top: 20px">
            <button class="btn btn-primary" type="submit">Editer</button>
        </div>

    </form>

  </div>
@endsection