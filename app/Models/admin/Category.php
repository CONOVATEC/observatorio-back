<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description'];
    //Para registrar la actividad del Usuario
    protected $table = "categories";

    protected static $logAttributes = ['*'];

    protected static $ignoreChangeAttributes = ['updated_at'];
    protected static $recordEvents = ['created', 'updated', 'deleted'];
    protected static $logOnlyDirty = true;
    protected static $logName = 'Category';

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                $description = 'Creado categoría';
                break;
            case 'updated':
                $description = 'Actualizado categoría';
                break;
            case 'deleted':
                $description = 'Eliminado categoría';
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

    /****************************************************
     * Relación de Uno a Muchos hasmany => tiene muchos *
     ****************************************************/
    public function posts()
    {
        return $this->hasmany(Post::class);
    }
}
