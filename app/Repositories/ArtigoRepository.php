<?php

namespace App\Repositories;

use App\Models\Artigo;
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
class ArtigoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'categoria_id',
        'user_id',
        'titulo',
        'descricao',
        'corpo',
        'imagem'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Artigo::class;
    }
}
