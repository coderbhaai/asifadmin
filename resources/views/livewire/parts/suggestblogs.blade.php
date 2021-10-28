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
    <h3 class="text-center text-xl md:text-3xl font-bold mb-5">READ OUR THOUGHTS</h3>
    <h4 class="text-center text-base md:text-xl font-bold mb-2 md:mb-10">Our Thoughts, Our Comments, Our Views. Read WHat We Have to Say</h4>
    <div class="flex grid grid-cols-12 gap-4 gap-x-5">
        @foreach($data as $i)
            @livewire('parts.singleblogitem', ["item" => $i])
        @endforeach
    </div>
    <div class="amitBtnGroup text-center my-5">
        <a href="/blog" class="relative overflow-hidden uppercase z-50 inline-block text-center shadow-amit amitBtn py-3 px-12 font-bold rounded-full">Read All Blogs</a>
    </div>
</div>