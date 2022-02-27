<div class="container">
    <h1 class="text-center my-3 text-xl md:text-4xl font-bold mt-10">{{$name}}</h1>
    <div class="flex grid grid-cols-12 gap-4 gap-x-3 py-12">
        <div class="col-span-12 md:col-span-9">
            <div class="flex grid grid-cols-12 gap-4 gap-x-3 py-12">
                <div class="col-span-12 md:col-span-5">
                    <div class="flex items-center flex-wrap">
                        <img src="/storage/product/{{$activeImage}}" alt="" class="mb-2">
                        @foreach($images as $i)
                        <img src="/storage/product/{{$i}}" alt="" class="w-20 mr-2 hover:cursor-pointer" wire:click="activeImage({{ $loop->index}})">
                        @endforeach
                    </div>
                    <div class="bg-gray-50  mt-5">
                        <button wire:click="addToCart()" type="button" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-action w-full">Add To Cart</button> 
                    </div>
                </div>
                <div class="col-span-12 md:col-span-7">
                    {!! $shortdesc !!}
                    <p class="my-3 text-xl font-medium">Price - 
                    @if((int)$price > (int)$sale)<del>&#8377;{{$price}}</del>@endif
                    &#8377;{{$sale}}</p>
                </div>
                <div class="col-span-12">
                    {!! $longdesc !!}
                    @if(Auth::user())
                        <div>
                            <h2 class="text-xl font-bold mt-10">Share a review</h2>
                            @livewire('form.reviewform', ['type'=>"Product", 'courseid'=>$pid])
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-3">
            @livewire('parts.productsidebar', ['similar'=> $similar])
        </div>
    </div>

    
</div>