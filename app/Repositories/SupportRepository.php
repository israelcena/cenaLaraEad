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

  public function getByQuery(array $filters = [])
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

  public function createReplyToSupportId(string $supportId, array $request)
  {
    $user = $this->getUserAuth()->id; 
    $support = $this->getSupport($supportId);

    return $support->replies()->create([
      'description' => $request['description'],
      'user_id' => $user,
      'support_id' => $support->id,
    ]);
  }

  private function getSupport(string $id)
  {
    return $this->entity->findOrFail($id);
  }

  private function getUserAuth(): User
  {
    // return auth()->user();
    return User::first();
  }
}
