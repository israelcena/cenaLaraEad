<?php

namespace App\Http\Controllers;

use App\Repositories\CourseRepository;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;

class CourseController extends Controller
{
    public function __construct(CourseRepository $courseRepository)
    {
        $this->repository = $courseRepository;   
    }

    public function index()
    {
        return CourseResource::collection($this->repository->getAll());
    }

    public function create()
    {
        //
    }

    public function store(StoreCourseRequest $request)
    {
        //
    }

    public function show($id)
    {
        return new CourseResource($this->repository->getOne($id));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(UpdateCourseRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
