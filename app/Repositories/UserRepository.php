<?php

namespace App\Repositories;

use App\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ArtigoRepository
 * @package App\Repositories
 * @version December 9, 2018, 6:47 pm UTC
 *
 * @method Artigo findWithoutFail($id, $columns = ['*'])
 * @method Artigo find($id, $columns = ['*'])
 * @method Artigo first($columns = ['*'])
 */
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name', 
        'email', 
        'password',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
