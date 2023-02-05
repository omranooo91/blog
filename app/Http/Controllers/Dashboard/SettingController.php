<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function update(Request $request , Setting $settings){


       $data = [
           'logo' => 'nullable|image|mimes:jpg,png,jpeg,webp,gif,svg|max:2048',
           'favicon' => 'nullable|image|mimes:jpg,png,jpeg,webp,gif,svg|max:2048',
           'instagram' => 'required|string',
           'facebook' => 'nullable|string',
           'email' => 'nullable|email',
       ];

       foreach (config('app.languages') as $key => $lang){
           $data[$key.'*.title'] = 'nullable|string';
           $data[$key.'*.content'] = 'nullable|string';
       }


       $settings->update($request->except('image','favicon','_token'));
       $validatedData = $request->validate($data);


        if ($request->file('logo')){
            $file = $request->file('logo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images'),$filename);
            $path = 'images/'.$filename;
            $settings->update(['logo'=>$path]);
        }

        if ($request->file('favicon')){
            $file = $request->file('favicon');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images'),$filename);
            $path = 'images/'.$filename;
            $settings->update(['favicon'=>$path]);
        }

       return redirect()->route('dashboard.settings');
    }
}
