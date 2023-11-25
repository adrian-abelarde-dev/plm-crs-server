<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of all blocks.
     */
    public function getAll()
    {
        // $blocks = Block::all();
        // return response()->json($blocks);

        // Return hello message for testing
        return response()->json(['message' => 'Hello!']);
    }

    /**
     * Display the specified block.
     */
    public function getOne($blockId)
    {
        // $block = Block::find($blockId);

        // if (!$block) {
        //     return response()->json(['message' => 'Block not found'], 404);
        // }

        // return response()->json($block);

        // Return hello message for testing
        return response()->json(['message' => 'Hello!']);
    }

    /**
     * Update the specified block in storage.
     */
    public function updateOne(Request $request, $blockId)
    {
        // $block = Block::find($blockId);

        // if (!$block) {
        //     return response()->json(['message' => 'Block not found'], 404);
        // }

        // $block->update($request->all());

        // return response()->json(['message' => 'Block updated']);

        // Return hello message for testing
        return response()->json(['message' => 'Hello!']);
    }

    /**
     * Remove the specified block from storage.
     */
    public function deleteOne($blockId)
    {
        // $block = Block::find($blockId);

        // if (!$block) {
        //     return response()->json(['message' => 'Block not found'], 404);
        // }

        // $block->delete();

        // return response()->json(['message' => 'Block deleted']);

        // Return hello message for testing
        return response()->json(['message' => 'Hello!']);
    }

    /**
     * Store a newly created block in storage.
     */
    public function createOne(Request $request)
    {
        // $block = Block::create($request->all());

        // return response()->json($block, 201);

        // Return hello message for testing
        return response()->json(['message' => 'Hello!']);
    }
}
