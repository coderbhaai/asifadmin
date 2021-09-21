<div class="container">


    <style>
        .col-span-12:hover img{
            transform: scale(1.05);
            transition: transform 0.6s ease-out,-webkit-transform 0.6s ease-out;
        }
    </style>
    <h2 class="text-center my-3 text-xl md:text-4xl font-bold mt-10">SHOP</h2>
    <p class="text-center text-base">Shop all you want</p>
    <div class="flex grid grid-cols-12 gap-4 gap-x-3 mt-10">
        @foreach($cart as $i)
            <p>{{$i[0]}} - {{$i[1]}}</p>

        @endforeach
        @foreach($data as $i)
            <div class="col-span-12 md:col-span-4 mb-3 group">
                <div class="bg-white rounded-lg shadow-2xl overflow-hidden amitShadow">
                    <a href="/product/{{$i->url}}">
                        <img src="/storage/product/{{$i->image}}" alt="{{$i->name}}" class="rounded-t-lg" loading="lazy" width="300" height="160"/>
                    </a>
                    <div class="p-3">
                        <h2 class="mb-2 text-center oneliner">{{$i->name}}</h2>
                        <div class="flex sm:block md:flex items-center justify-between sm:text-center">
                            <div class="flex sm:block md:flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg wire:click="addToCart({{$i}})"xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <svg wire:click="removeFromCart({{$i}})"xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </div>
                            </div>
                            <small class="font-bold text-xs sm:w-full sm:block sm:text-center lg:w-auto">&#8377;{{$i->sale}}</small>
                            <a href="/product/{{$i->url}}" class="border-2 border-action relative overflow-hidden uppercase inline-block text-center text-white px-3 py-1 text-xs rounded-lg sm:inline-block bg-action group-hover:bg-white group-hover:text-action transform transition duration-500">Read More</a> 
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>