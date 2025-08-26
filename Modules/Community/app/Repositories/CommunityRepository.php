<?php

namespace Modules\Community\Repositories;

use Modules\Community\Interfaces\CommunityRepositoryInterface;
use Modules\Community\Models\Communities;

class CommunityRepository implements CommunityRepositoryInterface
{
    public function store(array $data)
    {
        return Communities::create($data);
    }

    public function getCommunityByToken(string $token)
    {
        return Communities::where('community_token', $token)->first();
    }

    public function getCommunityById(int $id)
    {
        return Communities::where('user_id', $id)->first();
    }
}
