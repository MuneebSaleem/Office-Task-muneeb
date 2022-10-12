@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Mailing System</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success mx-3">
                        <span class="text-sm">{{ $message }}</span>
                    </div>
                @endif
            <div class="ps-3">
                    <a class="btn btn-success" href="{{ route('mailing.create') }}"> Compose New Email </a>
            </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Emails</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Emails Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($emails as $key => $email)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $email->to }}</h6>
                            <p class="text-xs text-secondary mb-0">{{ $email->subject }} | {{ $email->body }}</p>
                          </div>
                        </div>
                      </td>
                      <td> {{ $email->email_status === 'Sent' ? 'Sent' : 'Sending failed' }} </td>
                      <td class="align-middle text-center text-sm">
                        <a class="btn btn-sm btn-info" href="{{ route('mailing.show',$email->id) }}">Show</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $emails->render() !!}
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection