<div class="container.admin">
    <div class="flex grid grid-cols-12 gap-4 gap-x-3">
        @livewire('parts.adminsidebar')
        <div class="col-span-12 md:col-span-10 px-3 md:pt-10">
            <h1 class="text-center text-3xl font-bold py-2 mb-6">Admin Products</h1>
            <div class="md:flex justify-between mb-2 md:mb-0">
                <a href="{{ route('addblog') }}" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Add Product</a>
                <div class="row">
                    <input type="text" wire:model.debounce.300ms="search" placeholder="search" class="h-12 border border-primary border-2 border rounded w-full md:w-auto mb-2 md:mb-0"/>
                    <div class="relative inline-flex self-center w-full md:w-auto">
                        <svg class="text-white bg-primary absolute top-0 right-0 m-2 pointer-events-none p-2 rounded" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px" viewBox="0 0 38 22" version="1.1">
                            <title>F09B337F-81F6-41AC-8924-EC55BA135736</title>
                            <g id="ZahnhelferDE—Design" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="ZahnhelferDE–Icon&amp;Asset-Download" transform="translate(-539.000000, -199.000000)" fill="#ffffff" fill-rule="nonzero">
                                    <g id="Icon-/-ArrowRight-Copy-2" transform="translate(538.000000, 183.521208)">
                                        <polygon id="Path-Copy" transform="translate(20.000000, 18.384776) rotate(135.000000) translate(-20.000000, -18.384776) " points="33 5.38477631 33 31.3847763 29 31.3847763 28.999 9.38379168 7 9.38477631 7 5.38477631"/>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <select wire:model="perPage" class="text-2xl font-bold rounded border-2 border-primary text-gray-600 focus:outline-none focus:border-primary w-full md:w-48">
                            @foreach($perPageOptions as $i)
                                <option>{{$i}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <table class="min-w-full table-auto mb-5">
                <thead class="justify-between">
                <tr class="bg-primary">
                    <th class="py-2 relative hover:cursor-pointer" wire:click="sortBy('id')"><span class="text-white">Sl No.</span> @include('partials.sorticon', ['field'=>'id'])</th>
                    <th class="py-2 relative hover:cursor-pointer" wire:click="sortBy('title')"><span class="text-white">Blog</span> @include('partials.sorticon', ['field'=>'title'])</th>
                    <th class="py-2 relative"><span class="text-white">Image</span></th>
                    <th class="py-2 relative"><span class="text-white">Category</span></th>
                    <th class="py-2 relative"><span class="text-white">Tag</span></th>
                    <th class="py-2 relative hover:cursor-pointer" wire:click="sortBy('updated_at')"><span class="text-white">Date</span> @include('partials.sorticon', ['field'=>'updated_at'])</th>
                    <th class="py-2"><span class="text-white">Action</span></th>
                </tr>
                </thead>
                <tbody class="">
                    @foreach($data as $i)
                        <tr class="">
                            <td class="px-1 py-1 text-center">{{ $loop->index +1}}</td>
                            <td class="px-1 py-1"><a href="/blog/{{$i->url}}" target="_blank">{{$i->title}}</a></td>
                            <td class="px-1 py-1"><img src="/storage/blog/{{$i->smallImg}}" class="w-32"/></td>
                            <td class="px-1 py-1">{{$i->category}}</td>
                            <td class="px-1 py-1">{{$i->tag}}</td>
                            <td class="px-1 py-1">{{date('d-m-Y', strtotime($i->updated_at))}}</td>
                            <td class="px-1 py-1">
                                <a class="bg-indigo-500 text-white px-4 py-1 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black" href="/admin/updateblog/{{$i->id}}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$data->links()}}
        </div>
    </div>
</div>