<div>
    @if($similar && count($similar))
        <h2 class="text-center my-3 text-xl font-bold">Similar Products</h2>
        @foreach($similar as $i)
            <div class="bg-white mb-4 p-2 transition duration-500 ease-in-out transform hover:-translate-y-1 shadow-lg">
                <a href="/proudct/{{$i->url}}" class="flex items-center flex-wrap">
                    <img src="/storage/product/{{$i->image}}" alt="" class="w-20 mr-2">
                    <h3>{{$i->name}}</h3>
                </a>
            </div>
        @endforeach
    @endif
    @if(count($type))
        <h2 class="text-center my-3 text-xl font-bold mt-10">Product Types</h2>
        @foreach($type as $i)
            <div class="bg-white mb-4 p-2 transition duration-500 ease-in-out transform hover:-translate-y-1 shadow-lg">
                <a href="/proudct-type/{{$i->url}}"><h3>{{$i->name}}</h3></a>
            </div>
        @endforeach
    @endif
    @if(count($category))
        <h2 class="text-center my-3 text-xl font-bold mt-10">Product Categories</h2>
        @foreach($category as $i)
            <div class="bg-white mb-4 p-2 transition duration-500 ease-in-out transform hover:-translate-y-1 shadow-lg">
                <a href="/proudct-category/{{$i->url}}"><h3>{{$i->name}}</h3></a>
            </div>
        @endforeach
    @endif
    @if(count($tag))
        <h2 class="text-center my-3 text-xl font-bold mt-10">Product Tags</h2>
        @foreach($tag as $i)
            <div class="bg-white mb-4 p-2 transition duration-500 ease-in-out transform hover:-translate-y-1 shadow-lg">
                <a href="/proudct-tag/{{$i->url}}"><h3>{{$i->name}}</h3></a>
            </div>
        @endforeach
    @endif
</div>