<div class="container.admin">
    <div class="flex grid grid-cols-12 gap-4 gap-x-3">
        @livewire('parts.adminsidebar')
        <div class="col-span-10 px-3 pt-10">
            <h1 class="text-center text-3xl font-bold py-2 mb-6">Admin Subscribe</h1>
            <div class="flex justify-between">
                <input type="text" wire:model.debounce.300ms="search" placeholder="search" class="h-12 border border-primary border-2 border rounded"/>
                <div class="relative inline-flex self-center">
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
                    <select wire:model="perPage" class="text-2xl font-bold rounded border-2 border-primary text-gray-600 focus:outline-none focus:border-primary w-48">
                        @foreach($perPageOptions as $i)
                            <option>{{$i}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <table class="min-w-full table-auto mb-5">
                <thead class="justify-between">
                <tr class="bg-primary">
                    <th class="py-2 relative hover:cursor-pointer"><span class="text-white">Sl No.</span></th>
                    <th class="py-2 relative hover:cursor-pointer" ><span class="text-white">Email</span></th>
                    <th class="py-2 relative"><span class="text-white">Status</span></th>
                    <th class="py-2 relative hover:cursor-pointer"><span class="text-white">Date</span></th>
                </tr>
                </thead>
                <tbody class="">
                    @foreach($data as $i)
                        <tr class="">
                            <td class="px-1 py-1 text-center">{{ $loop->index +1}}</td>
                            <td class="px-1 py-1">{{$i->email}}</td>
                            <td class="px-1 py-1">{{$i->status}}</td>
                            <td class="px-1 py-1">{{date('d-m-Y', strtotime($i->updated_at))}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$data->links()}} 
        </div>
    </div>
</div>