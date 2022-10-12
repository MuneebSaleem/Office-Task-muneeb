@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-lg-4 col-md-8 col-12 mx-auto">
    <div class="card z-index-0 fadeIn3 fadeInBottom">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
          <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Create New Email</h4>
        </div>
      </div>
      
      <div class="card-body">

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
        <form role="form" class="text-start" method="POST" action="{{ route('mailing.store') }}">
            @csrf
          <div class="input-group input-group-outline my-3">
            <label for="from" class="form-label">From</label>
            <input id="from" type="email" class="form-control @error('from') is-invalid @enderror" name="from" value="{{ $fromEmail }}" required autocomplete="from" readonly>
            @error('from')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="input-group input-group-outline my-3">
            <label for="to" class="form-label">To</label>
            <input id="to" type="email" class="form-control @error('to') is-invalid @enderror" name="to" value="{{ old('to') }}" required autocomplete="to">
            @error('to')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="input-group input-group-outline my-3">
            <label for="subject" class="form-label">Subject</label>
            <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject">
            @error('subject')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="input-group input-group-outline my-3">
            <label for="body" class="form-label">Body</label>
            <textarea required autocomplete="body" id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body"> </textarea>
            @error('body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>   

          

          <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
