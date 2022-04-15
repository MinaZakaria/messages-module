<?php

namespace App\Domain\Repositories;

interface BaseRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function find(int $id);

    public function findOrFail(int $id);

    public function findOneBy(array $criteria);

    public function findBy(array $criteria);
}
