@extends('layouts.default')
@section('content')
<!-- DAYS -->
<div class="col-sm-4">
looking for matches
    @foreach($days as $day)
    <div class="margin"><hr></div>
    <div class="card">
        <div class="card-body">
        	<div class="row">
        		{{ $day->user['name'] }}
        	</div>
        	<div class="row">
        		<div class="col-md-2">
        		{{ Form::open(array('url' => 'match/create')) }}
        			<input type="hidden" name="home_user_id" value="{{$day->user['id']}}">
        			<input type="hidden" name="date" value="{{$day->date}}">
				    <input type="submit" class="btn btn-primary btn-sm" value="Play" />
				{{ Form::close() }}
				</div>
			</div>
        </div>
        <div class="card-footer text-muted">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $day->date)->format('l\\, F jS\\, Y') }}</div>
    </div>
    @endforeach
</div>

<!-- PENDING MATCHES -->
<div class="col-sm-4">
pending matches
	@foreach($pendingMatches as $match)
	<div class="margin"><hr></div>
    <div class="card">
        <div class="card-body">

        	<div class="row">
        	{{ $match->awayUser['name'] }} at {{ $match->homeUser['name'] }}
        	</div>

        	<div class="row">
        	@if(\Auth::user()->id == $match->awayUser['id'])
        		<!-- accept -->
        		<div class="col-lg-2 col-md-3"></div>
        		<!-- deny -->
        		<div class="col-lg-2 col-md-3">
        		{{ Form::open(array('url' => 'match/deny')) }}
        			<input type="hidden" name="match_id" value="{{$match->id}}">
				    <input type="submit" class="btn btn-secondary btn-sm" value="Cancel" />
				{{ Form::close() }}
				</div>
        	@else
        		<!-- accept -->
        		<div class="col-lg-2 col-md-3">
        		{{ Form::open(array('url' => 'match/accept')) }}
        			<input type="hidden" name="match_id" value="{{$match->id}}">
				    <input type="submit" class="btn btn-primary btn-sm" value="Accept" />
				{{ Form::close() }}
				</div>
        		<!-- deny -->
        		<div class="col-lg-2 col-md-3">
        		{{ Form::open(array('url' => 'match/deny')) }}
        			<input type="hidden" name="match_id" value="{{$match->id}}">
				    <input type="submit" class="btn btn-secondary btn-sm" value="Decline" />
				{{ Form::close() }}
				</div>
        	@endif
        	</div>
        </div>
        <div class="card-footer text-muted">
        	{{ \Carbon\Carbon::createFromFormat('Y-m-d', $match->date)->format('l\\, F jS\\, Y') }}
        	@if(\Auth::user()->id == $match->awayUser['id'])
        	<span class="badge badge-pill badge-secondary">waiting on other team</span>
        	@endif
        </div>
    </div>
    @endforeach
</div>

<!-- CONFIRMED MATCHES -->
<div class="col-sm-4">
confirmed matches
	@foreach($confirmedMatches as $match)
	<div class="margin"><hr></div>
    <div class="card">
        <div class="card-body">
        	{{ $match->awayUser['name'] }} at {{ $match->homeUser['name'] }}
        	<div class="col-md-2">
        		{{ Form::open(array('url' => 'match/deny')) }}
        			<input type="hidden" name="match_id" value="{{$match->id}}">
				    <input type="submit" class="btn btn-secondary btn-sm" value="Cancel" />
				{{ Form::close() }}
        		</div>
        </div>
        <div class="card-footer text-muted">
        	{{ \Carbon\Carbon::createFromFormat('Y-m-d', $match->date)->format('l\\, F jS\\, Y') }}
        </div>
    </div>
    @endforeach
</div>
@endsection