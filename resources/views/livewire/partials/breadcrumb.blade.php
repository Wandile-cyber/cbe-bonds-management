<div>
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">{{ $title }}</h4>

        <div class="md:flex hidden items-center gap-2.5 text-sm font-semibold">
            @foreach ($breadcrumbItems as $item)
                <div class="flex items-center gap-2">
                    <a href="{{ $item['url'] }}" class="text-sm font-medium {{ $item['isActive'] ? 'text-slate-900 dark:text-slate-200' : 'text-slate-700 dark:text-slate-400' }}">
                        {{ $item['label'] }}
                    </a>
                    @if (!$loop->last)
                        <i class="mgc_right_line text-lg flex-shrink-0 text-slate-400 rtl:rotate-180"></i>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
