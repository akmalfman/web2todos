@extends('layouts.admin.app')

@section('title', 'Kategori Catatan')

@section('content')
    <div class="m-3">
        <a href="/category/create" class="btn btn-success">Tambah Kategori</a>
    </div>
    @foreach ($categories as $value)
        <div class="card">
            <div class="card-body">
                <p>{{ $value->category }}</p>
                <a href="/category/edit/{{ $value->category_id }}" class="btn btn-success">Ubah</a>
                <a href="/category/delete/{{ $value->category_id }}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    @endforeach
@endsection
