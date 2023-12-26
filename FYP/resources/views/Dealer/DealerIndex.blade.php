@extends('Dealer/_DEALER')
@section('body')
    @php $loggedInUser = session('loggedInUser'); @endphp
    <!-- ======= Profile Section ======= -->
    <section id="profile" class="profile">

        <div class="about-me container">

            <div class="section-title">
                <h2>Profile</h2>
                <p>Manage Dealer Profile</p>
            </div>

            <form action="/EditDealerProfile" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <img src="{{ isset($loggedInUser->profile_image) ? asset('images/' . $loggedInUser->profile_image) : 'https://bootdey.com/img/Content/avatar/avatar7.png' }}"
                            class="img-fluid" id="previewImage" alt=""
                            style="object-fit: contain; width: 270px; height: 270px; transform: translate3d(0, 0, 1px);">
                        <h6 class="pt-3">Upload a different photo...</h6>
                        <input type="file" id="profileImageInput" name="profile_image" class="form-control">
                    </div>
                    <div class="col-lg-8 pt-5 content" data-aos="fade-left">
                        {{-- <h3>{{ $loggedInUser->name }}</h3> --}}
                        <br>
                        <div class="row">
                            <div class="col-lg-4">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Dealer Name:</strong>
                                    </li><br>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong>
                                    </li><br>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Contact Number:</strong>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li><input class="" name="name" type="text"
                                            style="background: transparent; border: 0; color: white; padding: 0"
                                            value="{{ $loggedInUser->name }}"></li><br>
                                    <li><input class="" name="email" type="email"
                                            style="background: transparent; border: 0; color: white; padding: 0"
                                            value="{{ $loggedInUser->email }}"></li><br>
                                    <li><input class="" name="contactNo" type="text"
                                            style="background: transparent; border: 0; color: white; padding: 0"
                                            value="{{ $loggedInUser->contactNo }}"></li>
                                </ul>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5"
                            style="position: absolute; left: 45%; background: #18d26e; border: 0; padding: 10px 30px;
                        color: #fff; transition: 0.4s; border-radius: 4px;">Save
                            Profile
                        </button>
                    </div>
                </div>
            </form>
        </div>

        </div>
    </section><!-- End Profile Section -->

    <!-- ======= Product Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title">
                <h2>Products</h2>
                <p>Our Products</p>
                <a class="nav-link" href="/AddProduct">
                    <button type="button"
                        style="background: #18d26e; border: 0; padding: 6px 20px; color: #fff; border-radius: 4px;">+ New
                        Product
                    </button>
                </a>
            </div>

            <!-- ======= Interests ======= -->
            <div class="interests container">

                <div class="section-title">
                    <h2>Interests</h2>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="icon-box">
                            <i class="ri-store-line" style="color: #ffbb2c;"></i>
                            <h3>Lorem Ipsum</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                            <h3>Dolor Sitema</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                            <h3>Sed perspiciatis</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
                        <div class="icon-box">
                            <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
                            <h3>Magni Dolores</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-database-2-line" style="color: #47aeff;"></i>
                            <h3>Nemo Enim</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
                            <h3>Eiusmod Tempor</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3>Midela Teren</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
                            <h3>Pira Neve</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-anchor-line" style="color: #b2904f;"></i>
                            <h3>Dirada Pack</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-disc-line" style="color: #b20969;"></i>
                            <h3>Moton Ideal</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-base-station-line" style="color: #ff5828;"></i>
                            <h3>Verdo Park</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
                            <h3>Flavor Nivelanda</h3>
                        </div>
                    </div>
                </div>

            </div><!-- End Interests -->

            <!-- ======= Testimonials ======= -->
            <div class="testimonials container">

                <div class="section-title">
                    <h2>Testimonials</h2>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                    rhoncus.
                                    Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at
                                    semper.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="/DealerAssets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum
                                    eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim
                                    culpa.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="/DealerAssets/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam
                                    duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="/DealerAssets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat
                                    minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore
                                    labore illum veniam.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="/DealerAssets/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                    veniam
                                    enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore
                                    nisi cillum quid.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="/DealerAssets/img/testimonials/testimonials-5.jpg" class="testimonial-img"
                                    alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                <div class="owl-carousel testimonials-carousel">

                </div>

            </div><!-- End Testimonials  -->

        </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>Products</h2>
                <p>Our Products</p>
                <a class="nav-link" href="/AddProduct">
                    <button type="button"
                        style="background: #18d26e; border: 0; padding: 6px 20px; color: #fff; border-radius: 4px;">+ New
                        Product
                    </button>
                </a>
            </div>

            <div class="row mt-4">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box">
                            <img src="{{ asset('images/' . $product->image) }}"
                                style="object-fit: contain; width: 300px; height: 230px; transform: translate3d(0, 0, 1px); border: 5px white solid" />
                            <h3 class="mt-4"><a href="/EditProductDetails/{{ $product->id }}">{{ $product->name }}</a></h3>
                            <p><strong>Status:</strong> {{ $product->status }}</p>
                            <p><strong>Type:</strong>  {{ $product->type }}</p>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Services Section -->

    <script>
        document.getElementById('profileImageInput').addEventListener('change', function(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
