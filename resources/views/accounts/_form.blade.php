<div class="form-group">
    {!! Form::label('total', 'Total na conta') !!}
    {!! Form::number('total', null, ['class'=>'form-control', 'step'=>'any']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitText, ['class'=>'btn btn-primary form-control']) !!}
</div>
