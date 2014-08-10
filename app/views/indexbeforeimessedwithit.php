<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ranch and Farm Lands</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	

  </head>
  <body>
	<div class="top_brown">
		I'm not
	</div>
	
	<div class="top_green">
		neither am i 
	</div>
	
    <div class="container">
		<div class="row header">
			<div class="col-sm-6 logo">
				<h1>Ranch and Farm Lands<h1>
			</div>
			<div class="col-sm-6 login_holder">
				<ul>
					<a href="#"><li>SignIn</li></a>
					<a href="#"><li>SingUp</li></a>
				</ul>
			</div>
		</div>
		<div class="row nav">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Profile</a></li>
					<li><a href="#">Listings</a></li>
					<li><a href="#">Search Properties</a></li>
					<li><a href="#">Advertise</a></li>
					<li><a href="#">Meet Our Agents</a></li>
				</ul>
		</div>
		
		
		<div class="row main_wrap">
			<div class="col-sm-3 sidebar">
				<h3>Quick Search</h3>
				<ul>
					<li><label for="state">State</label>
						<select class="state" name="state">
							<option value="AL">Alabama</option>
							<option value="AK">Alaska</option>
							<option value="AZ">Arizona</option>
							<option value="AR">Arkansas</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DE">Delaware</option>
							<option value="DC">District of Columbia</option>
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
						<select disabled class="County" name="county">
							<option value="WI"></option>
							<option value="WY"></option>
						</select>
					</li>
					<li><label for="Price">Price</label>
						<select class="price" name="price">
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						</select>
					</li>
					<li><label for="City">City</label>
						<input id="city" name="city" type="text" />
					</li>
					<li><label for="acreage">Acreage</label>
						<select class="acreage" name="acreage">
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						</select>
					</li>
					<li><label for="type">Type</label>
						<select class="type" name="type">
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						</select>
					</li>
					<li><label for="id">ID#</label>
						<input id="id" name="id" type="text" />
					</li>
					<li><label for="availability">Availability</label>
						<select class="availability" name="availability">
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						</select>
					</li>
				</ul>
				
				<div class="sign_up">
					<h4>Advertise FREE for 30 days</h4>
					<p> Unlimted Standard Listings </br>
					   Upload Your Photos</br>
					   Edit Your Listing At Any Time
					 </P>
					 
					 <p class="red_text">Sign Up!</p>
				</div>
				
				<div class="ads_wrap">
					Ads Go here
				</div>
				
			</div>
			<div class="col-sm-9 main_content">
				<div class="arrow_wrap">
						<div class="left arrow">
							<img src="images/left.png" alt="Previous Listing">
						</div>
						
						<div class="right arrow">
							<img src="images/right.png" alt="Next Listing">
						</div>
				</div>
				
				
				<?php
						$premier_listings = Session::get('premier_listings');
		
		foreach($premier_listings as  $listing)
			{
				$photo = DB::table('photos')->where('photos.listing_id', '=', $listing->id)->get();
				//echo("<li>" . $listing->id . "</li>");
				//echo("<li>" . $listing->city . "</li>");
				//echo("<li>" . $listing->state . "</li>");
				//var_dump($photo);
				//echo("<img src='photos/" . $photo[0]->id . ".jpg'>");
				
				echo('
				<div class="row top_content">
					<div class="col-sm-8 slider_image">
						<img src="photos/1.jpg" width="100%" height="200px">
						

					</div>
					<div class="col-sm-4 desc">'.
					$listing->id .
						
					'</div>
				</div>');
			}
			?>
				
				
	
				
				<div class="featured_content row">
					<div class="col-sm-12">
						featured
					</div>
				</div>
				
				<div class="featured_listings row">
					<div class="col-sm-12">
						blue listings
					</div>
				</div>
				
				<div class="featured_listings row">
					<div class="col-sm-12">
						listings
					</div>
				</div>
			</div>
			
			<div class="footer row">
				<div class="col-sm-12">
					footer
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="bottom_brown">
		or me
	</div>
	
	
	<div class="errors">
		<ul>
		<?php 
		    foreach($errors->all() as $message)
			{
        echo("<li>" . $message . "</li>");
		}
		
		if(Session::has('failed_login'))
		{
			echo("<li>" . Session::get('failed_login')  . "</li>");
		}
		
		
							  
		
		?>
		</ul>
	</div>
	
	<form action="sign_up" method="post">
		<label for="firstname">First Name:</label>
		<input type="text" class="firstname" name="firstname" />
		
		<label for="lastname">Last Name:</label>
		<input type="text" class="lastname" name="lastname" />
		
		<label for="email">Email:</label>
		<input type="text" class="email" name="email" />
		
		<label for="password">Password:</label>
		<input type="text" class="password" name="password" />
		
		<label for="password_confirmation">Re-Type Password:</label>
		<input type="text" class="password_confirmation" name="password_confirmation" />
		<input type="submit" value="Submit">
	</form>
	
	<form action="login" method="post">	
		<label for="email">Email:</label>
		<input type="text" class="email" name="email" />
		
		<label for="password">Password:</label>
		<input type="text" class="password" name="password" />

		<input type="submit" value="Submit">
	</form>
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
	<script>
		$( document ).ready(function() {
			slider_array = $('.top_content');
			slider_length = slider_array.length;
			i = 1;
			while( i < slider_length)
				{
					$(slider_array[i]).css("display", "none");
					i++;
				}
		});
	</script>
	
  </body>
</html>