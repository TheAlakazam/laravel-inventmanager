<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {
        $issued = DB::table('borrow')->whereNull('Return_Date')->get();
        // $items_warning = DB::table('items')->select(['id', 'Item_Description', 'Current_Stock'])->whereBetween('Current_Stock', ['0.1 * (Stock + Purchased)', '0.2 * (Stock + Purchased)'])->get();
        $items_danger = DB::table('items')->select(['id', 'Item_Description', 'Current_Stock'])->whereRaw('Current_Stock < 0.1 * (Stock + Purchased)')->get();
        $items_warning = DB::table('items')->select(['id', 'Item_Description', 'Current_Stock'])->whereRaw('Current_Stock BETWEEN 0.1 * (Stock + Purchased) AND 0.2 * (Stock + Purchased)')->get();
        return view('dashboard', ['issued' => $issued, 'items_warning' => $items_warning, 'items_danger' => $items_danger]);
    }

    public function admin()
    {
        return view('admin.dashboard');
    }
}
