<div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
	<!--Tabs -->
	<div class="sign-in-form">
		<ul class="popup-tabs-nav">
			<li><a href="#tab">Purchase This Business Today</a></li>
		</ul>
		<div class="popup-tabs-container">
			<!-- Tab -->
			<div class="popup-tab-content" id="tab">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Make a wire </h3> </div>
				<!-- Form -->
				@if(unlocked($listing))
				<form action="{{url('dashboard/buy_now')}}" method="POST"  id="buy_now_offer"> @csrf
					<input type="hidden" name="listing_id" value="{{$listing->id}}" />
					<div class="input-with-icon-left"> <i class="icon-feather-dollar-sign"></i>
						<input type="number" class="input-text with-border" id="full_price" name="amount" placeholder="Total Business Price" value="{{$listing->price}}" readonly="readonly" /> 

						<!-- <div class="input-with-icon-left"> <i class="icon-bank"></i> -->
						<input type="text" class="input-text with-border" id="BankName" name="bank_name" placeholder="Name of Bank" value="" required> 


						<!-- <div class="input-with-icon-left"> -->
						<input type="text" class="input-text with-border" id="AccountName" name="account_name" placeholder="Name of Account" value="" required> 

					</div>
					<textarea name="message_buy" cols="10" placeholder="Message" class="with-border" required></textarea>

					<ul class="list-2">
						<li >Obligations that come with obtaining Confidential Information about a business.</li>
						<li >Buyer’s obligation to perform independent due diligence into any purchase.</li>
						<li >Payment of the purchase price.</li>
						<li >Transfer of the business to a Buyer.</li>
						<li >Seller’s remedies upon Buyer’s default.</li>
					</ul>
					<!-- Button -->
					<button type="submit" class="button big dark " style="width: 100%;text-align:center;">SUBMIT</button>
					</form>
					@else
													<button class="button" onclick="unlock_listing({{$listing->id}})">Unlock Listing</button>

					@endif
			</div>
			
		</div>
	</div>

</div>