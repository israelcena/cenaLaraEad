<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository extends Repositories
{

  public function __construct(Module $module)
  {
    $this->entity = $module;
  }

  public function getModulesById($courseId)
  {
    return $this->entity->where('course_id', $courseId)->get();
  }
}
