<form class="form" method="POST" action="{{ $model->exists ? route('product.update', $model->id) : route('product.store') }}" files=true>
{{ csrf_field() }} {{ method_field($model->exists ? 'PUT' : 'POST') }}

<div class="modal-header">
    <h5 class="modal-title" id="modal-title"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        &times;
    </button>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="" class="control-label">Category</label>
        <select id="categories_id" type="text" class="form-control" name="categories_id">
            <option value="0" disabled selected>Pilih Category</option>
            @foreach($category as $select)
            <option value="{{$select->id}}" 
                @if ($select->id == old('categories_id', $model->categories_id))
                    selected="selected"
                @endif
                >{{$select->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Nama Product</label>
        <input id="name" type="text" class="form-control" name="name" value="{{$model->name}}" required>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Image Product</label>
        <input id="image" type="file" name="image">
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal" id="modal-close"></button>
    <button type="submit" class="btn btn-primary" id="modal-save"></button>
</div>

</form>