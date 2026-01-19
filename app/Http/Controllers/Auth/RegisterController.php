<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\roles;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'eto_location_id'=> ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if(isset($data['roletxt']))
        {
            $role=roles::where('role',rtrim(ltrim($data['roletxt'],''),''))->first();
            if($role==null)
            {
                $role =roles::create([
                    'role'=>rtrim(ltrim($data['roletxt'],''),'')
                ]);
                
            }
            
        }
        else
        {
            $role=roles::find($data['role']);
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role'=> $role!=null ? $role->role : 'User' ,
            'role_id'=> $role!=null ? $role->id : 2 ,
            'eto_location_id'=> $data['eto_location_id'],
            'password' => Hash::make($data['password']),
        ]);
       
    }
}
