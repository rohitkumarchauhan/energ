@extends('layouts.app')
@section('title', 'Custom Products')
@section('content')


    <div class="page-title">
        <span class="picto picto-na gold-trans hide-mobile"></span>
        <h1 class="big">Dashboard</h1>
        <h2>Welcome {{ \Illuminate\Support\Facades\Auth::user()->name }}</h2>
    </div>

    <div class="dashboard_outer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="customer-links">
                        <a href="{{ route('front.profile','profile') }}">
                                       <span class="v-align">
                                            <i class="fa fa-unlock" aria-hidden="true"></i>
                                            <span class="title">My Profile</span>
                                            <span class="desc">Change your email address, password, etc...</span>
                                        </span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="customer-links">
                        <a href="{{ route('front.profile','address') }}">
                                       <span class="v-align">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <span class="title">Addresses</span>
                                            <span class="desc">Change your billing and delivery address.</span>
                                        </span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="customer-links">
                        <a href="{{ route('front.profile','order') }}">
                                       <span class="v-align">
                                            <i class="fa fa-file-text" aria-hidden="true"></i>
                                            <span class="title">Orders</span>
                                            <span class="desc">Track your orders at any time and find your bills.</span>
                                        </span>
                        </a>
                    </div>
                </div>
                {{--<div class="col-sm-6 col-md-4">
                    <div class="customer-links">
                        <a href="#">
                                       <span class="v-align">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <span class="title">Appointment</span>
                                            <span class="desc">Manage your in-store appointments.</span>
                                        </span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="customer-links">
                        <a href="#">
                                       <span class="v-align">
                                            <i class="fa fa-gift" aria-hidden="true"></i>
                                            <span class="title">Gift card</span>
                                            <span class="desc">Manage gift vouchers.</span>
                                        </span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="customer-links">
                        <a href="#">
                                       <span class="v-align">
                                            <i class="fa fa-share-square-o" aria-hidden="true"></i>
                                            <span class="title">Follow us</span>
                                            <span class="desc">On Facebook</span>
                                        </span>
                        </a>
                    </div>
                </div>--}}

            </div>
        </div>
    </div>

@endsection
