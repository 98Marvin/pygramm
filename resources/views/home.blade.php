@extends('layouts.master')


@section('content')
    <!-- ======= Hero Section ======= -->
    @include('layouts.slider')


    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About Us</strong></h2>
            </div>

            <div class="row content">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2>Search Engine Optimization</h2>
                    <h3>Through use of social media platforms we help you connect with your audience and build your brand,
                        increase sales, increase your website traffic and build a community of followers to share and engage
                        with content.
                    </h3>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                    <p>
                        We design and develop websites that respond to the user’s behavior and environment based on screen
                        size, platform and orientation. It consists of a mix of flexible grids and layouts, images and an
                        intelligent use of CSS media queries.
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Best User Friendly Websites</li>
                        <li><i class="ri-check-double-line"></i> Rank Number one in Google</li>
                        <li><i class="ri-check-double-line"></i> Excellent Website Maintenance</li>
                    </ul>
                    <p class="font-italic">
                        Mobile app development process requires creating software that can be installed on the device, and
                        enabling backend services for data access through APIs, and testing the application on target
                        devices.
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Services</strong></h2>
                <p>We offer Quality Services that include the following:</p>
            </div>


            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 d-flex mb-4 align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box {{ $service->colour }}">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="{{ $service->dimension }}">
                                    </path>
                                </svg>
                                <i class="{{ $service->icon }}"></i>
                            </div>
                            <h4><a href="">{{ $service->name }}</a></h4>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Portfolio</h2>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up">
                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ $portfolio->category === 'Web' ? 'filter-web' : 'filter-app' }}">
                        <img src="/{{ $portfolio->image }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{ $portfolio->name }}</h4>
                            <p>{{ $portfolio->category }}</p>
                            <a href="/{{ $portfolio->image }}" data-gall="portfolioGallery" class="venobox preview-link"
                                title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Brands</h2>
            </div>

            <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

                @foreach ($brands as $brand)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="client-logo">
                            <img src="{{ $brand->image }}" class="img-fluid" alt="">
                        </div>
                    </div>
                @endforeach


            </div>

        </div>
    </section><!-- End Our Clients Section -->
@endsection
