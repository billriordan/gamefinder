<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    const PENDING   = 'pending';
    const CONFIRMED = 'confirmed';
    const CANCELLED =  'cancelled';
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'home_user_id', 'away_user_id', 'status', 'date', 'created_at', 'updated_at',
    ];

    public function homeUser() {
    	return $this->belongsTo('App\User', 'home_user_id');
    }

    public function awayUser() {
    	return $this->belongsTo('App\User', 'away_user_id');
    }

    //todo: integrate winner/loser

    public static function getUpcomingPendingMatches($user_id) {
        return Match::where(function($query) use ($user_id)
            {
                $query->where('home_user_id', '=', $user_id)
                ->orWhere('away_user_id', '=', $user_id);
            })
        ->where('status', '=', Match::PENDING)
        ->orderBy('date', 'asc')
        ->with('homeUser')
        ->with('awayUser')
        ->get();
    }

    public static function getUpcomingConfirmedMatches($user_id) {
        return Match::where(function($query) use ($user_id)
            {
                $query->where('home_user_id', '=', $user_id)
                ->orWhere('away_user_id', '=', $user_id);
            })
        ->where('status', '=', Match::CONFIRMED)
        ->orderBy('date', 'asc')
        ->with('homeUser')
        ->with('awayUser')
        ->get();
    }

    public static function getMatchesUpdatedWithinTheLastMinute() {
        return Match::whereBetween('updated_at', [new Carbon('12 hours ago'), new Carbon()])
        ->with('homeUser')
        ->with('awayUser')
        ->get();
    }
}
