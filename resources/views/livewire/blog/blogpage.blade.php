<div class="container">
    <style>
        .col-span-12:hover img{
            transform: scale(1.05);
            transition: transform 0.6s ease-out,-webkit-transform 0.6s ease-out;
        }
    </style>
    <h1 class="text-center my-3 text-xl md:text-4xl font-bold my-10">{{$heading}}</h1>
    <div class="flex grid grid-cols-12 gap-4 gap-x-3">
        @foreach($data as $i)
            <div class="col-span-12 md:col-span-4 mb-3 group">
                <div class="bg-white rounded-lg shadow-2xl overflow-hidden amitShadow">
                    <a href="/{{$i->url}}">
                        <img src="/storage/blog/{{$i->smallImg}}" alt="{{$i->title}}" class="rounded-t-lg" loading="lazy" width="300" height="160"/>
                    </a>
                    <div class="p-3">
                        <h2 class="mb-2 text-center oneliner">{{$i->title}}</h2>
                        <div class="flex sm:block lg:flex items-center justify-between sm:text-center">
                            <small class="font-bold text-xs sm:w-full sm:block sm:text-center lg:w-auto">
                                {{ \Carbon\Carbon::parse($i->updated_at)->isoFormat('Do MMM YYYY')}}
                            </small>
                            <a href="/{{$i->url}}" class="border-2 border-action relative overflow-hidden uppercase z-50 inline-block text-center px-3 py-1 font-bold text-xs rounded-lg sm:inline-block bg-action group-hover:bg-white group-hover:text-action transform transition duration-500">Read More</a> 
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>