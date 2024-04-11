<?php

use App\Models\Post;

it('uses title case for title', function () {
    $post = Post::factory()->create([
        'title' => 'this is a title',
    ]);

    expect($post->title)->toBe('This Is A Title');
});
