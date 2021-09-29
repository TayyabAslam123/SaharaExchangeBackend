@extends('admin-panel.layout.master')
@section('content')
@include('admin-panel.includes.message')

   <!-- ============================= ADD NEW FORM ================================= -->

   <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
        <h2 class="section-title">{{$title}}</h2>
        </div>
        <div class="card">
         <div class="card-body">
     
        
         <form action="{{url('admin/blog/'.$orient->id)}}" method="POST" enctype='multipart/form-data' >

            @csrf
            <!--title-->
            <div class='form-group'>
                <label>Title</label>
             <input class='form-control' type="text" name="title" value="{{$orient->title}}" required>
            </div>
            <!--description-->
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="6" name="description"  required>{{$orient->description}}</textarea>
            </div>

           <img src="{{asset('storage/blog_images/'.$orient->image)}}" width="200px" height="200px">

           <br><br>
           <!--Image-->
           <div class="form-group">
            <label for="exampleFormControlTextarea1">Choose if you want to change</label>
            <input type="hidden" value="{{$orient->image}}" name="old_image"/>
            <input id="inputText3" type="file" accept=".jpg,.jpeg,.png" class="form-control" name="img" >
           </div>
           <input type="hidden" name="_method" value="PUT">
          <button type="submit" class="btn btn-primary btn-lg ">Submit</button>
          </form>
    

          </div>
        </div>
    </div>
</div>


<!-- ============================================================== -->
@endsection