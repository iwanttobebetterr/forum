<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Comment $comment): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Comment $comment): bool
    {
    }

    public function delete(User $user, Comment $comment): bool
    {
        if ($user->id !== $comment->user_id) {
            return false;
        }

        return $comment->created_at->isAfter(now()->subHour());
    }

    public function restore(User $user, Comment $comment): bool
    {
    }

    public function forceDelete(User $user, Comment $comment): bool
    {
    }
}
