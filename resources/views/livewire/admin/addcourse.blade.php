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
                    <div class="col-span-12">
                        <button type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mb-10" wire:click="addVideo()">Add Videos</button>
                        @for ($i = 0; $i < count($videos); $i++)
                            <div class="grid grid-cols-12 gap-6 mb-2">
                                <div class="col-span-8">
                                    <label class="block text-sm font-medium text-gray-700">Video URL</label>
                                    <input type="text" wire:model="videos.{{$i}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Video URL" required>
                                    @error('videos.{{$i}}') <span class="error" ...>{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">Remove</label>
                                    <button type="button" wire:click="removeVideo({{$i}})"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-2 cursor-pointer" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg></button>
                                </div>
                            </div>
                        @endfor
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