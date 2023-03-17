@for ( $i = 0; $i < count($akcio); $i++)
    {{ Form::button('<i class="'. $favIcon[$i] . '"></i>', array('class' => $akcio[$i], 'type' => 'button', 'title' => $title[$i])) }}
@endfor
