<?php

namespace App\Http\Controllers;

use App\Models\ServicePackage;
use Illuminate\Http\Request;

class ServicePackageController extends Controller
{
    public function index()
    {
        $servicePackages = ServicePackage::where('status', 'active')->get();
        return view('home', compact('servicePackages'));
    }
}
