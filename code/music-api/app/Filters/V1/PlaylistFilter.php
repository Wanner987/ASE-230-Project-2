<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class PlaylistFilter extends ApiFilter
{
    protected $safeParams = [
        'title' => ['like'],
        'id' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'user_id' => ['eq'],
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
