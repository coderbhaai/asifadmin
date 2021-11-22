<div class="container videos">
    <style>
        .videos iframe{
            min-height: 250px;
        }
    </style>
    <h1 class="text-center my-3 text-xl md:text-4xl font-bold my-10">Videos</h1>  
    <div class="flex grid grid-cols-12 gap-4 gap-x-3 py-3 group">
        @foreach($data as $i)
            <div class="col-span-12 md:col-span-4 p-1">
                <iframe src="https://www.youtube.com/embed/{{$i->video}}" class="w-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        @endforeach
    </div>
    <div
        x-data="{
            observe () {
                let observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            @this.call('loadMore')
                        }
                    })
                }, {
                    root: null
                })

                observer.observe(this.$el)
            }
        }"
        x-init="observe">
    </div>
</div>