<?php

namespace App\Http\Controllers\Api\V1;

use App\Inscription;
use App\Http\Controllers\Controller;
use App\Http\Resources\Inscription as InscriptionResource;
use App\Http\Requests\Admin\StoreInscriptionsRequest;
use App\Http\Requests\Admin\UpdateInscriptionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class InscriptionsController extends Controller
{
    public function index()
    {
        

        return new InscriptionResource(Inscription::with(['classe', 'circuit', 'niveau', 'anneescolaire', 'preinscription'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('inscription_view')) {
            return abort(401);
        }

        $inscription = Inscription::with(['classe', 'circuit', 'niveau', 'anneescolaire', 'preinscription'])->findOrFail($id);

        return new InscriptionResource($inscription);
    }

    public function store(StoreInscriptionsRequest $request)
    {
        if (Gate::denies('inscription_create')) {
            return abort(401);
        }

        $inscription = Inscription::create($request->all());
        
        

        return (new InscriptionResource($inscription))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateInscriptionsRequest $request, $id)
    {
        if (Gate::denies('inscription_edit')) {
            return abort(401);
        }

        $inscription = Inscription::findOrFail($id);
        $inscription->update($request->all());
        
        
        

        return (new InscriptionResource($inscription))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('inscription_delete')) {
            return abort(401);
        }

        $inscription = Inscription::findOrFail($id);
        $inscription->delete();

        return response(null, 204);
    }
}
