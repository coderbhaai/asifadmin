<div class="suggestBlogs">
    <style>
        .suggestBlogs .oneliner{
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-box-orient: vertical;
            display: -webkit-box;
            -webkit-line-clamp: 1;
        }
        .suggestBlogs .col-span-12:hover img{
            transform: scale(1.05);
            transition: transform 0.6s ease-out,-webkit-transform 0.6s ease-out;
        }
    </style>
    <h3 class="text-center text-xl font-bold mb-5">RECENT POSTS</h3>
    <h4 class="text-center text-base md:text-xl font-bold mb-2 md:mb-10">Secrets of our Work Revealed in Blogs</h4>
    <div class="flex grid grid-cols-12 gap-4 gap-x-5">
        @foreach($data as $i)
            <div class="col-span-12 md:col-span-4 mb-3 amitBtnGroup">
                <div class="bg-white rounded-lg shadow-2xl overflow-hidden amitShadow">
                    <a href="/{{$i->url}}">
                        <img src="/storage/blog/{{$i->smallImg}}" alt="{{$i->title}}" class="rounded-t-lg" loading="lazy" width="400" height="220"/>
                    </a>
                    <div class="p-3">
                        <h2 class="font-bold mb-2 text-center oneliner">{{$i->title}}</h2>
                        <div class="flex sm:block lg:flex items-center justify-between pt-5 sm:text-center">
                            <small class="font-bold text-xs sm:w-full sm:block sm:text-center lg:w-auto">
                                {{ \Carbon\Carbon::parse($i->created_at)->isoFormat('Do MMM YYYY')}}
                            </small>
                            <a href="/{{$i->url}}" class="relative overflow-hidden uppercase z-50 inline-block text-center shadow-amit amitBtn px-3 py-1 font-bold text-xs rounded-full sm:inline-block">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="amitBtnGroup text-center my-5">
        <a href="/blog" class="relative overflow-hidden uppercase z-50 inline-block text-center shadow-amit amitBtn py-3 px-12 font-bold rounded-full">Read All Blogs</a>
    </div>
</div>