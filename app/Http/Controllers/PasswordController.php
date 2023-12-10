<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    // Change Password
    public function show(){
        return view('system.security.change-password');
    }

    public function changePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            Alert::error('Error!', 'Current password is incorrect.');
            return redirect()->route('change_password.form');
        }

        $users = [
            'id' => $user->id,
            'password' => Hash::make($request->input('password')),
        ];

        DB::table('users')->where('id', $user['id'])->update($users);
        Alert::success('Success!', 'Password Changed Successfully.');
        return redirect()->route('dashboard');
    }

    // Reset Password
    public function resetPassword(Request $request){
        $email = $request->input('email');
        $doctor = Doctor::where('email', $email)->first();
        $user = $doctor->user;


        if (!$doctor) {
            Alert::error('error', 'User not found.');
            return redirect()->back();
        }

        $newPassword = Str::random(8);

        $doctor->password = $newPassword;
        $user->password = Hash::make($newPassword);

        $doctor->save();
        $user->save();

        Mail::send('emails.passwordReset',['doctor' => $doctor],function($message) use($user){
            $message->to($user->email,$user->name)->subject('Password Reset Successfully');
        });

        Alert::success('Success', 'Password Reset Successfully.');
        return redirect()->route('doctor.index');

   }

    // Forgot Password
    public function showForgot(){
        return view('system.security.forgot-password');
    }

    public function forgotPassword(Request $request){
        $email = $request->input('email');
        $doctor = Doctor::where('email', $email)->first();

        if (!$doctor) {
            Alert::error('error', 'Email not found.');
            return redirect()->back();
        }

        Mail::send('emails.forgotPassword', ['doctor' => $doctor], function ($message) use ($doctor) {
            $message->to($doctor->email, $doctor->first_name)
            ->subject('Forgot Password Reset Notification');
        });

        Alert::success('Success', 'Link Sent Successfully.');
        return redirect()->route('password.forgot');

        // $doctor->password = $newPassword;
        // $user->password = Hash::make($newPassword);

        // $doctor->save();
        // $user->save();

    }

    public function forgotPasswordReset(){

    }
}
