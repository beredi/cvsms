<?php

namespace App\Policies;

use App\Models\StockItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StockItemPolicy
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
        return $user->hasPermission('VIEW_ALL_STOCKITEM');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StockItem  $stockItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, StockItem $stockItem)
    {
        return $user->hasPermission('VIEW_STOCKITEM');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermission('CREATE_STOCKITEM');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StockItem  $stockItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->hasPermission('EDIT_STOCKITEM');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StockItem  $stockItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->hasPermission('DELETE_STOCKITEM');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StockItem  $stockItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, StockItem $stockItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StockItem  $stockItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, StockItem $stockItem)
    {
        //
    }
}
