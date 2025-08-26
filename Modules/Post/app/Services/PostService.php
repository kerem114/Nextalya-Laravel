<?php

namespace Modules\Post\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Post\Interfaces\PostRepositoryInterface;

class PostService
{
    protected $PostRepository;

    public function __construct(PostRepositoryInterface $PostRepository)
    {
        $this->PostRepository = $PostRepository;
    }

    /**
     * Creates a new post.
     *
     * @param  array  $data  The post data (e.g., title, content, etc.).
     * @param  \Illuminate\Http\UploadedFile|null  $imageFile  (Optional) The uploaded image file.
     * @return \App\Models\Posts  The newly created post.
     */
    public function createPost(array $data, $imageFile = null)
    {
        $data['base_token'] = Str::random(16);
        $data['user_id'] = Auth::user()->id;
        $data['type'] = 'post';

        if($imageFile) {
            $fileName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $path = $imageFile->storeAs('post',$fileName,'public');
            $data['image'] = $fileName;
        }

        return $this->PostRepository->store($data);
    }

    public function createDiscussion(array $data, $imageFile = null)
    {

        $data['base_token'] = Str::random(16);
        $data['user_id'] = Auth::user()->id;
        $data['slug'] = Str::slug($data['title']) . '-' . $data['base_token'];
        $data['type'] = 'discussion';

        if($imageFile) {
            $fileName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $path = $imageFile->storeAs('discussion',$fileName,'public');
            $data['image'] = $fileName;
        }

        $discussion = $this->PostRepository->storeDiscussion($data);

        return $discussion;
    }

    public function findGetDiscussion(string $slug)
    {
        return $this->PostRepository->findDiscussion($slug);
    }


}
