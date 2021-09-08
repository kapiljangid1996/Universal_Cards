<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site;

class SitesController extends Controller
{
    public function index()
    {
        $setting = Site::get();
        return view('admin.site-manage')->with('sites',$setting);
    }

    public function update(Request $request, $id)
    {   
        $setting = Site::editSetting($request,$id);
        return \Redirect::to('admin/site-setting')->with('success', 'Site updated successfully.');
    }
}
