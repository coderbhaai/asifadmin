<div>
	<style>
		.quoteLR {
			font-size: 7rem;
			line-height: 1;
		}
		.rquote{
			right: 2.5em;
		}
        .toc {
            background: #fff7e1;
            padding: 1em;
            border-radius: 10px;
        }
        .toc a {
            color: unset;
        }
        .toc a:after {
            content: none;
        }
	</style>
    <div class="relative">
        <img src="/storage/blog/{{$data->cover_img}}" alt="{{$data->title}}" class="web" width="1430" height="700"/>
        <img src="/storage/blog/{{$data->smallImg}}" alt="{{$data->title}}" class="mobile" width="300" height="160"/>
        <div class="top-1/2 text-center left-0 right-0 absolute">
            <h1 class="text-xl md:text-3xl font-bold text-primary">{{$data->title}}</h1>
        </div>
    </div>
    <div class="container">
        <h2 class="text-xl md:text-3xl font-bold text-center mt-10 my-5">{{$data->title}}</h2>
        <div class="flex grid grid-cols-12 gap-4 gap-x-3">
            <div class="col-span-12 lg:col-span-9 content">
                {!! $data->content !!}
                <section class="component bg-action my-3 p-5 md:p-10 rounded relative">
					<div class="text-white absolute leading-tight h-10 -mt-3 quoteLR">“</div>
                    <p class="text-white text-center pt-10 pb-2">Feel free to use images in our website by simply providing a source link to the page they are taken from. </p>
					<p class="text-white text-center">-- AMITKK</p>
					<div class="text-white text-right leading-tight h-10 -mt-3 quoteLR rquote">”</div>
                </section>
				@livewire('parts.singlecomments', ['title'=> $title, 'blogId'=>$blogId, 'comments'=>$comments, 'response'=>$response ])
            </div>
            @livewire('parts.singlesidebar')
        </div>
    </div>
</div>