<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Day;
use App\Match;
use Carbon\Carbon;

class DayController extends Controller
{
    public function index() {
        //$matches = Match::getMatchesUpdatedWithinTheLastMinute();
        //dd($matches);
    	// todo: This should be moved out of the DayController
    	// since this touches both Day and Match.
    	// Perhaps move to DashboardController.
    	$datesArray = Day::getFutureUserDatesAsArray(\Auth::user()->id);
    	$days = Day::getFutureDaysOpen(\Auth::user()->id, $datesArray);

    	$pendingMatches = Match::getUpcomingPendingMatches(\Auth::user()->id);
    	$confirmedMatches = Match::getUpcomingConfirmedMatches(\Auth::user()->id);

    	if ($days->isEmpty() && $pendingMatches->isEmpty() && $confirmedMatches->isEmpty()) {
    		// you have nothing, please add some days!
    		return view('day.empty');
    	}
    	
    	return view('index')
    	->with([
    		'days'	  => $days,
    		'pendingMatches' => $pendingMatches,
    		'confirmedMatches' => $confirmedMatches
    	]);
    }

    public function create() {
    	return view('day.create');
    	dd(Input::all());
    }

    public function destroy($day_id) {
    	$game = Day::find($day_id);
    	$game->delete();
    	return redirect('/');
    }

    public function store() {
    	$dates = explode(',', Input::get('dates'));
    	foreach ($dates as $date) {
    		// todo: this is dumb and won't check for duplicates, existing or otherwise
    		$day = new Day();
    		$day->user_id = \Auth::user()->id;
    		$day->date = $date;
    		$day->save();
    	}
    	return redirect('/');
    }
}
