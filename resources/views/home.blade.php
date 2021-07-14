@extends('layouts.app')

@section('content')
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="{{ route('payment') }}"><i class="fa fa-dashboard"></i> Payment </a></li> &nbsp; &nbsp;
            <li class="active">Home</li>
        </ol>
    </section>
<div class="container">

    <div class="row">
        You are logged in as User

    </div>
</div>
@endsection
