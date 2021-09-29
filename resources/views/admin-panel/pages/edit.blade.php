@extends('admin-panel.layout.master')
@section('content')
@include('admin-panel.includes.message')
<br>

<a href="{{url()->previous()}}">
<button class="btn btn-warning">GO BACK</button>
</a>
<br><br>
<h1>Edit {{$title}}</h1>
<div class="card-body">

<form action="{{url($url.'/'.$orient->id)}}" method="POST" enctype='multipart/form-data'>
@foreach ($data as $key => $value) 
<?php $aslam = $value['naming']; ?>
    <div class='form-group'>
    <label>{{$value['name']}}</label>

    @if($value['type'] == "select")
        <select class='form-control select_box_custom' {!! $value['attrib']!!}>
        @foreach ($value['data'] as $k2 => $dd) 
            <option value='{{$k2}}' {{is_selected($k2, $orient->$aslam)}}>{{$dd}}</option>
        @endforeach
        </select>
    @else
        <input class='form-control' type="{{$value['type']}}" {!! $value['attrib'] !!} value="{{$orient->$aslam}}">
    @endif

    </div>
@endforeach
{{csrf_field()}}



<input type="hidden" name="_method" value="PUT">
<button class="btn btn-primary" type="submit"> Update</button>

</form>
<br>
@if(isset($orient->image))
<h3>Current Featured Image</h3>
<img src="{{asset("storage/".$path."/".$orient->image)}}" width="200px" height="200px">
@endif
<br>

@if(isset($additional))
{!! $additional !!}
@endif
</div>

@endsection