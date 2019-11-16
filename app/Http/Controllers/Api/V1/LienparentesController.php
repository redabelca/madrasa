<?php

namespace App\Http\Controllers\Api\V1;

use App\Lienparente;
use App\Http\Controllers\Controller;
use App\Http\Resources\Lienparente as LienparenteResource;
use App\Http\Requests\Admin\StoreLienparentesRequest;
use App\Http\Requests\Admin\UpdateLienparentesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class LienparentesController extends Controller
{
    public function index()
    {
        

        return new LienparenteResource(Lienparente::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('lienparente_view')) {
            return abort(401);
        }

        $lienparente = Lienparente::with([])->findOrFail($id);

        return new LienparenteResource($lienparente);
    }

    public function store(StoreLienparentesRequest $request)
    {
        if (Gate::denies('lienparente_create')) {
            return abort(401);
        }

        $lienparente = Lienparente::create($request->all());
        
        

        return (new LienparenteResource($lienparente))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateLienparentesRequest $request, $id)
    {
        if (Gate::denies('lienparente_edit')) {
            return abort(401);
        }

        $lienparente = Lienparente::findOrFail($id);
        $lienparente->update($request->all());
        
        
        

        return (new LienparenteResource($lienparente))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('lienparente_delete')) {
            return abort(401);
        }

        $lienparente = Lienparente::findOrFail($id);
        $lienparente->delete();

        return response(null, 204);
    }
}
