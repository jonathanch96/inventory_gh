

<tr class="rowTemplate">
  @if($edit)
  <input type="hidden" name="detail_id" value="{{$child->id??0}}">
  @endif
  @foreach($dataTypeRows as $row)
  <?php
  if($add){
    $temp_row_field = $row->field;

    $row->field = "transaction[".$custom_name."][".$counter."][".$row->field."]"; 

  }
  $options = $row->details;
  if($add){
    $options->column = $row->field;
  }

  ?>

  <td>

    @include('voyager::multilingual.input-hidden-bread-edit-add')
    @if (isset($row->details->view))
    @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add'), 'view' => ($edit ? 'edit' : 'add'), 'options' => $row->details])
    @elseif ($row->type == 'relationship')
    <?php
    if($add){
      $row->field = $temp_row_field;
    }
    ?>
    @include('voyager::formfields.relationship', ['options' => $options])
    @else
    {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
    @endif
  </td>
  <?php
  if($add){
    $row->field = $temp_row_field;
  }
  ?>
  @endforeach
  <td class="no-sort no-click bread-actions">
   <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete remove_fields" data-id="1" id="delete-1">
    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Delete</span>
  </a>
</td>
</tr>