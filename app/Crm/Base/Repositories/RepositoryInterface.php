<?php

namespace Crm\Base\Repositories;


interface RepositoryInterface
{
    public function index();

    public function show($id): ?object;

    public function store(array $data) : ?object;

    public function update($data, $id) : ?object;

    public function destroy($id): bool;
}
