<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Listings extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'listings';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	

	//Specifies which values can be mass assigned.
	//protected $fillable = array('username', 'email');
	
	
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
	
	
		public static function create_listing() 
	{
	
	$input = Input::all();
	$rules = array
	(
        'state' => 'Required',
        'city'     => 'Required|Between:3,64',
        'zip_code'  => 'Required|digits:5|integer',
        'address'  =>'Required',
        'acreage'=>'Required|integer',
		//'property_type' => 'Required',
		'price' => 'Required|integer'
	);
	
	
	$v = Validator::make($input, $rules);
	
			if( $v->passes() ) 
			{
				$listings = new listings;
				$listings->state = Input::get('state');
				$listings->city = Input::get('city');
				$listings->zip_code = Input::get('zip_code');
				$listings->county = "placeholder";
				$listings->address = Input::get('address');
				$listings->price = Input::get('price');
				$listings->acreage = Input::get('acreage');
				$listings->type_of_land = Input::get('type');
				$listings->water_front = Input::get('water_front');
				
				if(!isset($listings->water_front))
					{
						$listings->water_front = 0;
					}

					
				$listings->status = 1;
				$listings->agent_id = Auth::user()->id;
				$listings->save();
				
				Session::put('last_insert_id', $listings->id);
				return Redirect::to('upload');

			}

		  return Redirect::to('create_listings')->withErrors($v);
			
	
	}

}