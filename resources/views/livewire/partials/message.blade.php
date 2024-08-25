<div>
    @if(Session::get('fail'))
    <div class="bg-danger/25 text-danger text-sm rounded-md p-4" role="alert">
        <span class="font-bold">Error</span>! {{ Session::get('fail') }}.
    </div>
    @endif
    @if(Session::get('success'))
    <div class="bg-success/25 text-success text-sm rounded-md p-4" role="alert">
        <span class="font-bold">Success</span>  {{ Session::get('success') }}.
    </div>
    @endif
    @if(Session::get('message'))
    <div class="bg-info/25 text-info text-sm rounded-md p-4" role="alert">
        <span class="font-bold">Info</span>! {{ Session::get('message') }}.
    </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="bg-danger/25 text-danger text-sm rounded-md p-4" role="alert">
            <span class="font-bold">Error! </span> {{ $error }}
        </div>
        @endforeach
    @endif
</div>
