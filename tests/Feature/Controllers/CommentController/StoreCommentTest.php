<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;

it('requires authentication', function () {
    $post = Post::factory()->create();

    \Pest\Laravel\post(route('posts.comments.store', $post), [
        'body' => 'This is a comment',
    ])->assertRedirect(route('login'));
});

it('can store a comment', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();

    actingAs($user)->post(route('posts.comments.store', $post), [
        'body' => 'This is a comment',
    ]);

    assertDatabaseHas('comments', [
        'body' => 'This is a comment',
        'user_id' => $user->id,
        'post_id' => $post->id,
    ]);
});

it('redirects to the post after storing a comment', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();

    actingAs($user)->post(route('posts.comments.store', $post), [
        'body' => 'This is a comment',
    ])->assertRedirect(route('posts.show', $post));
});

// test the body is valid
it('requires a body', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();

    actingAs($user)->post(route('posts.comments.store', $post), [
        'body' => '',
    ])->assertInvalid('body');
})->with([
    null,
    1.5,
    Str::random(2501)
]);
