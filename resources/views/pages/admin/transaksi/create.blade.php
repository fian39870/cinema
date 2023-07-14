@extends('components.admin.main')
@section('title')
Tambah Transaksi
@endsection
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Transaksi</h1>
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
                            <form method="post" action="{{route('transaction.create.post')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_user">User</label>
                                    <select class="form-control" id="nama_user" name="nama_user">
                                        <option value="">Pilih User</option>
                                        @foreach($user as $users)
                                        <option value="{{ $users->id}}">{{ $users->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="film">Film</label>
                                    <select class="form-control" id="film" name="film">
                                        <option value="">Pilih Film</option>
                                        @foreach($movie as $movies)
                                        <option value="{{ $movies->id}}">{{ $movies->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_kursi" class="form-label">Nomor Kursi</label>
                                    <input type="text" class="form-control" id="nomor_kursi" name="nomor_kursi" placeholder="Masukkan Judul Film">
                                </div>
                                <div class="mb-3">
                                    <label for="total_pembayaran" class="form-label">Total Pembayaran</label>
                                    <input type="number" class="form-control" id="total_pembayaran" name="total_pembayaran" placeholder="Masukkan Harga Ticket">
                                </div>
                                <td>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('transaction')}}" class="btn btn-danger">batal</a>

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