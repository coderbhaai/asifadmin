<div class="container py-12">
    <style>
        .mj-sitemap {
            position: relative
        }
        .mj-sitemap, .mj-sitemap ul {
            list-style: none;
            padding-left: 2em;
            overflow: hidden
        }
        .mj-sitemap li {
            position: relative;
            padding: 8px 1em
        }
        .mj-sitemap li:after, .mj-sitemap li:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            /* border-width: 1px;
            z-index: 0; */
            border: 1px solid #ad2e24;
        }
        .mj-sitemap li:before {
            position: absolute;
            top: 0;
            left: -1.1em;
            height: 200%;
            border-top-style: none;
            border-left-style: solid
        }
        .mj-sitemap li:after {
            top: 1.5em;
            left: -1.1em;
            width: 1.5em;
            border-top-style: solid
        }
        .mj-sitemap li:last-child:before {
            border-left: none
        }
        .site_map {
            overflow: hidden
        }
    </style>
    <h1 class="text-center my-3 text-4xl font-bold my-10">Website Sitemap</h1>
    <p class="text-center">Below sitemap will help you browse through the website</p>
    <h2><a href="/">Home Page</a></h2>
    <ul class="mj-sitemap">
        @foreach($pages as $i)<li><a href="{{$i['url']}}" class="font-bold hover:text-action">{{$i['name']}}</a></li>@endforeach
        <li class="font-bold text-action">
            Products
            <ul>@foreach($products as $i)<li><a href="/product/{{$i['url']}}" class="font-bold hover:text-action">{{$i['name']}}</a></li>@endforeach</ul>
        </li>
        <li class="font-bold text-action">
            Courses
            <ul>@foreach($courses as $i)<li><a href="/course/{{$i['url']}}" class="font-bold hover:text-action">{{$i['name']}}</a></li>@endforeach</ul>
        </li>
        <li class="font-bold text-action">
            Social Media Pages
            <ul>@foreach($social as $i)<li><a href="{{$i['url']}}" target="_blank" class="font-bold hover:text-action">{{$i['name']}}</a></li>@endforeach</ul>
        </li>
        <li class="font-bold text-action">
            Blogs
            <ul>@foreach($blogs as $i)<li><a href="{{$i['url']}}" class="font-bold hover:text-action">{{$i['name']}}</a></li>@endforeach</ul>
        </li>
        <li class="font-bold text-action">
            Category
            <ul>@foreach($cat as $i)<li><a href="/category/{{$i['url']}}" class="font-bold hover:text-action">{{$i['name']}}</a></li>@endforeach</ul>
        </li>
        <li class="font-bold text-action">
            Tags
            <ul>@foreach($tag as $i)<li><a href="/tag/{{$i['url']}}" class="font-bold hover:text-action">{{$i['name']}}</a></li>@endforeach</ul>
        </li>

    </ul>  
</div>