<div class="container py-12">
    <h2 class="text-xl text-center md:text-3xl font-semibold mb-2">404 Page</h2>
    <p class="text-center mb-1">You seem to be lost my friend. You can go to <a href="{{ route('home') }}" class="bg-action px-3 py-1 rounded text-white">Home</a> or <a href="{{ route('shop') }}" class="bg-action px-3 py-1 rounded text-white">Shop</a> if you want.</p>   
    <p class="text-center">Do check our top selling products and blogs meanwhile.</p> 
    @livewire('parts.suggestcourses')
    <div class="py-12">@livewire('parts.randomproducts')</div>
    @livewire('parts.suggestblogs')
</div>