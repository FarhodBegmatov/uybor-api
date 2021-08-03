<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return ClientResource::collection(Client::get());
    }

    public function getById($id)
    {
        return ClientResource::collection(Client::findOrFail($id));
    }

    public function create(ClientRequest $request)
    {
        Client::create($request->validated());
        return $this->createdData();
    }

    public function update(ClientRequest $request, Client $client)
    {
        $client->update($request->validated());
        return $this->updatedData();
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return $this->deletedData();
    }
}
