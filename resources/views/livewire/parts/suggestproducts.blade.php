<section class="bestselling imgArrows">
    <div class="container">
        <div class="swiper-container py-10 bestsellingSlider">
            <h2 class="text-xl md:text-3xl font-bold mb-2">Best Selling Products</h2>
            <div class="swiper-wrapper">
                @foreach($data as $i)
                    <div class="swiper-slide block md:flex items-center justify-around pt-10">
                        <a href="{{$i->url}}">
                            <img src="/storage/product/{{$i->image}}" alt="Website Development in Delhi" class="md:pr-4 max-w-400" width="380" height="380"/>
                            <h2 class="text-xl text-center font-bold mt-5">{{$i->name}}</h2>
                            <p class="text-center">{{$i->sale}}</p>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next pr-3"></div>
            <div class="swiper-button-prev pl-3"></div>
        </div>
    </div>
</section>