<?php

namespace App\Http\Controllers\Api\V1;

use App\Branche;
use App\Http\Controllers\Controller;
use App\Http\Resources\Branche as BrancheResource;
use App\Http\Requests\Admin\StoreBranchesRequest;
use App\Http\Requests\Admin\UpdateBranchesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class BranchesController extends Controller
{
    public function index()
    {
        

        return new BrancheResource(Branche::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('branche_view')) {
            return abort(401);
        }

        $branche = Branche::with([])->findOrFail($id);

        return new BrancheResource($branche);
    }

    public function store(StoreBranchesRequest $request)
    {
        if (Gate::denies('branche_create')) {
            return abort(401);
        }

        $branche = Branche::create($request->all());
        
        

        return (new BrancheResource($branche))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateBranchesRequest $request, $id)
    {
        if (Gate::denies('branche_edit')) {
            return abort(401);
        }

        $branche = Branche::findOrFail($id);
        $branche->update($request->all());
        
        
        

        return (new BrancheResource($branche))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('branche_delete')) {
            return abort(401);
        }

        $branche = Branche::findOrFail($id);
        $branche->delete();

        return response(null, 204);
    }
}
