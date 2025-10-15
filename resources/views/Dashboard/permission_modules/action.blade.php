<div class="all-action">
  <div class="delete-icon" title="مسح">
    <a  onclick="delete_items(`{{ $id }}`, `{{ route('admin.permissions.delete_module', $id) }}`)">
      <i class="fa-solid fa-trash"></i>
    </a>
  </div>
  <div class="action-icon" title="تعديل">
    <a href="{{ route('admin.permissions.edit_module', $id) }}">
      <i class="fa-solid fa-pen"></i>
    </a>
  </div>

</div>

@component('Components.__delete')
@endcomponent
