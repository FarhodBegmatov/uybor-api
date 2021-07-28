<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(Client::get(), 200);
    }

    public function getById($id)
    {
        return response()->json(Client::find($id), 200);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:155',
            'surname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
        ]);

        $client = Client::create($data);
        return response()->json($client, 201);
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return response()->json($client, 200);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json(' ', 204);
    }
}
