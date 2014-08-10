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
	</div>
	
	<div class="top_green">
	</div>
	
	<div class="footer_fix">
	
    <div class="container">
		
		<?php require ('includes/header.php'); ?>
		
		
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
		
			<?php
			$listing = Session::get('managed_listing');
			?>
			<div class="errors">
				<ul>
					<?php 
					
						if(Session::has('manage_success'))
							{
								echo("<li>" . Session::get('manage_success')  . "</li>");
							}
					?>
				</ul>
			</div>
			<h2>Use the Below Form to update your listing information. 
				Leave and option Blank if you do not wish to change it.
			</h2>
			<form action="update_listing" method="post">
			
			<label for="Title">Title</label>
			<input type="text" class="title" name="title" />
			<?php echo('Current: ' . $listing[0]->title); ?>
			</br>
			
			<label for="state">State</label>
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
			
			<?php echo('Current: ' . $listing[0]->state); ?>
			</br>
			
			<label for="city">City:</label>
			<input type="text" class="city" name="city" />
			<?php echo('Current: ' . $listing[0]->city); ?>
			</br>
		
			<label for="zip_code">Zip Code</label>
			<input type="text" class="zip_code" name="zip_code" />
			<?php echo('Current: ' . $listing[0]->zip_code); ?>
			</br>
		
			<label for="county">County</label>
			<select class="county" name="county">
			</select>
			<?php echo('Current: ' . $listing[0]->county); ?>
			</br>
		
			<label for="address">Address:</label>
			<input type="text" class="address" name="address" />
			<?php echo('Current: ' . $listing[0]->address); ?>
			</br>

			<label for="price">Price:</label>
			<input type="text" class="price" name="price"/>
			<?php echo('Current: ' . $listing[0]->price); ?>
			</br>
		
			<label for="acreage">acreage:</label>
			<input type="text" class="acreage" name="acreage" />
			<?php echo('Current: ' . $listing[0]->acreage); ?>
			</br>
		
			<label for="type">Property Type</label>
			<select class="type" name="type">
				<option value="">Type</option>
				<option value="low_crop">Low Crop</option>
				<option value="house">House</option>
				<option value="cattle">Cattle</option>
				<option value="hunting">Hunting</option>
			</select>
			<?php echo('Current: ' . $listing[0]->type_of_land); ?>
			</br>
		
			<label for="water_front">Water Front Property (lake/river? Check For Yes)</label>
			<input type="checkbox" name="water_front" value="1"> 
			<?php 
				if($listing[0]->water_front == 0)
				{
					echo('Current: No');
				}
				else
				{
					echo('Current: Yes');
				}
			?>
			</br>
		
			<label for="longitude">Longitude (Optional):</label>
			<input type="text" class="Longitude" name="Longitude" />
			<?php echo('Current: ' . $listing[0]->longitude); ?>
			</br>
		
			<label for="latitude">Latitude (Optional):</label>
			<input type="text" class="latitude" name="latitude" />
			<?php echo('Current: ' . $listing[0]->latitude); ?>
			</br>
			
			<label for="description">Description</label>
			<textarea rows="4" cols="50" class="description" name="description"><?php 
			echo($listing[0]->description);?></textarea>
	
			<input type="submit" value="Submit">
		</form>
			
			
	

			
			
		</div>
			
			<div class="footer row">
				<div class="col-sm-12">
				</div>
			</div>
			
		</div>
		

		
		
	</div>
	
	<div class="bottom_brown">
	</div>
	
	
	</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	

<?php
Session::put('managed_listing', $_GET['id']);
?>
  </body>
</html>