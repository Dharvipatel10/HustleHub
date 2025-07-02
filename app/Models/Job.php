<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Testing\Fluent\Concerns\Has;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';

    protected $fillable = [
        'title', 
        'description',
        'salary',
        'tags',
        'job_type',
        'remote',
        'requirements',
        'benefits',
        'address',
        'city',
        'state',
        'zip_code',
        'contact_email',
        'contact_phone',
        'company_name',
        'company_description',
        'company_website',
        'company_logo',
        'user_id'
    ];

    //relation to user
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //Relation to bookmarks
    public function bookmarkedByUsers(): BelongsToMany {
        return $this->belongsToMany(User::class, 'job_user_bookmarks')->withTimestamps();
    }


}
