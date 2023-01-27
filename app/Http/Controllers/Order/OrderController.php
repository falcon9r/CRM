<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\Order\StoreRequest;
use App\Http\Requests\Order\Order\UpdateRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Repositories\Order\OrderContract;
use App\Repositories\Order\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class OrderController extends Controller
{

    private $orderRepository;

    public function __construct(OrderContract $orderContract)
    {
        $this->orderRepository = $orderContract;
    }

    public function index()
    {
        $orders = $this->orderRepository->OrderActive(auth()->id());
        return response()->json($orders);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        Order::query()->create($data);
        return $this->MessageAdd();
    }

    public function show($id)
    {
        $order = Order::query()->findOrFail($id);
        return response()->json(new OrderResource($order));
    }

    public function update(UpdateRequest $request, $id)
    {
        $order = Order::query()->findOrFail($id);
        $data = $request->validated();
        $order->update($data);
        return $this->MessageUpdate();
    }

    public function destroy($id)
    {
        $order = Order::query()->findOrFail($id);
        $order->update([
            'is_active' => false
        ]);
        return $this->MessageDelete();
    }
}
