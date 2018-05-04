@extends('layouts/master')

@section('content')

@javascript(compact('pusherKey', 'pusherCluster', 'usingNodeServer'))

<dashboard id="dashboard" columns="5" rows="3">
    <twitter :initial-tweets="{{ json_encode($initialTweets) }}" position="a1:a3"></twitter>
    <uptime position="e2:e3"></uptime>
    <tasks team-member="cindy" position="b3"></tasks>
    <tasks team-member="gabe" position="c1"></tasks>
    <tasks team-member="wun" position="c2"></tasks>
    <tasks team-member="chris" position="c3"></tasks>
    <tasks team-member="akmal" position="d1"></tasks>
    <tasks team-member="alyssa" position="d2"></tasks>
    <tasks team-member="shukla" position="d3"></tasks>
    <time-weather position="e1" date-format="ddd MM/DD" time-zone="America/Chicago" weather-city="Dallas"></time-weather>
    <internet-connection></internet-connection>
</dashboard>

@endsection
