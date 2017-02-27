@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Buku 

                    <a href="{{ route('books.create') }}" class="btn btn-primary btn-xs pull-right">Create new books</a>
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Penerbit</th>
                                <th>Tanggal Terbit</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->penerbit }}</td>
                                    <td>{{ $book->tanggal_terbit }}</td>
                                    <td>
                                        @if ($book->stock <= 0)
                                            Stock Habis
                                        @else 
                                            {{ $book->stock }}
                                        @endif
                                    </td>
                                    <td>
                                        {!! Form::model($book, ['route' => ['books.destroy', $book], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                                          <a href="{{ route('books.edit', $book) }}" class="btn btn-success btn-xs">Edit</a> 
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