<?php

namespace App\Http\Controllers\Api\V1;

use App\Tuteur;
use App\Http\Controllers\Controller;
use App\Http\Resources\Tuteur as TuteurResource;
use App\Http\Requests\Admin\StoreTuteursRequest;
use App\Http\Requests\Admin\UpdateTuteursRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class TuteursController extends Controller
{
    public function index()
    {
        

        return new TuteurResource(Tuteur::with(['lienparente', 'famille'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('tuteur_view')) {
            return abort(401);
        }

        $tuteur = Tuteur::with(['lienparente', 'famille'])->findOrFail($id);

        return new TuteurResource($tuteur);
    }

    public function store(StoreTuteursRequest $request)
    {
        if (Gate::denies('tuteur_create')) {
            return abort(401);
        }

        $tuteur = Tuteur::create($request->all());
        
        

        return (new TuteurResource($tuteur))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateTuteursRequest $request, $id)
    {
        if (Gate::denies('tuteur_edit')) {
            return abort(401);
        }

        $tuteur = Tuteur::findOrFail($id);
        $tuteur->update($request->all());
        
        
        

        return (new TuteurResource($tuteur))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('tuteur_delete')) {
            return abort(401);
        }

        $tuteur = Tuteur::findOrFail($id);
        $tuteur->delete();

        return response(null, 204);
    }
}
