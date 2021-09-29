<h1 class="page-title"><u>Result's</u></h1>
		   <div class="tasks-list-container margin-top-35"> 
				@if(count($listings)>0)
				 @foreach ($listings as $item)
				<a href="{{url("listing-details/$item->id/")}}" class="task-listing">
					<!-- Job Listing Details -->
					<div class="task-listing-details">
						<!-- Details -->
						<div class="task-listing-description">
							@php
							$unlocked = unlocked($item);
							@endphp
							<h2 class="task-listing-title"><b>{{Str::limit($unlocked?$item->title:'Listing #SE'.$item->number)}}</b></h2>
							<br>
							{{-- @if($unlocked) --}}
							<ul class="task-icons">
								<button href="#" class="button ripple-effect">{{get_industry_name($item->industry_id)}}</button>
							</ul>
							{{-- @else
							<ul class="task-icons">
								<button href="#" class="button ripple-effect">Unlock Listing</button>
							</ul>
							@endif --}}
							<p class="task-listing-text">{{Str::limit($item->description,200)}}</p>
							<div class="task-tags">
								@foreach($item->monetization as $monetize)
								<span>{{$monetize->listing_monetization->name}}</span>
								@endforeach
							</div>
						</div>
					</div>
					<div class="task-listing-bid">
						<div class="task-listing-bid-inner">
							@if($unlocked)
							<div class="task-offers"> <strong>$ {{number_format($item->price,2)}}</strong></div> <span class="button dark ripple-effect button-sliding-icon" style="background-color: rgba(0, 0, 0, 0.624);">Buy Now <i class="icon-material-outline-arrow-right-alt"></i></span> </div>
							@else
							<div class="task-offers"> <strong>$ {{number_format($item->price,2)}}</strong></div> <span class="button dark ripple-effect button-sliding-icon" style="background-color: black;">Unlock Listing <i class="icon-material-outline-arrow-right-alt"></i></span> </div>
							@endif
				
						</div>
				</a> @endforeach
				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<!-- Pagination -->
						 <div class="pagination-container margin-top-30 margin-bottom-60">
							<nav class="pagination">

								<ul>
                                   <!--CUSTOM PAGINATION-->
								   <?php
								   $getData=$listings->links()->paginator;
								   $getData = json_encode($getData);
								   $getData = json_decode($getData);
								   $current=$getData->current_page;
								?>
								@foreach ($listings->links()->elements[0] as $key=>$value)
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
				<!-- Pagination / End -->@else
				<!--no result found-->
				<div class="notification warning closeable"> <b>
				 <p>	
				 <i class="icon-material-outline-info"></i> 
				 No Result Found</p>
					</b> </div> @endif </div>