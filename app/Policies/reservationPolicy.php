<?php

namespace App\Policies;

use App\Models\User;
use App\Models\reservation;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;


class reservationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, reservation $reservation)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, reservation $reservation)
    {
        return $user->id === $reservation->user_id || $user->role === 'admin' ?
        Response::allow() :
         Response::deny('You dont have permission to update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, reservation $reservation)
    {
        return $user->id === $reservation->user_id || $user->role === 'admin' ?
        Response::allow() :
         Response::deny('You dont have permission');
    }
    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, reservation $reservation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, reservation $reservation)
    {
        //
    }
}
