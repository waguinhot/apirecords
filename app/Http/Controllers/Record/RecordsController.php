<?php

namespace App\Http\Controllers\Record;

use App\Actions\Record\StoreRecord;
use App\Http\Controllers\Controller;
use App\Http\Requests\Record\StoreRecordRequest;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    public function store(StoreRecordRequest $request)
    {
        // você deve estar se perguntando o por que eu não uso o request->all(), correto?
        // simples, só pra ficar mais bonitinho mesmo e eu já mandar separado sem precisar
        // ser em um array
        $user_id    =  $request->user()->id;
        $title = $request->input('title');
        $start = $request->input('start');
        $end   = $request->input('end');
        $color = $request->input('color');

        $record = StoreRecord::run($user_id , $title ,$start , $end, $color);

        return response(json_encode($record), 201);

    }

    public function getRecordsForUser(Request $request)
    {
        $records = GetMyRecords::run($request->user()->id);

        return response(json_encode($records));

    }
}
