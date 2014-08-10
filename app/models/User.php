<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');
	
	
	
	//Specifies which values can be mass assigned.
	protected $fillable = array('first_name', 'email', 'last_name');

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
	
	
	
	//authentication function
	
	public static function validate() 
	{
	
	$input = Input::all();
	$rules = array
	(
        'firstname' => 'Required|Min:3|Max:80|Alpha',
        'email'     => 'Required|Between:3,64|Email|Unique:user',
        'lastname'  => 'Required|Min:3|Max:80|Alpha',
        'password'  =>'Required|AlphaNum|Between:4,12|Confirmed',
        'password_confirmation'=>'Required|AlphaNum|Between:4,12'
	);
	
	
	$v = Validator::make($input, $rules);
	
			if( $v->passes() ) 
			{
				$last_id = DB::table('user')
                    ->orderBy('id', 'desc')
                    ->first();
			


					$user = new User;
					$user->first_name = Input::get('firstname');
					$user->last_name = Input::get('lastname');
					$user->email = Input::get('email');
					$user->password = Hash::make(Input::get('password'));
					if($last_id)
					{
						$user->payment_id = $last_id->id +1;
					}
					else
					{
						$user->payment_id =1;
					}
					$user->save();

			}

				 return Redirect::to('sign_up')->withErrors($v);
			
	
	}

}