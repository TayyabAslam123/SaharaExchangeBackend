@extends('user.layout.master')

@section('content')

<!-- Content
================================================== -->
<div id="titlebar" class="white margin-bottom-30">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Blog</h2>
				<span>Featured Posts</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Blog</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>

<!-- Recent Blog Posts -->
<div class="section white padding-top-0 padding-bottom-60 full-width-carousel-fix">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="blog-carousel">

					@foreach($upper_sec as $val)
				<a href="{{url('blog-post/'.$val->id)}}" class="blog-compact-item-container">
						<div class="blog-compact-item">
						<img src="{{asset('storage/blog_images/'.$val->image)}}" alt="">
							<span class="blog-item-tag">Blog Post</span>
							<div class="blog-compact-item-content">
								<ul class="blog-post-tags">
									<li>{{date_frmt($val->created_at)}}</li>
								</ul>
							<h3>{{$val->title}}</h3>
								<p style=" height:60px;line-height:20px;overflow:hidden;">
									{{$val->tag}}
								</p>
							</div>
						</div>
					</a>
@endforeach

				</div>

			</div>
		</div>
	</div>
</div>
<!-- Recent Blog Posts / End -->


<!-- Section -->
<div class="section gray">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-8">

				<!-- Section Headline -->
				<div class="section-headline margin-top-60 margin-bottom-35">
					<h4>Recent Posts</h4>
				</div>

				@foreach($lower_sec as $val)
				<!-- Blog Post -->
				<a href="{{url('blog-post/'.$val->id)}}" class="blog-post">
					<!-- Blog Post Thumbnail -->
					<div class="blog-post-thumbnail">
						<div class="blog-post-thumbnail-inner">
							<span class="blog-item-tag"></span>
							<img src="{{asset('storage/blog_images/'.$val->image)}}" alt="">
						</div>
					</div>
					<!-- Blog Post Content -->
					<div class="blog-post-content">
						<span class="blog-post-date">{{date_frmt($val->created_at)}}</span>
						<h3>{{$val->title}}</h3>
						<p>{{$val->tag}}</p>
					</div>
					<!-- Icon -->
					<div class="entry-icon"></div>
				</a>
				
				@endforeach
			
	

				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						
						<!-- Pagination -->
						<div class="pagination-container margin-top-10 margin-bottom-20">
							<nav class="pagination">
								<ul>
                                    <!--CUSTOM PAGINATION-->
                                    <?php
                                       $getData=$lower_sec->links()->paginator;
                                       $getData = json_encode($getData);
                                       $getData = json_Decode($getData);
                                       $current=$getData->current_page;
                                    ?>
								    @foreach ($lower_sec->links()->elements[0] as $key=>$value)
									@if($current==$key)
									<li><a href="{{$value}}" class="current-page ripple-effect">{{$key}}</a></li>
									@else
									<li><a href="{{$value}}" class="ripple-effect">{{$key}}</a></li>
									@endif
									@endforeach	
									<!--END CUSTOM PAGINATION-->	
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<!-- Pagination / End -->

			</div>


			<div class="col-xl-4 col-lg-4 content-left-offset">
				<div class="sidebar-container margin-top-65">
					
				
					


					<!-- Widget -->
					<div class="sidebar-widget">
						<h3>Vist Sahara Exchange Social Profiles</h3>
						<div class="freelancer-socials margin-top-25">
							<ul>
								@foreach(social_links() as $val)
							<li><a href="{{$val->url}}" title="{{$val->name}}" data-tippy-placement="top"><i class="icon-brand-{{$val->name}}"></i></a></li>
					             @endforeach
							</ul>
						</div>
					</div>

					<!-- Widget -->
					{{-- <div class="sidebar-widget">
						<h3>Tags</h3>
						<div class="task-tags">
							<a href="#"><span>employer</span></a>
							<a href="#"><span>recruiting</span></a>
							<a href="#"><span>work</span></a>
							<a href="#"><span>salary</span></a>
							<a href="#"><span>tips</span></a>
							<a href="#"><span>income</span></a>
							<a href="#"><span>application</span></a>
						</div>
					</div> --}}

				</div>
			</div>

		</div>
	</div>

	<!-- Spacer -->
	<div class="padding-top-40"></div>
	<!-- Spacer -->

</div>
<!-- Section / End -->

@endsection