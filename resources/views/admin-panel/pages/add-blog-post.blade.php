@extends('admin-panel.layout.master')
@section('content')
@include('admin-panel.includes.message')

   <!-- ============================= ADD NEW FORM ================================= -->

   <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
        <h2 class="section-title">Add New Blog Post</h2>
        </div>
        <div class="card">
         <div class="card-body">
     
        
         <form action="{{url('admin/blog')}}" method="POST" enctype='multipart/form-data' >

            @csrf
            <!--title-->
            <div class="form-group">
                <label for="inputText3" class="col-form-label">Title</label>
                <input id="inputText3" type="text" class="form-control" name="title" required>
            </div>
            <!--tagline-->
            <div class="form-group">
              <label for="inputText3" class="col-form-label">Tag Line</label>
              <input id="inputText3" type="text" class="form-control" name="tagline" maxlength="100"  required>
            </div>
            <!--description-->
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="summernote" rows="6" name="description" maxlength="1000">
                    
                </textarea>
            </div>
           <!--Image-->
           <div class="form-group">
            <label for="exampleFormControlTextarea1">Image</label>
            <input id="inputText3" type="file" accept=".jpg,.jpeg,.png" class="form-control" name="img" required>
           </div>

          <button type="submit" class="btn btn-primary btn-lg ">Submit</button>
          </form>
    

          </div>
        </div>
    </div>
</div>


<!-- ============================================================== -->
@endsection