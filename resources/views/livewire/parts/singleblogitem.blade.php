<div class="col-span-12 md:col-span-4 mb-3 amitBtnGroup">
    <div class="bg-white rounded-lg shadow-2xl overflow-hidden amitShadow">
        <a href="/{{$item->url}}">
            <img src="/storage/blog/{{$item->smallImg}}" alt="{{$item->title}}" class="rounded-t-lg" loading="lazy" width="400" height="220"/>
        </a>
        <div class="p-3">
            <h2 class="font-bold mb-2 oneliner">{{$item->title}}</h2>
            <div class="flex items-center justify-between pt-2">
                <a href="/{{$item->url}}" class="text-white text-center px-3 py-1 font-semibold text-xs rounded-full bg-green">Read More</a>
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <small class="font-bold text-xs">
                        {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('Do MMM YYYY')}}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>