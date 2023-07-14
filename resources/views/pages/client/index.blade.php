@extends('components.client.main')
@section('title')
Home
@endsection
@section('content')
<div class="main-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <div class="caption header-text">
          <h6>Selamat datang di Cinema</h6>
          <h2>WEBSITE CINEMA TERBAIK</h2>
          <p>Selamat datang di website sinema kami, di mana keajaiban sinematik menjadi nyata. Kami menghadirkan berbagai film terbaru dan klasik dari berbagai genre yang akan memikat hati dan pikiran Anda. Nikmati pengalaman menonton yang tak terlupakan dengan kualitas gambar dan suara yang luar biasa. Dapatkan juga informasi terkini tentang film-film terbaru, ulasan, dan berita terkait industri sinema. Bergabunglah dengan komunitas pecinta film kami dan rasakan keajaiban sinema di website kami. Selamat menikmati film-film pilihan Anda dan selamat bergabung dalam petualangan sinematik yang tak terlupakan!</p>
          <div class="search-input">

          </div>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-2">
        <div class="right-image">
          <img src="{{ asset('poster/' . $firstMovie->poster) }}" alt="">
          <span class="price">{{'Rp'. number_format($firstMovie->ticket_price, 0, ',','.') }}</span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="features">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6">

        <div class="item">
          <div class="image">
            <img src="assetsClient/images/featured-01.png" alt="" style="max-width: 44px;">
          </div>
          <h4>Wide Movie Selection</h4>
        </div>

      </div>
      <div class="col-lg-3 col-md-6">

        <div class="item">
          <div class="image">
            <img src="assetsClient/images/featured-02.png" alt="" style="max-width: 44px;">
          </div>
          <h4>Convenient Booking</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">

        <div class="item">
          <div class="image">
            <img src="assetsClient/images/featured-03.png" alt="" style="max-width: 44px;">
          </div>
          <h4>Secure Payment</h4>
        </div>

      </div>
      <div class="col-lg-3 col-md-6">

        <div class="item">
          <div class="image">
            <img src="assetsClient/images/featured-04.png" alt="" style="max-width: 44px;">
          </div>
          <h4>User-Friendly Interface</h4>
        </div>

      </div>
    </div>
  </div>
</div>
<div class="section most-played">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="section-heading">
          <h6>TOP FILM</h6>
          <h2>Most Played</h2>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="main-button">
          <a href="">View All</a>
        </div>
      </div>
      @foreach($movies as $movie)
      <div class="col-lg-2 col-md-6 col-sm-6">
        <div class="item">
          <div class="thumb">
            <a href="{{route('detail.client',['id'=>$movie->id])}}"><img src="{{ asset('poster/' . $movie->poster) }}" alt=""></a>
          </div>
          <div class="down-content">
            <span class="category">Adventure</span>
            <h4>{{ $movie->title }}</h4>
            <a href="{{route('detail.client',['id'=>$movie->id])}}">Detail</a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>

<div class="section categories">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="section-heading">
          <h6>Categories</h6>
          <h2>Kategori Film</h2>
        </div>
      </div>
      @foreach($category as $categories)
      <div class="col-lg col-sm-6 col-xs-12">
        <div class="item">
          <h4>{{ $categories->name }}</h4>
          <div class="thumb">
            <a href="{{route('category',['id'=>$categories->id])}}"><img src="{{ asset('gambar/' . $categories->gambar) }}" alt="" width="10px"></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

<div class="section cta">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <div class="shop">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <h6>Our Movies</h6>
                <h2>Pre-Order Now and Get the Best Deals!</h2>
              </div>
              <p>Don't miss out on the latest movies and exclusive offers. Pre-order your tickets now!</p>

              <div class="main-button">
                @foreach($movies as $movie)
                <a href="{{ route('detail.client', ['id' => $movie->id]) }}">Browse Movies</a>
                @endforeach
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 offset-lg-2 align-self-end">
        <div class="subscribe">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <h6>Newsletter</h6>
                <h2>Subscribe to Our Newsletter for Exclusive Discounts!</h2>
              </div>
              <div class="search-input">
                <form id="subscribe" action="#">
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your email...">
                  <button type="submit">Subscribe Now</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection