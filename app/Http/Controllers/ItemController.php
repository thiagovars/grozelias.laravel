<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $data = $request->validated();
        $newItem = new Item;
        $newItem->name = $data['name'];
        $newItem->save();

        return $newItem;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, int $id)
    {
        $data = $request->validated();
        $existItem = Item::find( $id );

        if ( $existItem ) {
            $existItem->update([
                'name' => $data['name'],
                'completed' => $data['completed'],
                'completed_at' => $data['completed'] ? Carbon::now() : null,
            ]);
            return $existItem;
        }
        return 'Item not found';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $targetItem = Item::find( $id );
        if ( $targetItem ) {
            $name = $targetItem->name;
            $targetItem->delete();
            return "Item '{$name}' deleted.";
        }

        return "Item not found";
    }
}
