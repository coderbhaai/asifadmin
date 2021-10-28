<div class="container py-12">
    <style>
        .col-span-12:hover img{
            transform: scale(1.05);
            transition: transform 0.6s ease-out,-webkit-transform 0.6s ease-out;
        }
    </style>
    <h1 class="text-center my-3 text-xl md:text-4xl font-bold my-10">{{$heading}}</h1>
    <div class="flex grid grid-cols-12 gap-4 gap-x-3">
        @foreach($data as $i)
            @livewire('parts.singleblogitem', ["item" => $i])
        @endforeach
    </div>
</div>