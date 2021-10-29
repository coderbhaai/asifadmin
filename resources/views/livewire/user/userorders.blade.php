<div class="container py-12">
    <h1 class="text-center text-3xl font-bold py-2 mb-6">Your Orders </h1>
    <table class="min-w-full table-auto mb-5">
        <thead class="justify-between">
        <tr class="bg-primary">
            <th class="py-2 relative hover:cursor-pointer" wire:click="sortBy('id')"><span class="text-white">Sl No.</span> @include('partials.sorticon', ['field'=>'id'])</th>
            <th class="py-2 relative hover:cursor-pointer"><span class="text-white">User</span> </th>
            <th class="py-2 relative hover:cursor-pointer"><span class="text-white">Cart</span> </th>
            <th class="py-2 relative hover:cursor-pointer"><span class="text-white">Amount</span> </th>
            <th class="py-2 relative hover:cursor-pointer"><span class="text-white">Status</span> </th>
            <th class="py-2 relative hover:cursor-pointer" wire:click="sortBy('updated_at')"><span class="text-white">Date</span> @include('partials.sorticon', ['field'=>'updated_at'])</th>
        </tr>
        </thead>
        <tbody class="">
            @foreach($courses as $i)
                <tr class="">
                    <td class="px-1 py-1 text-center">{{ $loop->index +1}}</td>
                    <td class="px-1 py-1">{{$i->name}}<br/>{{$i->email}}</td>
                    <td class="px-1 py-1"><a href="/course/{{$i->courseUrl}}" target="_blank">{{$i->courseName}}</a></td>
                    <td class="px-1 py-1">{{$i->amount}}</td>
                    <td class="px-1 py-1">{{$i->status}}</td>
                    <td class="px-1 py-1">{{date('d-m-Y', strtotime($i->updated_at))}}</td>
                </tr>
            @endforeach
            @foreach($data as $i)
                <tr class="">
                    <td class="px-1 py-1 text-center">{{ $loop->index +1}}</td>
                    <td class="px-1 py-1">{{$i->name}}<br/>{{$i->email}}</td>
                    <td class="px-1 py-1">
                        @foreach($i->cart as $j)
                            <p><a href="/product/{{$j->url}}">{{$j->name}} Price: {{$j->price}} Sale: {{$j->sale}} X {{$j->amount}} Units</a></p>
                        @endforeach
                    </td>
                    <td class="px-1 py-1">{{$i->amount}}</td>
                    <td class="px-1 py-1">{{$i->status}}</td>
                    <td class="px-1 py-1">{{date('d-m-Y', strtotime($i->updated_at))}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}
</div>