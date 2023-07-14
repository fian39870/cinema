@extends('components.client.main')
@section('title')
Detail Film
@endsection
@section('content')
<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>{{$movie->title}}</h3>
        <span class="breadcrumb"><a href="#">Home</a> > <a href="#">Shop</a> > Assasin Creed</span>
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
 
<div class="single-product section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="left-image">
          <img src="{{ asset('poster/' . $movie->poster) }}" alt="">
        </div>
      </div>
      <div class="col-lg-6 align-self-center">
        <h4>{{$movie->title}}</h4>
        <span class="price">{{'Rp'. number_format($movie->ticket_price, 0, ',','.') }}</span>
        <p>{{$movie->description}}</p>
        <form action="{{ route('movie.addToCart', $movie) }}" method="post">
          @csrf
          <table for="quantity">kuantitas</table>
          <input type="text" class="form-control" id="quantity" name="quantity"  min="1" max="6" placeholder="Enter quantity">
          <table for="seat_number">Pilih Kursi</table>
          <input type="text" class="form-control" id="seat_number" name="seat_number"  placeholder="Enter seat 1-64">
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-shopping-bag"></i> ADD TO CART
          </button>
        </form>
        <ul>
          <li><span>Age Rating:</span>{{$movie->age_rating}}</li>
          <li><span>Genre:</span><a href="#">{{$movie->category->name}}</a></li>
        </ul>
      </div>
      <div class="col-lg-12">
        <div class="sep"></div>
      </div>
    </div>
  </div>
</div>

<div class="more-info">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="tabs-content">
          <div class="row">
            <div class="nav-wrapper ">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews (3)</button>
                </li>
              </ul>
            </div>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <p>You can search for more templates on Google Search using keywords such as "templatemo digital marketing", "templatemo one-page", "templatemo gallery", etc. Please tell your friends about our website. If you need a variety of HTML templates, you may visit Tooplate and Too CSS websites.</p>
               
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="section categories related-games">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="section-heading">
          <h2>Related Film</h2>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="main-button">
          <a href="shop.html">View All</a>
        </div>
      </div>
      @foreach($relatedMovies as $movies)
      <div class="col-lg col-sm-6 col-xs-12">
        <div class="item">
          <h4>{{ $movies->title }}</h4>
          <div class="thumb">
            <a href="product-details.html"><img src="assets/images/categories-05.jpg" alt=""></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection