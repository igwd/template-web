<div>
    @php
    $tags = explode(",", $getRecord()->tags);
    @endphp

    @for ($i = 0; $i < count($tags); $i++)
        <span class="min-h-6 inline-flex items-center justify-center space-x-1 rounded-xl bg-primary-500/10 px-2 py-0.5 text-sm font-medium tracking-tight text-primary-700 rtl:space-x-reverse dark:text-primary-500">{{$tags[$i]}}</span>
        @if (($i + 1) >= 3)
            <br><span class="min-h-6 inline-flex items-center justify-center space-x-1 rounded-xl bg-primary-500/10 px-2 py-0.5 text-sm font-medium tracking-tight text-primary-700 rtl:space-x-reverse dark:text-primary-500">etc.</span>
            @break;
        @endif
    @endfor
</div>
