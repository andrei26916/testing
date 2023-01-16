<?php

namespace App\Services;

use App\Models\Feedback;
use App\Models\User;

class FeedbackService
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function show()
    {
        return Feedback::query()->with('user')->get();
    }

    /**
     * @param  User  $user
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(User $user, array $data)
    {
        return $user->feedback()->create($data);
    }

}
