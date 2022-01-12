<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Storage;
class UserApiController extends Controller
{
    //
	// Signup
	public function signup(Request $request)
	{
		

		$validation = Validator::make($request->all(), [
				'name' => 'required|max:255',
				'email' => 'required|email|max:255',
				'mobile' => 'required',
				'device_type' => 'required|in:android,ios',
				'user_type' => 'required|in:0,1,2',
				'device_token' => 'required',
				'password' => 'required|min:8',
			]);
			if ($validation->fails()){
				$msg = '';
				 $messages = $validation->messages();
				 foreach ($messages->all() as $message)
	            {
	               $msg = $message;
	               break;
	            }
	            $response = [
					'code' => 401,
					'message' => $msg,
				];
			}else{
				
				$User = $request->all();
				$User['password'] = bcrypt($request->password);

				$User = User::create($User);
				$token = $User->createToken('LoginToken')->plainTextToken;		   

				// if(config('constants.send_email', 0) == 1) {
				// 	// send welcome email here
				// 	Helper::site_registermail($User);
				// } 

				$response = [
					'code' => 200,
					'message' => 'Account created Successfully',
					'data' => $User,
					'AppToken' => $token
				];
			}
			return response($response,200);
	   
	}
	public function login(Request $request)
	{
		$validation = Validator::make($request->all(), [
			'email' => 'required|email|max:255',
			'user_type' => 'required|in:0,1,2',
			'device_token' => 'required',
			'device_type' => 'required',
			'password' => 'required|min:8',
		]);
		if ($validation->fails()){
			$msg = '';
			 $messages = $validation->messages();
			 foreach ($messages->all() as $message)
            {
               $msg = $message;
               break;
            }
            return $response = [
				'code' => 401,
				'message' => $msg,
			];
		}
		if(Auth::guard("web")->attempt(['email'=>$request->email, 'password' => $request->password, 'device_type' => $request->device_type])) {
			$user = Auth::guard("web")->user();
			if($user) {
				$Update = User::where('email',$request->get('email'))->update(['device_token' => $request->get('device_token')]);
				$token = $user->createToken('LoginToken')->plainTextToken;
				if(!empty($user['profile'])){
			        $file = storage_path('app/public/users/'.$user['profile']);
			        if(file_exists($file)){
			            $user['profile'] = env('APP_URL').Storage::url('app/public/users/'.$user['profile']);
			        }
				}
				if(!empty($user['cnic'])){
			        $file = storage_path('app/public/users/'.$user['cnic']);
			        if(file_exists($file)){
			            $user['cnic'] = env('APP_URL').Storage::url('app/public/users/'.$user['cnic']);
			        }
				}
				$response = [
					'code' => 200,
					'message' => 'Account Logged in Successfully',
					'data' => $user,
					'AppToken' => $token
				];
			}
			return response($response);
		}else{
			return response([
				'code' => 401,
				'message' => 'Email or Password is invalid',
			],401);
		}
		
	}

	// verify images 
	public function verify_images(Request $request){
		$validation = Validator::make($request->all(), [
				'user_id' => 'required',
				'profile' => 'required|mimes:jpg,jpeg,png',
				'cnic' => 'required|mimes:jpg,jpeg,png',
			]);
			if ($validation->fails()){
				$msg = '';
				 $messages = $validation->messages();
				 foreach ($messages->all() as $message)
	            {
	               $msg = $message;
	               break;
	            }
	            $response = [
					'code' => 401,
					'message' => $msg,
				];
			}else{
				if ($request->hasFile('profile')) {

		            $request->profile->store('users', 'public');
		            $profile = $request->profile->hashName();
		        }
		        if ($request->hasFile('cnic')) {

		            $request->cnic->store('users', 'public');
		            $cnic = $request->cnic->hashName();
		        }
				$user_update =  User::find($request->get('user_id'));
				$user_update->profile =  $profile;
				$user_update->cnic =  $cnic;
				$user_update->save(); 
				$user_update['profile'] = env('APP_URL').Storage::url('app/public/users/'.$user_update['profile']);
				$user_update['cnic'] = env('APP_URL').Storage::url('app/public/users/'.$user_update['cnic']);
				$response = [
					'code' => 200,
					'message' => 'Files Uploaded Successfully',
					'data' => $user_update,
				];
			}
			return response($response,200);
	}


	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function logout(Request $request)
	{

		try {
			User::where('id', $request->id)->update(['device_token' => '']);
			auth()->user()->tokens()->delete();
			return response()->json(['code'=>200,'message' => 'logout Successfully'],200);
		} catch (Exception $e) {
			return response()->json(['code'=>401,'error' => 'Error Occurs while logout'], 500);
		}
	}
}
