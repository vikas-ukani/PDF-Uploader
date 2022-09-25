<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id = null)
    {
        $files = File::where('user_id', auth()->user()->id)->get();
        $file = null;
        if ($id) $file = collect($files)->where('id', $id)->first();
        return view('home')->with(['files' => $files, 'file' => $file]);
    }
}
