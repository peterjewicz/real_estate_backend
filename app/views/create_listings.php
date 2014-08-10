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


</div>
  </head>
  <body>
	<div class="top_brown">
	</div>
	
	<div class="top_green">
	</div>
	
	<div class="footer_fix">
	
    <div class="container">
	
		<?php require ('includes/header.php'); ?>
		
		
		<div class="row main_wrap create_listings">
			 <h1>Create Listing</h1>
			 
			 
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
			
	
	
		<form action="create_listing" method="post">
			<label for="state">State</label>
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
			</br>
			
			<label for="city">City:</label>
			<input type="text" class="city" name="city" />
			</br>
		
			<label for="zip_code">Zip Code</label>
			<input type="text" class="zip_code" name="zip_code" />
			</br>
		
			<label for="county">County</label>
			<select class="county" name="county">
			</select>
			</br>
		
			<label for="address">Address:</label>
			<input type="text" class="address" name="address" />
			</br>

			<label for="price">Price:</label>
			<input type="text" class="price" name="price"/>
			</br>
		
			<label for="acreage">acreage:</label>
			<input type="text" class="acreage" name="acreage" />
			</br>
		
			<label for="type">Property Type</label>
			<select class="type" name="type">
				<option value="low_crop">Low Crop</option>
				<option value="house">House</option>
				<option value="cattle">Cattle</option>
				<option value="hunting">Hunting</option>
			</select>
			</br>
		
			<label for="water_front">Water Front Property (lake/river? Check For Yes)</label>
			<input type="checkbox" name="water_front" value="1"> 
			</br>
		
			<label for="longitude">Longitude (Optional):</label>
			<input type="text" class="Longitude" name="Longitude" />
			</br>
		
			<label for="latitude">Latitude (Optional):</label>
			<input type="text" class="latitude" name="latitude" />
			</br>
	
			<input type="submit" value="Submit">
		</form>
	
		
			
			
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
	
	<script>
  
  
  // Function for grabbing counties based on state
  $('.state').change(function(){

	current_state = $('.state').val();
	  $.ajax({
        url: 'ajax', 
        type: "POST",
        data: ({state: current_state}),
		success:function(data) {
			data = JSON.parse(data);
			i = 0;
			
			$('.county').find('option').remove(); // remove current select options
			
			$('.county')
			.append($("<option></option>")
			.attr("value","")
			.text("County"));
			
			while(i < data.length) // loop through and append new selects
			{
				$('.county')
				.append($("<option></option>")
				.attr("value",data[i].county)
				.text(data[i].county));
				i++;
			}
		
		}
		});
		
	});
	
	</script>

  </body>
</html>