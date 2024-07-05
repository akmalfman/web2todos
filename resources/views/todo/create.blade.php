@extends('layouts.admin.app')

@section('title', 'Buat Catatan')

@section('content')
    <form method="POST" action="/todo/store">
        @csrf
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-select" name="todo_category_id" id="todo_category_id">
                <option selected>Open this select menu</option>
                @foreach ($todocategories as $value)
                    <option value="{{ $value->id }}">{{ $value->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
