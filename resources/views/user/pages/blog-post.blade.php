@extends('user.layout.master')
@section('content')


<div class="clearfix"></div>
<!-- Header Container / End -->



<!-- Content
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Blog</h2>
				<span>Blog Post Page</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Blog</a></li>
						<li>Blog Post</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>

<!-- Post Content -->
<div class="container">
	<div class="row">
		
		<!-- Inner Content -->
		<div class="col-xl-8 col-lg-8">
			<!-- Blog Post -->
			<div class="blog-post single-post">

				<!-- Blog Post Thumbnail -->
				<div class="blog-post-thumbnail">
					<div class="blog-post-thumbnail-inner">
						<span class="blog-item-tag"></span>
					<img src="{{asset('storage/blog_images/'.$post->image)}}" alt="">
					</div>
				</div>

				<!-- Blog Post Content -->
				<div class="blog-post-content">
				<h3 class="margin-bottom-10">{{$post->title}}</h3>

					<div class="blog-post-info-list margin-bottom-20">
						<a href="#" class="blog-post-info">{{date_frmt($post->created_at)}}</a>
		
					</div>

				<p>{!! $post->description !!}</p>
				
					<!-- Share Buttons -->
					<div class="share-buttons margin-top-25">
						<div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
						<div class="share-buttons-content">
							<span>Interesting? <strong>Share It!</strong></span>
							<ul class="share-buttons-icons">
								<li><a href="#" data-button-color="#3b5998" title="Share on Facebook" data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
								<li><a href="#" data-button-color="#1da1f2" title="Share on Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
								<li><a href="#" data-button-color="#dd4b39" title="Share on Google Plus" data-tippy-placement="top"><i class="icon-brand-google-plus-g"></i></a></li>
								<li><a href="#" data-button-color="#0077b5" title="Share on LinkedIn" data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
							
							</ul>
						</div>
					</div>
				</div>

			</div>
			<!-- Blog Post Content / End -->
		
			
			<!-- Related Posts -->
			{{-- <div class="row">
				
				<!-- Headline -->
				<div class="col-xl-12">
					<h3 class="margin-top-40 margin-bottom-35">Related Posts</h3>
				</div>

				@foreach ($related_post as $item)
				<!-- Blog Post Item -->
				<div class="col-xl-6">
					<a href="{{url('blog-post/'.$item->id)}}" class="blog-compact-item-container">
						<div class="blog-compact-item">
							<img src="{{asset('storage/blog_images/'.$item->image)}}" alt="">
							<span class="blog-item-tag">Recruiting</span>
							<div class="blog-compact-item-content">
								<ul class="blog-post-tags">
									<li>29 June 2019</li>
								</ul>
							<h3>{{$item->title}}</h3>
								<p>{{$item->tag}}</p>
							</div>
						</div>
					</a>
				</div>
				<!-- Blog post Item / End -->		
				@endforeach
			

			
			</div> --}}
			<!-- Related Posts / End -->
				


		</div>
		<!-- Inner Content / End -->


		<div class="col-xl-4 col-lg-4 content-left-offset">
			<div class="sidebar-container">
				
			

				<!-- Widget -->
				<div class="sidebar-widget">

					<h3>Featured Posts</h3>
					<ul class="widget-tabs">

						@foreach ($related_post as $item)
						<!-- Post #1 -->
						<li>
							<a href="#" class="widget-content active">
								<img src="{{asset('storage/blog_images/'.$item->image)}}" alt="">
								<div class="widget-text">
									<h5>{{$item->tag}}</h5>
									<span>{{date_frmt($item->created_at)}}</span>
								</div>
							</a>
						</li>

					
					
						@endforeach
					</ul>

				</div>
				<!-- Widget / End-->


				<!-- Widget -->
				<div class="sidebar-widget">
					<h3>Social Profiles</h3>
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


@endsection