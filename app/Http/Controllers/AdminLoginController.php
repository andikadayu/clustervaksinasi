<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelUser;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    function index(){
        if (Session::get('is_login') == true) {
            return redirect('homeadmin');
        } else {
            return view('loginadmin');
        }
    }
    
    function post_login_admin(Request $request)
    {
        $email = $request->input('email');
        $password = md5($request->input('password'));
        $user = DB::table('users')->where('email', $email)->first();
        $condition = false;
    
        if ($user != null) {
            if ($user->email == $email && $user->password == $password) {
                $condition = true;
            }
        }
    
        if ($condition) {
            Session::put('is_login', true);
            Session::put('id_user', $user->id_user);
           
            Session::put('role', $user->role);
            Session::put('email', $user->email);
            return redirect()->route('homeadmin');
        } else {
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('loginadmin');
        }
    }
    
    public function register(Request $request)
    {
        $rules = [
            'username'                  => 'required|min:3|max:35',
            'email'                     => 'required|email|unique:users,email',
            'password'                  => 'required|confirmed'
        ];
    
        $messages = [
            'username.required'         => 'Username Lengkap wajib diisi',
            'username.min'              => 'Username lengkap minimal 3 karakter',
            'username.max'              => 'Username lengkap maksimal 35 karakter',
            'email.required'            => 'Email wajib diisi',
            'email.email'               => 'Email tidak valid',
            'email.unique'              => 'Email sudah terdaftar',
            'password.required'         => 'Password wajib diisi',
            'password.confirmed'        => 'Password tidak sama dengan konfirmasi password'
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
    
        $user = new ModelUser;
        $user->username = ucwords(strtolower($request->username));
        $user->email = strtolower($request->email);
        $user->password = md5($request->password);
        $user->role = 'admin';
        $simpan = $user->save();
    
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('loginadmin');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
    
    function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('loginadmin');
    }
}
