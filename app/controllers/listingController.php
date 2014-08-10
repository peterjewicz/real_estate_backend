<?php

class listingController extends \BaseController 
{


	public function home()
		{
			$listings = DB::table('user')
				->join('listings', 'listings.agent_id', '=', 'user.id')
				->where('user.user_level', '=', 3)
				->where('listings.status', '=', 1)
				->get();
				Session::put('premier_listings', $listings);
				
			$listings = DB::table('user')
				->join('listings', 'listings.agent_id', '=', 'user.id')
				->where('user.user_level', '=', 2)
				->where('listings.status', '=', 1)
				->get();
				Session::put('premium_listings', $listings);
				
			$listings = DB::table('user')
				->join('listings', 'listings.agent_id', '=', 'user.id')
				->where('user.user_level', '=', 1)
				->where('listings.status', '=', 1)
				->get();
				Session::put('featured_listings', $listings);
				
			$listings = DB::table('user')
				->join('listings', 'listings.agent_id', '=', 'user.id')
				->where('user.user_level', '=', 0)
				->where('listings.status', '=', 1)
				->get();
				Session::put('basic_listings', $listings);
				
			return View::make('index');
			
		}

	public function get_all()
		{
			$listings = DB::table('listings')->get();
			Session::flash('all_listings', $listings);
			return View::make('listings');
		}
	
	public function create_listing()
	{
		return LISTINGS::create_listing();
		
	
	}
	
	public function upload()
	{
		
		$input = Input::all();
		
		
	$rules = array
	(
        'file' => 'image | Max:2048'
	);
	
	
	$v = Validator::make($input, $rules);
	
	
	if ($v->fails())
		{
			return Response::json('Error Wrong File type', 400);
		}
	
	$file = Input::file('file');
	if( $v->passes() ) 
	{
		
		$l = 0; 
		$dir = 'photos';
		if ($handle = opendir($dir)) {
			while (($file = readdir($handle)) !== false){
            if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
                $l++;
			}
		}
		
		
		$dir = 'photos/' . $l;
		$i = 0;
		if ($handle = opendir($dir)) {
			while (($file = readdir($handle)) !== false){
            if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
                $i++;
			}
		}
		
		if($i >= 10000)
			{	
				$l++;
				$myDir = 'photos/' . $l;
				mkdir($myDir);
				
				$destinationPath = $myDir;
				$i = 0;
			}
		else
			{
				$destinationPath = 'photos/' . $l;
			}
		
		// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
		$filename = $i + 1 . ".jpg";
		//$filename = $file->getClientOriginalName();
		//$filename = $filename . $extension;
		$upload_success = Input::file('file')->move($destinationPath, $filename);
 
		if( $upload_success ) 
		{
			$i++;
			$src = $l . "/" . $i;
			$last_id = Session::get('last_insert_id');
			DB::table('photos')->insert(array('listing_id' => $last_id, 'src' => $src));
			return 10;
		} 
		else 
		{
			return 20;
		}
	}
	
	else
	{
		return Redirect::to('upload')->withErrors($v);
	}
	
	}
	

	
		public function display_listing()
	{
			$id = $_GET['id'];
			$listing = DB::table('listings')->where('id', '=',  $id)->first();
			return View::make('single_listing')->withlisting($listing);
	}
	
	
	public function ajax_call()
	{
		$counties = $_POST['state'];
		$counties = DB::table('counties')->where('state', '=',  $counties)->get();
	
			echo json_encode($counties);
			
		

		
		
	}
	
	public function manage_listing()
	{
	
		$id = $_GET['id'];
		$user = Session::get('user');
		$user_id = $user[0]->id;
		$managed_listing = DB::table('listings')->where('id', '=',  $id)->get();
		
		if($managed_listing[0]->agent_id == $user_id)
		{	
			Session::flash('managed_listing', $managed_listing);
			return View::make('manage_listing');
		}
		else
		{
		 return  Redirect::to('/')->with('failed_login', 'You Do Not Have Permission To View That Page.');
		}
	}
	
	public function search()
	{
		if(isset($_POST['id']))
		{
			$id = $_POST['id'];
			$search_listings =  DB::table('listings')->where('id', '=',  $id)->get();
				if($search_listings)
					{
						return Redirect::to('single_listings?id=' . $search_listings[0]->id);
					}
		}
		
		$query = DB::table('listings');
		
		if($_POST['state']!= null)
		{
			$state = $_POST['state'];
			$query->where('state', '=', $state);
		}
		
		if($_POST['county']!= null)
		{
			$county = $_POST['county'];
			$query->where('county', '=',  $county);
		}
		
		if($_POST['price']!= null)
		{
			$price = $_POST['price'];
			$query->where('price', '<',  $price);
		}
		
	
		
		if($_POST['type']!= null)
		{
			$type = $_POST['type'];
			$query->where('type_of_land', '=',  $type);
		}
		
		if($_POST['availability']!= null)
		{
			$availability = $_POST['availability'];
			$query->where('status', '=',  $availability);
		}
		
		if($_POST['city'] != null)
		{
			$city = $_POST['city'];
			$query->where('city', '=',  $city);
		}
		
		$results = $query->get();
		
		Session::put('search', $results);
				
			return Redirect::to('completed_search');
		
	}
	
	
	
	public function update_listing()
	{
		$listing = Session::get('managed_listing');
		$title = Input::get('title');
		$state = Input::get('state');
		$city = Input::get('city');
		$zip_code = Input::get('zip_code');
		$county= Input::get('county');
		$address = Input::get('address');
		$price = Input::get('price');
		$acreage = Input::get('acreage');
		$type = Input::get('type');
		$water_front = Input::get('water_front');
		$latitude = Input::get('latitude');
		$longitude = Input::get('longitude');
		$description = Input::get('description');
		
		if($title != "")
		{
			DB::table('listings')
            ->where('id', $listing)
            ->update(array('title' => $title));
		}
		
		if($state != "")
		{
			DB::table('listings')
            ->where('id', $listing[0]->id)
            ->update(array('state' => $state));
		}
		
		if($city != "")
		{
			DB::table('listings')
            ->where('id', $listing[0]->id)
            ->update(array('city' => $city));
		}
		
		if($zip_code != "")
		{
			DB::table('listings')
            ->where('id', $listing[0]->id)
            ->update(array('zip_code' => $zip_code));
		}
		
		if($county != "")
		{
			DB::table('listings')
            ->where('id', $listing[0]->id)
            ->update(array('county' => $county));
		}
		
		if($address != "")
		{
			DB::table('listings')
            ->where('id', $listing[0]->id)
            ->update(array('address' => $address));
		}
		
		if($price != "")
		{
			DB::table('listings')
            ->where('id', $listing[0]->id)
            ->update(array('price' => $price));
		}
		
		if($acreage != "")
		{
			DB::table('listings')
            ->where('id', $listing[0]->id)
            ->update(array('acreage' => $acreage));
		}
		
		if($type != "")
		{
			DB::table('listings')
            ->where('id', $listing[0]->id)
            ->update(array('type' => $type));
		}
		
		if($water_front != "")
		{
			DB::table('listings')
            ->where('id', $listing[0]->id)
            ->update(array('water_front' => $water_front));
		}
		
		if($latitude != "")
		{
			DB::table('listings')
            ->where('id', $listing[0]->id)
            ->update(array('latitude' => $latitude));
		}
		
		if($longitude != "")
		{
			DB::table('listings')
            ->where('id', $listing[0]->id)
            ->update(array('longitude' => $longitude));
		}
		
			  DB::table('listings')
            ->where('id', $listing)
            ->update(array('description' => $description));
		
		
		return  Redirect::To('manage?id=' . $listing)->with('manage_success', 'You Have Successfully Updated Your Listing');
		
	}
	
	

}
?>