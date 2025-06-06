<?php

namespace App\Models;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Firebase\JWT\JWT;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    const ADMIN = 'admin';
    const NORMAL = 'normal';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'username',
        'uid',
        'cpf',
        'type'
    ];

    protected $hidden = [
        'password',
        'cpf',
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
                'validation' => 'required',
            ],
            'email' => [
                'label' => 'E-mail',
                'validation' => 'required',                
            ],  
            'username' => [
                'label' => 'Username',
                'validation' => 'required',                
            ],
            'type' => [
                'label' => 'Privilégio',
                'type' => 'select',
                'validation' => 'required',
                'options' => [
                    self::ADMIN => 'Administrador',
                    self::NORMAL => 'Normal (cliente)',
                ],
            ],
        ]
    ];

    public function isAdmin() {
        return $this->type == SELF::ADMIN;
    }


    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->email;
    }    

    // JWT Subct methods
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getFirstNameAttribute()
    {
        // Using $this->name, which is a string representing a full name, extract only the first name
        $name = $this->name;
        $parts = explode(' ', $this->name);

        if (isset($parts[0])) {
            $name = $parts[0];
        }
        
        return Str::title($name);
    }

    /**
     * Get all of the user's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get all of the user's orders
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get all of the admin's orders
     */

    public function ordersAdmin()
    {
        return $this->hasMany(Order::class, 'admin_id');
    }
    
    /**
     * Get all of the user's questions
     */
    public function questions()
    {
        return $this->hasMany(Faq::class);
    }
    
    /**
     * List of user communication channels
     */
    public function channels()
    {
        return $this->hasOne(Channels::class);
    }

    /**
     * Specifies the user's FCM token
     *
     * @return string|array
     */
    public function routeNotificationForFcm()
    {
        return $this->channels->fcm_token;
    }

    public function getOrCreateJWTAttribute($teste)
    {
        $key = env('APP_KEY');
        $user = $this;
        $user = array(
            "uid" => $user->uid,
            "email" => $user->email,
            "name"=> $user->name
        );
       
        $app_id = (int) env('APP_ID');

        $payload = array(
            'iss' => env('APP_NAME'),
            'aud' => 'practice.uffs.edu.br',
            'iat' => Carbon::now()->timestamp,
            'nbf' => Carbon::now()->timestamp - 1,
            'app_id' => $app_id,
            'user' => $user,
        );
        
        $jwt = JWT::encode($payload, $key, 'HS256');
        
        return $jwt;
    }


}