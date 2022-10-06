<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

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
