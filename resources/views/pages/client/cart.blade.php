@extends('components.client.main')
@section('title')
Cart
@endsection
@section('content')
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Cart</h3>
                <span class="breadcrumb"><a href="{{route('index.client')}}">Home</a> > Cart</span>
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

<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="row">

                            <div class="col-lg-7">
                                <h5 class="mb-3"><a href="{{route('index.client')}}" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                <hr>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="mb-1">Shopping cart</p>
                                        <p class="mb-0">Kamu Memiliki {{count($cart)}} Film</p>
                                    </div>
                                </div>
                                @foreach($cart as $carts)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="d-flex flex-row align-items-center me-5">
                                                <div>
                                                    <img src="{{ asset('poster/' . $carts->movie->poster) }}" class="img-fluid rounded-3" alt="{{$carts->movie->title}}" style="width: 65px;">
                                                </div>
                                                <div class="ms-3">
                                                    <h5>{{$carts->movie->title}}</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="ms-5">
                                                    <h5 class="fw-normal ms-5 mb-0">{{$carts->quantity}}</h5>
                                                </div>
                                                <div class="ms-5">
                                                    <h5 class="mb-0">{{'Rp'. number_format($carts->movie->ticket_price, 0, ',','.') }}</h5>
                                                </div>
                                                <form action="{{ route('cart.destroy', $carts->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                            <div class="col-lg-5">

                                <div class="card text-white rounded-3" style="background-image: url(assetsClient/images/page-heading-bg.jpg);">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">Card details</h5>

                                        </div>

                                        <p class="small mb-2">Card type</p>
                                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-visa fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-amex fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                                        <form class="mt-4">
                                        </form>

                                        <hr class="my-4">


                                        <div class="d-flex justify-content-between mb-4">
                                            <p class="mb-2">Total</p>
                                            <p class="mb-2">{{'Rp'. number_format($subtotal, 0, ',','.') }}</p>
                                        </div>

                                        <a href="{{ route('checkout') }}" class="btn btn-info btn-block btn-lg">
                                            <div class="d-flex justify-content-between">
                                                <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                            </div>
                                        </a>


                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection