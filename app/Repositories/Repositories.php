<?php

namespace App\Repositories;

use App\Models\User;

abstract class Repositories
{
  protected $entity;

  public function getAll()
  {
    return $this->entity->get();
  }

  public function getOne(string $id)
  {
    return $this->entity->findOrFail($id);
  }

  public function getUserAuth(): User
  {
    return auth()->user();
  }
}
