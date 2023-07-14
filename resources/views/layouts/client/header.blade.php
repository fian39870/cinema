<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ url('/') }}" class="logo">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" style="width: 158px;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('index.client')}}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                        <li><a href="{{ route('topup') }}" class="{{ Request::is('product-details') ? 'active' : '' }}">Top up Saldo</a></li>
                        <li><a href="{{ route('cart')}}" class="{{ Request::is('contact') ? 'active' : '' }}">Cart</a></li>
                        <li><a href="{{ route('historyTicket')}}" class="{{ Request::is('contact') ? 'active' : '' }}">Ticket Saya</a></li>
                        @guest
                        <li><a href="{{ route('login')}}">Sign In</a></li>
                        @endguest
                        @auth
                        <li><a href="{{route('logout')}}">Logout</a></li>
                        @endauth
                    </ul>


                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>