<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'track';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'dir_track'
    ];


    /**
     * Mutators
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
        //$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        $this->attributes['published_at'] = Carbon::parse($date);
    }


    /**
     * Scope example
     *
     * @param $query
     */
    //
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now())->get();
    }


    /**
     * Scope example
     *
     * @param $query
     */
    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now())->get();
    }

}
