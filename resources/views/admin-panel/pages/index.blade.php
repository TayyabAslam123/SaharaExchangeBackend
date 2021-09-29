@extends('admin-panel.layout.master')
@section('content')
@include('admin-panel.includes.message')
<div class="row">
    <br><br>
  <div class="col-sm-9">
    <h1 class="display-4">{{$title}}</h1>
  </div>
  @if(isset($form_data))
  <div class="col-sm-3">
    <a href="#addme">
    </i><button class="btn btn-success"> <i class="fas fa-plus"></i> Add {{$title}}</button>
    </a>
  </div>
  @endif

  @if(isset($custom_btn))
  <div class="col-sm-3">
  <a href="{{$custom_btn}}">
    </i><button class="btn btn-success"> <i class="fas fa-plus"></i> Add {{$title}}</button>
    </a>
  </div> 
  @endif


</div>
<div class="row">
  <!-- data table  -->
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="dt" class="table table-striped table-bordered second" style="width:100%">
            <thead>
              <tr>
                @foreach ($headings as $heading)
                <th>{{$heading}}</th>
                @endforeach
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($values as $value)
              <tr>

                @foreach ($headings as $key=>$paired_value)
                @php
                $oip = explode(".",$key);
                $s1= $oip[0];
                $s2=null;
                if(sizeof($oip) > 1)
                {
                  $s2 = $oip[1];
                }
                @endphp

                @if(sizeof($oip) > 1)
                <td>{{$value->$s1->$s2}}</td>
                @else
                <td>{{ $value->$s1 }}</td>
                @endif
                @endforeach

               

                <td>

                  @if(!isset($remove_del))
                  <!--DELETE THE ENTRY-->
                  <form action="{{ $url.'/'.$value->id }}" method="POST" onsubmit="return confirm('Are you sure, You want to delete?')">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                  </form>
                  <!--END-->
                  @endif

                  @if(!isset($remove_edit))
                  <!--EDIT THE ENTRY-->
                  <a href="{{$url.'/'.$value->id.'/edit'}}">
                  <button class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></button>
                  </a>    
                  <!--END-->
                  @endif

                  
                 @if(isset($show_btn))
                  <!--SHOW THE ENTRY-->
                  <a href="{{url($public_url.'/'.$value->id)}}" target="_blank">
                  <button class="btn btn-dark btn-xs"><i class="fas fa-eye"></i></button>
                  </a>   
                 @endif  
                  <!--END-->
                

                  <br>
                  <!--view profile for user-->
                  @if($value->profile)
                  <a href="{{url('admin/users/'.$value->id)}}" class="btn btn-sm btn-primary">View Profile</a>
                   @endif
<br>
                   @if(isset($offer))
                   <a href="{{$url.'/'.$value->id}}" class="btn btn-sm btn-primary">View Offers</a>
                   @endif

                </td>
              </tr>
              @endforeach
         
            </tbody>
            <tfoot>
              <tr>
                @foreach ($headings as $heading)
                <th>{{$heading}}</th>
                @endforeach
                <th>Actions</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- end data table  -->
</div>

   <!-- ============================= ADD NEW FORM ================================= -->
   @if(isset($form_data))
   <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
        <h3 class="section-title">Add New {{$title}}</h3>
        </div>
        <div class="card">
         <div class="card-body">
     
        
         <form action="{{$url}}" method="POST" enctype='multipart/form-data'>
          @csrf
            <!---->
            @foreach ($form_data as $key => $value) 
            <div class="form-group" id="addme">
                <label>{{$value['name']}}</label>
                @if($value['type'] == "select")
                <select class='form-control select_box_custom' {!! $value['attrib']!!}>
                @foreach ($value['data'] as $k2 => $dd) 
                <option value='{{$k2}}'>{{$dd}}</option>
                @endforeach
                </select>
                @else
                <input class='form-control' type="{{$value['type']}}" {!! $value['attrib'] !!}>
                @endif
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary btn-lg ">Submit</button>
        </form>
    

          </div>
        </div>
    </div>
</div>

@endif
<!-- ============================================================== -->
@endsection