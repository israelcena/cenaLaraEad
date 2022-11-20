<?php

namespace App\Repositories;

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
}
