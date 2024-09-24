<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class PaginationMerger extends Model
{
    static public  function merge(LengthAwarePaginator $collection1,LengthAwarePaginator $collection2,
                                  LengthAwarePaginator $collection3,LengthAwarePaginator $collection4)
    {

        $total = $collection1->total() + $collection2->total() + $collection3->total() + $collection4->total();

        $perPage = $collection1->perPage() + $collection2->perPage() + $collection3->perPage() + $collection4->perPage();

        $item = array_merge($collection1->items(),$collection2->items(),$collection3->items(),$collection4->items());

        $paginator = new LengthAwarePaginator($item,$total,$perPage,LengthAwarePaginator::resolveCurrentPage(),['path'=>route('home.ofertas-especial')]);

        return $paginator;
    }
}
