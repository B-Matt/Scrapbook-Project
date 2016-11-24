<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Photos extends Authenticatable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;	
    
	/**
	 * Format unixtimestamp za created_at i updated_at
	*/
	protected $dateFormat = 'U';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'poster_id', 'title', 'description', 'filter', 'isPrivate', 'file', 'path'
    ];
}
