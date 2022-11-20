<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository extends Repositories
{

  public function __construct(Lesson $lesson)
  {
    $this->entity = $lesson;
  }

  public function getLessonsById($moduleId)
  {
    return $this->entity->where('module_id', $moduleId)->get();
  }

}