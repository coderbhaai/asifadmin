<section class="courses py-10">
    <h2 class="text-xl md:text-3xl font-bold mb-2">Find The Right Online Course For You</h2>
    <p class="text-base">You don't have to struggle alone, you've got our assistance and help.</p>
    <div class="flex grid grid-cols-12 gap-x-5 overflow-hidden mt-10" >
        @foreach($data as $i)
            @livewire('parts.singlecourseitem', ["item" => $i])
        @endforeach
    </div>
    <div class="text-center my-5">
        <a href="{{ route('courses') }}" class="inline-block text-center text-white py-3 px-6 rounded-full bg-green">Explore</a>
    </div>
</section>