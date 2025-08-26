<?php

namespace Modules\Community\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Community\Interfaces\CommunityRepositoryInterface;

class CommunityService
{
    protected $CommunityRepository;

    public function __construct(CommunityRepositoryInterface $CommunityRepository)
    {
        $this->CommunityRepository = $CommunityRepository;
    }

    public function createCommunity(array $data, $imageFile = null)
    {
        $data['community_token'] = Str::random(16);
        $data['user_id'] = Auth::user()->id;
        $data['slug'] = Str::slug($data['name']) . '-' . $data['community_token'];

        return $this->CommunityRepository->store($data);

    }

    public function getCommunityByToken(string $token)
    {
        return $this->CommunityRepository->getCommunityByToken($token);
    }

    public function getCommunityById(int $id)
    {
        return $this->CommunityRepository->getCommunityById($id);
    }
}
