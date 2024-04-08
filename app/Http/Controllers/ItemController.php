<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get() ;
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Item::create(['name' => $request->item['name']]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $existingItem = Item::find($id);

        if ( $existingItem ) {
            $existingItem->completed = $request->item['completed'] ? true:false;
            $existingItem->updated_at = $request->item['completed'] ? Carbon::now(): false;
            $existingItem->save();
            return $existingItem;
        }

        return "Item not found";

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existingItem = Item::find($id);

        if ( $existingItem ){
            $existingItem->delete();
            return "Deleted successfully";
        } else {
            return "Item not found"; 
        }

        
    }
}
