<?php

namespace App\Http\Controllers\Api\V1;

use App\Anneescolaire;
use App\Http\Controllers\Controller;
use App\Http\Resources\Anneescolaire as AnneescolaireResource;
use App\Http\Requests\Admin\StoreAnneescolairesRequest;
use App\Http\Requests\Admin\UpdateAnneescolairesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class AnneescolairesController extends Controller
{
    public function index()
    {
        

        return new AnneescolaireResource(Anneescolaire::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('anneescolaire_view')) {
            return abort(401);
        }

        $anneescolaire = Anneescolaire::with([])->findOrFail($id);

        return new AnneescolaireResource($anneescolaire);
    }

    public function store(StoreAnneescolairesRequest $request)
    {
        if (Gate::denies('anneescolaire_create')) {
            return abort(401);
        }

        $anneescolaire = Anneescolaire::create($request->all());
        
        

        return (new AnneescolaireResource($anneescolaire))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateAnneescolairesRequest $request, $id)
    {
        if (Gate::denies('anneescolaire_edit')) {
            return abort(401);
        }

        $anneescolaire = Anneescolaire::findOrFail($id);
        $anneescolaire->update($request->all());
        
        
        

        return (new AnneescolaireResource($anneescolaire))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('anneescolaire_delete')) {
            return abort(401);
        }

        $anneescolaire = Anneescolaire::findOrFail($id);
        $anneescolaire->delete();

        return response(null, 204);
    }
}
