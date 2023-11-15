<div>
    @php 
        $carousel = $getRecord();
        $description = Formatting::limitWords($carousel->description, 8);
    @endphp
    <h5>{{$carousel->heading_sm}}</h5>
    <h2>{{$carousel->heading_lg}}</h2>
    <h4>{{$carousel->heading_md}}</h4>
    <p>{{$description}}</p>
    @if(!empty($carousel->site))
        <small class="badge min-h-4 ml-auto inline-flex items-center justify-center whitespace-normal rounded-xl px-2 py-0.5 text-xs font-medium tracking-tight rtl:ml-0 rtl:mr-auto bg-primary-500/10 text-primary-700 dark:text-primary-500">{{$carousel->site->name}}</small>
    @endif
</div>