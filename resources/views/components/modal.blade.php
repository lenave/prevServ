<!-- Modal -->
<div class="modal fade text-left" id="{{ $id }}" role="dialog" aria-labelledby="{{ $id }}" aria-hidden="true">
    <div class="modal-dialog @isset($contentClass){{ $contentClass }}@endisset" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="line-height: 1.30;">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-hover grey btn-outline-secondary" data-dismiss="modal">{{ $close }}</button>
                <button type="button" class="btn btn-primary" id="{{ $button_id }}">{{ $button }}</button>
            </div>
        </div>
    </div>
</div>