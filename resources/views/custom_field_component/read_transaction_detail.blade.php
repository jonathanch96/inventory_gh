<?php 
$parent = $dataType->model_name::find($dataTypeContent->id);
$dataType = Voyager::model('DataType')->where('slug', '=', $slug_name)->first();

$child = $dataType->model_name::where($child_connection,$parent->id??0)->get();

?>

<div class="table-responsive">
    <table id="dataTable" class="table table-hover">
        <thead>
            <tr>

               @foreach($dataType->browseRows as $row)
               <?php $display_options = $row->details->display ?? NULL;
               ?>
               <th class="{{ isset($display_options->width)?'col-md-'.$display_options->width:'' }}">{{ $row->getTranslatedAttribute('display_name') }}</th>

               @endforeach

           </tr>
       </thead>
       <tbody>
           @foreach($child as $data)

           @include('custom_field_component.read_transaction_detail_row')
           @endforeach



       </tbody>
   </table>
</div>