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
        <section id="places">
        <div class="popular-location section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <span>Most visited places</span>
                            <h2>Popular Places</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="assets/img/gallery/theindawgyi.png" alt="">
                            </div>
                            <div class="location-details">
                                <p>Thein Daw Gyi</p>
                                {{-- <a href="#" class="location-btn"></i></a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="assets/img/gallery/smart.jpg" alt="">
                            </div>
                            <div class="location-details">
                                <p>Smart Island</p>
                                {{-- <a href="#" class="location-btn"></a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="assets/img/gallery/location3.png" alt="">
                            </div>
                            <div class="location-details">
                                <p>Pahtaw Pahtet</p>
                                {{-- <a href="#" class="location-btn"></a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="assets/img/gallery/location4.png" alt="">
                            </div>
                            <div class="location-details">
                                <p>Italy</p>
                                <a href="#" class="location-btn">28 <i class="ti-plus"></i> Location</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="assets/img/gallery/location5.png" alt="">
                            </div>
                            <div class="location-details">
                                <p>Nepal</p>
                                <a href="#" class="location-btn">99 <i class="ti-plus"></i> Location</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="assets/img/gallery/location6.png" alt="">
                            </div>
                            <div class="location-details">
                                <p>indonesia</p>
                                <a href="#" class="location-btn">78 <i class="ti-plus"></i> Location</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- More Btn -->
                {{-- <div class="row justify-content-center">
                    <div class="room-btn pt-20">
                        <a href="catagori.html" class="btn view-btn1">View All Places</a>
                    </div>
                </div> --}}
            </div>
        </div>
        </section>
        <!-- Popular Locations End -->
         <!-- Services Area Start -->
          <section id="work">
        <div class="services-area pt-150 pb-150 section-bg" data-background="assets/img/gallery/section_bg02.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 text-center mb-80">
                            <span>Easy to explore</span>
                            <h2>How It Works</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-services text-center mb-50">
                            <div class="services-icon">
                                <span class="flaticon-list"></span>
                            </div>
                            <div class="services-cap">
                                <h5><a href="#">1. Choose a Category</a></h5>
                                <p>incidid labore lore magna aliqua uisipsum suspendis loris.</p>
                            </div>
                            <!-- Shpape -->
                            <img class="shape1 d-none d-lg-block" src="assets/img/icon/serices1.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-services text-center mb-50">
                            <div class="services-icon">
                                <span class="flaticon-problem"></span>
                            </div>
                            <div class="services-cap">
                                <h5><a href="#">2. what you want</a></h5>
                                <p>incidid labore lore magna aliqua uisipsum suspendis loris.</p>
                            </div>
                            <img class="shape2 d-none d-lg-block" src="assets/img/icon/serices2.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-services text-center mb-50">
                            <div class="services-icon">
                                <span class="flaticon-respect"></span>
                            </div>
                            <div class="services-cap">
                                <h5><a href="#">3. Go out & Explore</a></h5>
                                <p>incidid labore lore magna aliqua uisipsum suspendis loris.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </section>
        <!-- Services Area End -->
         <!-- Contact Start -->
     <section id="contact" class="container-xxl py-5">
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container contact-page py-5 px-lg-0">
      <div class="row g-5 mx-lg-0">

        <!-- LEFT SIDE (Optional Content or Map) -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
  <div class="card shadow-lg border-0 rounded-4 p-4 text-center" style="max-width: 400px; background-color: #f8f9fa;">

    <!-- Location Icon -->
    <div class="mb-3">
      <i class="bi bi-geo-alt-fill fs-1 text-primary"></i>
    </div>

    <!-- Heading -->
    <h2 class="mb-3">Get In Touch</h2>

    <!-- Contact Info -->
    <div class="text-start text-muted fs-6">
  <div class="mb-3">
    <strong class="d-block text-dark">Company Name:</strong>
    <span>Design Printing Serviecs Co.,Ltd</span>
  </div>

  <div class="mb-3">
    <strong class="d-block text-dark">Address:</strong>
    <span>Rm:307, Yae Kyaw Complex, Yae Kyaw Road,
Pazundaung Township, Yangon, Myanmar</span>
  </div>

  <div class="mb-3">
    <strong class="d-block text-dark">Email:</strong>
    <a href="soeminthan44@gmail.com" class="text-decoration-none text-primary">dm@dpsmap.com</a>
  </div>

  <div>
    <strong class="d-block text-dark">Phone:</strong>
    <a href="tel:09420167005" class="text-decoration-none text-success d-block">+959775204020</a>
  </div>
</div>

    <!-- Social Icons -->
    <div class="mt-4 d-flex justify-content-center gap-3">
      <!-- Facebook -->
      <a href="https://www.facebook.com/share/19i5GdjwMX/" target="_blank" class="text-primary fs-4">
        <i class="bi bi-facebook"></i>
      </a>
      <!-- Viber -->
  {{-- <a href="viber://chat?number=+959420167005" target="_blank" class="text-purple fs-4">
    <i class="fab fa-viber"></i>
  </a> --}}
      <!-- Email -->
      <a href="" class="text-danger fs-4">
        <i class="bi bi-envelope-fill"></i>
      </a>
      <!-- Phone -->
      <a href="tel:09420167005" class="text-success fs-4">
        <i class="bi bi-telephone-fill"></i>
      </a>
    </div>

  </div>
</div>

    </main>
@endsection
