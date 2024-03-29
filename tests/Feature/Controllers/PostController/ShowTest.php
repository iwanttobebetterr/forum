<?php

use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Models\Post;
use Inertia\Testing\AssertableInertia;
use function Pest\Laravel\get;

it('should return the correct component', function () {
    get(route('posts.show', Post::factory()->create()))->assertComponent('Posts/Show');
});

it('passes the post to the view', function () {
    $post = Post::factory()->create()->load('user');

    get(route('posts.show', $post))->assertHasResource('post', new PostResource($post));
});

it('passes comments of post to the view', function () {
    $post = Post::factory()->create();
    $comments = Comment::factory(2)->for($post)->create()->load('user');

    get(route('posts.show', $post))->assertHasPaginatedResource('comments', CommentResource::collection($comments->reverse()));
});
