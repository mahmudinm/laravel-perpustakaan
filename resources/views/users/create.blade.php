@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buat User baru</div>

                <div class="panel-body">
                    {!! Form::open(['method' => 'POST', 'route' => 'users.store']) !!}
                        
                        <div class="form-group{{ $errors->has('nim') ? ' has-error' : '' }}">
                            {!! Form::label('nim', 'Nim') !!}
                            {!! Form::text('nim', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('nim') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Email address') !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('no_handphone') ? ' has-error' : '' }}">
                            {!! Form::label('no_handphone', 'No Handphone') !!}
                            {!! Form::text('no_handphone', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('no_handphone') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            {!! Form::label('alamat', 'Alamat') !!}
                            {!! Form::text('alamat', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('alamat') }}</small>
                        </div>

                        <br>
                        <div class="btn-group pull-right">                            
                            {!! Form::submit("Simpan", ['class' => 'btn btn-success']) !!}
                        </div>
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
