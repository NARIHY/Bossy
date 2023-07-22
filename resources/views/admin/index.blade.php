@extends('admin')

@section('title', 'Tableau de bord')

@section('content')
<div class="pagetitle">
       
    <h1>St joseph</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
       
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="container">
        <h1>TEst</h1>
    </div>
</section>
@endsection