<div class="col-span-12 md:col-span-4 mb-3 amitBtnGroup">
    <div class="bg-white rounded-lg shadow-2xl overflow-hidden amitShadow">
        <a href="/product/{{$item->url}}">
            <img src="/storage/product/{{json_decode( $item->images ) [0] }}" alt="Website Development in Delhi" class="mx-auto max-w-200" width="380" height="380"/>
        </a>
        <div class="p-3">
            <a href="/product/{{$item->url}}">
                <h2 class="text-xl text-center font-bold mt-5">{{$item->name}}</h2>
            </a>
            <div class="flex items-center justify-between">
                <p class="text-center">&#8377; {{$item->sale}}</p>
                <button wire:click="addToCart({{$item}})" class="text-white text-center px-3 py-1 font-semibold text-xs rounded-full bg-green">Add To cart</button>
            </div>
        </div>
    </div>
</div>