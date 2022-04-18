<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TodoList
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $id_user
 * @property $fechaInicio
 * @property $fechaFin
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TodoList extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'id_user' => 'required',
		'fechaInicio' => 'required',
		'fechaFin' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','id_user','fechaInicio','fechaFin'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
    

}
