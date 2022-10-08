<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository {

  protected $entity;

  public function __construct(Module $module)
  {
    $this->entity = $module;
  }

  public function getAll()
  {
    return $this->entity->get();
  }

  public function getOne(string $id)
  {
    return $this->entity->findOrFail($id);
  }

  public function getModulesById($courseId)
  {
    return $this->entity->where('course_id', $courseId)->get();
  }

}