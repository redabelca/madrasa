<?php

namespace App\Http\Controllers\Api\V1;

use App\Preinscription;
use App\Http\Controllers\Controller;
use App\Http\Resources\Preinscription as PreinscriptionResource;
use App\Http\Requests\Admin\StorePreinscriptionsRequest;
use App\Http\Requests\Admin\UpdatePreinscriptionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class PreinscriptionsController extends Controller
{
    public function index()
    {
        return new PreinscriptionResource(Preinscription::with(['anneescolaire','eleve'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('preinscription_view')) {
            return abort(401);
        }

        $preinscription = Preinscription::with(['anneescolaire','eleve'])->findOrFail($id);

        return new PreinscriptionResource($preinscription);
    }

    public function store(StorePreinscriptionsRequest $request)
    {
        if (Gate::denies('preinscription_create')) {
            return abort(401);
        }

        $preinscription = Preinscription::create($request->all());
        

        return (new PreinscriptionResource($preinscription))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdatePreinscriptionsRequest $request, $id)
    {
        if (Gate::denies('preinscription_edit')) {
            return abort(401);
        }

        $preinscription = Preinscription::findOrFail($id);
        $preinscription->update($request->all());
        
        
        

        return (new PreinscriptionResource($preinscription))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('preinscription_delete')) {
            return abort(401);
        }

        $preinscription = Preinscription::findOrFail($id);
        $preinscription->delete();

        return response(null, 204);
    }
}
