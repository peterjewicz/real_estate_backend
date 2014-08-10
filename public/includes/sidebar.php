<?php

echo ( '<div class="col-sm-3 sidebar">
			<h3>Quick Search</h3>
		<div class="form_wrap">	
			<form action="search" method="post">
				<ul>
					<li><label for="state">State</label>
						<select class="state" name="state">
							<option value="">State</option>
							<option value="AL">Alabama</option>
							<option value="AK">Alaska</option>
							<option value="AZ">Arizona</option>
							<option value="AR">Arkansas</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DE">Delaware</option>
							<option value="DC">D Of C</option>
							<option value="FL">Florida</option>
							<option value="GA">Georgia</option>
							<option value="HI">Hawaii</option>
							<option value="ID">Idaho</option>
							<option value="IL">Illinois</option>
							<option value="IN">Indiana</option>
							<option value="IA">Iowa</option>
							<option value="KS">Kansas</option>
							<option value="KY">Kentucky</option>
							<option value="LA">Louisiana</option>
							<option value="ME">Maine</option>
							<option value="MD">Maryland</option>
							<option value="MA">Massachusetts</option>
							<option value="MI">Michigan</option>
							<option value="MN">Minnesota</option>
							<option value="MS">Mississippi</option>
							<option value="MO">Missouri</option>
							<option value="MT">Montana</option>
							<option value="NE">Nebraska</option>
							<option value="NV">Nevada</option>
							<option value="NH">New Hampshire</option>
							<option value="NJ">New Jersey</option>
							<option value="NM">New Mexico</option>
							<option value="NY">New York</option>
							<option value="NC">North Carolina</option>
							<option value="ND">North Dakota</option>
							<option value="OH">Ohio</option>
							<option value="OK">Oklahoma</option>
							<option value="OR">Oregon</option>
							<option value="PA">Pennsylvania</option>
							<option value="RI">Rhode Island</option>
							<option value="SC">South Carolina</option>
							<option value="SD">South Dakota</option>
							<option value="TN">Tennessee</option>
							<option value="TX">Texas</option>
							<option value="UT">Utah</option>
							<option value="VT">Vermont</option>
							<option value="VA">Virginia</option>
							<option value="WA">Washington</option>
							<option value="WV">West Virginia</option>
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						</select>
					</li>
					
					<li><label for="county">County</label>
						<select class="county" default="" name="county">
							<option value="">County</option>
						</select>
					</li>
					
					<li><label for="Price">Max Price</label>
						<select class="price" name="price">
							<option value="">Maximum price</option>
							<option value="50000">$50,000</option>
							<option value="100000">$100,000</option>
							<option value="200000">$200,000</option>
							<option value="500000">$500,000</option>
							<option value="1000000">$1,000,000</option>
							<option value="5000000">$5,000,000</option>
							<option value="100000000000">$5,000,000+</option>
						</select>
					</li>
					
					<li><label for="City">City</label>
						<input class="city" name="city" type="text" />
					</li>
					
					<li><label for="acreage">Acreage</label>
						<select class="acreage" name="acreage">
							<option value="">Acreage</option>
							<option value="0-100">0-100</option>
							<option value="100-500">100-500</option>
							<option value="500-1000">500-1000</option>
							<option value="1000-5000">1000-5000</option>
							<option value="5000-20000">5000-20000</option>
							<option value="20000">20000+</option>
						</select>
					</li>
					
					<li><label for="type">Type</label>
						<select class="type" name="type">
							<option value="">Type</option>
							<option value="Low Crop">Low Crop</option>
							<option value="House">House</option>
							<option value="Cattle">Cattle</option>
							<option value="Hunting">Hunting</option>
						</select>
					</li>
					
					<li><label for="availability">Availability</label>
						<select class="availability" name="availability">
							<option value="1">Available</option>
							<option value="0">Sold</option>
						</select>
					</li>
					
					<li><label for="id">ID#</label>
						<input class="id" name="id" type="text" />
					</li>
					
					
					
					<input type="submit" value="Search">
				</ul>
			</div>
				
				<div class="sign_up">
					<span class="red_text"><h4>Advertise FREE for 30 days</h4></span>
					<p> Unlimted Standard Listings 
					   Upload Your Photos
					   Edit Your Listing At Any Time
					 </P>
					 
					 <a href="sign_up"><p class="red_text">Sign Up!</p></a>
				</div>
				
				
				
				<div class="ads_wrap">
					Ads Go here
				</div>
			</form>
			
			</div>' );
			
?>