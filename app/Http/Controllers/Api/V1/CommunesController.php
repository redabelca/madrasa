<?php

namespace App\Http\Controllers\Api\V1;

use App\Commune;
use App\Http\Controllers\Controller;
use App\Http\Resources\Commune as CommuneResource;
use App\Http\Requests\Admin\StoreCommunesRequest;
use App\Http\Requests\Admin\UpdateCommunesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class CommunesController extends Controller
{
    public function index()
    {
        

        return new CommuneResource(Commune::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('commune_view')) {
            return abort(401);
        }

        $commune = Commune::with([])->findOrFail($id);

        return new CommuneResource($commune);
    }

    public function store(StoreCommunesRequest $request)
    {
        if (Gate::denies('commune_create')) {
            return abort(401);
        }

        $commune = Commune::create($request->all());
        
        

        return (new CommuneResource($commune))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCommunesRequest $request, $id)
    {
        if (Gate::denies('commune_edit')) {
            return abort(401);
        }

        $commune = Commune::findOrFail($id);
        $commune->update($request->all());
        
        
        

        return (new CommuneResource($commune))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('commune_delete')) {
            return abort(401);
        }

        $commune = Commune::findOrFail($id);
        $commune->delete();

        return response(null, 204);
    }
}
