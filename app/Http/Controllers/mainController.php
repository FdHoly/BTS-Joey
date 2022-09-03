<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\Item;
use Response;
use Illuminate\Http\Request;

class mainController extends Controller
{
    //
    public function getCheckAll()
    {
        $data = Checklist::all();
        return response()->json([$data]);
    }
    public function createCL(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string'
            ]);
            Checklist::create([
                'name' => $request->name,
            ]);
            return response('Created', 200);
        } catch (\Throwable $th) {
            return response('Failed', 500);
        }
    }
    public function deleteCL($id)
    {
        try {
            Checklist::destroy($id);
            return response('Deleted', 200);
        } catch (\Throwable $th) {
            return response('Failed', 500);
        }
    }
    public function getItem($id)
    {
        try {
            $data = Item::get()->where('id_checklist', $id);
            return response()->json([$data]);
        } catch (\Throwable $th) {
            //throw $th;
            return response('Failed', 500);
        }
    }
    public function createItem(Request $request, $id)
    {
        try {
            $validator = $request->validate([
                'itemName' => 'required',
            ]);
            Item::create([
                'itemName' => $request->itemName,
                'id_checklist' => $id,
            ]);

            return response('Created', 200);
        } catch (\Throwable $th) {
            return response('Failed to create', 500);
        }
    }
    public function getItemID($checklistId, $itemId)
    {
        try {
            $data = Item::get()->where('id_checklist', $checklistId)->where('id', $itemId)->first();
            return response()->json([$data]);
        } catch (\Throwable $th) {
            //throw $th;
            return response('Failed', 500);
        }
    }
    public function updateItem($checklistId, $itemId)
    {
        try {
            $data = Item::where('id', $itemId)->where('id_checklist', $checklistId)->first();
            if ($data->status == 1) {
                $data->update([
                    'status' => '0',
                ]);
            } else if ($data->status == 0) {
                $data->update([
                    'status' => '1',
                ]);
            }
            return response()->json([$data]);
        } catch (\Throwable $th) {
            //throw $th;
            return response('Failed', 500);
        }
    }
    public function deleteItem($checklistId, $itemId)
    {
        try {
            $item = Item::find($itemId)->where('id_checklist', $checklistId)->first();
            $item->delete();
            return response('Deleted', 200);
        } catch (\Throwable $th) {
            return response('Failed', 500);
        }
    }
    public function renameItem(Request $request, $checklistId, $itemId)
    {
        try {
            $request->validate([
                'itemName' => 'required|string'
            ]);
            $data = Item::where('id', $itemId)->where('id_checklist', $checklistId)->first();
            $data->update([
                'itemName' => $request->itemName,
            ]);
            return response('Updated', 200);
        } catch (\Throwable $th) {
            return response('Failed', 500);
        }
    }
}
