<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'path',
        'user_id',
        'folder_id',
    ];

    /**
     * Get the user that owns the file.
     */
    public function user()
    {
        return $this->belongsTo(User::class);

    }

    /**
     * Get the folder that owns the file.
     */
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    
}
