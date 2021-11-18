<div class="py-12" style="background: #faf5ec" class="my-10">
    <div class="container">
        <h2 class="text-center text-xl md:text-3xl font-bold mb-2">Subscribe</h2>
        <p class="text-center text-base">Become a AB member and get 10% off on your next purchase!</p>
        <form wire:submit.prevent="submit" method="POST" class="mx-auto md:flex text-center">
            <input type="email" class="m-1 p-2 appearance-none text-gray-700 text-sm focus:outline-none w-full bg-transparent border-0 border-b-2 border-primary" placeholder="Enter your email" required wire:model="email">
            @error('name') <span class="error text-action font-bold" ...>{{ $message }}</span> @enderror
            <button class="m-1 p-2 text-sm font-semibold uppercase lg:w-auto bg-transparent border-b-2 border-primary" type="submit">subscribe</button>
        </form>
    </div>
</div>