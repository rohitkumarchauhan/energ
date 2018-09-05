@extends('layouts.app')
@section('title', 'Custom Products')
@section('content')

    <!------------------------------inner page----------------------->
    <div class="page-title">
        <span class="picto picto-na gold-trans hide-mobile"></span>
        <h1 class="big">Bank Details</h1>
    </div>

    <div class="row col-md-12">
        <form method="post" id="address-form" class="form-validate-jquery "
              action="{{ route('front.store.transaction') }}">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id  }}">
            {{--<div class="col-md-6">
                <div class="page-title">
                    <span class="picto picto-na gold-trans hide-mobile"></span>
                    <h4>Transaction Details</h4>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="field firstname">
                            <label for="firstname" class="required" aria-required="true">First name<em>*</em></label>
                            <div class="input-text">
                                <input type="text" id="firstname" name="firstname" title="First name"
                                       class="input-text required-entry">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="field lastname">
                            <label for="lastname" class="required" aria-required="true">Surname<em>*</em></label>
                            <div class="input-text">
                                <input type="text" id="lastname" name="lastname" title="Surname">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="field">
                            <label>Transaction Number</label>
                            <div class="input-text">
                                <input type="text" name="transaction_no" id="transaction_no" class="input-text">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="field">
                            <label for="telephone">Phone*</label>
                            <div class="input-text">
                                <input type="text" name="phone" id="phone" class="input-text" required>
                            </div>
                        </div>
                    </div>

                    --}}{{-- <div class="col-sm-12">
                         <p class="require-fields"><em>*</em>Required fields</p>
                     </div>--}}{{--
                </div>

            </div>--}}
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="page-title">
                    <span class="picto picto-na gold-trans hide-mobile"></span>
                    <h4>Bank Details</h4>
                </div>


                <div class="row">

                    <div class="col-md-12">
                        <div class="customer-links">
                            <a href="#">
                                       <span class="v-align">
                                            <span class="title">{{$bank_details->name}}</span>
                                            <span class="desc"></span>
                                            <span class="desc"><strong>Bank Name:</strong>{{ $bank_details->bank_name }}</span><br/><br/>
                                            <span class="desc"><strong>Address:</strong>{{ $bank_details->address }}</span><br/><br/>
                                            <span class="desc"><strong>Account No:</strong>{{ $bank_details->account_no }}</span><br/><br/>
                                            <span class="desc"><strong>Swift Code:</strong>{{ $bank_details->code }}</span><br/><br/>
                                        </span>
                            </a>
                        </div>
                    </div>

                    {{-- <div class="col-sm-12">
                         <p class="require-fields"><em>*</em>Required fields</p>
                     </div>--}}
                </div>
                <button type="submit" class="button button-black"><span>Confirm</span></button>

            </div>

            <div class="col-md-2"></div>
           {{-- <div class="col-sm-12">
                <div class="buttons">

                    --}}{{--<a href="" title="Back" class="button-black"><span>Submit</span></a>--}}{{--
                    --}}{{--  <button class="button-black" id="go_paypal"><span>Pay with Palpal</span></button>--}}{{--
                    --}}{{--<a href="javascript:void(0)" title="Back" class="button-black" id="go_paypal"><span>Pay with Palpal</span></a>--}}{{--
                </div>
            </div>--}}
        </form>
    </div>

@endsection

@section('js')

    <script type="text/javascript" src="{{asset('/js/frontEnd/validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/frontEnd/form_validation.js')}}"></script>



    <script>
        $(document).ready(function () {
            $('#same_billing').click(function () {
                if ($(this).is(':checked')) {
                    // alert('checked');
                    $('#shipping_firstname').val($('#firstname').val());
                    $('#shipping_lastname').val($('#lastname').val());
                    $('#shipping_company').val($('#company').val());
                    $('#shipping_phone').val($('#phone').val());
                    $('#shipping_fax').val($('#fax').val());
                    $('#shipping_street_1').val($('#street_1').val());
                    $('#shipping_add_2').val($('#street_2').val());
                    $('#shipping_postcode').val($('#postcode').val());
                    $('#shipping_city').val($('#city').val());
                    $('#shipping_country').val($('#country').val());
                    $('.sameCheck').blur();

                } else {
                    $('.sameCheck').val('');
                }
            });
        });
    </script>
@endsection