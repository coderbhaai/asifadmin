@if($sortBy !== $field)
    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-1 top-0 mt-2 p-1 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#fff">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
    </svg> -->
@elseif($sortDirection =='asc')
    <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-1 top-0 mt-2 p-1 h-6 w-6" viewBox="0 0 20 20" fill="#fff">
        <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
    </svg>
@else
    <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-1 top-0 mt-2 p-1 h-6 w-6" viewBox="0 0 20 20" fill="#fff">
    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
    </svg>
@endif