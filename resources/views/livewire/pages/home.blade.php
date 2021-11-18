<div>
    <style>
        .expertise .text{
            top: 40%;
        }
        .expertise .tint{
            background: #02003D;
            opacity: .45
        }
        .fashioncatbtn{
            top: 40%
        }
        .testis{
            background: url(images/static/testimonial-bg.jpg) no-repeat center center;
        }
        .text{
            top: 30%;
        }
        .bannertext{
            bottom: 10%;
            left: 1em;
        }
        @media (max-width:767px) {
            .imgArrows .swiper-button-next, .imgArrows .swiper-button-prev {
                width: 35px;
            }
            .imgArrows .swiper-button-prev {
                left: 0;
            }
            .imgArrows .swiper-button-next{
                right: 0
            }
        }
    </style>
    <section class="banner relative">
        <img src="/images/static/banner.jpg" alt="">
        <div class="bannertext absolute">
            <h1 class="text-white text-xl md:text-3xl font-bold">Courses & Fasion</h1>
            <p class="text-white">All you ever wanted</p>
        </div>
    </section>
    <section class="services">
        <div class="container py-10">
            <h2 class="text-center text-xl md:text-3xl font-bold mb-2">OUR SERVICES</h2>
            <p class="text-center text-base">You don't have to struggle alone, you've got our assistance and help.</p>
            <div class="flex grid grid-cols-12 gap-x-5 overflow-hidden mt-10" >
                <div class="rounded col-span-12 md:col-span-3 p-4 mb-3 md:mb-0" style="background: #2D69F0">
                    <img src="/images/icons/online-learning.svg" alt="" class="h-12 w-auto mb-5">
                    <p class="text-white text-base font-bold">5,000+</p>
                    <p class="text-white text-base font-bold">Online Courses</p>
                    <p class="text-white mt-5">Online Video Courses with new additions every month</p>
                </div>
                <div class="rounded col-span-12 md:col-span-3 p-4 mb-3 md:mb-0" style="background: #DD246E">
                    <img src="/images/icons/career.svg" alt="" class="h-12 w-auto mb-5">
                    <p class="text-white text-base font-bold">Research</p>
                    <p class="text-white text-base font-bold">and Innovation</p>
                    <p class="text-white mt-5">Expand your career opportunities</p>
                </div>
                <div class="rounded col-span-12 md:col-span-3 p-4 mb-3 md:mb-0" style="background: #8007E6">
                    <img src="/images/icons/men-suit.svg" alt="" class="h-12 w-auto mb-5">
                    <p class="text-white text-base font-bold">Clothings</p>
                    <p class="text-white text-base font-bold">and Fashion</p>
                    <p class="text-white mt-5">Wide range of trending products and fashion accessories</p>
                </div>
                <div class="rounded col-span-12 md:col-span-3 p-4 " style="background: #0CAE74">
                    <img src="/images/icons/support.svg" alt="" class="h-12 w-auto mb-5">
                    <p class="text-white text-base font-bold">Lifetime</p>
                    <p class="text-white text-base font-bold">Technical Support</p>
                    <p class="text-white mt-5">We are followed by 10,000+ members worldwide</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">@livewire('parts.suggestcourses')</div>
    <section class="expertise">
        <div class="container">
            <h2 class="text-center text-xl md:text-3xl font-bold mb-2">Our Expertise</h2>
            <p class="text-center text-base">You don't have to struggle alone, you've got our assistance and help.</p>
            <div class="flex grid grid-cols-12 gap-x-5 overflow-hidden mt-10" >
                <div class="col-span-12 md:col-span-6 relative group mb-4 md:mb-0">
                    <img src="/images/courses/1.jpg" alt="" class="rounded">
                    <div class="tint absolute left-0 right-0 h-full top-0"></div>
                    <div class="text text-center absolute left-0 right-0 z-50">
                        <h3 class="text-white md:mb-3 text-sm md:text-xl">Online Learning</h3>
                        <a href="{{ route('courses') }}" class="text-white text-center py-3 px-6 rounded-lg border-2 border-white inline-block overflow-hidden group-hover:bg-white group-hover:text-primary transition duration-300 ease-in-out">Start A Class Today</a>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-6 relative group">
                    <img src="/images/courses/1.jpg" alt="" class="rounded">
                    <div class="tint absolute left-0 right-0 h-full top-0"></div>
                    <div class="text text-center absolute left-0 right-0 z-50">
                        <h3 class="text-white md:mb-3 text-sm md:text-xl">e-Fashion</h3>
                        <a href="{{ route('shop') }}" class="text-white text-center py-3 px-6 rounded-lg border-2 border-white inline-block overflow-hidden group-hover:bg-white group-hover:text-primary transition duration-300 ease-in-out">Explore the Self</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="achieve">
        <div class="container py-10">
            <div class="flex grid grid-cols-12 gap-4 gap-x-3 overflow-hidden">
                <div class="col-span-6 md:col-span-3 mb-5">
                    <img src="/images/icons/community.svg" alt="" class="h-12 w-auto mb-5 mx-auto max-w-100">
                    <h3 class="md:text-3xl font-semibold text-center value">500</h3>
                    <p class="text-sm md:text-xl text-center md:py-3">Students Enrolled</p>
                </div>
                <div class="col-span-6 md:col-span-3 mb-5">
                    <img src="/images/icons/manual.svg" alt="" class="h-12 w-auto mb-5 mx-auto max-w-100">
                    <h3 class="md:text-3xl font-semibold text-center value">50</h3>
                    <p class="text-sm md:text-xl text-center md:py-3">Total Courses</p>
                </div>
                <div class="col-span-6 md:col-span-3 mb-5">
                    <img src="/images/icons/education-group.svg" alt="" class="h-12 w-auto mb-5 mx-auto max-w-100">
                    <h3 class="md:text-3xl font-semibold text-center value">120</h3>
                    <p class="text-sm md:text-xl text-center md:py-3">Online Learners</p>
                </div>
                <div class="col-span-6 md:col-span-3 mb-5">
                    <img src="/images/icons/user.svg" alt="" class="h-12 w-auto mb-5 mx-auto max-w-100">
                    <h3 class="md:text-3xl font-semibold text-center value">200000</h3>
                    <p class="text-sm md:text-xl text-center md:py-3">Followers</p>
                </div>
            </div>
        </div>
    </section>
    <section class="fashion imgArrows">
        <div class="container">
            <h2 class="text-xl md:text-3xl font-bold mb-2">Explore The Fashion, Explore Yourself</h2>
            <p class="text-base">Wide range of fashion apparels and clothing to soothe your day-to-day fashion</p>
        </div>
        <div class="swiper-container fashionSlider">
            <div class="swiper-wrapper">
                <div class="swiper-slide block md:flex items-center justify-around pt-10" style="background: #E5F4F7">
                    <img src="/images/models/1.png" alt="Website Development in Delhi" class="md:pr-4 max-w-400" width="380" height="380"/>
                    <div class="text">
                        <h2 class="text-xl md:text-3xl font-semibold text-center md:text-left">The Indian Casual</h2>
                        <p class="my-5 text-center md:text-left">Starts from <span class="bg-green text-white text-center p-3 rounded">Rs. 500</span></p>
                        <a href="{{ route('courses') }}" class="underline text-xl md:text-3xl font-semibold text-center md:text-left block">Explore Collection</a>
                    </div>
                </div>
                <div class="swiper-slide block md:flex items-center justify-around pt-10" style="background: #E5F4F7">
                    <img src="/images/models/2.png" alt="App Development Services" loading="lazy" class="md:pr-4 max-w-400" width="380" height="380"/>
                    <div class="text">
                        <h2 class="text-xl md:text-3xl font-semibold text-center md:text-left">The Indian Casual</h2>
                        <p class="my-5 text-center md:text-left">Starts from <span class="bg-green text-white text-center p-3 rounded">Rs. 500</span></p>
                        <a href="{{ route('courses') }}" class="underline text-xl md:text-3xl font-semibold text-center md:text-left block">Explore Collection</a>
                    </div>
                </div>
                <div class="swiper-slide block md:flex items-center justify-around pt-10" style="background: #E5F4F7">
                    <img src="/images/models/4.png" alt="Digital Marketing Services" loading="lazy" class="md:pr-4 max-w-400" width="380" height="380"/>
                    <div class="text">
                        <h2 class="text-xl md:text-3xl font-semibold text-center md:text-left">The Indian Casual</h2>
                        <p class="my-5 text-center md:text-left">Starts from <span class="bg-green text-white text-center p-3 rounded">Rs. 500</span></p>
                        <a href="{{ route('courses') }}" class="underline text-xl md:text-3xl font-semibold text-center md:text-left block">Explore Collection</a>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next pr-3"></div>
            <div class="swiper-button-prev pl-3"></div>
        </div>
    </section>
    <section class="fashioncat">
        <div class="container py-10">
            <div class="flex grid grid-cols-12 gap-x-5 overflow-hidden" >
                <div class="rounded col-span-12 md:col-span-4">
                    <div class="relative py-3 md:py-0 mb-1">
                        <img src="/images/static/fashioncat-1.jpg" alt="">
                        <a href="" class="absolute left-0 right-0 p-5 z-50 fashioncatbtn text-center bg-white w-60 mx-auto rounded">Accessories</a>
                    </div>
                    <div class="relative py-3 md:py-0">
                        <img src="/images/static/fashioncat-2.jpg" alt="">
                        <a href="" class="absolute left-0 right-0 p-5 z-50 fashioncatbtn text-center bg-white w-60 mx-auto rounded">Handbag</a>
                    </div>
                </div>
                <div class="rounded col-span-12 md:col-span-4">
                    <div class="relative py-3 md:py-0 h-full fashion3">
                        <img src="/images/static/fashioncat-6.jpg" alt="">
                        <a href="" class="absolute left-0 right-0 p-5 z-50 fashioncatbtn text-center bg-white w-60 mx-auto rounded">New Arrivals</a>
                    </div>
                </div>
                <div class="rounded col-span-12 md:col-span-4">
                    <div class="relative py-3 md:py-0 mb-1">
                        <img src="/images/static/fashioncat-4.jpg" alt="">
                        <a href="" class="absolute left-0 right-0 p-5 z-50 fashioncatbtn text-center bg-white w-60 mx-auto rounded">Sweatshirts</a>
                    </div>
                    <div class="relative py-3 md:py-0">
                        <img src="/images/static/fashioncat-5.jpg" alt="">
                        <a href="" class="absolute left-0 right-0 p-5 z-50 fashioncatbtn text-center bg-white w-60 mx-auto rounded">Footwears</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @livewire('parts.suggestproducts')
    <section class="testis imgArrows imgArrowsWhite py-12">
        <div class="container">
            <h2 class="text-white text-center text-xl md:text-3xl font-bold mb-2">Testimonials</h2>
            <p class="text-white text-center text-base">What Others Say About Us</p>
            <div class="swiper-container py-10 fashionSlider">
                <div class="swiper-wrapper">
                    @for($i=0; $i< 6; $i++)
                        <div class="swiper-slide pt-5 md:pt-10 md:px-12">
                            <p class="text-white text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque odit laborum dolorum consequatur voluptate similique amet perspiciatis quae, repudiandae ad minima quisquam obcaecati unde voluptatum provident nam veniam! Rem, omnis.</p>
                            <h2 class="text-xl text-white text-center font-bold mt-5">Lorem, ipsum.</h2>
                            <p class="text-white text-center">UX Designer</p>
                        </div>
                    @endfor
                </div>
                <div class="swiper-button-next pr-3"></div>
                <div class="swiper-button-prev pl-3"></div>
            </div>
        </div>
    </section>
    <div class="container pt-10">@livewire('parts.suggestblogs')</div>
    @livewire('parts.subscribe')
    <script src="{{ asset('/js/swiper.js') }}"></script>
    <script>
        var swiper = new Swiper(".fashionSlider", {
            loop: true,
            // autoplay: { delay: 3000 },
            grabCursor: true,
            spaceBetween: 30,
            slidesPerView: 1,
            spaceBetween: 30,
            hashNavigation: { watchState: true },
            pagination: { el: ".swiper-pagination", clickable: true },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },            
        });
        var swiper = new Swiper(".bestsellingSlider", {
            loop: true,
            // autoplay: { delay: 3000 },
            grabCursor: true,
            slidesPerView: 1,
            spaceBetween: 0,
            hashNavigation: { watchState: true },
            pagination: { el: ".swiper-pagination", clickable: true },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },            
            breakpoints: {
                768: { slidesPerView: 2, spaceBetween: 20, },
                1200: { slidesPerView: 3, spaceBetween: 20, },
            },
        });
    </script>
</div>