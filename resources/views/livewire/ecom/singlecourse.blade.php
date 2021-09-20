<div class="container">
    <h1 class="text-center my-3 text-xl md:text-4xl font-bold mt-10">{{$name}}</h1>
    <div class="flex grid grid-cols-12 gap-4 gap-x-3 py-12">
        <div class="col-span-12 md:col-span-9">
            <div class="flex grid grid-cols-12 gap-4 gap-x-3 py-12">
                <div class="col-span-12 md:col-span-3">
                    <img src="/storage/course/{{$image}}" alt="" class="mb-2">
                    <div class="bg-gray-50  mt-5">
                        <button type="button" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-action w-full">Add To Cart</button>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-6">
                    {!! $shortdesc !!}
                    <p class="my-3 text-xl font-medium">Price - Rs {{$sale}}</p>
                </div>
                <div class="col-span-12">
                    {!! $longdesc !!}
                    @if(Auth::user())
                        <div>
                            <h2 class="text-xl font-bold mt-10">Share a review</h2>
                            @livewire('form.reviewform', ['type'=>"Product"])
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-3">            
            <h2 class="text-center my-3 text-xl font-bold">Similar Courses</h1>
            @foreach($similar as $i)
                <div class="bg-white mb-4 p-2 transition duration-500 ease-in-out transform hover:-translate-y-1 shadow-lg">
                    <a href="/course/{{$i->url}}" class="flex items-center flex-wrap">
                        <img src="/storage/course/{{$i->image}}" alt="" class="w-20 mr-2">
                        <h3>{{$i->name}}</h3>
                    </a>
                </div>
            @endforeach
        </div>        
    </div>
</div>