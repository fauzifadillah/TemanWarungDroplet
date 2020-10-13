<form class="form" method="POST" action="{{ route('confirm') }}" id="{{ $model->name }}">
{{ csrf_field() }} {{ method_field('POST') }}

<div class="modal-header">
    <h5 class="modal-title" id="modal-title">Beli {{$model->name}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        &times;
    </button>
</div>
<div class="modal-body">
    <input id="id" type="hidden" class="form-control" name="id" value="{{ $model->id }}" required>
    <div class="form-group">
        <label for="" class="control-label">Nama</label>
        <input id="name" type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
        <label for="" class="control-label">No Hp</label>
        <input id="phone_number" type="text" class="form-control" name="phone_number" required>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Banyak Cicilan</label><br>
        <input type="radio" name="installment" value="3" checked> 3x &ensp;
        <input type="radio" name="installment" value="6"> 6x &ensp;
        <input type="radio" name="installment" value="12"> 12x
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-light" data-dismiss="modal" id="modal-close">Cancel</button>
    <button type="submit" class="btn btn-success" id="modal-save">Beli via WhatsApp</button>
</div>

</form>