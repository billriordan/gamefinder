<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Match;
use App\Day;

class MatchController extends Controller
{
    public function create() {
    	$match = new Match();
    	$match->away_user_id = \Auth::user()->id;
    	$match->home_user_id = Input::get('home_user_id');
    	$match->status = Match::PENDING;
    	$match->date = Input::get('date');
        $match->save();

        return redirect('/');
    }

    public function accept() {
        // todo: this is dumb and will not catch a conflict
        // i.e. having a double header is valid (should be illegal)
    	$match = Match::find(Input::get('match_id'));
    	$away_user_day = Day::findDayFromMatch($match->awayUser->id, $match->date);
    	$home_user_day = Day::findDayFromMatch($match->homeUser->id, $match->date);

    	$away_user_day->delete();
    	$home_user_day->delete();

    	$match->status = Match::CONFIRMED;
    	$match->save();

        return redirect('/');
    }

    public function deny() {
    	$match = Match::find(Input::get('match_id'));
    	$match->status = Match::CANCELLED;
    	$match->save();

        return redirect('/');
    }
}
