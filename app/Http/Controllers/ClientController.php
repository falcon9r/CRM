<?php

namespace App\Http\Controllers;

use App\Http\Filters\Client\ClientFilter;
use App\Http\Requests\Client\IndexRequest;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;
use App\Models\Client;
use App\Repositories\Client\ClientContract;

class ClientController extends Controller
{
    private  $clientRepository;

    public function __construct(ClientContract $clientContract)
    {
        $this->clientRepository = $clientContract;
    }

    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        return response()->json($this->clientRepository->clients($data));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        Client::query()->create($data);
        return $this->MessageAdd();
    }

    public function show($id)
    {
        $client = Client::query()->findOrFail($id);
        return response()->json($client);
    }

    public function update(UpdateRequest $request, $id)
    {
        $client = Client::query()->findOrFail($id);
        $client->update($request->validated());
        return $this->MessageUpdate();
    }

    public function destroy($id)
    {
        $client = Client::query()->findOrFail($id);
        $client->update([
            'is_active' => false
        ]);
        return $this->MessageDelete();
    }
}
