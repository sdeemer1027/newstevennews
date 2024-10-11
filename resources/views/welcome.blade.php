<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <span style="color:#e97855;">S</span>teven.<span style="color:#e97855;">News</span>
        </h2>
    </x-slot>

    <div class="py-0">

        <!-- ======= Hero Section ======= -->
        <section id="hero">
            <div class="hero-container">
                <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel" style="height: 500px;">

                    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                    <div class="carousel-inner" role="listbox">

                        <!-- Slide 1 -->
                        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-4.jpg);">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2 class="animate__animated animate__fadeInDown">Grow YourBusiness </h2>
                                    <p class="animate__animated animate__fadeInUp">Empower Your Business with Strategic Growth Solutions. As a seasoned professional dedicated to catalyzing business success, I bring a wealth of experience and expertise to the table. <!-- My proven track record in developing and executing growth strategies has enabled numerous businesses to achieve remarkable expansion and profitability. With a keen eye for market trends, innovative problem-solving skills, and a results-driven approach, I specialize in identifying untapped opportunities, optimizing operational efficiency, and fostering strategic partnerships that fuel sustained growth. Let's collaborate to unlock your business's full potential and chart a course towards unparalleled success--></p>
                                    <div>
                                        <a href="#growingbusiness" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="carousel-item" style="background-image: url(assets/img/slide/background.jpg);">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2 class="animate__animated animate__fadeInDown">Empowering Your Vision</h2>
                                    <p class="animate__animated animate__fadeInUp">Transforming Ideas into Exceptional Websites</p>
                                    <div>
                                        <a href="#yourvision" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-5.jpg);">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2 class="animate__animated animate__fadeInDown">Unlock Your Potential with Steven.News</h2>
                                    <p class="animate__animated animate__fadeInUp">Steven.News, where your success is my priority. My range of services is designed to empower you with the tools and solutions you need to thrive in today's digital landscape. From cutting-edge web design and development to strategic digital marketing and robust back-end solutions....</p>
                                    <div>
                                        <a href="#unlockservice" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                    </a>

                    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                    </a>

                </div>
            </div>
        </section>
        <!-- End Hero -->

        <div class="w-full mx-auto px-4">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white dark:text-white">
                    <div class="container-fluid my-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="about-me">
                                    <h3>About Me</h3>
                                    <p>Brief description about yourself and your skills...</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-list">
                                    <h3>Latest Blogs</h3>
                                    <!-- Blog links will go here -->
                                    <div class="card">
                                        @foreach($blogs as $blog)
                                        <div class="card-header"><a href="{{route('blogs.show', $blog->slug)}}">{{$blog->title}}</a></div>

                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>



