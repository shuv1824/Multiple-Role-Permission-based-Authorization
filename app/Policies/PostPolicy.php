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
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        foreach($user->roles as $role){
            foreach($role->permissions as $permission){
                if($permission->name === "post-list"){
                    return true;
                }
            }
        }
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        foreach($user->roles as $role){
            foreach($role->permissions as $permission){
                if($permission->name === "post-create"){
                    return true;
                }
            }
        }
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        foreach($user->roles as $role){
            foreach($role->permissions as $permission){
                if(($permission->name === "post-edit") && ($user->id === $post->user_id)){
                    return true;
                }
            }
        }
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        foreach($user->roles as $role){
            foreach($role->permissions as $permission){
                if(($permission->name === "post-delete") && ($user->id === $post->user_id)){
                    return true;
                }
            }
        }
    }
}
