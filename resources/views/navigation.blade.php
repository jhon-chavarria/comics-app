<div class="navigation" >
    @if(!empty($prev))
        <a href="{{ $prev }}" class="btn btn-primary btn-round">Prev</a>
    @endif
    @if(!empty($next))
        <a href="{{ $next }}" class="btn btn-primary btn-round">Next</a>
    @endif
</div>