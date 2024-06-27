<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belajar Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mb-3">
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
                    <a href="/todo/edit/{{ $value->id }}" class="btn btn-success">Ubah</a>
                    <a href="/todo/delete/{{ $value->id }}" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
