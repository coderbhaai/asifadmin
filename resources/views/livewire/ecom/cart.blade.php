<div class="container">
    <style>
        .col-span-12:hover img{
            transform: scale(1.05);
            transition: transform 0.6s ease-out,-webkit-transform 0.6s ease-out;
        }
    </style>
    <h2 class="text-center my-3 text-xl md:text-4xl font-bold mt-10">Cart</h2>
    <p class="text-center text-base">Here's your cart</p>
    <div class="my-5">
        @if(count($cart))
            @foreach($products as $i)
                <div class="flex items-center justify-between w-full shadow mb-4 p-2">
                    <div class="flex items-center">
                        <a href="/product/{{$i->url}}" class="mr-4">
                            <img src="/storage/product/{{$i->image}}" alt="" class="w-20 p-2">
                            <p class="text-sm text-center">{{$i['name']}}</p>
                        </a>
                        <span>X {{$i->amount}} @ &#8377;{{$i->sale}}</span>
                    </div>
                    <!-- <span>{{$i->amount}} XX {{$i->sale}}</span> -->
                    <span>&#8377;{{$i->amount * $i->sale}}</span>
                    <div class="flex items-center">
                        <svg wire:click="addToCart({{$i}})"xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <svg wire:click="removeFromCart({{$i}})"xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                </div>
            @endforeach
            <h2>Total : &#8377;{{$total}}</h2>
            @else
                <h2 class="text-center">You have an empty Cart. Check out our <a href="/shop" class="text-action font-bold">Shop Page</a></h2>
        @endif
    </div>
</div>