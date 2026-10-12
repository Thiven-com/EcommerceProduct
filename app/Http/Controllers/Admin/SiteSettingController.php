<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Alert;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SiteSetting::find($id);
        return view('admin.site_settings.all', compact('data'));
    }
    public function site()
    {
        $site = SiteSetting::first();
        return view('admin.settings.site.company', compact('site'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function company_setting_update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'admin_logo' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
            'customer_care_no' => 'nullable|string|max:30',
            'help_line_no' => 'nullable|string|max:30',
            'gst' => 'nullable|string|max:100',
            'company' => 'nullable|string|max:255',
            'site_url' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'pinterest' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'site_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'favicon' => 'nullable|mimes:jpg,jpeg,png,ico,webp|max:1024',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $site = SiteSetting::first() ?? new SiteSetting();

        $textFields = [
            'site_name',
            'description',
            'short_description',
            'admin_logo',
            'address',
            'email',
            'phone',
            'customer_care_no',
            'help_line_no',
            'gst',
            'company',
            'site_url',
            'facebook',
            'linkedin',
            'youtube',
            'pinterest',
            'instagram',
            'twitter',
        ];

        $site->fill(collect($validated)->only($textFields)->all());

        // Company Logo
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_logo.' . $file->getClientOriginalExtension();

            $file->move(public_path('site/'), $fileName);

            $site->logo = 'site/' . $fileName;
        }

        // Site Logo
        if ($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            $fileName = time() . '_site_logo.' . $file->getClientOriginalExtension();

            $file->move(public_path('site/'), $fileName);

            $site->site_logo = 'site/' . $fileName;
        }

        // Favicon
        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $fileName = time() . '_favicon.' . $file->getClientOriginalExtension();

            $file->move(public_path('site/'), $fileName);

            $site->favicon = 'site/' . $fileName;
        }

        // Company Image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_image.' . $file->getClientOriginalExtension();

            $file->move(public_path('site/'), $fileName);

            $site->image = 'site/' . $fileName;
        }

        $site->save();


        Alert::success('Updated', 'Company settings saved successfully.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function location(Request $request)
    // {
    //     $siteSetting =SiteSetting::find('1');
    //     $siteSetting->city_id=$request->city_id;
    //     $siteSetting->save();
    //     return redirect()->back();
    // }
}
