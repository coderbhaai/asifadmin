<div class="container">
    <style>
        .col-span-12:hover img{
            transform: scale(1.05);
            transition: transform 0.6s ease-out,-webkit-transform 0.6s ease-out;
        }
    </style>
    <h2 class="text-center my-3 text-xl md:text-4xl font-bold mt-10">Our Courses</h2>
    <p class="text-center text-base">Find thew right course for you</p>
    <div class="flex grid grid-cols-12 gap-4 gap-x-3 mt-10">
        @foreach($data as $i)
            <div class="col-span-12 md:col-span-4 mb-3 group">
                <div class="bg-white rounded-lg shadow-2xl overflow-hidden amitShadow">
                    <a href="/course/{{$i->url}}">
                        <img src="/storage/course/{{$i->image}}" alt="{{$i->name}}" class="rounded-t-lg" loading="lazy" width="300" height="160"/>
                    </a>
                    <div class="p-3">
                        <h2 class="mb-2 text-center oneliner">{{$i->name}}</h2>
                        <div class="flex sm:block lg:flex items-center justify-between sm:text-center">
                            <small class="font-bold text-xs sm:w-full sm:block sm:text-center lg:w-auto">&#8377;{{$i->sale}}</small>
                            <a href="/course/{{$i->url}}" class="border-2 border-action relative overflow-hidden uppercase z-50 inline-block text-center text-white px-3 py-1 text-xs rounded-lg sm:inline-block bg-action group-hover:bg-white group-hover:text-action transform transition duration-500">Read More</a> 
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>