@extends('components.client.main')
@section('title')
@section('title')
History Ticket
@endsection
@section('content')
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Transaksi</h3>
                <span class="breadcrumb"><a href="{{route('index.client')}}">Home</a> > Transaksi Saya</span>
            </div>
        </div>
    </div>
</div>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="container mt-3">
    <h1>History Transaksi</h1>

    @if ($tickets->isEmpty())
    <p>Tidak Ada Transaksi</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Ticket ID</th>
                <th>Judul Film</th>
                <th>Nomor Kursi</th>
                <th>Total Pembayaran</th>
                <th>Tanggal Transaksi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->movie->title }}</td>
                <td>{{ $ticket->seat_number }}</td>
                <td>{{'Rp'. number_format($ticket->total_cost, 0, ',','.') }}</td>
                <td>{{ $ticket->created_at }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('ticket')}}" class="btn btn-success mr-2">print</a>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection