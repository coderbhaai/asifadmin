<section class="courses">
    <div class="container py-10">
        <h2 class="text-xl md:text-3xl font-bold mb-2">Find The Right Online Course For You</h2>
        <p class="text-base">You don't have to struggle alone, you've got our assistance and help.</p>
        <div class="flex grid grid-cols-12 gap-x-5 overflow-hidden mt-10" >
            @foreach($data as $i)
                <div class="rounded col-span-12 md:col-span-4 p-4 mb-5">
                    <a href="/course/{{$i->url}}">
                        <img src="/storage/course/{{$i->image}}" alt=""/>
                        <div class="flex items-center justify-between">
                            <p>{{$i->videoCount}} Lessons</p>
                            <p>{{$i->rate[0]}} ({{$i->rate[1]}})</p>
                        </div>
                        <h2 class="text-xl font-bold my-1">{{$i->name}}</h2>
                        <div class="flex items-center justify-between">
                            <p>{{$i->sale}}</p>
                            <p>Know Details</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-12 group">
            <a href="" class="relative overflow-hidden uppercase z-50 inline-block text-center text-white py-3 px-6 rounded-full bg-green">Explore</a>
        </div>
    </div>
</section>