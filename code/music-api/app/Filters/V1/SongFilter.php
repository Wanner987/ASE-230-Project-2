<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class SongFilter extends ApiFilter
{
    protected $safeParams = [
        'name' => ['like'],
        'id' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'duration' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'artist_id' => ['eq'],
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
