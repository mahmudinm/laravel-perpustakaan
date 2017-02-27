@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Users
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-xs pull-right">Create new user</a>
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nim</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>No Handphone</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->nim }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->no_handphone }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>
                                        {!! Form::model($user, ['route' => ['users.destroy', $user], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                                            <a href="{{ route('users.edit', $user->id)}}" class="btn btn-success btn-xs">Edit</a> 
                                            {!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger']) !!}
                                        {!! Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ url('css/dataTables.bootstrap.css') }}">
@stop

@section('script')
    <script src="{{ url('js/jquery.dataTables.js') }}"></script>
    <script src="{{ url('js/dataTables.bootstrap.js') }}"></script>
    <script>
        $(window).ready(function(){
            $('table').DataTable();
        });
    </script>
@stop