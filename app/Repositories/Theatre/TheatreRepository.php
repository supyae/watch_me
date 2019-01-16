<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 15/7/16
 * Time: 5:27 PM
 */

namespace App\Repositories\Theatre;


use App\Repositories\GeneralRepository;
use App\Repositories\GeneralRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TheatreRepository extends GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * TheatreRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new Theatre());
    }

    public function get_theatre_by_location()
    {
        $data = $this->model->with(['township', 'theatre_class' => function($query) {
            $query->addSelect('*',
                DB::raw("MAX(price_per_row) AS max_price"),
                DB::raw("MIN(price_per_row) AS min_price")
            )->groupBy('theatre_id');

        }])->get();

        //$data = $this->model->with(['township', 'theatre_class'])->get();

        return $data;

    }
}
