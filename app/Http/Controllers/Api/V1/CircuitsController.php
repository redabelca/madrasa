<?php

namespace App\Http\Controllers\Api\V1;

use App\Circuit;
use App\Http\Controllers\Controller;
use App\Http\Resources\Circuit as CircuitResource;
use App\Http\Requests\Admin\StoreCircuitsRequest;
use App\Http\Requests\Admin\UpdateCircuitsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class CircuitsController extends Controller
{
    public function index()
    {
        

        return new CircuitResource(Circuit::with(['vehicule'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('circuit_view')) {
            return abort(401);
        }

        $circuit = Circuit::with(['vehicule'])->findOrFail($id);

        return new CircuitResource($circuit);
    }

    public function store(StoreCircuitsRequest $request)
    {
        if (Gate::denies('circuit_create')) {
            return abort(401);
        }

        $circuit = Circuit::create($request->all());
        
        

        return (new CircuitResource($circuit))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCircuitsRequest $request, $id)
    {
        if (Gate::denies('circuit_edit')) {
            return abort(401);
        }

        $circuit = Circuit::findOrFail($id);
        $circuit->update($request->all());
        
        
        

        return (new CircuitResource($circuit))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('circuit_delete')) {
            return abort(401);
        }

        $circuit = Circuit::findOrFail($id);
        $circuit->delete();

        return response(null, 204);
    }
}
