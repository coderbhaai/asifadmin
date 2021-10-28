<form wire:submit.prevent="submit" method="POST" class="py-5">
    <div class="mb-3">
        <label for="name" class="font-bold block text-sm font-medium text-gray-700">Name</label>
        <input type="text" wire:model="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Name">
        @error('name') <span class="error text-action font-bold" ...>{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="font-bold block text-sm font-medium text-gray-700">Email</label>
        <input type="text" wire:model="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Email">
        @error('email') <span class="error text-action font-bold" ...>{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label for="phone" class="font-bold block text-sm font-medium text-gray-700">Phone</label>
        <input type="text" wire:model="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Phone">
        @error('phone') <span class="error text-action font-bold" ...>{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label for="message" class="font-bold block text-sm font-medium text-gray-700">Message</label>
        <textarea type="text" wire:model="message" class="h-40 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Message"></textarea>
        @error('message') <span class="error text-action font-bold" ...>{{ $message }}</span> @enderror
    </div>
    <div class="text-center mt-12 amitBtnGroup">
        <button type="submit" class="inline-block text-center text-white py-3 px-6 rounded-full bg-green">Submit</button>
    </div>
</form>
@if(session('message'))
    <style>.sweetalert{ bottom: 40%; }</style>
    <div class="sweetalert z-50 flex items-center justify-end gap-4 bg-action p-4 rounded-l-lg fixed right-0 shadow">
        <div class="space-y-1 text-sm">
            <h6 class="font-medium text-white">Message</h6>
            <p class="leading-tight text-white">{{ session('message') }}</p>
        </div>
    </div>
    <script>$(document).ready(function(){ $(".sweetalert").delay(2000).slideUp(300); });</script>
@endif