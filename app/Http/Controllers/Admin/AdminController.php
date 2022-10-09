<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() {
        return view('admin.home');
    }

    public function adminProfile() {
       return view('admin.profile.index');
    }

    public function editAdminProfile() {
        $user = auth()->user();
        return view('admin.profile.edit', compact('user'));
    }
}
