@extends('layouts.main')

@section('content')

    <div class="card card-viewpress">
        <div class="card-header">
            <h4 class="card-title">
                Author: {{ get_queried_object()->display_name }}
            </h4>
        </div>

        <div class="card-block text-muted">
            not yet implemented
        </div>
    </div>

@stop
