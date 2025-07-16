@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
<main>

        <!-- Hero Area Start-->
        <div class="slider-area hero-overly">
            <div class="single-slider hero-overly  slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-9">
                            <!-- Hero Caption -->
                            <div class="hero__caption">
                                <span>Explore the city</span>
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
    const category = document.getElementById('categorySelect').value;

    const params = new URLSearchParams();
    if (query) params.append('query', query);
    if (category) params.append('category', category);

    const searchURL = '/search?' + params.toString();

    // Redirect
    window.location.href = searchURL;
}
</script>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--Hero Area End-->
        <!-- Popular Locations Start -->
        <div class="popular-location section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <span>Most visited places</span>
                            <h2>Popular Locations</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="assets/img/gallery/location1.png" alt="">
                            </div>
                            <div class="location-details">
                                <p>New York</p>
                                <a href="#" class="location-btn">65 <i class="ti-plus"></i> Location</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="assets/img/gallery/location2.png" alt="">
                            </div>
                            <div class="location-details">
                                <p>Paris</p>
                                <a href="#" class="location-btn">60 <i class="ti-plus"></i> Location</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="assets/img/gallery/location3.png" alt="">
                            </div>
                            <div class="location-details">
                                <p>Rome</p>
                                <a href="#" class="location-btn">50 <i class="ti-plus"></i> Location</a>
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
                <div class="row justify-content-center">
                    <div class="room-btn pt-20">
                        <a href="catagori.html" class="btn view-btn1">View All Places</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Locations End -->
        <!-- Services Area Start -->
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
        <!-- Services Area End -->
        <!-- Categories Area Start -->
        <div class="categories-area section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <span>We are offering for you</span>
                            <h2>Featured Categories</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat text-center mb-50">
                            <div class="cat-icon">
                                <span class="flaticon-bed"></span>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="catagori.html">Leving Hotel</a></h5>
                                <p>Must explain your how this keind denoun pleasure</p>
                                <a href="catagori.html">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat text-center mb-50">
                            <div class="cat-icon">
                                <span class="flaticon-drink"></span>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="catagori.html">Night Life</a></h5>
                                <p>Must explain your how this keind denoun pleasure</p>
                                <a href="catagori.html">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat text-center mb-50">
                            <div class="cat-icon">
                                <span class="flaticon-home"></span>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="catagori.html">Culture Place</a></h5>
                                <p>Must explain your how this keind denoun pleasure</p>
                                <a href="catagori.html">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat text-center mb-50">
                            <div class="cat-icon">
                                <span class="flaticon-food"></span>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="catagori.html">Resturent</a></h5>
                                <p>Must explain your how this keind denoun pleasure</p>
                                <a href="catagori.html">View Details</a>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
        <!-- Categories Area End -->
         <!-- peoples-visit Start -->
         <div class="peoples-visit dining-padding-top">
            <!-- Single Left img -->
            <div class="single-visit left-img">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-8">
                            <div class="visit-caption">
                                <span>We are offering for you</span>
                                <h3>Every Month, Millions of People
                                    visit this site We’ve Built.</h3>
                                <p>Unlike what its name implies, dry cleaning is not actually a 'dry' process. Clothes are soaked in a different solvent.</p>
                                <!--Single Visit categories -->
                                <div class="visit-categories mb-40">
                                    <div class="visit-location">
                                        <span class="flaticon-travel"></span>
                                    </div>
                                    <div class="visit-cap">
                                        <h4>Great places in the world</h4>
                                        <p>Unlike what its name implies, dry cleaning is not actu  process. Clothes soaked differentent.
                                        </p>
                                    </div>
                                </div>
                                <!--Single Visit categories -->
                                <div class="visit-categories">
                                    <div class="visit-location">
                                        <span class="flaticon-work"></span>
                                    </div>
                                    <div class="visit-cap">
                                        <h4>Biggest category listing</h4>
                                        <p>Unlike what its name implies, dry cleaning is not actu  process. Clothes soaked differentent.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- peoples-visit End -->

        <!-- Blog Ara Start -->
        <div class="home-blog-area section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-70">
                            <span>Our blog</span>
                            <h2>News and tips</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-team mb-30">
                            <div class="team-img">
                                <img src="assets/img/gallery/home_blog1.png" alt="">
                            </div>
                            <div class="team-caption">
                                <span>HEALTH & CARE</span>
                                <h3><a href="blog.html">The Best SPA Salons For
                                    Your Relaxation</a></h3>
                                <p>October 6, 2020by Steve</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-team mb-30">
                            <div class="team-img">
                                <img src="assets/img/gallery/home_blog2.png" alt="">
                            </div>
                            <div class="team-caption">
                                <span>HEALTH & CARE</span>
                                <h3><a href="blog.html">The Best SPA Salons For
                                    Your Relaxation</a></h3>
                                <p>October 6, 2020by Steve</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-team mb-30">
                            <div class="team-img">
                                <img src="assets/img/gallery/home_blog3.png" alt="">
                            </div>
                            <div class="team-caption">
                                <span>HEALTH & CARE</span>
                                <h3><a href="blog.html">The Best SPA Salons For
                                    Your Relaxation</a></h3>
                                <p>October 6, 2020by Steve</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Ara End -->

    </main>
@endsection
