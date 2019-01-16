<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 18/7/16
 * Time: 5:57 PM
 */

namespace App\Repositories\Theatre;


use App\Repositories\GeneralRepository;
use App\Repositories\GeneralRepositoryInterface;

class TheatreClassRepository extends GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * TheatreClassRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new TheatreClass());
    }

    public function store($input){
        $theatre_id = $input['tid'];
        $total = $input['tclass'];

        $end = 65 + $total;

        for($i = 65; $i < $end; $i++){
            $class = $_POST['class' . $i]; echo $class;
            $price_per_class = $_POST['price' . $i];
            $floor_of_class = $_POST['floor' . $i];

            $input = array(
                'theatre_id' => $theatre_id,
                'class_name' => $class,
                'price_per_row' => $price_per_class,
                'floor' => $floor_of_class);

            $modelInstance = new TheatreClass();
            $modelInstance->create($input);
        }
    }
}