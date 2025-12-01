<?php

namespace App\Filters\V1;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class ArtistFilter extends ApiFilter
{
    protected $allowedParms = [
        'name' => ['like'],
        'id' => ['eq', 'ne', 'lt', 'gt', 'lte', 'gte']
    ];

    protected $columnMap = [
        // Map request parameters to database columns if needed
    ];

    protected $operatorMap = [
        'eq' => '=',
        'ne' => '!=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '<=',
        'gte' => '>=',
        'like' => 'LIKE'
    ];

    public function transform(Request $request)
    {
        $queryItems = [];

        foreach ($this->allowedParms as $parm => $operators) {
            $query = $request->query($parm);
            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $queryItems[] = [
                        $column,
                        $this->operatorMap[$operator], 
                        $query[$operator]
                    ];
                }
            }
        }


        return $queryItems;
    }
}