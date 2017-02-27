@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Peminjaman</div>

                <div class="panel-body">
                    {!! Form::model($peminjaman, ['route' => ['peminjamans.update', $peminjaman], 'method' => 'patch'])!!}
                        
                        <div class="form-group{{ $errors->has('books') ? ' has-error' : '' }}">
                            {!! Form::label('books', 'Books') !!}
                            {!! Form::select('books', $books, $peminjaman->book_id, ['id' => 'books', 'class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('books') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('users') ? ' has-error' : '' }}">
                            {!! Form::label('users', 'Users') !!}
                            {!! Form::select('users', $users, $peminjaman->user_id, ['id' => 'users', 'class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('users') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
                            {!! Form::label('tgl_pinjam', 'Tanggal Pinjam') !!}
                            {!! Form::text('tgl_pinjam', null, ['class' => 'form-control datepicker', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('tgl_pinjam') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
                            {!! Form::label('tgl_kembali', 'Tanggal Kembali') !!}
                            {!! Form::text('tgl_kembali', null, ['class' => 'form-control datepicker', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('tgl_kembali') }}</small>
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

@section('style')
    <link rel="stylesheet" href="{{ url('css/select2.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap-datepicker.css') }}">
@stop

@section('script')
    <script src="{{ url('js/select2.js') }}"></script>
    <script src="{{ url('js/bootstrap-datepicker.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("select").select2();
            $('.datepicker').datepicker({
                todayBtn: "linked",
                orientation: "bottom auto",
                format: 'yyyy-mm-dd'
            });
        });    
    </script>
@stop