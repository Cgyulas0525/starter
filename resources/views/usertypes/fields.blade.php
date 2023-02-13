<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Típus:')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 191]) !!}
</div>

<!-- Commit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commit', __('Megjegyzés:')) !!}
    {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4]) !!}
</div>
