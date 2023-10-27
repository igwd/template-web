<div>
    @foreach ($getRecord()->attachment as $item)
    <a href="{{ Storage::disk('announcement')->url($item) }}" class="min-h-6 inline-flex items-center justify-center space-x-1 rounded-xl bg-primary-500/10 px-2 py-0.5 text-sm font-medium tracking-tight text-primary-700 rtl:space-x-reverse dark:text-primary-500">
    Download
    </a>
    @endforeach
</div>
