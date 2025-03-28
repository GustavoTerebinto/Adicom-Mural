<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
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
        'user_id'
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
                'placeholder' => 'Ex.: Como fazer uma solicitação.',
                'validation' => 'required|min:5',
            ],
            'description' => [
                'label' => 'Descrição',
                'type' => 'textarea',
                'placeholder' => 'Ex.: Seria muito interessante se houvesse um tutorial para...',
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
