<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 15/7/16
 * Time: 2:44 PM
 */

namespace App\Repositories\Genre;


use App\Repositories\GeneralRepository;
use App\Repositories\GeneralRepositoryInterface;

class GenreRepository extends GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * GenreRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new Genre());
    }
}