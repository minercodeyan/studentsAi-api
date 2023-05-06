<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailBroadcast extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'title',
        'broadcast_message',
    ];

    protected static function boot()
    {
        parent::boot();

        // auto-sets values on creation
        static::creating(function ($model) {
            $model->is_send = $model->is_send ?? true;
        });
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class,
            'groups_email_broadcasts', 'broadcast_id', 'group_id');
    }

}
