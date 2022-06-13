<?php

namespace App\Traits;

use App\House;

trait searchFilters {
    function composeQuery($request) {
        $housesQuery = House::whereRaw('1 = 1');

        if ($request->s) {
            // var_dump ($request->s);
            $housesQuery->where('title', 'LIKE', "%$request->s%");
        }

        return $housesQuery;
    }
}
