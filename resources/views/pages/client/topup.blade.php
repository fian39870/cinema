@extends('components.client.main')
@section('title')
Top up
@endsection
@section('content')
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Top Up Saldo</h3>
                <span class="breadcrumb"><a href="{{route('index.client')}}">Home</a> > Top Up Saldo</span>
            </div>
        </div>
    </div>
</div>
@if (session('success'))
<div class="alert alert-success mt-3">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger mt-3">
    {{ session('error') }}
</div>
@endif
<div class="section-body mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card mx-auto">
                <div class="card-body text-center">
                    <h5 class="card-title">Top Up Saldo</h5>
                    <div class="mb-3">
                        @if($balance)
                        <p>Saldo Anda Saat Ini: {{'Rp'. number_format($balance->amount, 0, ',','.') }}</p>
                        @else
                        <p>Saldo Anda Saat Ini: 0</p>
                        @endif
                    </div>
                    <form action="{{ route('topup.post') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="amount">Top Up Saldo (in Rupiah)</label>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter top up amount" min="0" step="1000">
                        </div>
                        <button type="submit" class="btn btn-primary">Top Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection