<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository extends Repositories
{
  public function __construct(Course $course)
  {
    $this->entity = $course;
  }
}
