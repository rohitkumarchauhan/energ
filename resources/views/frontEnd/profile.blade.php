@extends('layouts.app')
@section('title', 'Custom Products')
@section('content')
@include('layouts.flash_message')


    <div class="page-title">
        <span class="picto picto-na gold-trans hide-mobile"></span>
        <h1 class="big">ADD A NEW ADDRESS</h1>
        <h2>COMPLETE THIS FORM TO CREATE A NEW ADDRESS</h2>
    </div>

    <div class="profile_outer_wrap">
        <div class="container">
            <div class="profile_inner">
                <div class="row">
                    <div class="col-sm-4">
                        <!-- required for floating -->
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabs-left">
                            <li @if($slug == 'profile') class="active" @endif><a href="#profile" data-toggle="tab">Home</a></li>
                            <li @if($slug == 'address') class="active" @endif><a href="#address" data-toggle="tab">Addresses</a></li>
                            <li @if($slug == 'order') class="active" @endif><a href="#order" data-toggle="tab">Orders</a></li>
                            {{--<li @if($slug == 'appointment') class="active" @endif><a href="#appointment" data-toggle="tab">Appointment</a></li>
                            <li @if($slug == 'gift_card') class="active" @endif><a href="#gift_card" data-toggle="tab">Gift card</a></li>--}}
                        </ul>
                    </div>
                    <div class="col-sm-8">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane @if($slug == 'profile') active @endif" id="profile">
                                <form method="post" class="inn_form_outer" id="profile-form" action="{{ route('front.update.profile') }}">
                                    <div class="row">
                                        {{ csrf_field() }}
                                        <div class="col-sm-6">
                                            <div class="field firstname">
                                                <label for="firstname" class="required" aria-required="true">
                                                    Name<em>*</em></label>
                                                <div class="input-text">
                                                    <input type="text" id="name" name="name"
                                                           title="Name" class="input-text required-entry" value="{{ $user->name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="field lastname">
                                                <label for="lastname" class="required"
                                                       aria-required="true">Email<em>*</em></label>
                                                <div class="input-text">
                                                    <input type="text" id="email" name="email" title="Email" readonly value="{{ $user->email }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="field">
                                                <label for="telephone" class="required"
                                                       aria-required="true">Phone<em>*</em></label>
                                                <div class="input-text">
                                                    {{--<select id="phone-code" name="phone_code">
                                                        <option value="+33" selected="selected">+33</option>
                                                        <option value="+41">+41</option>
                                                        <option value="+49"> +49</option>
                                                    </select>--}}
                                                    <input type="tel" name="contact_no" title="Phone"
                                                           class="input-text" id="phone" aria-required="true" value="{{ $user->contact_no }}">
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="col-sm-12">
                                            <div class="field">
                                                <label for="country">LANGUAGE OF COMMUNICATION<em>*</em></label>
                                                <div class="input-select">
                                                    <select name="country_id" id="country" class="validate-select"
                                                            title="Country">
                                                        <option value=""></option>
                                                        <option value="AF">English</option>
                                                        <option value="AX">Åland Islands</option>
                                                        <option value="AL">German</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="BJ">French</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-sm-12">
                                            <p class="change-password-text">Change my password</p>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="field">
                                                <label for="current_password" class="required" aria-required="true">Current
                                                    password</label>
                                                <div class="input-text">
                                                    <input type="password" class="input-text ignore-validate" name="password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="field">
                                                <label for="current_password" class="required" aria-required="true">NEW
                                                    PASSWORD</label>
                                                <div class="input-text">
                                                    <input type="password" class="input-text ignore-validate" name="new_password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="field">
                                                <label for="current_password" class="required" aria-required="true">CONFIRM
                                                    NEW PASSWORD</label>
                                                <div class="input-text">
                                                    <input type="password" class="input-text ignore-validate" name="new_password_confirmation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <p class="require-fields"><em>*</em>Required fields</p>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="buttons">
                                                {{--<a href="https://www.atelierna.com/en_fr/customer/account/" title="Back"
                                                   class="button-black"><span>Back</span></a>--}}
                                                <button type="submit" title="Confirm" class="button-black">
                                                    <span>Submit</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane @if($slug == 'address') active @endif" id="address">
                                <form method="post" class="inn_form_outer form-validate-jquery" id="address-form" action="{{ route('front.update.address') }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="field firstname">
                                                <label for="firstname" class="required" aria-required="true">First
                                                    name<em>*</em></label>
                                                <div class="input-text">
                                                    <input type="text" id="firstname" name="first_name"
                                                           title="First name" class="input-text required-entry" required value="{{ @$address->first_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="field lastname">
                                                <label for="lastname" class="required"
                                                       aria-required="true">Surname<em>*</em></label>
                                                <div class="input-text">
                                                    <input type="text" id="lastname" name="last_name" title="Surname" required value="{{ @$address->last_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="field">
                                                <label>Company</label>
                                                <div class="input-text">
                                                    <input type="text" name="company" id="company" class="input-text" value="{{ @$address->company }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="field">
                                                <label for="telephone" class="required"
                                                       aria-required="true">Phone<em>*</em></label>
                                                <div class="input-text">
                                                    <input type="text" name="phone" title="Phone"
                                                           class="input-text" id="phone" aria-required="true" required value="{{ @$address->phone }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="field">
                                                <label for="fax">Fax</label>
                                                <div class="input-text">
                                                    <input type="tel" name="fax" id="fax" class="input-text " value="{{ @$address->fax }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="field">
                                                <label for="street_1">Address<em>*</em></label>
                                                <div class="input-text">
                                                    <input type="text" value="{{ @$address->address }}" title="Address" id="street_1"
                                                           class="input-text  required-entry" aria-required="true" required name="address">
                                                    <input type="text" value="" title="Address" id="street_2"
                                                           class="input-text " name="street_2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="field postcode">
                                                <label for="postcode">Zip code<em>*</em></label>
                                                <div class="input-text">
                                                    <input type="text" name="zipcode" title="Zip code" id="postcode"
                                                           class="input-text" aria-required="true" required value="{{ @$address->zipcode }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="field city">
                                                <label for="city">City<em>*</em></label>
                                                <div class="input-text">
                                                    <input type="text" name="city" value="{{ @$address->city }}" title="city"
                                                           class="input-text" id="city" aria-required="true" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="field">
                                                <label for="country">Country<em>*</em></label>
                                                <div class="input-text">
                                                    <input type="text" name="country" value="{{ @$address->country }}" title="country"
                                                           class="input-text" id="country" aria-required="true" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <p class="require-fields"><em>*</em>Required fields</p>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="buttons">
                                                <input type="hidden" name="id" value="{{ @$address->id }}">
                                                <input type="hidden" name="type" value="billing">
                                               {{-- <a href="https://www.atelierna.com/en_fr/customer/account/" title="Back"
                                                   class="button-black"><span>Back</span></a>--}}
                                                <button type="submit" title="Confirm" class="button-black">
                                                    <span>Submit</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane @if($slug == 'order') active @endif" id="order">Order Tab.</div>
                          {{--  <div class="tab-pane @if($slug == 'appointment') active @endif" id="appointment">
                                <form action="" method="post" class="form">
                                    <div class="field">
                                        <label for="cert-number">Enter the code on your gift voucher</label>
                                        <div class="input-text">
                                            <input type="text" class="input-text" id="cert-number">
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <button type="submit" class="button-black">Confirm</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane @if($slug == 'gift_card') active @endif" id="gift_card">
                                <form action="" method="post" class="form">
                                    <div class="field">
                                        <label for="cert-number">Enter the code on your gift voucher</label>
                                        <div class="input-text">
                                            <input type="text" class="input-text" id="cert-number">
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <button type="submit" class="button-black">Confirm</button>
                                    </div>
                                </form>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('/js/frontEnd/validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/frontEnd/form_validation.js')}}"></script>
@endsection