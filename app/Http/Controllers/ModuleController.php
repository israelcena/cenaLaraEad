<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModuleResource;
use App\Repositories\ModuleRepository;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function __construct(ModuleRepository $moduleRepository)
    {
        $this->repository = $moduleRepository;   
    }

    public function index()
    {
        return ModuleResource::collection($this->repository->getAll());
    }

    public function create()
    {
        //
    }

    public function store($request)
    {
        //
    }

    public function show($id)
    {
        return new ModuleResource($this->repository->getOne($id));
    }

    public function showByCourse($id)
    {
        return ModuleResource::collection($this->repository->getModulesById($id));
    }

    public function edit(string $id)
    {
        //
    }

    public function update($request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
