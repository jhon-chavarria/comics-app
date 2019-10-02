@extends('layouts.app')
@section('section-title', 'Today Comic')
@section('pageTitle', 'Today Comic')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="row">
        <div class="col-md-6">
          <div class="card card-profile">
            <div class="card-body">
                <div class="card-avatar">
                    <img src="{{ $comic['img'] }}" />
              </div>
              <br />
              <h4 class="card-title">{{ $comic['alt'] }}</h4>
              @inject('metrics', 'App\Http\Controllers\WebComicController')
              {!! $metrics->getNavigation($comic['num']) !!}
            </div>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection