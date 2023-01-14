<?php

namespace App\Actions\User;

use App\Actions\AsAction;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class GetMyRecords extends AsAction
{
    public function handle(
        ?int $id = null
    ): Collection
    {
        return User::find($id)->records()->get();
    }
}
