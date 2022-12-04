<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;

class SupportRepository extends Repositories
{
  public function __construct(Support $support)
  {
    $this->entity = $support;
  }

  public function getByUser()
  {
    // return $this->entity->where('course_id', $users)->get();
  }

  public function storeSupport(array $data): Support
  {
    $newSupport = $this->getUserAuth()->supports()->create([
      'lesson_id' => $data['lesson'],
      'qa' => $data['qa'],
      'description' => $data['description'],
    ]);
    return $newSupport;
  }

  public function getByQuery(array $filters = []): User
  {
    return $this->getUserAuth()
      ->supports()
      ->where(function ($query) use ($filters) {
        if (isset($filters['lesson'])) {
          $query->where('lesson_id', $filters['lesson']);
        }

        if (isset($filters['qa'])) {
          $query->where('qa', $filters['qa']);
        }

        if (isset($filters['filter'])) {
          $query->where('description', 'LIKE', "%{$filters['filter']}%");
        }
      })->get();
  }

  private function getUserAuth(): User
  {
    // return auth()->user();
    return User::first();
  }
}
