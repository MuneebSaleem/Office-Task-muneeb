@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">weekend</i>
                  </div>
                  @if (session('status'))
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Session: {{ session('status') }}</p>
                    <h4 class="mb-0">status</h4>
                  </div>
                  @endif
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>You're logged in!</p>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
