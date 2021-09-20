<div class="container.admin">
    <div class="flex grid grid-cols-12 gap-4 gap-x-3">
        @livewire('parts.adminsidebar')
        <div class="col-span-12 md:col-span-10 px-3 pt-10">
            <h1 class="text-center text-3xl font-bold py-2 mb-6">Add Course </h1>
            <form wire:submit.prevent="submit" method="POST">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" wire:model="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Title" required>
                        @error('name') <span class="error" ...>{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-6">
                        <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                        <input type="text" wire:model="url" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add URL" required>
                        @error('url') <span class="error" ...>{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-6">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" wire:model="image" required>
                        @error('image') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-6">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" wire:model="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Price" required>
                        @error('price') <span class="error" ...>{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-6">
                        <label for="sale" class="block text-sm font-medium text-gray-700">Sale Price</label>
                        <input type="number" wire:model="sale" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Sale Price" required>
                        @error('sale') <span class="error" ...>{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-12">
                        <label for="title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                        <input type="text" wire:model="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Title" required>
                        @error('title') <span class="error" ...>{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-12">
                        <label for="description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                        <input type="text" wire:model="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Description" required/>
                        @error('description') <span class="error" ...>{{ $message }}</span> @enderror
                    </div>                        
                    <div wire:ignore class="col-span-12">
                        <label for="shortdesc" class="block text-sm font-medium text-gray-700">Short Description</label>
                        <textarea wire:model="shortdesc" class="form-control required" name="shortdesc" id="shortdesc" required></textarea>
                    </div>
                    <div wire:ignore class="col-span-12">
                        <label for="longdesc" class="block text-sm font-medium text-gray-700">Long Description</label>
                        <textarea wire:model="longdesc" class="form-control required" name="longdesc" id="longdesc" required></textarea>
                    </div>
                </div>
                <div class="bg-gray-50 text-right mt-5">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        const editor = CKEDITOR.replace('shortdesc'); editor.on('change', function(event){ @this.set('shortdesc', event.editor.getData()); });
        const editor2 = CKEDITOR.replace('longdesc'); editor2.on('change', function(event){ @this.set('longdesc', event.editor.getData()); });
    </script>
</div>