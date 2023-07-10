<?php

namespace App\Http\Controllers\back;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KurirController extends Controller
{
    public function index()
    {
        $kurir = User::where('roles', 'kurir')->get();
        return view('admin.pages.kurir.index', ['kurir' => $kurir]);
    }

    public function update(Request $request, $id)
    {
        $kurir = User::where('id', $id)->first();
        $kurir->update([
            'status' => $request->status
        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $kurir = User::where('id', $id)->first();
        $kurir->delete();
        return redirect()->back();
    }
}
