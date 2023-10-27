<div>
    @php 
        $carousel = $getRecord();
        $description = Formatting::limitWords($carousel->description, 8);
    @endphp
    <h5>{{$carousel->heading_sm}}</h5>
    <h2>{{$carousel->heading_lg}}</h2>
    <h4>{{$carousel->heading_md}}</h4>
    <p>{{$description}}</p>
</div>