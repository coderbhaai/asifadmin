<div class="container.admin">
    <link rel="stylesheet" href="{{ asset('/css/select2.css') }}">
    <div class="flex grid grid-cols-12 gap-4 gap-x-3">
        @livewire('parts.adminsidebar')
        <div class="col-span-12 md:col-span-10 px-3 pt-10">
            <h1 class="text-center text-3xl font-bold py-2 mb-6">Update Product </h1>
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
                        <label for="images" class="block text-sm font-medium text-gray-700">Images</label>
                        <input type="file" wire:model="images" multiple>
                        @if($oldimages)
                            <div class="flex items-center flex-wrap mt-2">
                                @foreach($oldimages as $i)<img src="/storage/product/{{$i}}" alt="" class="w-20 p-1"/>@endforeach
                            </div>
                        @endif
                        @error('images') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div wire:ignore class="col-span-6">
                        <label for="typeSelected" class="block text-sm font-medium text-gray-700">Type of Product</label>
                        <select class="w-full form-control" wire:model="typeSelected" id="selectType" required>
                            <option value="">Select Type</option>
                            @foreach($typeOptions as  $i)
                                <option value="{{$i->id}}">{{ $i->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div wire:ignore class="col-span-6">
                        <label for="catSelected" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id='selectCat' wire:model="catSelected" multiple class="w-full" required>
                            @foreach($catOptions as  $i)
                                <option value="{{$i->id}}">{{ $i->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div wire:ignore class="col-span-6">
                        <label for="tagSelected" class="block text-sm font-medium text-gray-700">Tags</label>
                        <select id='selectTag' wire:model="tagSelected" multiple class="w-full" required>
                            @foreach($tagOptions as  $i)
                                <option value="{{$i->id}}">{{ $i->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-4">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" wire:model="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Price" required>
                        @error('price') <span class="error" ...>{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-4">
                        <label for="sale" class="block text-sm font-medium text-gray-700">Sale Price</label>
                        <input type="number" wire:model="sale" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Sale Price" required>
                        @error('sale') <span class="error" ...>{{ $message }}</span> @enderror
                    </div>
                    <div wire:ignore class="col-span-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select class="w-full form-control" wire:model="status" required>
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                        </select>
                    </div>
                    <div class="col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                        <input type="text" wire:model="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Title" required/>
                        @error('title') <span class="error" ...>{{ $message }}</span> @enderror
                        <label for="description" class="block text-sm font-medium text-gray-700 mt-5">Meta Description</label>
                        <input type="text" wire:model="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Description" required/>
                        @error('description') <span class="error" ...>{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-6">
                        <label for="additional" class="block text-sm font-medium text-gray-700">Additional Information</label>
                        <textarea wire:model="additional" class="w-full focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-40"></textarea>
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
    <script src="{{asset('/js/jquery-3.1.0.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset('/js/select2.js')}}"></script>
    <script>
        const editor = CKEDITOR.replace('shortdesc'); editor.on('change', function(event){ @this.set('shortdesc', event.editor.getData()); });
        const editor2 = CKEDITOR.replace('longdesc'); editor2.on('change', function(event){ @this.set('longdesc', event.editor.getData()); });
        $(document).ready(function() { 
            $('#selectType').select2({ placeholder: "Select Type", allowClear: true }).on('change', function (e) {
                var data = $('#selectType').select2("val"); @this.set('typeSelected', data);
            });
            $('#selectCat').select2({ placeholder: "Select Categories", allowClear: true }).on('change', function (e) {
                var data = $('#selectCat').select2("val"); @this.set('catSelected', data);
            });
            $('#selectTag').select2({ placeholder: "Select Tags", allowClear: true }).on('change', function (e) {
                var data = $('#selectTag').select2("val"); @this.set('tagSelected', data);
            });
        });
    </script>
</div>