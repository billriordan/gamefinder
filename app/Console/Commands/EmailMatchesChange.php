<?php

namespace App\Console\Commands;

use Mail;
use App\Match;
use Illuminate\Console\Command;

class EmailMatchesChange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:matches-change';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Emails on Match Changes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $matches = Match::getMatchesUpdatedWithinTheLastMinute();
        foreach ($matches as $match) {
            // send an email to both parties

            Mail::send('emails.match-status', ['match' => $match], function ($m) use ($match) {
                $m->from('info@travelgamefinder.com', 'Your friendly bot');
                if ($match->status == Match::CANCELLED) {
                    $m->to('billriordan95@gmail.com', $match->homeUser->name)->subject('One of your matches has been cancelled');
                }
                else {
                    $m->to('billriordan95@gmail.com', $match->homeUser->name)->subject('New {$match->status} match has been scheduled!');
                }
            });

            Mail::send('emails.match-status', ['match' => $match], function ($m) use ($match) {
                $m->from('info@travelgamefinder.com', 'Your friendly bot');
                if ($match->status == Match::CANCELLED) {
                    $m->to('billriordan95@gmail.com', $match->awayUser->name)->subject('One of your matches has been cancelled');
                }
                else {
                    $m->to('billriordan95@gmail.com', $match->awayUser->name)->subject('New {$match->status} match has been scheduled!');
                }
            });
        }
    }
}
