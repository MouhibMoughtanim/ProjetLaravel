@extends('layouts.app')


@section('content')

<form method="POST" action="{{route('projet.store')}}" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Nom</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nom projet" name="nom">
    </div>
     
    
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
    </div>
    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Ajouter Projet</button></div>
    
  </form>

  @endsection