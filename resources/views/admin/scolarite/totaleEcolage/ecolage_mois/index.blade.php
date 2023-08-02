@extends('admin')

@section('title', 'Totale des écolage par année')

@section('content')
@php 
//recperation de la classe
$classe = App\Models\Classe::where('id', $ecolage->classe)->value('title');
@endphp
<div class="pagetitle">
    <h1>Bossy</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item">Scolarité</li>
        <li class="breadcrumb-item active">Liste du montant d'écolage à payer par moi pour la classe de {{$classe}} </li>
       
    </nav>
</div><!-- End Page Title -->

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Sept</th>
                <th scope="col">Oct</th>
                
                
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    @for($i = 1 ; $i <=2; $i++)
                    <th>{{number_format($value, thousands_separator: ' ')}} Ar</th>
                    @endfor
                </tr>
                
            </tbody>
        </table>

        <table class="table table-striped">
            <thead>
                <tr>
                
                <th scope="col">Nov</th>
                <th scope="col">Dec</th>
                
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    @for($i = 1 ; $i <=2; $i++)
                        <th>{{number_format($value, thousands_separator: ' ')}} Ar</th>
                    @endfor
                </tr>
                
            </tbody>
        </table>

        <table class="table table-striped">
            <thead>
                <tr>
                    
                    <th scope="col">Jan</th>
                    <th scope="col">Fev</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    @for($i = 1 ; $i <=2; $i++)
                    <th>{{number_format($value, thousands_separator: ' ')}} Ar</th>
                    @endfor
                </tr>
                
            </tbody>
        </table>    

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mars</th>
                    <th scope="col">Avr</th>
                    
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    @for($i = 1 ; $i <=2; $i++)
                    <th>{{number_format($value, thousands_separator: ' ')}} Ar</th>
                    @endfor
                </tr>
                
            </tbody>
        </table>   

        <table class="table table-striped">
            <thead>
                <tr>
                    
                    <th scope="col">Mai</th>
                    <th scope="col">Juin</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    @for($i = 1 ; $i <=2; $i++)
                    <th>{{number_format($value, thousands_separator: ' ')}} Ar</th>
                    @endfor
                </tr>
                
            </tbody>
        </table> 
    </div>
@endsection