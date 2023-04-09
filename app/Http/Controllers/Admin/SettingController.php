<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        return view('admin.setting.index', compact('setting'));
    }


    public function savedata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website_name' => 'required|max:255',
            'website_logo' => 'nullable',
            'website_favicon' => 'nullable',
            'description' => 'nullable',
            'meta_title' => 'required|max:255',
            'meta_ketword' => 'nullable',
            'meta_description' => 'nullable',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $setting = Setting::where('id', '1')->first();

        // Update Code
        if ($setting) {

            $setting->website_name = $request->website_name;

            if ($request->hasFile('website_logo')) {

                // If file already Exist
                $destination = 'uploads/settings/' . $setting->logo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('website_logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->logo = $filename;
            }

            if ($request->hasFile('website_favicon')) {

                $destination = 'uploads/settings/' . $setting->favicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('website_favicon');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->favicon = $filename;
            }


            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;

            $setting->save();

            return redirect('admin/settings')->with('message', 'Setting Updated!');
        } else {
            // Insert new data
            $setting = new Setting;
            $setting->website_name = $request->website_name;

            if ($request->hasFile('website_logo')) {
                $file = $request->file('website_logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('upload/settings/', $filename);
                $setting->logo = $filename;
            }

            if ($request->hasFile('website_favicon')) {
                $file = $request->file('website_favicon');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('upload/settings/', $filename);
                $setting->favicon = $filename;
            }


            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;

            $setting->save();

            return redirect('admin/settings')->with('message', 'Setting Added');
        }
    }
}
