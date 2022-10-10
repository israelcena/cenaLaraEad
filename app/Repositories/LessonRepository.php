<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository {

  protected $entity;

  public function __construct(Lesson $lesson)
  {
    $this->entity = $lesson;
  }

  public function getAll()
  {
    return $this->entity->get();
  }

  public function getOne(string $id)
  {
    return $this->entity->findOrFail($id);
  }

  public function getLessonsById($moduleId)
  {
    return $this->entity->where('module_id', $moduleId)->get();
  }

}