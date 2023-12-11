<?php

namespace Manta\LaravelContact\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MantaContact extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'manta_contacts';
    // Disable Laravel's mass assignment protection
    // protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'created_by',
        'updated_by',
        'deleted_by',
        'company_id',
        'host',
        'pid',
        'locale',
        'company',
        'title',
        'sex',
        'firstname',
        'lastname',
        'email',
        'phone',
        'address',
        'zipcode',
        'city',
        'country',
        'birthdate',
        'newsletters',
        'subject',
        'comments',
        'internal_contact',
        'ip',
    ];
}
