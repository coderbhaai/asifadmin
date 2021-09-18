<div class="col-span-12 md:col-span-2 flex flex-col top-14 left-0 bg-primary h-full text-white transition-all duration-300 border-none z-10 sidebar">
    <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
        <ul class="md:flex flex-col py-4 space-y-1">
            <li class="px-1 md:px-5 hidden inline-block md:block">
                <div class="text-center h-8">
                    <div class="text-sm font-light tracking-wide text-white uppercase text-center">Admin Panel</div>
                </div>
            </li>
            @foreach($data as $i)
                <li class="px-1 md:px-5 inline-block md:block">
                    <a href="{{ route($i['link']) }}" class="{{Route::is($i['link'])? 'bg-white text-blue-900 border-action' : 'text-white' }} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 hover:text-white border-l-4 border-transparent hover:border-blue-500 py-3 pl-3 ml-2 text-sm tracking-wide truncate md:block px-3">{{ $i['name'] }}</a>
                    </li>
            @endforeach
        </ul>
    </div>
</div>