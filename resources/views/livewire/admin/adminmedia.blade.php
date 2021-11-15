<div class="container.admin mb-10">
    <div class="flex grid grid-cols-12 gap-4 gap-x-3">
        @livewire('parts.adminsidebar')
        <div class="col-span-12 md:col-span-10 px-3 md:pt-10">
            <h1 class="text-center text-3xl font-bold py-2 mb-6">Admin Media </h1>
            <div class="md:flex justify-between mb-2 md:mb-0">
                <button wire:click="openModal()" class="w-full md:w-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Add Media</button>
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
                    <th class="py-2 relative hover:cursor-pointer"><span class="text-white">Media</span> @include('partials.sorticon', ['field'=>'url']) </th>
                    <th class="py-2 relative hover:cursor-pointer" wire:click="sortBy('updated_at')"><span class="text-white">Date</span> @include('partials.sorticon', ['field'=>'updated_at'])</th>
                    <!-- <th class="py-2 relative hover:cursor-pointer"><span class="text-white">Copy</span></th> -->
                </tr>
                </thead>
                <tbody class="">
                        @foreach($data as $i)
                            <tr class="">
                                <td class="px-1 py-1 text-center">{{ $loop->index +1}}</td>
                                <td class="text-center px-1 py-1"><img src="/storage/media/{{$i->name}}" class="w-32 mx-auto"/><br/>https://www.aminaboutique.in/storage/media/{{$i->name}}</td>
                                <td class="px-1 py-1">{{date('d-m-Y', strtotime($i->updated_at))}}</td>
                                <!-- <td class="px-1 py-1">/storage/media/{{$i->name}}
                                    <button class="bg-indigo-500 text-white px-4 py-1 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black" data="xxxx" onclick="CopyToClipboard('/storage/media/{{$i->name}}')">/storage/media/{{$i->name}}</button>
                                </td> -->
                            </tr>
                        @endforeach
                </tbody>
            </table>
            {{$data->links()}}
        </div>
        @if($isOpen)
            <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div class="relative sm:w-3/4 mx-2 sm:mx-auto my-10 opacity-100">
                    <div class="relative bg-white shadow-lg rounded-md text-gray-900 z-20 p-4"
                    x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
                        <header class="flex items-center justify-between p-2">
                            <h2 class="font-semibold">Add Media Here</h2>
                            <button class="focus:outline-none p-2" wire:click="closeModal()"><svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path></svg></button>
                        </header>
                        <main class="p-2">
                            <form wire:submit.prevent="submit" method="POST">
                                <div class="bg-white">
                                    <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-6">
                                        <label for="url" class="block text-sm font-medium text-gray-700">Media</label>
                                        <input type="file" wire:model="cover_img" required>
                                        @error('cover_img') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    </div> 
                                </div>
                                <div class="bg-gray-50 text-right mt-5">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                                </div>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <script>
        function CopyToClipboard(text) {
            console.log(`e.target.data`, e.target.data)
            var $temp = $("<input value='text'>");
            $("body").append($temp);
// console.log(`$temp.val.select()`, $temp.val.select())
            // $temp.val($(element).text()).select();
            document.execCommand("copy");
        }
    </script>
</div>