<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pauta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'description',
        'is_visible',
        'is_highlight',
        'user_id',
        'name',
        'wpp_number',
        'email',
        'location_id',
        'relation_id',
        'contacts'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_visible' => 'boolean',
        'is_highlight' => 'boolean'
    ];

    /**
     * Meta information about Livewire crud crud
     *
     * @var array
     */
    public static $crud = [
        'fields' => [
            'title' => [
                'label' => 'Título',
                'placeholder' => 'Título da pauta.',
                'validation' => 'required|min:5',
            ],
            'description' => [
                'label' => 'Descrição',
                'type' => 'textarea',
                'placeholder' => 'Informações sobre a pauta.',
                'show' => 'create,edit'
            ],
            'name' => [
                'label' => 'Nome',
                'placeholder' => 'Nome do responsável pela sugestão.',
                'validation' => 'required|min:5',
            ],
            'email' => [
                'label' => 'Email',
                'placeholder' => 'Ex.: usuário1@gmail.com',
                'validation' => 'min:10'
            ],
            'wpp_number' => [
                'label' => 'Número de telefone (Whatsapp)',
                'placeholder' => 'Ex.: (00) 90000-0000',
                'validation' => 'min:11',
                //'type' => 'tel'
            ],
            'relation_id' => [
                'type' => 'model:App\Models\Relation',
                'label' => 'Vínculo com a UFFS',
                'validation' => 'required',
                'placeholder' => '',
                'show' => 'create,edit'
            ],
            'location_id' => [
                'type' => 'model:App\Models\Location',
                'label' => 'Local',
                'validation' => 'required',
                'placeholder' => '',
                'show' => 'create,edit'
            ],
            'contacts' => [
                'label' => 'Contatos',
                'type' => 'textarea',
                'placeholder' => 'Indicação de outros contatos para entrevista/mais informações.',
                'show' => 'create,edit'
            ]
        ]
    ];

    /**
     * Get the user associated with the idea.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
