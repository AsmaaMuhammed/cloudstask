@extends('layouts.app')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home </a></li> &nbsp; &nbsp;
        <li class="active">Payment</li>
    </ol>
    <div class="container">
        <br><br>

        <div class="spacer"></div>
        <form action="{{ route('charge') }}" method="POST" id="payment-form">
            {{ csrf_field() }}
            <div style="display: flex;">
                <div class="card" style="width: 18rem;" id="monthdiv">

                    <div class="card-body">
                        <h5 class="card-title" style="margin-left: 10px;">
                            <input class="form-check-input" checked type="radio" value="100" name="payment_plan_value" id="payment_plan1">&nbsp;
                            <label class="form-check-label" for="payment_plan">
                                Monthly
                            </label>
                        </h5>
                        <br>
                        <p class="card-text">100$/month</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;" id="annualdiv">

                    <div class="card-body">
                        <h5 class="card-title" style="margin-left: 10px;">
                            <input class="form-check-input" type="radio" value="1000" name="payment_plan_value" id="payment_plan2">&nbsp;
                            <label class="form-check-label" for="payment_plan">
                                Annual
                            </label>
                        </h5>
                        <br>
                        <p class="card-text">1000$/year</p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email">
            </div>

            <div class="form-group">
                <label for="name_on_card">Name on Card</label>
                <input type="text" class="form-control" id="name_on_card" name="name_on_card">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input type="text" class="form-control" id="province" name="province">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="postalcode">Postal Code</label>
                        <input type="text" class="form-control" id="postalcode" name="postalcode">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="card-element">Credit Card</label>
                <div id="card-element">
                    <!-- a Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors -->
                <div id="card-errors" role="alert"></div>
            </div>

            <div class="spacer"></div>

            <button type="submit" id="payment-form-submit" data-stripe_publish_key="{{config('services.stripe.publish-key')}}" class="btn btn-success">Submit Payment</button>
        </form>

        {{--<div>--}}
            {{--<form action="/charge" method="post" id="payment-form">--}}
                {{--<div class="form-row">--}}
                    {{--<label for="card-element">--}}
                        {{--Credit or debit card--}}
                    {{--</label>--}}
                    {{--<div id="card-element">--}}
                        {{--<!-- A Stripe Element will be inserted here. -->--}}
                    {{--</div>--}}

                    {{--<!-- Used to display Element errors. -->--}}
                    {{--<div id="card-errors" role="alert"></div>--}}
                {{--</div>--}}

                {{--<button>Submit Payment</button>--}}
            {{--</form>--}}
        {{--</div>--}}
    </div>
@endsection