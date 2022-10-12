@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-4 col-md-8 col-12 mx-auto">
    <div class="card z-index-0 fadeIn3 fadeInBottom">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
          <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Show Admin User</h4>
        </div>
      </div>
      @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
      <div class="card-body">
        <form role="form" class="text-start">
          <div class="input-group input-group-outline my-3">
            <label for="name" class="form-label">To</label>
            <p class="mt-4 ps-3">{{ $email->to }}</p>
          </div>
          <div class="input-group input-group-outline my-3">
            <label for="name" class="form-label">From</label>
            <p class="mt-4 ps-3">{{ $email->from }}</p>
          </div>
          <div class="input-group input-group-outline my-3">
            <label for="name" class="form-label">Subject</label>
            <p class="mt-4 ps-3">{{ $email->subject }}</p>
          </div>
          <div class="input-group input-group-outline my-3">
            <label for="name" class="form-label">Body</label>
            <p class="mt-4 ps-3">{{ $email->body }}</p>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection