<?php

namespace App\Actions\Record;

use App\Actions\AsAction;
use App\Models\Record;

class StoreRecord extends AsAction
{
    public function handle(
        ?int $user_id = null,
        ?string $title = null,
        ?string $start = null,
        ?string $end   = null,
        ?string $color = null
    ): Record
    {
        return Record::query()->create([
            'user_id'=> $user_id,
            'title' => $title,
            'start' => $start,
            'end'   => $end,
            'color' => $color
        ]);
    }
}
