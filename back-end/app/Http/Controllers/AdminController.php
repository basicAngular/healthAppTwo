<?php
namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function test_yogesh()
    {
        return $hashed = Hash::make('Password@123');
    }

    public function adminLlogin(Request $request)
    {
        $email =  $request->email;
        $password = $request->password;
        $current_time = Carbon::now();
        // check user is available or not.
        $user = User::where('email', $email)->first();
        if(empty($user)){
            return response()->json(['status' => 'invalid'],401);
        }
        
        if(Hash::check($password, $user->password)){
            $apiKey = base64_encode(str_random(40));
            DB::table('users')
                ->where('email', $email)
                ->update(['api_key' => "$apiKey", 'last_login' => "$current_time"]);
            //return response()->json(['status' => 'success','api_key' => $apiKey]);
            $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $host = explode('api',$actual_link);
            $user ['imageUrl'] = $host[0].'images/admin_profiles/'.$user['temp_img_url'];
            return response()->json(['status' => 'success','data' => $user]);
        }else{
            return response()->json(['status' => 'invalid'],401);
        }
    }
}
