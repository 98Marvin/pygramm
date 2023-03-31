<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h6 class="logo mr-auto"><a href="/"><span>Pyg</span>ramm <span>Tech</span>nologies</a></h6>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="/front/assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="/">Home</a></li>

                <li class="drop-down {{ (request()->is('about')) ? 'active' : '' }}"><a href="">About</a>
                    <ul>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/testimonials">Testimonials</a></li>
                        {{-- <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> --}}
                    </ul>
                </li>

                <li class="{{ (request()->is('services')) ? 'active' : '' }}"><a href="#">Services</a></li>
                <li class="{{ (request()->is('portfolio')) ? 'active' : '' }}"><a href="{{ route('portfolio') }}">Portfolio</a></li>
                <li class="{{ (request()->is('pricing')) ? 'active' : '' }}"><a href="{{ route('pricing') }}">Pricing</a></li>
                <li class="{{ (request()->is('blog')) ? 'active' : '' }}"><a href="blog.html">Blog</a></li>
                <li class="{{ (request()->is('contact')) ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>

            </ul>
        </nav><!-- .nav-menu -->

        <div class="header-social-links">
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
        </div>

    </div>
</header><!-- End Header -->
