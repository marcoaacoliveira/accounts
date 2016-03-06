<div class="form-group">
    {!! Form::label('type', 'Tipo de lançamento') !!}
    {!! Form::select('type',array(0=>"Entrada",1=>"Saida"),['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descrição') !!}
    {!! Form::text('description',null,['class'=>'form-control', 'maxlength'=>120]) !!}
</div>

<div class="form-group">
    <label for="total">Valor do lançamento</label>
    <input class="form-control" step="any" name="total" type="number" id="total">
</div>

<div class="form-group">
    <label for="select-charges">Parcelas</label>
    <select id="select-charges">
        <option disabled="disabled" selected="selected">Escolha</option>
        <option value="1">1 parcela</option>
        <option value="2">2 parcelas</option>
        <option value="3">3 parcelas</option>
        <option value="4">4 parcelas</option>
        <option value="5">5 parcelas</option>
        <option value="6">6 parcelas</option>
        <option value="7">7 parcelas</option>
        <option value="8">8 parcelas</option>
        <option value="9">9 parcelas</option>
        <option value="10">10 parcelas</option>
    </select>
</div>
<div id="charges-div">
</div>

<div class="form-group">
    {!! Form::submit($submitText, ['class'=>'btn btn-primary form-control']) !!}
</div>
