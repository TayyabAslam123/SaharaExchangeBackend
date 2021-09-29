<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Type</th>
			<th>Comment</th>
			<th>Checked</th>
			<th>Approved</th>
			<th>Last Date</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($orient->documents as $document)
		<tr>
			<form method="POST" action="{{url('admin/document/'.$document->id)}}">
			<td>{{$document->id}}</td>
			<td><a href="{{Storage::url($document->path)}}" target="_blank">{{$document->name}}</a></td>
			<td>{{$document->type}}</td>
			<td><textarea name="comment"  class="form-control">{{$document->comment}}</textarea></td>
			<td><input type="checkbox" name="is_checked" class="form-control" value="1" {{is_checked($document->is_checked,1)}}></td>
			<td><input type="checkbox" name="is_approved" class="form-control" value="1" {{is_checked($document->is_approved,1)}}></td>
			<td>{{date('d M Y', strtotime($document->updated_at))}}</td>
			<td><button class="btn btn-success">Update</button></td>
			</form>
		</tr>
		@endforeach
	</tbody>
</table>