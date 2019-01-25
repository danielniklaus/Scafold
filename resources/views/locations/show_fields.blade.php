<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $location->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $location->name !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{!! $location->address !!}</p>
</div>

<!-- Lat Field -->
<div class="form-group">
    {!! Form::label('lat', 'Lat:') !!}
    <p>{!! $location->lat !!}</p>
</div>

<!-- Lang Field -->
<div class="form-group">
    {!! Form::label('lang', 'Lang:') !!}
    <p>{!! $location->lang !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $location->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $location->updated_at !!}</p>
</div>

