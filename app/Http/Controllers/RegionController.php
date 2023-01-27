<?php

namespace App\Http\Controllers;

use App\Http\Requests\Region\StoreRequest;
use App\Http\Requests\Region\UpdateRequest;
use App\Models\Region;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::query()->get();
        return response()->json($regions);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Region::query()->create($data);
        return $this->MessageAdd();
    }

    public function show($id)
    {
        $region = Region::query()->findOrFail($id);
        return response()->json($region);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $region = Region::query()->findOrFail($id);
        $region->update($data);
        return response()->json([
            'message' => trans('response.update')
        ]);
    }

    public function destroy($id)
    {
        $region = Region::query()->findOrFail($id);
        $region->is_active = false;
        $region->save();
        return response()->json([
            'message' => trans('response.delete')
        ]);
    }
}
