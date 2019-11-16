<?php

namespace App\Http\Controllers\Api\V1;

use App\Quartier;
use App\Http\Controllers\Controller;
use App\Http\Resources\Quartier as QuartierResource;
use App\Http\Requests\Admin\StoreQuartiersRequest;
use App\Http\Requests\Admin\UpdateQuartiersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class QuartiersController extends Controller
{
    public function index()
    {
        

        return new QuartierResource(Quartier::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('quartier_view')) {
            return abort(401);
        }

        $quartier = Quartier::with([])->findOrFail($id);

        return new QuartierResource($quartier);
    }

    public function store(StoreQuartiersRequest $request)
    {
        if (Gate::denies('quartier_create')) {
            return abort(401);
        }

        $quartier = Quartier::create($request->all());
        
        

        return (new QuartierResource($quartier))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateQuartiersRequest $request, $id)
    {
        if (Gate::denies('quartier_edit')) {
            return abort(401);
        }

        $quartier = Quartier::findOrFail($id);
        $quartier->update($request->all());
        
        
        

        return (new QuartierResource($quartier))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('quartier_delete')) {
            return abort(401);
        }

        $quartier = Quartier::findOrFail($id);
        $quartier->delete();

        return response(null, 204);
    }
}
