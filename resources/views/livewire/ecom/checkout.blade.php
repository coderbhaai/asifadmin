<div class="container">
    <h2 class="text-center my-3 text-xl md:text-4xl font-bold mt-10">Cart</h2>
    <p class="text-center text-base">Here's your cart</p>
    <div class="my-5">
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
                    <span>&#8377;{{$i->amount * $i->sale}}</span>
                </div>
            @endforeach
        @endif

        <h2>Total : &#8377;{{ (int) $total}}</h2>
        <h2 class="text-center my-3 text-xl md:text-2xl font-bold mt-10">Your Details</h2>
        <div class="grid grid-cols-12 gap-1 md:gap-6 mb-10">
            <div class="col-span-12 md:col-span-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" wire:model="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                @error('name') <span class="error" ...>{{ $message }}</span> @enderror
            </div>
            <div class="col-span-12 md:col-span-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" wire:model="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                @error('email') <span class="error" ...>{{ $message }}</span> @enderror
            </div>
            <div class="col-span-12 md:col-span-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" wire:model="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                @error('phone') <span class="error" ...>{{ $message }}</span> @enderror
            </div>
            <div class="col-span-12 md:col-span-4">
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <input type="text" wire:model="country" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                @error('country') <span class="error" ...>{{ $message }}</span> @enderror
            </div>
            <div class="col-span-12 md:col-span-4">
                <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                <input type="text" wire:model="state" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                @error('state') <span class="error" ...>{{ $message }}</span> @enderror
            </div>
            <div class="col-span-12 md:col-span-4">
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <input type="text" wire:model="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                @error('city') <span class="error" ...>{{ $message }}</span> @enderror
            </div>
            <div class="col-span-12 md:col-span-6">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" wire:model="address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                @error('address') <span class="error" ...>{{ $message }}</span> @enderror
            </div>
            <div class="col-span-12 md:col-span-4">
                <label for="pin" class="block text-sm font-medium text-gray-700">PIN</label>
                <input type="text" wire:model="pin" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                @error('pin') <span class="error" ...>{{ $message }}</span> @enderror
            </div>
            <div class="col-span-12 flex items-center">
                <button id="rzp-button1" class="relative overflow-hidden uppercase z-50 inline-block text-center text-white py-3 px-6 rounded-full bg-green">Pay Now</span></button>
            </div>
        </div>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            document.getElementById('rzp-button1').onclick = function(e){
                console.log('Clicked')
                var options = {
                    "key": "{{ env('RAZORPAY_KEY') }}", // Enter the Key ID generated from the Dashboard
                    "amount": "{{ $total*100 }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                    "currency": "INR",
                    "name": "Amina Boutique",
                    "description": "Test Transaction",
                    "image": "https://aminaboutique.in/images/logo.png",
                    "order_id": "{{ $orderId }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                    "callback_url": "{{ env('RAZORPAY_ROUTE') }}",
                    "state": "{{ csrf_token() }}",
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    "prefill": {
                        "name": "{{ $name }}",
                        "email": "{{ $email }}",
                        "contact": "{{ $phone }}"
                    },
                    "notes": {
                        "name": "{{ $name }}",
                        "email": "{{ $email }}",
                        "phone": "{{ $phone }}",
                        "country": "{{ $country }}",
                        "state": "{{ $state }}",
                        "city": "{{ $city }}",
                        "address": "{{ $address }}",
                        "pin": "{{ $pin }}",
                    },
                    "theme": {
                        "color": "#f19f40"
                    }
                };

                console.log(`options`, options)
                var rzp1 = new Razorpay(options);
                rzp1.open();
                e.preventDefault();
            }
        </script>
    </div>
</div> 