<div class="container">
    <style>
        .col-span-12:hover img{
            transform: scale(1.05);
            transition: transform 0.6s ease-out,-webkit-transform 0.6s ease-out;
        }
    </style>
    <h2 class="text-center my-3 text-xl md:text-4xl font-bold mt-10">{{$title}}</h2>
    <p class="text-center text-base">Shop all you want</p>
    <div class="flex grid grid-cols-12 gap-4 gap-x-3 mt-10">
        <div class="col-span-12 md:col-span-9">
            <div class="flex grid grid-cols-12 gap-4 gap-x-3 mt-10">
                @foreach($data as $i)
                    @livewire('parts.singleproductitem', ["item" => $i])
                @endforeach
            </div>
        </div>
        <div class="col-span-12 md:col-span-3">
            @livewire('parts.productsidebar')
        </div>
    </div>
</div>