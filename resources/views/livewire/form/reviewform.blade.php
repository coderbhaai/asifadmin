<form wire:submit.prevent="submit" method="POST" class="py-5">
    <label for="message" class="font-bold block text-sm font-medium text-gray-700">Give Stars</label>
    <div class="flex items-center mt-2 mb-4">
        <svg class="{{ $star >= 1 ? 'text-action' : 'text-gray-400' }} cursor-pointer mr-3 mx-1 w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" wire:click="stars(1)"/></svg>
        <svg class="{{ $star >= 2 ? 'text-action' : 'text-gray-400' }} cursor-pointer mr-3 mx-1 w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" wire:click="stars(2)"/></svg>
        <svg class="{{ $star >= 3 ? 'text-action' : 'text-gray-400' }} cursor-pointer mr-3 mx-1 w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" wire:click="stars(3)"/></svg>
        <svg class="{{ $star >= 4 ? 'text-action' : 'text-gray-400' }} cursor-pointer mr-3 mx-1 w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" wire:click="stars(4)"/></svg>
        <svg class="{{ $star >= 5 ? 'text-action' : 'text-gray-400' }} cursor-pointer mr-3 mx-1 w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" wire:click="stars(5)"/></svg>
    </div>
    <div class="mb-3">
        <label for="message" class="font-bold block text-sm font-medium text-gray-700">Review</label>
        <textarea type="text" wire:model="review" class="h-40 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Your Views" required></textarea>
        @error('review') <span class="error text-action font-bold" ...>{{ $message }}</span> @enderror
    </div>
    <input wire:model="description" class="hidden" value="{{$type}}"/>
    {{ $type }}
    <div class="text-center mt-5">
        <button type="submit" class="relative overflow-hidden uppercase z-50 inline-block text-center shadow-amit amitBtn py-3 px-12 font-bold rounded-full">Submit</button>
    </div>
</form>