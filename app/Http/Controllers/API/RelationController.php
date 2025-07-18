<?php

namespace App\Http\Controllers\API;

use App\Models\Relation;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Requests\Request;

class RelationController extends BaseApiController
{
    protected $model = Relation::class;

    /**
     * The relations that are always included together with a resource.
     *
     * @return array
     */
    public function alwaysIncludes(): array
    {
        return [];
    }

    protected function filterByOwnership(Request $request, Builder $query)
    {
        // 
    }
}
