<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class PlaylistSongsFilter extends ApiFilter
{
    protected $safeParams = [
        'playlist_id' => ['eq'],
        'song_id' => ['eq'],
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '<=',
        'gte' => '>=',
        'like' => 'like',
    ];

    protected $columnMap = [];
}
