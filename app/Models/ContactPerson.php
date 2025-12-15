<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    /**
     * Explicit table name because Eloquent pluralizes "ContactPerson" to "contact_people",
     * but our migrations create the table `contact_persons`.
     */
    protected $table = 'contact_persons';
    protected $fillable = ['user_id', 'name', 'contact_number', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
