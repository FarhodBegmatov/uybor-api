<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\SoldHouse;
use Illuminate\Http\Request;

class SoldHouseController extends Controller
{
    public function index()
    {
        return response()->json(SoldHouse ::get(), 200);
    }

    public function getById($id)
    {
        return response()->json(SoldHouse ::find($id), 200);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'client_id' => 'required|integer',
            'apartment_id' => 'required|integer',
        ]);

        $square = Apartment::query()
            ->where('id', '=', $data['apartment_id'])
            ->select('square')->value('square');
        $price = Apartment::query()
            ->where('id', '=', $data['apartment_id'])
            ->select('price')->value('price');

        $data['summa'] = $square * $price;

        $soldHouse = SoldHouse ::create($data);
        return response()->json($soldHouse, 201);
    }

    public function update(Request $request, SoldHouse $soldHouse)
    {
        $soldHouse->update($request->all());
        return response()->json($soldHouse, 200);
    }

    public function destroy(SoldHouse $soldHouse)
    {
        $soldHouse->delete();
        return response()->json(' ', 204);
    }
}
