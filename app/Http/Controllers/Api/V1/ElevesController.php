<?php

namespace App\Http\Controllers\Api\V1;

use App\Eleve;
use App\Http\Controllers\Controller;
use App\Http\Resources\Eleve as EleveResource;
use App\Http\Requests\Admin\StoreElevesRequest;
use App\Http\Requests\Admin\UpdateElevesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Traits\FileUploadTrait;


class ElevesController extends Controller
{
    public function index()
    {
        

        return new EleveResource(Eleve::with(['famille', 'tuteur', 'quartier'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('eleve_view')) {
            return abort(401);
        }

        $eleve = Eleve::with(['famille', 'tuteur', 'quartier'])->findOrFail($id);

        return new EleveResource($eleve);
    }

    public function store(StoreElevesRequest $request)
    {
        if (Gate::denies('eleve_create')) {
            return abort(401);
        }

        $eleve = Eleve::create($request->all());
        
        if ($request->hasFile('img_path')) {
            $eleve->addMedia($request->file('img_path'))->toMediaCollection('img_path');
        }

        return (new EleveResource($eleve))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateElevesRequest $request, $id)
    {
        if (Gate::denies('eleve_edit')) {
            return abort(401);
        }

        $eleve = Eleve::findOrFail($id);
        $eleve->update($request->all());
        
        if (! $request->input('img_path') && $eleve->getFirstMedia('img_path')) {
            $eleve->getFirstMedia('img_path')->delete();
        }
        if ($request->hasFile('img_path')) {
            $eleve->addMedia($request->file('img_path'))->toMediaCollection('img_path');
        }

        return (new EleveResource($eleve))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('eleve_delete')) {
            return abort(401);
        }

        $eleve = Eleve::findOrFail($id);
        $eleve->delete();

        return response(null, 204);
    }
}
