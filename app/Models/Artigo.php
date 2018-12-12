<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Artigo
 * @package App\Models
 * @version December 9, 2018, 6:47 pm UTC
 *
 * @property integer categoria_id
 * @property integer user_id
 * @property string titulo
 * @property string descricao
 * @property string corpo
 * @property string imagem
 */
class Artigo extends Model
{
    use SoftDeletes;

    public $table = 'artigos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'categoria_id',
        'user_id',
        'titulo',
        'descricao',
        'corpo',
        'imagem'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'categoria_id' => 'integer',
        'user_id' => 'integer',
        'titulo' => 'string',
        'descricao' => 'string',
        'corpo' => 'string',
        'imagem' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'categoria_id' => 'required',
        'user_id' => 'required',
        'titulo' => 'required'
    ];

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    
}
