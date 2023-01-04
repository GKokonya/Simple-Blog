@unless ($breadcrumbs->isEmpty())
    <nav class="container mx-auto my-1">
        <ol class="p-4 rounded flex flex-wrap text-sm text-gray-800 bg-slate-50">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li>
                        <a href="{{ $breadcrumb->url }}" class="text-blue-600 hover:text-blue-900 hover:underline focus:text-blue-900 focus:underline">
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li>
                        {{ $breadcrumb->title }}
                    </li>
                @endif

                @unless($loop->last)
                    <li class="text-gray-500 px-2">
                    <i class="fa-solid fa-angle-right"></i>
                    </li>
                @endif

            @endforeach
        </ol>
    </nav>
@endunless