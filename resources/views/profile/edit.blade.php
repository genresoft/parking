@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h3>Edit Profile</h3></div>
            <div class="card-body">
                @include('profile.fields')
            </div>
        </div>
    </div>

</div>
@endsection