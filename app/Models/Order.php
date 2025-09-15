<?php

namespace App\Models;

use App\Models\User;
use App\OrderEvaluation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

define('NOW_PLUS_FEW_DAYS', now()->addDays(10)->format('Y-m-d'));
define('NOW_PLUS_FEW_DAYS_VALIDATION', Carbon::createFromFormat('Y-m-d', NOW_PLUS_FEW_DAYS)->subDays(1)->format('Y-m-d'));

class Order extends Model
{
    use HasFactory;

    /**
     * Eager load the following always
     */
    protected $with = [
        'user',
        'location',
        'service',
        'comments.user'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'status',
        'urgency',
        'title',
        'wpp_number',
        'description',
        'data',
        'google_drive_in_folder_link',
        'google_drive_out_folder_link',
        'google_drive_folder_link',
        'requested_due_date',
        'read_until_comment_id',
        'user_id',
        'admin_id',
        'location_id',
        'service_id',
        'relation_id',
        'public',
        'name',
        'email',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => AsArrayObject::class,
        'read_until_comment_id' => 'integer',
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:h-i d/m/Y',
    ];

    /**
     * Meta information about Livewire crud crud
     *
     * @var array
     */
    public static $crud = [
        'fields' => [
            'title' => [
                'label' => 'Assunto',
                'placeholder' => 'Nome da campanha, evento, projeto',
                'validation' => 'required|min:5',
            ],
            'description' => [
                'label' => 'Descrição',
                'placeholder' => 'Preencher com todas as informações sobre a divulgação.',
                'validation' => 'required|min:10',
                'type' => 'textarea',
                'show' => 'create,edit'
            ],
            'public' => [
                'label' => 'Público-alvo',
                'placeholder' => 'Preencher com informações que ajudam a definir o público-alvo da divulgação.',
                'validation' => 'required',
            ],
            'name' => [
                'label' => 'Nome do solicitante',
                'placeholder' => 'Nome do responsável pelo pedido.',
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
                'type' => 'tel'
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
            /** 'requested_due_date' => [
            *    'type' => 'date',
            *    'label' => 'Prazo de entrega sugerido',
            *    'help' => 'Quando você gostaria de ter um primeiro material para revisão. Esse tempo deve considerar alguns dias para que nossa equipe possa fazer a análise do pedido. Além disso, essa data é sugestiva e não há garantias que ela será atendida.',
            *    'attr' => 'min=' . NOW_PLUS_FEW_DAYS . ' ',
            *    'validation' => 'after:' . NOW_PLUS_FEW_DAYS_VALIDATION . ' '
            * ],
            */
        ]
    ];

    public function findById($id)
    {
        $user = User::where('id', $id)->first();
        
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        
        return response()->json($user);
    }

    public function findAdm($id)
    {
        $user = User::where('id', $id)->first();
        
        return $user->name;
    }

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get the user associated with the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the location associated with the order.
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Avaliação desse pedido.
     */
    public function evaluation()
    {
        return $this->hasOne(OrderEvaluation::class, 'order_id');
    }

    /**
     * Get the service associated with the order.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getGoogleDriveInFolderIdAttribute()
    {
        if (empty($this->google_drive_in_folder_link)) {
            return '';
        }

        $parts = explode('/', $this->google_drive_in_folder_link);
        return $parts[count($parts) - 1];
    }

    public function getGoogleDriveOutFolderIdAttribute()
    {
        if (empty($this->google_drive_out_folder_link)) {
            return '';
        }

        $parts = explode('/', $this->google_drive_out_folder_link);
        return $parts[count($parts) - 1];
    }

    /**
     * Obtém informações sobre a situação do pedido para mostrar para o usuário,
     * utilizando como base os campos de status, link para github, etc.
     * As informações retornadas estão em texto "amigável" que pode ser mostrado
     * para o usuário final.
     *
     * @return stdClass objeto com os campos `text`, `explanation`, `color`.
     */
    public function situation()
    {
        if ($this->status == 'doing') {
            return (object) [
                'text' => 'Em andamento',
                'explanation' => 'O pedido está na fila de trabalho para ser realizado. Quando chegar sua vez, ele será conduzido.',
                'color' => 'green-600',
            ];
        }

        if ($this->status == 'review') {
            return (object) [
                'text' => 'Em revisão',
                'explanation' => 'Para continuar a execução, o pedido aguarda a revisão de quem solicitou.',
                'color' => 'pink-500',
            ];
        }

        if ($this->status == 'completed') {
            return (object) [
                'text' => 'Completo',
                'explanation' => 'O pedido foi realizado, finalizado e entregue.',
                'color' => 'green-700',
            ];
        }

        if ($this->status == 'closed') {
            return (object) [
                'text' => 'Cancelado',
                'explanation' => 'O pedido foi fechado por vontade de quem solicitou, ou porque ele é inviável dentro das possibilidades da equipe.',
                'color' => 'red-600',
            ];
        }

        if ($this->status == 'todo') {
            return (object) [
                'text' => 'Fila de trabalho',
                'explanation' => 'A solicitação foi aceita, mas ainda não foi escalonada para execução.',
                'color' => 'purple-600',
            ];
        }

        return (object) [
            'text' => 'Aguarda análise',
            'explanation' => 'Estamos verificando a viabilidade de execução desse pedido.',
            'color' => 'purple-600',
        ];
    }

     /**
     * Função para retornar o nível de urgência.
     *
     * @return stdClass
     */
    public function readiness()
    {
        if ($this->urgency == 'low') {
            return (object) [
                'text' => 'Baixa',
                'explanation' => 'Esta demanda possui urgência baixa e não há necessidade imediata de conclusão.',
                'color' => 'green-600',
            ];
        }

        if ($this->urgency == 'mid') {
            return (object) [
                'text' => 'Média',
                'explanation' => 'Esta demanda possui urgência média e possúi necessidade parcial de conclusão.',
                'color' => 'yellow-500',
            ];
        }

        if ($this->urgency == 'max') {
            return (object) [
                'text' => 'Máxima',
                'explanation' => 'Esta demanda possui urgência alta e é necessário concluir ela assim que for possível. ',
                'color' => 'red-700',
            ];
        }

        return (object) [
            'text' => 'Sem nível',
            'explanation' => 'Sem nível de urgência definido pelos administradores',
            'color' => 'blue-600',
        ];
    }

    public function getCreatedAtHumanAttribute()
    {

        $diffInDays = $this->created_at->diffInDays(Carbon::now());

        if ($diffInDays > 3) {
            return $this->created_at->format('d/m/Y (h:i)');
        }

        return $this->created_at->diffForHumans();
    }

    // a função abaixo serve para formatar a data e hora do campo updated_at, entretanto ela gera ambiguidade no horario
    // nao dando pra entender. por exemplo, se é 1 da madrugada ou da tarde, entao nao está sendo usada no front

    public function getUpdatedAtHumanAttribute()
    {

        $diffInDays = $this->updated_at->diffInDays(Carbon::now());

        if ($diffInDays > 3) {
            return $this->updated_at->format('d/m/Y (h:i)');
        }

        return $this->updated_at->diffForHumans();
    }
}
