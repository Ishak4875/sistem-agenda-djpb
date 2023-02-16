<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function changePassword()
    {
        return view('v_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'old_password'=>'required',
            'new_password'=>'required|confirmed',
            'new_password_confirmation'=>'required'
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Password Lama Tidak Sesuai");
        }

        try {
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            return redirect()->route('jadwal')->with('success','Password Telah Diperbarui');
        } catch (\Throwable $ex) {
            return back()->with('error','Password Gagal Diperbarui');
        }
    }
}
