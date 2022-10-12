@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Admin User Managment</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success mx-3">
                        <span class="text-sm">{{ $message }}</span>
                    </div>
                @endif
            <div class="ps-3">
                @can('user-create')
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create New Admin </a>
                @endcan
            </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $key => $user)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                            <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $v)
                            <span class="badge badge-sm bg-gradient-success">{{ $v }}</span>
                          @endforeach
                        @endif
                      </td>
                      <td class="align-middle text-center text-sm">
                        <a class="btn btn-sm btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                            @can('user-edit')
                                <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                            @endcan
                            @can('user-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $users->render() !!}
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection