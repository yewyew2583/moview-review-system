<?php

namespace App\Http\Controllers\authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\RedirectResponse;

class authController extends Controller
{
    //login
    public function viewLoginPage(){
    	return view('loginpage');
    }

    public function userLogin(Request $req){
    	$username = $req -> username;
    	$password = $req -> password;

    	$users = DB::select('select * from member 
    						where username = "'.$username.'"
    						and password = "'.$password.
    						'" limit 0, 1;');

		if(count($users) >0)
		{
			$result = $users; 
			return response() -> json($result);
		}
		else
		{
			$result= false;
			return response()-> json($result); 
		}
    }
    //login end

    //register
    public function viewSignUpPage(){
    	return view('signuppage');
    }

    public function userRegister(Request $req){
      	$username = $req -> username;
      	$password = $req -> password;
      	$fullname = $req -> fullname;
      	$phoneno = $req -> phoneno;
   		
   		 DB::insert('insert into member(username, password, fullname, phoneno)
   					 values("'.$username.'","'.$password.'","'.$fullname.'","'.$phoneno.'");');

       return 'done register';

    }
	//register end*/

    public function checkMemberType($member_type){

        if($member_type === "ADMIN"){
            return true;
        }
        else{
            return false;
        }
    }
}
