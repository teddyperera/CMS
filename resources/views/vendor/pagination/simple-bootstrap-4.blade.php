@if ($paginator->hasPages())
    <nav class="flexbox mt-30 mw-100">
        @if ($paginator->onFirstPage())
            <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Previous</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-white"><i class="ti-arrow-left fs-9 mr-4"></i> Previous</a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-white" href="#">Next <i class="ti-arrow-right fs-9 ml-4"></i></a>
        @else
            <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Next</a>
        @endif
    </nav>
@endif