<div class="card pr-0 @isset($classes){{ $classes }}@endisset" style="@isset($style){{ $style }}@endisset" id="@isset($id){{ $id }}@endisset">
    @isset($title)
        <div class="card-header">
            <h4 class="card-title">{{ $title }} </h4>
        </div>
    @endisset
    <div class="card-content">
        <div class="card-body @isset($classesBody){{ $classesBody }}@endisset">
            <div class="card-text">
                {{ $slot }}
            </div>
        </div>
    </div>
    @isset($footer)
        <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
            <span class="float-right">
                <a href="{{ $footer['link'] }}" class="card-link">{{ $footer['text'] }} <i class="la la-angle-right"></i></a>
              </span>
        </div>
    @endisset
</div>