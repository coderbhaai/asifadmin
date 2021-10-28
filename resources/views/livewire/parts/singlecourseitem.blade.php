<div class="col-span-12 md:col-span-4 mb-3 amitBtnGroup">
    <div class="bg-white rounded-lg shadow-2xl overflow-hidden amitShadow">
        <a href="/course/{{$item->url}}">
            <img src="/storage/course/{{$item->image}}" alt=""/>
            <div class="px-3 pb-3">
                <div class="flex items-center justify-between">
                    <p>{{$item->videoCount}} Lessons</p>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#f2cc8f"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <p>{{$item->rate[0]}} ({{$item->rate[1]}})</p>
                    </div>
                </div>
                <h2 class="text-xl font-bold my-1">{{$item->name}}</h2>
                <div class="flex items-center justify-between">
                    <p>&#8377; {{$item->sale}}</p>
                    <div class="flex items-center">
                        <p class="pr-3">Know Details</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>