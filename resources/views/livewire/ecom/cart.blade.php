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
        @if( !count($products) && !count($courses) )
            <h2 class="text-center">You have an empty Cart. Check out our <a href="/shop" class="text-action font-bold">Shop Page</a></h2>
        @else
            @if( count($courses) )
                <h2 class="text-xl font-semibold mb-3">Your Courses</h2>
                @foreach($courses as $i)
                    <div class="md:flex items-center justify-between shadow mb-3 w-full p-2">
                        <div class="flex items-center justify-between md:w-full md:mr-4">
                            <a href="/course/{{$i->url}}" class="mr-4">
                                <img src="/storage/course/{{$i->image}}" alt="" class="w-20 p-2">
                                <p class="text-sm text-center">{{$i['name']}}</p>
                            </a>
                            <span class="mr-4">@ &#8377;{{$i->sale}}</span>
                        </div>
                        <span>&#8377;{{$i->sale}}</span>
                    </div>
                @endforeach
            @endif

            @if( count($courses) )
                <h2 class="text-xl font-semibold mb-3 mt-5">Your Products</h2>
                @foreach($products as $i)
                    <div class="md:flex items-center justify-between shadow mb-3 w-full p-2">
                        <div class="flex items-center justify-between md:w-full md:mr-4">
                            <a href="/product/{{$i->url}}" class="mr-4">
                                <img src="/storage/product/{{$i->image}}" alt="" class="w-20 p-2">
                                <p class="text-sm text-center">{{$i['name']}}</p>
                            </a>
                            <span class="mr-4">X {{$i->amount}} @ &#8377;{{$i->sale}}</span>
                        </div>
                        <div class="flex items-center">
                            <span>&#8377;{{$i->amount * $i->sale}}</span>
                            <div class="flex items-center">
                                <svg wire:click="addToCart({{$i}})" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <svg wire:click="removeFromCart({{$i}})" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <h2>Total : &#8377;{{ (int) $total}}</h2>

            @if(!Auth::user())
                <div class="text-center mt-12 group">
                    <button class="relative overflow-hidden uppercase z-50 inline-block text-center text-white py-3 px-6 rounded-full bg-green" wire:click="notLoggedIn()">Login to continue</button>
                </div>
            @else
                <h2 class="text-center my-3 text-xl md:text-2xl font-bold mt-10">Your Details</h2>
                <form wire:submit.prevent="submit" method="POST">
                    <div class="grid grid-cols-12 gap-1 md:gap-6 mb-10">
                        <div class="col-span-12 md:col-span-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" wire:model="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Name" required>
                            @error('name') <span class="error" ...>{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" wire:model="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Email" required>
                            @error('email') <span class="error" ...>{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="tel" wire:model="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Phone" required>
                            @error('phone') <span class="error" ...>{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-4">
                            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                            <input type="text" wire:model="country" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Country" required>
                            @error('country') <span class="error" ...>{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-4">
                            <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                            <input type="text" wire:model="state" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add State" required>
                            @error('state') <span class="error" ...>{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-4">
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" wire:model="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add City" required>
                            @error('city') <span class="error" ...>{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" wire:model="address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Address" required>
                            @error('address') <span class="error" ...>{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 md:col-span-4">
                            <label for="pin" class="block text-sm font-medium text-gray-700">PIN</label>
                            <input type="text" wire:model="pin" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add PIN" required>
                            @error('pin') <span class="error" ...>{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 text-center mt-12 group">
                            <button type="submit" class="relative overflow-hidden uppercase z-50 inline-block text-center text-white py-3 px-6 rounded-full bg-green">Continue to Check out</button>
                        </div>
                    </div>
                </form>
            @endif
        @endif
    </div>
</div> 