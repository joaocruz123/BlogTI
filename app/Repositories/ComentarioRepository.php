<?php

namespace App\Repositories;

use App\Models\Comentario;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ComentarioRepository
 * @package App\Repositories
 * @version December 14, 2018, 1:47 pm UTC
 *
 * @method Comentario findWithoutFail($id, $columns = ['*'])
 * @method Comentario find($id, $columns = ['*'])
 * @method Comentario first($columns = ['*'])
*/
class ComentarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'artigo_id',
        'content'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Comentario::class;
    }

    public function rules()
    {
        return [
            'content' => 'required|max:148',
            'artigo_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
