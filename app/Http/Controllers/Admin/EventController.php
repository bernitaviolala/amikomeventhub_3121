<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // TAMPIL HALAMAN EVENT
    public function index()
    {
        return view('admin.events');
    }
}
