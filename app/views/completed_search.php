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
			
			<?php require ('includes/sidebar.php'); ?>
			
			<div class="col-sm-9 main_content">
			
			<div class="regular_listings row">
					<?php
					if(Session::get('search'))
					{
						$basic_listings = Session::get('search');
						foreach($basic_listings as  $listing)
						{
							$photo = DB::table('photos')->where('photos.listing_id', '=', $listing->id)->get();
							echo(
							'
								<div class="col-sm-12">
									<div class="row regular_listings_wrap">
										<div class="col-sm-3">
											<img src="photos/' . $photo[0]->src . '.jpg" width="100%" height="160px">
										</div>
										
										<div class="col-sm-8">
											<a href="single_listings?id=' . $listing->id . '"><h4>' . $listing->title . " - " . $listing->county . ", ". $listing->state . " " . $listing->zip_code . '</h4></a>
											<ul>
												<li>ID#: ' . $listing->id . '</li>
												<li>Price: ' . $listing->price . '</li>
												<li>Acreage: ' . $listing->acreage . '</li>
											</ul>
													
											<p><span class="description_text">Description: </span>' .
												substr($listing->description,0,150) . '</br>
												<span class="more_details"> <a href="single_listings?id=' . $listing->id . '"> See Full Listing Details </a></span>
											</p>
										</div>
										
										<div class="col-sm-1">
										</div>
									</div>
								</div>
							');
						}
					}
					else
					{
						echo('No Listings Fitting Your Search Options, Please Try Again');
					}
					?>

				</div>
			
			
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