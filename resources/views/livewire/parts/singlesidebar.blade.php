<div class="web col-span-12 md:col-span-3">
    <div>
        <h2 class="text-center text-1xl font-bold">Blog Categories</h2>
        <ul>
            @foreach($category as $i)
                <li class="mb-2">
                    <a href="/category/{{$i->url}}" class="font-medium select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-2 pl-4 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                        {{$i->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div>
        <h2 class="text-center text-1xl font-bold mt-10">Blog Tags</h2>
        <ul>
            @foreach($tag as $i)
                <li class="mb-2">
                    <a href="/tag/{{$i->url}}" class="font-medium select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                        {{$i->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>