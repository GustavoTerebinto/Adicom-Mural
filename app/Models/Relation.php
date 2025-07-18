<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'is_active'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Meta information about Livewire crud crud
     *
     * @var array
     */
    public static $crud = [
        'fields' => [
            'name' => [
                'label' => 'Nome',
                'placeholder' => 'Ex.: Campus Chapecó',
                'validation' => 'required|min:5',
            ],
            'description' => [
                'label' => 'Descrição',
                'placeholder' => 'Ex.: uma breve descrição desse local',
                'show' => 'create,edit'
            ],
            'is_active' => [
                'type' => 'boolean',
                'value_as_text' => [
                    'Inativo',
                    'Ativo',
                ],
                'label' => 'Ativo',
                'placeholder' => 'Se esse local deve aparecer em nossos formulários.',
            ],            
        ]
    ];
}
