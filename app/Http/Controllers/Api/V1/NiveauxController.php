<?php

namespace App\Http\Controllers\Api\V1;

use App\Niveau;
use App\Http\Controllers\Controller;
use App\Http\Resources\Niveau as NiveauResource;
use App\Http\Requests\Admin\StoreNiveauxRequest;
use App\Http\Requests\Admin\UpdateNiveauxRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class NiveauxController extends Controller
{
    public function index()
    {
        

        return new NiveauResource(Niveau::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('niveau_view')) {
            return abort(401);
        }

        $niveau = Niveau::with([])->findOrFail($id);

        return new NiveauResource($niveau);
    }

    public function store(StoreNiveauxRequest $request)
    {
        if (Gate::denies('niveau_create')) {
            return abort(401);
        }

        $niveau = Niveau::create($request->all());
        
        

        return (new NiveauResource($niveau))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateNiveauxRequest $request, $id)
    {
        if (Gate::denies('niveau_edit')) {
            return abort(401);
        }

        $niveau = Niveau::findOrFail($id);
        $niveau->update($request->all());
        
        
        

        return (new NiveauResource($niveau))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('niveau_delete')) {
            return abort(401);
        }

        $niveau = Niveau::findOrFail($id);
        $niveau->delete();

        return response(null, 204);
    }
}
