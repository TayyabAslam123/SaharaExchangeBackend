@extends('admin-panel.layout.master')
@section('content')
@include('admin-panel.includes.message')

<div class="row">
  <!-- data table  -->
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
      <div class="card-body">
      
        @if(isset($headings1))
        @foreach ($headings1 as $key => $value)
                            <div class="row">
                                <div class="col">
                                    <h4> <b>{{ $value }}</b> : </h4>
                                </div>
                                <div class="col-9">
                                    <h4>{{ $data->$key }}</h4>
                                </div>
                            </div>
                            <br>
        @endforeach
        @endif

        @if(isset($headings2))
        @foreach ($headings2 as $key => $value)
        <div class="row">
            <div class="col">
                <h4> <b>{{ $value }}</b> : </h4>
            </div>
            <div class="col-9">
                <h4>{{ $data->profile->$key }}</h4>
            </div>
        </div>
        <br>
@endforeach
@endif

      </div>
    </div>
  </div>

</div>

<!-- ============================================================== -->
@endsection