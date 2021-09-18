<div class="container.admin">
    <link rel="stylesheet" href="{{ asset('/css/select2.css') }}">
    <div class="flex grid grid-cols-12 gap-4 gap-x-3">
        @livewire('parts.adminsidebar')
        <div class="col-span-12 md:col-span-10 px-3 pt-10">
            <h1 class="text-center text-3xl font-bold py-2 mb-6">Add Blog </h1>
            <form wire:submit.prevent="submit" method="POST">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" wire:model="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Title">
                        @error('name') <span class="error" ...>{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-6">
                        <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                        <input type="text" wire:model="url" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add URL">
                        @error('url') <span class="error" ...>{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-6">
                        <label for="url" class="block text-sm font-medium text-gray-700">Cover Image</label>
                        <input type="file" wire:model="cover_img">
                        @error('cover_img') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-6">
                        <label for="url" class="block text-sm font-medium text-gray-700">Small Image</label>
                        <input type="file" wire:model="smallImg">
                        @error('smallImg') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div wire:ignore class="col-span-6">
                        <label for="catSelected" class="block text-sm font-medium text-gray-700">Category</label>
                        <select class="w-full form-control" wire:model="catSelected" id="selectCat" multiple>
                            @foreach($catOptions as  $i)
                                <option value="{{$i->id}}">{{ $i->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div wire:ignore class="col-span-6">
                        <label for="tagSelected" class="block text-sm font-medium text-gray-700">Tags</label>
                        <select id='selectTag' wire:model="tagSelected" multiple class="w-full">
                            @foreach($tagOptions as  $i)
                                <option value="{{$i->id}}">{{ $i->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12">
                        <label for="title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                        <input type="text" wire:model="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Title">
                        @error('title') <span class="error" ...>{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-12">
                        <label for="description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                        <input type="text" wire:model="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Description"/>
                        @error('description') <span class="error" ...>{{ $message }}</span> @enderror
                    </div>                        
                    <div wire:ignore class="col-span-12">
                        <label for="content" class="block text-sm font-medium text-gray-700">Blog Content</label>
                        <textarea wire:model="content" class="form-control required" name="content" id="content"></textarea>
                    </div>
                </div>
                <div class="bg-gray-50 text-right mt-5">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{asset('/js/jquery-3.1.0.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset('/js/select2.js')}}"></script>
    <script>
        const editor = CKEDITOR.replace('content');
        editor.on('change', function(event){ @this.set('content', event.editor.getData()); });
        $(document).ready(function() { 
            $('#selectCat').select2({
                placeholder: "Select Categories",
                allowClear: true
            }).on('change', function (e) {
                var data = $('#selectCat').select2("val");
                @this.set('catSelected', data);
            });
            $('#selectTag').select2({
                placeholder: "Select Tags",
                allowClear: true
            }).on('change', function (e) {
                var data = $('#selectTag').select2("val");
                @this.set('tagSelected', data);
            });
        });
    </script>
</div>