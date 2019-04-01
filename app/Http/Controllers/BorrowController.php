<?php

namespace App\Http\Controllers;

use App\Borrow;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
     * Show the form for creating a new issue.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_issue()
    {
        //
        $items = DB::table('items')->select('Item_Description')->pluck('Item_Description')->toArray();
        return view('issue', ['items' => $items]);
    }
    /**
     * Show the form for creating a returning an item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_return()
    {
        //
        $items = DB::table('items')->select('Item_Description')->pluck('Item_Description')->toArray();
        return view('return', ['items' => $items]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_issue(Request $request)
    {
        //
        $this->validate($request, [
            'borrowerID' => 'required',
            'itemSelect' => 'required',
            'quantity' => 'required',
            'dateIssue' => 'required',
        ]);
        $issue = new Borrow;
        $issue->Borrower_ID = $request->borrowerID;
        $issue->Item_Description = $request->itemSelect;
        $issue->Issue_Date = $request->dateIssue;
        $issue->Quantity_Issued = $request->quantity;
        $item_id = DB::table('items')->select('id')->where('Item_Description', '=', $request->itemSelect)->pluck('id')->first();
        $issue->Item_ID = $item_id;
        $item = Item::find($item_id);
        if(isset($request->reason)){
            $issue->Request = $request->reason;
        }
        if($item->Current_Stock < $request->quantity){
            return redirect()->back()->with('msg', 'Not enough stock');
        }
        $item->Issued += $request->quantity;
        $issue->Issuer_ID = Auth::user()->id;
        $issue->save();
        $item->save();
        return redirect()->back()->with('success', 'Item issued successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate($request, [
            'itemSelect' => 'required',
            'borrowerID' => 'required',
            'quantity' => 'required',
            'dateReturn' => 'required'
        ]);
        $return = Borrow::where('Item_Description', '=', $request->itemSelect)->where('Borrower_ID', '=', $request->borrowerID)->first();
        if(!$return instanceof Borrow){
            return redirect()->back()->with('msg', 'Record not found');
        }
        if($return->Quantity_Issued < $request->quantity){
            return redirect()->back()->with('msg', 'Please check quantity, exceeds number of items issued');
        }
        $return->Quantity_Returned = $request->quantity;
        $return->Return_Date = $request->dateReturn;
        $item = Item::find($return->Item_ID);
        $item->Returned += $request->quantity;
        $item->save();
        $return->save();
        return redirect()->back()->with('success', 'Item returned successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
}
