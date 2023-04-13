@extends('layouts.master')

@section('content')
      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Portfolio Details</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>Portfolio Details</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= Portfolio Details Section ======= -->
      <section id="portfolio-details" class="portfolio-details">
        <div class="container" data-aos="fade-up">
          <div class="portfolio-details-container">
  
              <img src="/{{ $portfolio->image }}" class="img-fluid" alt="">
  
            <div class="portfolio-info mb-3">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong>: {{ $portfolio->category }}</li>
                <li><strong>Client</strong>: {{ $portfolio->client }}</li>
                <li><strong>Project URL</strong>: <a href="{{ $portfolio->url }}" target="_blank">{{ $portfolio->url }}</a></li>
              </ul>
            </div>
  
          </div>
  
  
        </div>
      </section><!-- End Portfolio Details Section -->
@endsection