@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        <li class="last-prev"><a href="{{ \Request::url() }}">＜ 最初</a></li>
        @if ($paginator->onFirstPage())
            <li class="prev"><button disabled rel="prev">前の10件へ</a></li>
        @else
            <li class="prev active"><a href="{{ $paginator->previousPageUrl() }}" class="btn" rel="prev">前の10件へ</a></li>
        @endif
        {{-- Pagination Elements --}}
        <li class="page-num">{{$paginator->currentPage()}}/{{$paginator->lastPage()}}</li>
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="next active"><a href="{{ $paginator->nextPageUrl() }}" class="btn" rel="next">次の10件へ</a></li>
        @else
            <li class="next"><button disabled rel="next">次の10件へ</button></span></li>
        @endif
        <li class="last-next"><a href="{{ \Request::url().'?page='.$paginator->lastPage() }}">最後 ＞</a></li>
    </ul>
@endif
