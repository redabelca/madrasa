<?php

namespace App\Http\Controllers\Api\V1;

use App\Classe;
use App\Http\Controllers\Controller;
use App\Http\Resources\Classe as ClasseResource;
use App\Http\Requests\Admin\StoreClassesRequest;
use App\Http\Requests\Admin\UpdateClassesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class ClassesController extends Controller
{
    public function index()
    {
        

        return new ClasseResource(Classe::with(['niveau', 'branche'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('classe_view')) {
            return abort(401);
        }

        $classe = Classe::with(['niveau', 'branche'])->findOrFail($id);

        return new ClasseResource($classe);
    }

    public function store(StoreClassesRequest $request)
    {
        if (Gate::denies('classe_create')) {
            return abort(401);
        }

        $classe = Classe::create($request->all());
        
        

        return (new ClasseResource($classe))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateClassesRequest $request, $id)
    {
        if (Gate::denies('classe_edit')) {
            return abort(401);
        }

        $classe = Classe::findOrFail($id);
        $classe->update($request->all());
        
        
        

        return (new ClasseResource($classe))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('classe_delete')) {
            return abort(401);
        }

        $classe = Classe::findOrFail($id);
        $classe->delete();

        return response(null, 204);
    }
}
