@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    @if (Auth::check())
                        <a href="/problems">Go to my problems</a>
                    @else
                        Register or login and post your problem.
                    @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
