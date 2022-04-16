@extends('dashboard.layouts.main')

@section('container')

    <div class="row" style="color: #15adcc">
        <div class="col">
            <h1>Category List</h1>
        </div>
    </div>

    <div class="table-responsive col-lg-12">

        {{-- Flash Message Post Added Success --}}
        @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <a href="/dashboard/categories/create" class="btn btn-primary border-0 my-3" style="background-color: #15adcc"><span data-feather="file-plus"></span>&nbsp; Add New Category</a>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-success">
                            <span data-feather="edit"></span>
                        </a>
                        <form action="/dashboard/categories/{{ $category->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf

                            <button class="badge bg-danger border-0" onclick="return confirm('Apakah kamu yakin ingin menghapus kategori ini?')"><span data-feather="x-circle"></span></button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection