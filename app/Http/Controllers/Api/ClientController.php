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
        if (auth()->user()->hasAnyRoles(['super-admin', 'manager'])) {
            return ClientResource::collection(Client::get());
        }
        $this->messageNotAllowedTo();
    }

    public function getById($id)
    {
        if (auth()->user()->hasAnyRoles(['super-admin', 'manager'])) {
            return ClientResource::collection(Client::findOrFail($id));
        }
        $this->messageNotAllowedTo();
    }

    public function create(ClientRequest $request)
    {
        if (auth()->user()->hasRole('super-admin')){
            return $this->createdData([
                'client' => Client::create($request->validated())
            ]);
        }
        $this->messageNotAllowedTo();
    }

    public function update(ClientRequest $request, Client $client)
    {
        if (auth()->user()->hasRole('super-admin')){
            return $this->updatedData([
                'client' => $client->update($request->validated())
            ]);
        }
        $this->messageNotAllowedTo();
    }

    public function destroy(Client $client)
    {
        if (auth()->user()->hasRole('super-admin')){
            $client->delete();
            return $this->deletedData();
        }
        $this->messageNotAllowedTo();
    }
}
