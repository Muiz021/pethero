<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\KirimHewan;
use Illuminate\Http\Request;

class BackKirimHewanController extends Controller
{
    public function index()
    {
        $data = KirimHewan::get();
        return view('admin.pages.kirim-hewan.index',['data' => $data]);
    }
}
