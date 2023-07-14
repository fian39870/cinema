@extends('components.admin.main')
@section('title')
Transaksi
@endsection
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaksi</h1>

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
                                        <a href="{{route('transaction.create')}}" class="btn btn-primary">Create</a>
                                    </div>
                                </div>
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama User</th>
                                        <th scope="col">Nama Film</th>
                                        <th scope="col">Nomor Kursi</th>
                                        <th scope="col">Harga Tiket</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$transaction->id}}</td>
                                        <td>{{$transaction->user->name}}</td>
                                        <td>{{$transaction->movie->title}}</td>
                                        <td>{{$transaction->seat_number}}</td>
                                        <td>{{$transaction->movie->ticket_price}}</td>
                                        <td>{{$transaction->total_cost}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('transaction.edit', ['id'=>$transaction->id])}}" class="btn btn-success mr-2">Edit</a>
                                                <form method="POST" action="{{ route('transaction.delete', ['id' =>$transaction->id]) }}">
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