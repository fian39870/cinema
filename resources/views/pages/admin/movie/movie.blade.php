@extends('components.admin.main')
@section('title')
Film
@endsection
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Film</h1>
         
        </div>

        <div class="section-body">
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-auto ml-auto">
                                        <a href="{{route('movie.create')}}" class="btn btn-primary">Create</a>
                                    </div>
                                </div>
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Klasifikasi Umur</th>
                                        <th scope="col">Poster</th>
                                        <th scope="col">Harga Tiket</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($movies as $movie)
                                    <tr>
                                        <td>{{$movie->id}}</td>
                                        <td>{{$movie->title}}</td>
                                        <td>{{$movie->category->name}}</td>
                                        <td>{{$movie->description}}</td>
                                        <td>{{$movie->age_rating}}</td>
                                        <td>
                                            <img src="{{asset('poster/'.$movie->poster)}}" alt="" width="70">
                                        </td>
                                        <td>{{'Rp'. number_format($movie->ticket_price, 0, ',','.') }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('movie.edit', ['id'=>$movie->id])}}" class="btn btn-success mr-2">Edit</a>
                                                <form method="POST" action="{{ route('movie.delete', ['id' => $movie->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
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
    </section>
</div>
@endsection