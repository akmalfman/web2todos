@extends('layouts.admin.app')

@section('title', 'Catatan')

@section('content')
    <div class="m-3">
        <a href="/todo/create" class="btn btn-success">Tambah Todo</a>
    </div>
    @foreach ($todos as $value)
        <div class="card">
            <div class="card-body">
                <p>{{ $value->category }}</p>
                <p>{{ $value->name }}</p>
                <p>{{ $value->email }}</p>
                <p>{{ $value->title }}</p>
                <p>{{ $value->description }}</p>
                <a href="/todo/edit/{{ $value->todo_id }}" class="btn btn-success">Ubah</a>
                <a href="/todo/delete/{{ $value->todo_id }}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    @endforeach
@endsection
