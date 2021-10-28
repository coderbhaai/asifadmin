<div>
    <h3 class="text-center text-xl md:text-3xl font-bold mb-5">BEST SELLING PRODUCTS</h3>
    <h4 class="text-center text-base md:text-xl font-bold mb-2 md:mb-10">Some of our hot selling products</h4>
    <div class="flex grid grid-cols-12 gap-4 gap-x-5">
        @foreach($data as $i)
            @livewire('parts.singleproductitem', ["item" => $i])
        @endforeach
    </div>
    <div class="text-center my-5">
        <a href="{{ route('shop') }}" class="inline-block text-center text-white py-3 px-6 rounded-full bg-green">Check More Products</a>
    </div>
</div>