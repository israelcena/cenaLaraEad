<?php

namespace App\Repositories;

use App\Models\Support;

class SupportRepository extends Repositories
{
  public function __construct(Support $support)
  {
    $this->entity = $support;
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

  public function getMySupports(array $filters = [])
  {
    $filters['user'] = $this->getUserAuth()->id;
    return $this->getByQuery($filters);
  }

  public function getByQuery(array $filters = [])
  {
    return $this->entity
      ->where(function ($query) use ($filters) {
        if (isset($filters['lesson'])) {
          $query->where('lesson_id', $filters['lesson']);
        }
        if (isset($filters['qa'])) {
          $query->where('qa', $filters['qa']);
        }
        if (isset($filters['user'])) {
          $query->where('user_id', $filters['user']);
        }
        if (isset($filters['filter'])) {
          $query->where('description', 'LIKE', "%{$filters['filter']}%");
        }
      })
      ->orderBy('updated_at')
      ->get();
  }

  public function createReplyToSupportId(array $request)
  {
    $user = $this->getUserAuth()->id;

    return $this->entity->replies()->create([
      'description' => $request['description'],
      'user_id' => $user,
      'support_id' => $request['support'],
    ]);
  }
}
