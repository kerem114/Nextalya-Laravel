<?php

namespace Modules\Member\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Member\Database\Factories\BusinessrequestsFactory;

class Businessrequests extends Model
{
    use HasFactory;
    protected $table = 'businessrequest';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'company_name',
        'company_email',
        'company_phone',
        'company_website',
        'tax_number',
        'tax_office',
        'status',
    ];

    // protected static function newFactory(): BusinessrequestsFactory
    // {
    //     // return BusinessrequestsFactory::new();
    // }
}
