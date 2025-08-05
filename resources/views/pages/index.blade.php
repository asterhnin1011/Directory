@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
<main>

        <!-- Hero Area Start-->
        <div class="slider-area hero-overly">
         <div class="single-slider hero-overly slider-height d-flex align-items-center hero-bottom-space">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-9">
                            <!-- Hero Caption -->
                            <div class="hero__caption">
                                {{-- <span>Explore the city</span> --}}
                                <h1>Discover Great Places</h1>
                            </div>
                            <!--Hero form -->
                         <form id="searchForm" class="search-box" onsubmit="return false;">
    <div class="input-form">
        <input type="text" id="queryInput" placeholder="What are you looking for?">
    </div>

    <div class="select-form">
        <div class="select-itms">
            <select id="categorySelect">
                <option value="">All Categories</option>
                <option value="Religious building">Religious building</option>
                <option value="Hospital">Hospital</option>
                <option value="Restaurant">Restaurant</option>
                <option value="Hotel">Hotel</option>
            </select>
        </div>
    </div>

    <div class="search-form">
       <a href="#" id="searchLink" onclick="buildSearchURL()">Search</a>
    </div>
</form>
<script>
    function buildSearchURL() {
        const query = document.getElementById('queryInput').value.trim();
        const type = document.getElementById('categorySelect').value;

        // Construct the base search URL
        let url = '/search?';

        // Add query and category to the URL if they are present
        if (query !== '') {
            url += 'query=' + encodeURIComponent(query) + '&';
        }

        if (type !== '') {
            url += 'type=' + encodeURIComponent(type);
        }

        // Redirect to the new search URL
        window.location.href = url;
    }
</script>
    </div>
        </div>
            </div>
                </div>
        </div>
        <!--Hero Area End-->
        <!-- Popular Locations Start -->
<style>
    .location-img img {
        width: 100%;
        height: 250px; /* Adjust height as needed */
        object-fit: cover;
        border-radius: 8px;
    }

    .single-location {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border: 1px solid #e5e5e5;
        border-radius: 10px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }

    .single-location:hover {
        transform: translateY(-5px);
    }

    .location-details {
        padding: 15px;
        text-align: center;
        font-weight: 500;
        font-size: 1.1rem;
    }

    /* .row > div {
        display: flex;
    } */
</style>
        <section id="places">
    <div class="popular-location section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Title -->
                    <div class="section-tittle text-center mb-80">
                        <span>Most visited places</span>
                        <h2>Popular Places</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Thein Daw Gyi -->
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="single-location">
                        <div class="location-img">
                            <img src="assets/img/gallery/theindawgyi.png" alt="Thein Daw Gyi">
                        </div>
                        <div class="location-details">
                            <p>Thein Daw Gyi</p>
                        </div>
                    </div>
                </div>

                <!-- Smart Island -->
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="single-location">
                        <div class="location-img">
                            <img src="assets/img/gallery/smart.jpg" alt="Smart Island">
                        </div>
                        <div class="location-details">
                            <p>Smart Island</p>
                        </div>
                    </div>
                </div>

                <!-- Pahtaw Pahtet -->
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="single-location">
                        <div class="location-img">
                            <img src="assets/img/gallery/pahtaw.jpg" alt="Pahtaw Pahtet">
                        </div>
                        <div class="location-details">
                            <p>Pahtaw Pahtet</p>
                        </div>
                    </div>
                </div>

                <!-- Round World Pagoda -->
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="single-location">
                        <div class="location-img">
                            <img src="assets/img/gallery/roundworld.png" alt="Round World Pagoda">
                        </div>
                        <div class="location-details">
                            <p>Round World Pagoda</p>
                        </div>
                    </div>
                </div>

                <!-- Regent Hotel -->
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="single-location">
                        <div class="location-img">
                            <img src="assets/img/gallery/regent.jpg" alt="Regent Hotel">
                        </div>
                        <div class="location-details">
                            <p>Regent Hotel</p>
                        </div>
                    </div>
                </div>

                <!-- Hotel Drift -->
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="single-location">
                        <div class="location-img">
                            <img src="assets/img/gallery/hoteldrift.jpg" alt="Hotel Drift">
                        </div>
                        <div class="location-details">
                            <p>Hotel Drift</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Popular Locations End -->
       <!-- Services Area Start -->
<section id="work">
  <div class="services-area pt-70 pb-70 section-bg" data-background="assets/img/gallery/how1.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Section Title -->
          <div class="section-tittle section-tittle2 text-center mb-40">
           <span style="font-size: 50px; color: rgba(15, 5, 5, 0.931);">Easy to explore</span>
<h2 style="font-size: 28px; color: rgb(10, 11, 10);">How It Works</h2>
          </div>
        </div>
      </div>
      <div class="row justify-content-between">
        <!-- Step 1 -->
        <div class="col-lg-3 col-md-6">
          <div class="single-services text-center mb-30">
            <div class="services-icon mb-3">
              <span class="flaticon-list" style="font-size: 30px;"></span>
            </div>
            <div class="services-cap">
              <h5 style="font-size: 18px;">1. Choose a Category</h5>
            </div>
            <!-- Shape -->
            <img class="shape1 d-none d-lg-block" src="assets/img/icon/serices1.png" alt="" style="width: 60px;">
          </div>
        </div>
        <!-- Step 2 -->
        <div class="col-lg-3 col-md-6">
          <div class="single-services text-center mb-30">
            <div class="services-icon mb-3">
              <span class="flaticon-problem" style="font-size: 30px;"></span>
            </div>
            <div class="services-cap">
              <h5 style="font-size: 18px;">2. What You Want</h5>
            </div>
            <img class="shape2 d-none d-lg-block" src="assets/img/icon/serices2.png" alt="" style="width: 60px;">
          </div>
        </div>
        <!-- Step 3 -->
        <div class="col-lg-3 col-md-6">
          <div class="single-services text-center mb-30">
            <div class="services-icon mb-3">
              <span class="flaticon-respect" style="font-size: 30px;"></span>
            </div>
            <div class="services-cap">
              <h5 style="font-size: 18px;">3. Go out & Explore</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Services Area End -->
       <!-- Contact Start -->
<section id="contact" class="container-fluid py-5 bg-light">
  <style>
    .custom-card {
      max-width: 700px;
      width: 100%;
      background-color: #fff;
      padding: 2rem 3rem; /* padding: px-5 py-4 */
      border-radius: 1rem; /* rounded corners */
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
      border: 1px solid #e0e0e0;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .custom-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
  </style>

  <div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card custom-card">

      <!-- Location Icon -->
      <div class="text-center mb-3">
        <i class="bi bi-geo-alt-fill fs-1 text-primary"></i>
        <h3 class="mt-2 fw-bold fs-3">Get In Touch</h3>
      </div>

      <!-- Contact Info -->
      <div class="text-muted fs-5">
        <div class="mb-2">
          <strong class="d-block text-dark">Company Name:</strong>Design Printing Services Co., Ltd

        </div>

        <div class="mb-2">
          <strong class="d-block text-dark">Address:</strong>
          <span>
            Rm:307, Yae Kyaw Complex, Yae Kyaw Road,<br>
            Pazundaung Township, Yangon, Myanmar
          </span>
        </div>

        <div class="mb-2">
          <strong class="d-block text-dark">Email:</strong>
          <a href="mailto:dm@dpsmap.com" class="text-decoration-none text-primary">dm@dpsmap.com</a>
        </div>

        <div class="mb-2">
          <strong class="d-block text-dark">Phone:</strong>
          <a href="tel:+959775204020" class="text-decoration-none text-success">+959 775 204 020</a>
        </div>
      </div>

      <!-- Social Icons -->
      <div class="mt-3 d-flex justify-content-center gap-4 fs-4">
        <!-- Facebook -->
        <a href="https://www.facebook.com/share/16ew3t9vwy/" title="Facebook" style="color: #1877F2;">
          <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 24 24">
            <path d="M22.675 0h-21.35C.6 0 0 .6 0 1.325v21.351C0 23.4.6 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.466.099 2.797.143v3.24l-1.918.001c-1.504 0-1.796.715-1.796 1.763v2.313h3.588l-.467 3.622h-3.12V24h6.116c.725 0 1.324-.6 1.324-1.324V1.325C24 .6 23.4 0 22.675 0z"/>
          </svg>
        </a>
        <!-- Email -->
        <a href="mailto:dm@dpsmap.com" title="Send Email" style="color: #dc3545;">
          <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 24 24">
            <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 2v.01L12 13 4 6.01V6h16zM4 18V8l8 5 8-5v10H4z"/>
          </svg>
        </a>
        <!-- Phone -->
        <a href="tel:+959775204020" title="Call Us" style="color: #28a745;">
          <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 24 24">
            <path d="M6.62 10.79a15.466 15.466 0 006.59 6.59l2.2-2.2a1 1 0 011.11-.21c1.2.48 2.5.74 3.83.74a1 1 0 011 1v3.5a1 1 0 01-1 1C9.72 21.61 2.39 14.28 2.39 5a1 1 0 011-1h3.5a1 1 0 011 1c0 1.33.25 2.63.74 3.83a1 1 0 01-.21 1.11l-2.2 2.2z"/>
          </svg>
        </a>
        <!-- Viber -->
        <a href="viber://chat?number=%2B959775204020" title="Chat on Viber" style="color: #7360f2;">
          <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.031-.967s-.471-.149-.672.15-.768.966-.942 1.164c-.173.198-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.298-.018-.459.13-.608.134-.133.298-.347.446-.52.149-.173.198-.298.298-.497.099-.198.05-.373-.025-.522-.075-.149-.672-1.611-.921-2.21-.242-.579-.487-.5-.672-.51l-.572-.01c-.198 0-.52.074-.792.373s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.262.488 1.694.625.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.007-1.413.248-.695.248-1.29.173-1.414-.074-.124-.272-.198-.57-.347m-5.421-10.204c-5.276 0-9.55 4.274-9.55 9.55 0 1.685.443 3.323 1.285 4.768L2 22l3.503-1.306a9.508 9.508 0 0 0 4.548 1.158h.004c5.275 0 9.55-4.274 9.55-9.55s-4.275-9.55-9.55-9.55m5.4 14.263c-.249.695-1.436 1.328-2.007 1.413-.513.075-1.161.108-1.873-.118-.432-.137-.985-.32-1.694-.625-2.98-1.287-4.926-4.289-5.075-4.487-.149-.198-1.213-1.511-1.213-3.074s.743-2.23 1.04-2.479c.272-.3.594-.373.792-.373l.572.01c.186.01.43-.068.672.51.25.6.846 2.062.921 2.211.075.149.124.323.025.522-.1.199-.149.324-.298.497s-.312.387-.446.52c-.149.149-.303.31-.13.608.173.298.77 1.271 1.653 2.059 1.135 1.012 2.093 1.326 2.39 1.475.297.148.471.123.644-.075.174-.198.717-.863.942-1.164.224-.3.422-.223.672-.15.273.1 1.734.818 2.031.967.298.149.496.223.57.347.075.124.075.719-.173 1.414m1.587-8.54c-.057-.124-.215-.198-.456-.273-.24-.075-1.42-.692-1.641-.772-.221-.074-.383-.124-.545.124-.16.248-.626.773-.768.922-.141.149-.282.174-.523.05-.24-.124-1.014-.373-1.93-1.182-.713-.636-1.195-1.421-1.336-1.66-.14-.248-.015-.381.107-.505.111-.11.248-.282.373-.422.125-.14.165-.248.248-.422.082-.173.041-.324-.021-.448-.062-.124-.545-1.296-.747-1.777-.197-.489-.397-.422-.547-.432l-.467-.008c-.165 0-.435.062-.663.31-.23.248-.875.85-.875 2.071s.896 2.404 1.021 2.572c.124.165 1.763 2.675 4.275 3.755.6.26 1.07.415 1.44.53.605.192 1.157.165 1.593.1.486-.072 1.496-.61 1.708-1.197.212-.586.212-1.09.148-1.195"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
</section>
<!-- Contact End -->


    </main>
@endsection
