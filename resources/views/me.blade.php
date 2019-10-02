@extends('layouts.app')
@section('pageTitle', 'About me')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="#pablo">
              <img class="img" src="https://jhon-chavarria.github.io/img/avatar_2.jpg" />
            </a>
          </div>
          <div class="card-body">
            <h4 class="card-title">Jonathan Chavarria</h4>
            <p class="card-description">
              Site:  <a target="_blank" href="https://jhon-chavarria.github.io/"> https://jhon-chavarria.github.io/ </a>
            </p>
            <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
          </div>
        </div>
      </div>
    </div>
  </div>  
@endsection