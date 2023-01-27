<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\Status\StoreRequest;
use App\Http\Requests\Order\Status\UpdateRequest;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = OrderStatus::query()->get();
        return response()->json($statuses);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        OrderStatus::query()->create($data);
        return $this->MessageAdd();
    }

    public function show($id)
    {
        return response()->json(OrderStatus::query()->findOrFail($id));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $status = OrderStatus::query()->findOrFail($id);
        $status->update($data);
        return $this->MessageUpdate();
    }

    public function destroy($id)
    {
        $status = OrderStatus::query()->findOrFail($id);
        $status->update([
            'is_active' => false
        ]);
        return $this->MessageDelete();
    }
}
