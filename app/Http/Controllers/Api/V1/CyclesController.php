<?php

namespace App\Http\Controllers\Api\V1;

use App\Cycle;
use App\Http\Controllers\Controller;
use App\Http\Resources\Cycle as CycleResource;
use App\Http\Requests\Admin\StoreCyclesRequest;
use App\Http\Requests\Admin\UpdateCyclesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class CyclesController extends Controller
{
    public function index()
    {
        

        return new CycleResource(Cycle::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('cycle_view')) {
            return abort(401);
        }

        $cycle = Cycle::with([])->findOrFail($id);

        return new CycleResource($cycle);
    }

    public function store(StoreCyclesRequest $request)
    {
        if (Gate::denies('cycle_create')) {
            return abort(401);
        }

        $cycle = Cycle::create($request->all());
        
        

        return (new CycleResource($cycle))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCyclesRequest $request, $id)
    {
        if (Gate::denies('cycle_edit')) {
            return abort(401);
        }

        $cycle = Cycle::findOrFail($id);
        $cycle->update($request->all());
        
        
        

        return (new CycleResource($cycle))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('cycle_delete')) {
            return abort(401);
        }

        $cycle = Cycle::findOrFail($id);
        $cycle->delete();

        return response(null, 204);
    }
}
