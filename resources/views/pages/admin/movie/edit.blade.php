@extends('components.admin.main')
@section('title')
Edit Film
@endsection
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Film</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="row">
                                </div>
                            </div>
                            <form method="post" action="{{route('movie.edit.post', ['id'=>$movie->id])}}" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul Film" value="{{$movie->title}}">
                                </div>
                                <div class="mb-3">
                                    <label for="category">Genre</label>
                                    <select class="form-control" id="category" name="category">
                                        <option value="">Pilih Genre</option>
                                        @foreach($category as $categories)
                                        <option value="{{ $categories->id}}" {{ $categories->id==$selectedCategory ? 'selected' : ''}}>{{ $categories->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="message" name="description" rows="3" placeholder="Masukkan Deskripsi">{{$movie->description}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="age_rating" class="form-label">Age Rating</label>
                                    <input type="text" class="form-control" id="age_rating" name="age_rating" placeholder="Masukkan Judul Film" value="{{$movie->age_rating}}">
                                </div>
                                <div class="mb-3">
                                    <label for="poster" class="form-label">Poster</label>
                                    <input type="file" class="form-control" id="poster" name="poster" placeholder="Masukkan file Gambar Poster" value="{{$movie->poster}}">
                                </div>
                                <div class="mb-3">
                                    <label for="ticket_price" class="form-label">Harga Ticket</label>
                                    <input type="number" class="form-control" id="ticket_price" name="ticket_price" placeholder="Masukkan Harga Ticket" value="{{$movie->ticket_price}}">
                                </div>
                                <td>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('movie')}}" class="btn btn-danger">batal</a>

                                </td>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection