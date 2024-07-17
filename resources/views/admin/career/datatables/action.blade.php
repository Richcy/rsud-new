@if ($model->status == 0)
    <button class="btn btn-sm btn-success btn-change-status" data-id="{{ $model->id }}" data-status="{{ $model->status }}"><i class="bi bi-send"></i></button>
@else
    <button class="btn btn-sm btn-danger btn-change-status" data-id="{{ $model->id }}" data-status="{{ $model->status }}"><i class="bi bi-x-circle"></i></button>
@endif

<a href="{{ route('admin.career.edit', $model->slug) }}" class="btn btn-sm btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>
