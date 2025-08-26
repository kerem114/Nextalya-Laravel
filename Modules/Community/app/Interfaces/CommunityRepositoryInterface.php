<?php

namespace Modules\Community\Interfaces;

interface CommunityRepositoryInterface
{
    public function store(array $data);
    public function getCommunityByToken(string $token);
    public function getCommunityById(int $id);
}
