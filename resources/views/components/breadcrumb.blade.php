<div class="flex justify-between items-center mb-6">
    <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">{{ $title }}</h4>

    <div class="md:flex hidden items-center gap-2.5 text-sm font-semibold">
        @foreach ($items as $key => $item)
        <div class="flex items-center gap-2">
            @if (!$loop->first)
            <i class="mgc_right_line text-lg flex-shrink-0 text-slate-400 rtl:rotate-180"></i>
            @endif
            @if ($loop->last)
            <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">{{ $item }}</a>
            @else
            <a href="{{ $urls[$key] }}" class="text-sm font-medium text-slate-700 dark:text-slate-400">{{ $item }}</a>
            @endif
        </div>
        @endforeach
    </div>
</div>
