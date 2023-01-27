<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderDetail\StoreRequest;
use App\Http\Requests\Order\OrderDetail\UpdateRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        OrderDetail::query()->create($data);
        return $this->MessageAdd();
    }

    public function update(UpdateRequest $request , $id){
        $orderDetail = OrderDetail::query()->findOrFail($id);
        $orderDetail->update($request->validated());
        return $this->MessageUpdate();
    }

    public function index($order_id)
    {
        $details = OrderDetail::query()->where('order_id' , $order_id)->get();
        return response()->json($details);
    }

    public function show($id)
    {
        $detail = OrderDetail::query()->findOrFail($id);
        return response()->json($detail);
    }

    public function destroy($id){
        OrderDetail::query()->findOrFail($id)->update([
            'is_active' => $id
        ]);
        return $this->MessageDelete();
    }
}
