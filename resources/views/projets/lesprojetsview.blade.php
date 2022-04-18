@extends('layouts.app')
@section('content')

@foreach ($lesProjets as $projet )
    

<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          {{ $projet->nom }} 
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
        <div class="accordion-body">
          {{$projet->description}}
        </div>
      </div>
    </div>
    
    
  </div>
  @endforeach
@endsection