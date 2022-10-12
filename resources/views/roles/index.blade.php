@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Role Managment</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success mx-3">
                        <span class="text-sm">{{ $message }}</span>
                    </div>
                @endif
            <div class="ps-3">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                @endcan
            </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($roles as $key => $role)
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 ps-3">{{ ++$i }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $role->name }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <a class="btn btn-sm btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                            @can('role-edit')
                                <a class="btn btn-sm btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $roles->render() !!}
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection