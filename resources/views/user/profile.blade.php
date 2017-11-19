@extends('layouts.app')
<style type="text/css">
  .profile-img {
    max-width: 150px;
    border: 3px solid #fff;
    border-radius: 100%;
    box-shadow: 1px 1px 1px rgba(0,0,0,0.3);
  }
</style>
@section ('content')

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
      <div class="panel-body text-center">
        <img class="profile-img" src="https://image.flaticon.com/icons/svg/53/53119.svg">
        <h1> {{ $user->name }} </h1>
        <h5>{{$user->email}}</h5>
        <!--$user->created_at->age does not give an error because created_at is a default field and a carbon instance-->
        <h5>{{$user->dob->format ('l j F Y')}} {{$user->dob->age }} years old</h5>
        <button class="btn btn-success"> Follow </button>
      </div>
    </div>
  </div>

</div>


@endSection
