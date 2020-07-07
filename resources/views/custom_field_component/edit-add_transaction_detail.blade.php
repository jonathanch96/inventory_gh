<?php 

$parent = $dataType->model_name::find($dataTypeContent->id);
$dataType = Voyager::model('DataType')->where('slug', '=', $slug_name)->first();
$dataTypeContent = (strlen($dataType->model_name) != 0)
? new $dataType->model_name()
: false;
$child = $dataType->model_name::where($child_connection,$parent->id??0)->get();

// edit view

foreach ($dataType->editRows as $key => $row) {
    $dataType->editRows[$key]['col_width'] = isset($row->details->width) ? $row->details->width : 100;
}



foreach ($dataType->addRows as $key => $row) {
    $dataType->addRows[$key]['col_width'] = $row->details->width ?? 100;
}
?>

@php
//$edit = !is_null($dataTypeContent->getKey());
//$add  = is_null($dataTypeContent->getKey());
$edit = !$child->isEmpty();
$add = $child->isEmpty();

@endphp

@php
$dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
@endphp

<div class="table-responsive">
    <table id="dataTable"  class="table table-hover detailTransaction">
        <thead>
            <tr >
                @foreach($dataTypeRows as $row)
                <?php $display_options = $row->details->display ?? NULL;
                ?>
                <th class="{{ isset($display_options->width)?'col-md-'.$display_options->width:'' }}">{{ $row->getTranslatedAttribute('display_name') }}</th>

                @endforeach
                <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>

            </tr>
        </thead>
        <tbody>

            <?php 
            if($edit){?>
                <!-- dummy row for template -->
                @include('custom_field_component.edit-add_transaction_detail_row',[
                "counter"=>0,
                "child"=>null,
                ])
                <?php foreach ($child as $key => $cld): ?>

                 <?php 
                 if (strlen($dataType->model_name) != 0) {
                    $model = app($dataType->model_name);

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
                    if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
                        $model = $model->withTrashed();
                    }
                    if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                        $model = $model->{$dataType->scope}();
                    }
                    $dataTypeContent = call_user_func([$model, 'findOrFail'], $cld->id??0);
                } else {
            // If Model doest exist, get data from table name
                    $dataTypeContent = DB::table($dataType->name)->where('id', $cld->id??0)->first();
                }

                ?>
                @include('custom_field_component.edit-add_transaction_detail_row',[
                "counter"=>$cld->id,
                "child"=>$cld,
                ])
            <?php endforeach ?>

        <?php }else{
            ?>
            <?php for ($i=0; $i<$detail_min ; $i++) { ?>
              @include('custom_field_component.edit-add_transaction_detail_row',[
              "counter"=>$i,
              ])
          <?php } ?>
      <?php } ?>
  </tbody>
</table>
<button type="button" onclick="addRow();" class="btn btn-primary save">Tambah Item</button>
</div>



@push('javascript')
<script type="text/javascript">
    var currentId = {{$add?$detail_min:$child->max('id')}}+1;
    var pattern = /transaction\[{{$custom_name}}\]\[[0-9]+\]/g
    refreshChildNameForm();
    var rowTemplate = $(".rowTemplate:first").html();
    <?php if($edit){ ?>
        $( document ).ready(function() {
            $(".rowTemplate:first .bread-actions .remove_fields").click();
        });
    <?php } ?>
    function refreshChildNameForm(){
        $('#dataTable tbody tr').each(function(){
            //alert("test");
            var tempId = $(this).children("input").val();

            //input
            $(this).find('input').each(function(){
                var tempCurrentName = $(this).attr("name");
                if(!tempCurrentName.match(pattern)){
                    $(this).attr("name","transaction[{{$custom_name}}]["+tempId+"]["+tempCurrentName+"]");
                }

            });
            //select
            $(this).find('select').each(function(){
                var tempCurrentName = $(this).attr("name");
                if(!tempCurrentName.match(pattern)){
                    $(this).attr("name","transaction[{{$custom_name}}]["+tempId+"]["+tempCurrentName+"]");
                }

            });
        });
    }
    function refreshSelect2(){
        $(".remove_fields").click(function(){
            removeRow(this);
        });
        $('select.select2-ajax').each(function() {
            $(this).select2({
                width: '100%',
                ajax: {
                    url: $(this).data('get-items-route'),
                    data: function (params) {
                        var query = {
                            search: params.term,
                            type: $(this).data('get-items-field'),
                            method: $(this).data('method'),
                            id: $(this).data('id'),
                            page: params.page || 1
                        }

                        return query;
                    }

                }
            });

            $(this).on('select2:select',function(e){
                var data = e.params.data;
                if (data.id == '') {
                // "None" was selected. Clear all selected options
                $(this).val([]).trigger('change');
            } else {
                $(e.currentTarget).find("option[value='" + data.id + "']").attr('selected','selected');
            }
        });

            $(this).on('select2:unselect',function(e){
                var data = e.params.data;
                $(e.currentTarget).find("option[value='" + data.id + "']").attr('selected',false);
            });
        });
    }
    function addRow(){
        rowTemplate =rowTemplate.replace(pattern, "transaction[{{$custom_name}}]["+currentId+"]");
        $(".detailTransaction").append("<tr class='rowTemplate'>"+rowTemplate+"</tr>");
        refreshSelect2();
        currentId++;

    }
    function removeRow(selector){
        $(selector).closest('tr').remove();
    }
  //def components
  $(".remove_fields").click(function(){
    removeRow(this);
});
</script>
@endpush