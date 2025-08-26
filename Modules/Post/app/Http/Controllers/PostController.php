<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Post\Http\Requests\DiscussionCreateRequest;
use Modules\Post\Http\Requests\PostCreateRequest;
use Modules\Post\Services\PostService;

class PostController extends Controller
{
    public function __construct(public PostService $PostService) {}

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('post::frontend.create');
    }

    public function post()
    {
        return view('post::frontend.index');
    }

    /**
     * Handles the submission of a new post.
     *
     * Validates the incoming request, processes the optional image upload,
     * and delegates the creation to the post service.
     *
     * @param  \App\Http\Requests\PostCreateRequest  $request  The validated request containing post data.
     * @return \Illuminate\Http\RedirectResponse  Redirects back to the post creation page with a success message.
     */
    public function postStore(PostCreateRequest $request)
    {
        $validated = $request->validated();
        $image = $request->file('image');

        $this->PostService->createPost($validated,$image);

        return redirect()->route('post.create')->with('success','Yeni içerik oluşturuldu!');
    }

    public function createDiscussion()
    {
        return view('post::frontend.discussion');
    }

    public function discussionStore(DiscussionCreateRequest $request)
    {
        $validated = $request->validated();
        $image = $request->file('image');
       $discussion = $this->PostService->createDiscussion($validated, $image);

        return redirect()->route('discussion.show',['slug' => $discussion->slug])->with('success','Yeni ürün oluşturuldu!');

    }

    public function show($slug)
    {
        $data = $this->PostService->findGetDiscussion($slug);
        return view('post::frontend.discussion_show', compact('data'));
    }

    public function reviewStore(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        $data = [
            'user_id' => auth()->id(),
            'discussion_id' => $id,
            'comment' => $request->comment,
        ];

        $this->PostService->createReview($data);

        return redirect()->back()->with('success', 'Yorumunuz başarıyla eklendi!');
    }
}
