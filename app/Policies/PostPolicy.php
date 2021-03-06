<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User $user
     * @param  \App\Post $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        return true;
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {

        return true;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User $user
     * @param  \App\Post $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        if ($user->id != $post->created_user_id) {
            return false;
        }
        return true;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User $user
     * @param  \App\Post $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\User $user
     * @param  \App\Post $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\User $user
     * @param  \App\Post $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        return true;
    }


    /**
     * Check if the user is an administrator and have full access to the model
     *
     * @param User $user
     * @return bool
     */
//    public function before(User $user)
//    {
//        return $user && $user->role == 'administrator' ? true : false;
//    }
}
