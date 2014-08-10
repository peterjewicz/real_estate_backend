<?php

class userController extends \BaseController 
{

	public function check_login()
	{
		if(Auth::check())
		{
			return View::make('profile');
		}
		else
		{
		return View::make('log_in');
		}
	}
	
	public function sign_up()
	{
		if(Auth::check())
		{
			return View::make('profile');
		}
		else
		{
		return View::make('sign_up');
		}
	}

	public function login()
	{


          $credentials = array(
            'email'  => Input::get('email'),
            'password'  => Input::get('password') 
        );

       
		if(Auth::attempt($credentials)) 
		{
			$user = DB::table('user')->where('email', '=', Input::get("email"))->get();
			Session::put('user', $user);
			
			
			$user_listing_active = DB::table('listings')
			->where('agent_id', '=',  $user[0]->id)
			->where('listings.status', '=', 1)
			->get();
				
				Session::put('user_listing_active', $user_listing_active );
            return  Redirect::to('profile')->with('current_user', $user);
        }
      
        else
		{
			
			return  Redirect::to('log_in')->with('failed_login', 'Invalid Password Or Username');
		}
    }
	
	public function create_user()
	{
		return USER::validate();
	
	}
}

?>