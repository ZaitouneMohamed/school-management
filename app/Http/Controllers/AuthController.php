<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }

    public function AuthController(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email|max:249',
            'password' => 'required|max:249',
        ]);
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            if (Auth::user()->role === 1) {
                return redirect()->route("admin.home");
            } elseif (Auth::user()->role === 2) {
                return redirect()->route("teacher.home");
            } elseif (Auth::user()->role === 3) {
                return redirect()->route("student.home");
            } elseif (Auth::user()->role === 4) {
                return redirect()->route("parent.home");
            }
        } else {
            return redirect()->back()->with([
                "error" => "Invalid Email or Password"
            ]);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route("auth.login.view");
    }

    public function ForgetPasswordView()
    {
        return view('auth.forget-password');
    }

    public function ForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('mail.forgot', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.resetpassword', ['token' => $token]);
    }
    public function submitResetPasswordForm(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|email|exists:users',
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect('/')->with('message', 'Your password has been changed!');
    }
}
