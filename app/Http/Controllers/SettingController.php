<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settings(){

        // return 'gfgdf';
        $settings = Setting::all();

        return view('admin.settings.setting',compact('settings'));
    }


    public function update_settings(Request $request)
    {
        // return $request->all();
        try {
            // Validation rules
            $data = $request->validate([
                'key' => "required|exists:settings,key",
                'value' => "required",
            ]);
    
            if ($data['key'] == 'brand_logo') {
                if ($request->hasFile('brand_logo')) {
                    $image = $request->file('brand_logo');
                    $BrandImageName = time() . '.' . $image->getClientOriginalExtension();
                    $path = public_path('/upload_image');
                    $image->move($path, $BrandImageName);
                } else {
                    return back()->with('danger','Image not found');
                }
    
                Setting::where('key', $data['key'])->update(['value' => $BrandImageName]);
    
            } elseif ($data['key'] == 'brand_logo_white') {
                if ($request->hasFile('brand_logo_white')) {
                    $image = $request->file('brand_logo_white');
                    $BrandLogoWhiteName = time() . '.' . $image->getClientOriginalExtension();
                    $path = public_path('/upload_image');
                    $image->move($path, $BrandLogoWhiteName);
                } else {
                    return back()->with('danger','Image not found');
                }
    
                Setting::where('key', $data['key'])->update(['value' => $BrandLogoWhiteName]);
    
            } else {
                Setting::where('key', $data['key'])->update(['value' => $data['value']]);
            }
    
            return back()->with('success', 'Settings updated successfully');
        } catch (Exception $ex) {
            return back()->withErrors(['danger' => $ex->getMessage()])->withInput();
        }
    }

}
