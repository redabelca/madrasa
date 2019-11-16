<?php

namespace App\Http\Controllers\Api\V1;

use App\Vehicule;
use App\Http\Controllers\Controller;
use App\Http\Resources\Vehicule as VehiculeResource;
use App\Http\Requests\Admin\StoreVehiculesRequest;
use App\Http\Requests\Admin\UpdateVehiculesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class VehiculesController extends Controller
{
    public function index()
    {
        

        return new VehiculeResource(Vehicule::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('vehicule_view')) {
            return abort(401);
        }

        $vehicule = Vehicule::with([])->findOrFail($id);

        return new VehiculeResource($vehicule);
    }

    public function store(StoreVehiculesRequest $request)
    {
        if (Gate::denies('vehicule_create')) {
            return abort(401);
        }

        $vehicule = Vehicule::create($request->all());
        
        

        return (new VehiculeResource($vehicule))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateVehiculesRequest $request, $id)
    {
        if (Gate::denies('vehicule_edit')) {
            return abort(401);
        }

        $vehicule = Vehicule::findOrFail($id);
        $vehicule->update($request->all());
        
        
        

        return (new VehiculeResource($vehicule))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('vehicule_delete')) {
            return abort(401);
        }

        $vehicule = Vehicule::findOrFail($id);
        $vehicule->delete();

        return response(null, 204);
    }
}
