<?php

namespace App\Http\Controllers\Api\V1;

use App\Famille;
use App\Http\Controllers\Controller;
use App\Http\Resources\Famille as FamilleResource;
use App\Http\Requests\Admin\StoreFamillesRequest;
use App\Http\Requests\Admin\UpdateFamillesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class FamillesController extends Controller
{
    public function index()
    {
        

        return new FamilleResource(Famille::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('famille_view')) {
            return abort(401);
        }

        $famille = Famille::with([])->findOrFail($id);

        return new FamilleResource($famille);
    }

    public function store(StoreFamillesRequest $request)
    {
        if (Gate::denies('famille_create')) {
            return abort(401);
        }

        $famille = Famille::create($request->all());
        
        

        return (new FamilleResource($famille))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateFamillesRequest $request, $id)
    {
        if (Gate::denies('famille_edit')) {
            return abort(401);
        }

        $famille = Famille::findOrFail($id);
        $famille->update($request->all());
        
        
        

        return (new FamilleResource($famille))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('famille_delete')) {
            return abort(401);
        }

        $famille = Famille::findOrFail($id);
        $famille->delete();

        return response(null, 204);
    }
}
