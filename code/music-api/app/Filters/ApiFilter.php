<?php

namespace App\Filters;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ArtistFilter extends ApiFilter
{
    protected $allowedParms = [];

    protected $columnMap = [];

    protected $operatorMap = [];

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