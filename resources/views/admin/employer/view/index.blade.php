@extends('admin')

@section('title', $employee->name .' '. $employee->last_name)

@section('content')
<div class="pagetitle">
    <h1>St joseph</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('Admin.employee')}}">Nos employer</a></li>
        <li class="breadcrumb-item active">{{$employee->name .' ' . $employee->last_name}}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="row mb-3">
    <div class="col-6 themed-grid-col">
        <img src="/storage/{{$employee->picture}}" alt="Photo de {{$employee->last_name}}" width="100%">
    </div>
    <div class="col-6 themed-grid-col">
        <div class="row mb-3">
            <h2>Information sur notre collaborateur</h2>
            <div class="col-6 themed-grid-col">
                <h4>Nom:</h4>
                <h4>Prénon:</h4>
                <h4>Téléphone:</h4>
                <h4>Addresse email:</h4>
                <h4>Addresse: </h4>
                <h4>Travaille: </h4>
                @php 
                $job = App\Models\Job::where('id', $employee->status)->value('title');
                $subject = App\Models\Subject::where('id', $employee->status)->value('title');
                @endphp
                @if ($job === 'Professeur')
                <h4>Prof de:</h4>
                @endif
                <h4>Anniversaire:</h4>
                <h4>Position:</h4>
            </div>
            <div class="col-6 themed-grid-col">
                <h4>{{$employee->name}}</h4>
                <h4>{{$employee->last_name}}</h4>
                <h4>{{$employee->contact}}</h4>
                <h4>{{$employee->email}}</h4>
                <h4>{{$employee->address}}</h4>
                <h4>{{$job}}</h4>
                @if ($job === 'Professeur')
                <h4>{{$subject}}</h4>
                @endif
                <h4>{{date('d M Y',strtotime($employee->birthday)) }}</h4>
                <h4>{{$employee->action}}</h4>
            </div>
        </div>

    </div>
    
  </div>

@endsection