@extends('components.client.main')
@section('title')
Category
@endsection
@section('content')
<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>{{$category->name}}</h3>
        <span class="breadcrumb"><a href="#">Home</a> > Our Shop</span>
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
<div class="section trending">
  <div class="container">
    <div class="row trending-box">
      @foreach($category->movie as $movies)
      <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
        <div class="item">
          <div class="thumb">
            <a href="product-details.html"><img src="{{ asset('poster/' . $movies->poster) }}" alt=""></a>
            <span class="price">{{'Rp'. number_format($movies->ticket_price, 0, ',','.') }}</span>
          </div>
          <div class="down-content">
            <span class="category">Action</span>
            <h4>{{$movies->title}}</h4>
            <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
          </div>
        </div>
      </div>
      @endforeach
      <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
            <li><a href="#"> &lt; </a></li>
            <li><a href="#">1</a></li>
            <li><a class="is_active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"> &gt; </a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  @endsection