@extends('template_public.template')
@section('konten')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-md-7 mt-4">
                    <div class="row justify-content-center">
                        <div class="">
                            <h1>Mitra Bisnis Tepat Untuk Kualitas Dengan Harga Terjangkau</h1>
                        </div>
                    </div>
                    <div class="text-right mb-3">
                        <a href="https://api.whatsapp.com/send/?phone=6287816561610&text=Hallo+Darma+Ayu+Tekno+,+Saya+Ingin+Konsultasi+terkait+aplikasi&app_absent=0" class="btn-get-started scrollto"><i class="fa fa-phone"></i> &nbsp; Konsultasi Gratis</a>
                    </div>
                </div>
                <div class="col-md-5 mt-5">
                    <div class="col-lg-12 order-1 order-lg-2 hero-img aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
                        <img src="{{ URL('public_template/assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
                      </div>
                </div>
            </div>



        <!-- ======= Counts Section ======= -->
        <section id="technologies" class="counts section-bg">
            <div class="container">

                <div class="row justify-content-center">

                    @foreach ($_teknologi as $tek)
                    <div class="col-lg-2 col-md-4 col-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <img src="{{ URL($tek->img_path.$tek->img_name)}}" alt="logo.png" height="80px" style="max-width: 150px;">
                            <p>{{ $tek->name }}</p>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Counts Section -->

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Tentang Kami</h2>
                    <p style="color: black">{{ $_portal_data->desc }}</p>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <p>
                           <b>Visi</b>
                        </p>
                        <p class="text-justify">
                            {!! $_portal_data->visi !!}
                        </p>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            <b>Misi</b>
                        </p>
                        <p class="text-justify">
                            {!! $_portal_data->misi !!}
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->


        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Layanan Perusahaan</h2>
                    <p>Kami memiliki layanan porfesional pada bidang berikut</p>
                </div>

                <div class="row">
                    @foreach ($_layanan as $ly)

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-4" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box iconbox-blue ">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5"
                                        d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426">
                                    </path>
                                </svg>
                                <i >
                                    <img src="{{ $ly->img_path.$ly->img_name }}" class="img-fluid"
                                    alt="">
                                </i>
                            </div>
                            <h4><a href="">{{ $ly->name }}</a></h4>
                            <p>{{ $ly->desc }}</p>
                        </div>
                    </div>

                    @endforeach
                </div>

            </div>
        </section><!-- End Sevices Section -->


        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Portofolio</h2>
                    <p>Kami memiliki portofolio di berbagai kategori layanan baik berupa produk ataupun proyek</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">Semua</li>
                            @foreach ($_layanan as $ly)
                                <li data-filter=".filter-{{ $ly->id }}">{{ $ly->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="300">

                    @foreach ($_portofolio as $porto)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $porto->layanan_id }}">
                        <div class="portfolio-wrap text-center">
                            <img src="{{ URL($porto->img_thumb_path.$porto->img_thumb_name) }}" style="max-height: 230px"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $porto->name }}</h4>
                                <p>{{ date('d F Y', strtotime($porto->tanggal)); }}</p>
                                <div class="portfolio-links">
                                    <a href="{{ URL($porto->img_thumb_path.$porto->img_thumb_name) }}"
                                        data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i
                                            class="bx bx-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-book-content"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Team Section ======= -->
        <section id="partner" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Klien</h2>
                    <p>Kami memiliki Klien yang potensial dalam bekerja sama untuk mengembangkan bisnis bersama</p>
                </div>

                <div class="row align-items-center justify-content-center">

                    @foreach ($_partner as $part)
                    <div class="col-lg-3 col-md-4 align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img pt-3">
                                <img src="{{ URL($part->img_path.$part->img_name) }}" class="img-fluid" width="130px"
                                    alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ $part->name }}</h4>
                                <span>{{ $part->desc }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Team Section -->
{{--
        <!-- ======= Testimonials Section ======= -->
        <section id="pelanggan" class="testimonials">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Pelanggan</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                    rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="{{ URL('public_template/assets/img/testimonials/testimonials-1.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="{{ URL('public_template/assets/img/testimonials/testimonials-2.jpg') }}"
                                    class="testimonial-img" alt="">
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
                                <img src="{{ URL('public_template/assets/img/testimonials/testimonials-3.jpg') }}"
                                    class="testimonial-img" alt="">
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
                                <img src="{{ URL('public_template/assets/img/testimonials/testimonials-4.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                    veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                    culpa fore nisi cillum quid.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="{{ URL('public_template/assets/img/testimonials/testimonials-5.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section --> --}}

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">
                <div class="text-center">
                    <h3>Tertarik untuk kerjasama?</h3>
                    <p> Anda dapat berkonsultasi gratis tentang pembuatan aplikasi kapan pun dan dimana pun via whatsapp, kami akan selalu membantu anda sampai puas dan bersedia menjadi salah satu mitra dari kami</p>
                    <a class="cta-btn" href="https://api.whatsapp.com/send/?phone=6287816561610&text=Hallo+Darma+Ayu+Tekno+,+Saya+Ingin+Konsultasi+terkait+aplikasi&app_absent=0">Hubungi Kami</a>
                </div>
            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>

                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                data-bs-target="#faq-list-1">Berapa lama pembuatan aplikasi? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    Pembuatan aplikasi / website tergantung dari kompleksnya kebutuhan client, semakin kompleks modul yang dibutuhkan semakin banyak waktu yang dibutuhkan untuk menyelesaikan proyek.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">Berapa biaya pembuatan aplikasi atau website?
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Pembuatan aplikasi / website tergantung dari kompleksnya kebutuhan client, semakin kompleks modul yang dibutuhkan semakin banyak biaya yang dibutuhkan untuk menyelesaikan proyek.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">Bisa membuat aplikasi apa saja?
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Kami mampu membuat aplikasi apapun by request dari client, misalnya e-commerce, point of sales, company profile, presensi karyawan dan lain sebagainya.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">Apakah bisa membuat aplikasi mobile yang mampu berjalan pada android dan ios?
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Ya, Kami membuat aplikasi mobile dengan menggunakan teknologi flutter, hasil build flutter mampu berjalan di 2 platform yaitu android dan ios sehingga dapat menghemat waktu dan biaya pengembangan.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kontak Kami</h2>
                    <p>Kunjungi media sosial kami atau kirim pesan pada kami tentang apa yang ingin anda sampaikan</p>
                </div>

                <div>
                    <iframe
                    style="border:0; width: 100%; height: 270px;"
                        frameborder="0" allowfullscreen
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15862.355387070505!2d108.3332321!3d-6.317614!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7bbf091c82d23c99!2sDarma%20Ayu%20Tekno!5e0!3m2!1sid!2sid!4v1672575662779!5m2!1sid!2sid"></iframe>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-3">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Alamat:</h4>
                                <p>{{ $_portal_data->address }}</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Telfon / Whatsapp:</h4>
                                <p>{{ $_kontak->whatsapp }}</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>{{ $_kontak->email }}</p>
                            </div>



                        </div>

                    </div>

                    <div class="col-lg-3">
                        <div class="info">
                            <div class="email">
                                <i class="fab fa-instagram"></i>
                                <h4>Instagram:</h4>
                                <p>{{ $_kontak->instagram }}</p>
                            </div>

                            <div class="phone">
                                <i class="fab fa-tiktok"></i>
                                <h4>Tiktok:</h4>
                                <p>{{ $_kontak->tiktok }}</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row gy-2 gx-md-3">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Nama" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email" required>
                                </div>
                                <div class="form-group col-12">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Tentang" required>
                                </div>
                                <div class="form-group col-12">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Jelaskan pada kami apa yang ingin anda sampaikan" required></textarea>
                                </div>
                                <div class="my-3 col-12">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>
                                <div class="text-center col-12"><button type="submit">Send Message</button></div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->


    @push('custom-scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
@endsection
