<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class UserFilter extends ApiFilter
{
    protected $safeParams = [
        'name' => ['like'],
        'email' => ['like', 'eq'],
        'id' => ['eq', 'lt', 'gt', 'lte', 'gte'],
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
