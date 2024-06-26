@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Super Heros List
                <a href="{{url('superheros')}}" class="btn btn-danger float-right">Import SuperHeros</a>
            </div>
        </div>
        <div class="clard-body">
            @if (session('success'))
            <div class="alert alert-succes">
                {{ session('success')}}
            </div>
            @endif
        </div>

<!-- BUSCADOR -->

<div class="mt-3 mb-3"> 
    <form action="{{ route('home') }}" method="POST" class="form-inline">
        @csrf
        <input class="form-control mr-2" type="text" name="search" placeholder="Buscar"> 
        <button type="submit" class="btn btn-success mr-2">Search</button>  
        <a href="{{ route('home') }}" class="btn btn-danger">Clear Search</a>      
    </form>                  
</div>


<div class="dropdown mb-2">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton">
    Order for
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('sort', ['sortBy' => 'id']) }}">ID</a>
    <a class="dropdown-item" href="{{ route('sort', ['sortBy' => 'name']) }}">Name</a>
    <a class="dropdown-item" href="{{ route('sort', ['sortBy' => 'power']) }}">power</a>
  </div>
</div>

<!-- hago un dropdown porque con las versiones de jquery y boostrap me esta funcionando masomenos y prefiero darle mas bola al back -->
<script>

$(document).ready(function() {
    
    $('.dropdown-toggle').on('click', function() {
      $(this).next('.dropdown-menu').toggleClass('show');
    });

    
    $(document).on('click', function(event) {
      if (!$(event.target).closest('.dropdown').length) {
        $('.dropdown-menu').removeClass('show');
      }
    });
  });
</script>


<div class="table-scroll">
    <div class="table-responsive">
        <table id="datatable_heros" class="table table-bordered table-striped table-styles">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Strength</th>
                    <th scope="col">Speed</th>
                    <th scope="col">Durability</th>
                    <th scope="col">Power</th>
                    <th scope="col">Combat</th>
                    <th scope="col">Race</th>
                    <th scope="col">Height (m)</th>
                    <th scope="col">Height (cm)</th>
                    <th scope="col">weight (lb)</th>
                    <th scope="col">Weight (kg)</th>
                    <th scope="col">Eye color</th>
                    <th scope="col">Hair color</th>
                    <th scope="col">Publisher</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($superheros as $superhero)
                <tr>
                <td>@isset($superhero->id) {{ $superhero->id }} @endisset</td>
                <td>@isset($superhero->name) {{ $superhero->name }} @endisset</td>
                <td>@isset($superhero->fullName) {{ $superhero->fullName }} @endisset</td>
                <td>@isset($superhero->strength) {{ $superhero->strength }} @endisset</td>
                <td>@isset($superhero->speed) {{ $superhero->speed }} @endisset</td>
                <td>@isset($superhero->durability) {{ $superhero->durability }} @endisset</td>
                <td>@isset($superhero->power) {{ $superhero->power }} @endisset</td>
                <td>@isset($superhero->combat) {{ $superhero->combat }} @endisset</td>
                <td>@isset($superhero->race) {{ $superhero->race }} @endisset</td>
                <td>@isset($superhero->heightM) {{ $superhero->heightM }} @endisset</td>
                <td>@isset($superhero->heightCm) {{ $superhero->heightCm }} @endisset</td>
                <td>@isset($superhero->weightLb) {{ $superhero->weightLb }} @endisset</td>
                <td>@isset($superhero->weightKg) {{ $superhero->weightKg }} @endisset</td>
                <td>@isset($superhero->eyeColor) {{ $superhero->eyeColor }} @endisset</td>
                <td>@isset($superhero->hairColor) {{ $superhero->hairColor }} @endisset</td>
                <td>@isset($superhero->publisher) {{ $superhero->publisher }} @endisset</td>
                </tr>
                @endforeach
            </tbody>
            
        </table>

        <button class="btn btn-primary" id="prevPage">Former</button>
        <button class="btn btn-primary" id="nextPage">Next</button> 


        <div class="dropdown mt-2">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton">
            Order Json for
            </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('json', ['filter' => 'id']) }}">ID</a>
                    <a class="dropdown-item" href="{{ route('json', ['filter' => 'name']) }}">Name</a>
                    <a class="dropdown-item" href="{{ route('json', ['filter' => 'power']) }}">Power</a>
            </div>
        </div>
        

        <div id="totalPages"></div>
     </div>
</div>
</div>


</style>

@endsection




