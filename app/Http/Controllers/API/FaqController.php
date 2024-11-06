<?php

namespace App\Http\Controllers\API;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Requests\Request;

class FaqController extends BaseApiController
{
    protected $model = Faq::class;

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