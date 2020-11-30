@extends('layouts.default')
@section('content')
<!-- DAYS -->
<div class="col-sm-4">
<div class="hush">looking for matches</div>

    <div class="margin"><hr></div>
    <div class="card">
        <div class="card-body">
            <div class="row">
            After you choose your days, other available teams will appear here.
            </div>
        </div>
        <div class="card-footer text-muted"><div class="doctor">&nbsp</div></div>
    </div>

    <div class="margin"><hr></div>
    <div class="card">
        <div class="card-body">
            <div class="row">
            You can then pick those you want to play and send a request!
            </div>
        </div>
        <div class="card-footer text-muted"><div class="doctor">&nbsp</div></div>
    </div>

    @foreach([1,2,3,4,5] as $match)
    <div class="margin"><hr></div>
    <div class="card">
        <div class="card-body">
        	<div class="row">
            <div class="doctor">&nbsp</div>
        	</div>
        </div>
        <div class="card-footer text-muted"><div class="doctor">&nbsp</div></div>
    </div>
    @endforeach
</div>

<!-- PENDING MATCHES -->
<div class="col-sm-4">
<div class="hush">pending matches</div>

    <div class="margin"><hr></div>
    <div class="card">
        <div class="card-body">
            <div class="row">
            Matches awaiting approval will appear here.
            </div>
        </div>
        <div class="card-footer text-muted"><a href="#" data-toggle="modal" data-target="#AddDaysModal">It appears you're new here, click me to add days you're available to play!</a></div>
    </div>

    @foreach([1,2,3,4] as $match)
    <div class="margin"><hr></div>
    <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="doctor">&nbsp</div>
            </div>
        </div>
        <div class="card-footer text-muted"><div class="doctor">&nbsp</div></div>
    </div>
    @endforeach
</div>

<!-- CONFIRMED MATCHES -->
<div class="col-sm-4">
<div class="hush">confirmed matches</div>

    <div class="margin"><hr></div>
    <div class="card">
        <div class="card-body">
            <div class="row">
            Matches you're scheduled to play will appear here.
            </div>
        </div>
        <div class="card-footer text-muted"><div class="doctor">&nbsp</div></div>
    </div>
    @foreach([1,2] as $match)
    <div class="margin"><hr></div>
    <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="doctor">&nbsp</div>
            </div>
        </div>
        <div class="card-footer text-muted"><div class="doctor">&nbsp</div></div>
    </div>
    @endforeach
</div>
@endsection