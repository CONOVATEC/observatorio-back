<?php

namespace App\Models;


use App\Models\admin\Post;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Models\Role;
use App\Models\admin\YouthStrategy;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Permission;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use LogsActivity;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'name',
        'email',
        'username',
        'phone',
        'status',
        'biography',
        'profile_photo_path',
        'password',
    ];
    //Para registrar la actividad del Usuario
    protected $table = "users";
    // Podemos seleccionar que campo sea seguido la actividad
    // protected static $logAttributes = [
    //     'name',
    //     'email',
    //     'username',
    //     'phone',
    //     'status',
    //     'biography',
    // ];
    protected static $logAttributes = ['*'];

    protected static $ignoreChangeAttributes = ['updated_at'];
    protected static $recordEvents = ['created', 'updated', 'deleted'];
    protected static $logOnlyDirty = true;
    protected static $logName = 'User';

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                $description = 'Creado Usuario';
                break;
            case 'updated':
                $description = 'Actualizado Usuario';
                break;
            case 'deleted':
                $description = 'Eliminado Usuario';
                break;
            default:
                $description = $eventName;
                break;
        }
        return $description;
    }

    public function getActivitylogOptions(): LogOptions
    {
        // return LogOptions::defaults();
        return LogOptions::defaults()->logOnly(['*']);
        // To avoid hardcoding you could use logAll() method
        // return LogOptions::defaults()->logAll();
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    //*Método para en la url aparesca el slug
    public function getRouteKeyName()
    {
        return "slug";
    }
    /****************************************************
     ****************************************************/
    public function settings()
    {
        return $this->hasmany(Setting::class);
    }

    /****************************************************
     * Relación de Uno a Muchos hasmany => tiene muchos *
     ****************************************************/
    public function youth_strategies()
    {
        return $this->hasmany(YouthStrategy::class);
    }

    public function posts()
    {
        return $this->hasMany(profile::class);
    }
}