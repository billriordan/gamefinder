<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Day extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'date', 'created_at', 'updated_at',
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public static function getFutureUserDatesAsArray($current_user_id) {
        return Day::where('date', '>=', Carbon::today()->toDateString())
        ->where('user_id', '=', $current_user_id)
        ->with('user')
        ->orderBy('date', 'asc')
        ->pluck('date')
        ->toArray();
    }

    public static function getFutureDaysOpen($current_user_id, $dateArray) {
    	return Day::where('date', '>=', Carbon::today()->toDateString())
        ->where('user_id', '!=', $current_user_id)
        ->whereIn('date', $dateArray)
        ->with('user')
        ->orderBy('date', 'asc')
        ->get();
    }

    public static function findDayFromMatch($user_id, $date) {
        return Day::where('user_id', '=', $user_id)->where('date', '=', $date)->first();
    }

    public static function deletePastDays() {
        return Day::where('date', '<', Carbon::today()->toDateString())->delete();
    }
}
