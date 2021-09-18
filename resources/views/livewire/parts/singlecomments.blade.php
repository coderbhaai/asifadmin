<div class="py-10">
    <style>
        .comment:before, .comment:after {
            position: absolute;
            font-size: 45px;
        }
        .comment:before {
            content: '“';
            top: 0;
            right: 100%;
        }
        .comment:after {
            content: '”';
            left: 100%;
            top: auto;
            bottom: -5px;
        }
    </style>
    <h2 class="text-center font-thin">Comments on <span class="font-bold">{{$title}}</span></h2>
    <p class="mb-5">Please keep your views respectful and not include any anchors, promotional content or obscene words in them. Such comments will be definitely removed and your IP be blocked for future purpose.</p>
    <form wire:submit.prevent="submit" method="POST">
        <div class="bg-white">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" wire:model="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Name">
                    @error('name') <span class="error" ...>{{ $message }}</span> @enderror
                </div>
                <div class="col-span-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" wire:model="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Email">
                    @error('email') <span class="error" ...>{{ $message }}</span> @enderror
                </div>
                <div class="col-span-12">
                    <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                    <textarea type="text" wire:model="comment" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-40" placeholder="Add Comment"></textarea>
                    @error('comment') <span class="error" ...>{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="overflow-hidden uppercase z-50 inline-block text-center py-3 px-12 font-bold rounded-lg bg-action text-white">Submit</button> 
            </div>
        </div>
    </form>
    <div class="antialiased mx-auto max-w-screen-sm">
        @if(count($comments)>0)
            <h3 class="text-center font-thin mt-10 mb-4 text-base font-semibold text-gray-900">Users views on <span class="font-bold">What are Core Web Vitals? Why is it Important?</span></h3>
        @endif
        <div class="space-y-4">
            @foreach($comments as $i)
                <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                    <p class="comment py-2 mb-5 relative text-sm">{{$i->comment}}</p>
                    <div class="flex justify-between">
                        <p><strong>{{$i->user}}</strong> <span class="text-xs text-gray-400">{{date('d-m-Y', strtotime($i->updated_at))}}</span></p>
                        <button wire:click="openModal({{$i->id}})">Reply</button>
                    </div>
                    @if($commentId == $i->id)
                        <form wire:submit.prevent="submit" method="POST">
                            <div class="bg-white">
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-6">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" wire:model="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Name">
                                        @error('name') <span class="error" ...>{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-6">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="text" wire:model="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Add Email">
                                        @error('email') <span class="error" ...>{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-12">
                                        <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                                        <textarea type="text" wire:model="comment" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-40" placeholder="Add Comment"></textarea>
                                        @error('comment') <span class="error" ...>{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex justify-between col-span-12">
                                        <button type="submit" class="relative overflow-hidden uppercase z-50 inline-block text-center shadow-amit amitBtn py-3 px-6 font-bold rounded-full">Submit</button>
                                        <button wire:click="closeModal()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-500 hover:bg-action focus:outline-none focus:ring-2 focus:ring-offset-2 flex-col">Cancel</button>
                                    </div> 
                                </div>
                            </div>
                        </form>
                    @endif
                    <h4 class="my-5 uppercase tracking-wide text-gray-400 font-bold text-xs">Replies</h4>
                    @foreach($response as $j)
                        <div class=" pl-10 mb-6">
                            <p class="comment py-2 mb-5 relative text-xs sm:text-sm">{{$j->comment}}</p>
                            <div class="mt-0 flex justify-between">
                                <p><strong>{{$j->user}}</strong> <span class="text-xs text-gray-400">3:34 PM</span></p>
                                <button wire:click="openModal({{$i->id}})">Reply</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>