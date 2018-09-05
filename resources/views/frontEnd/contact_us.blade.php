@extends('layouts.app')
@section('title', 'Custom Products')
@section('content')
    @include('layouts.flash_message')

    <div class="page-title">
        <span class="picto picto-na gold-trans hide-mobile"></span>
        <h1 class="big">Contact</h1>
        <h2>Any questions? Send us a message by completing this form</h2>
    </div>
    <form method="post" id="contact-form" action="{{route('contact-us')}}" class="form-validate-jquery">
        {{csrf_field()}}
        <input type="hidden" name="form_key" value="bdi44jQQxSDkKiSM"/>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="contact_banner">
                            <img src="{{ asset('frontend/images/contact-top-banner-01.jpg') }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="colLeft">
                            @if(!empty($contact))

                                {!!  $contact->description  !!}

                            @else

                                <span class="txtBig">OUR STOREFRONT</span><br>
                                Empire Tailors is located at 124-126 Sukhumvit Between Soi 4 - 6 (Beside Nana Office).
                                <br>
                                <br>
                                We are approximately 150 metres from the Nana Skytrain station, just after the Landmark
                                Hotel. If you have trouble locating us, you may kindly call and we will guide you on the
                                directions. <br>
                                <br>
                                Our location boasts many elegant boutiques and excellent department stores, together
                                with colorful street stalls. You can therefore easily combine making fine clothes with a
                                rewarding shopping experience.<br>
                                <br>
                                <span class="txtBig">BUSINESS HOURS</span><br>
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <td aling="left">Mon-Sat:</td>
                                        <td width="10">&nbsp;</td>
                                        <td aling="left">10.00-20.00 hrs</td>
                                    </tr>
                                    <tr>
                                        <td aling="left">Sunday:</td>
                                        <td width="10">&nbsp;</td>
                                        <td aling="left">Closed</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <br>
                                <span class="txtBig">CONTACT NUMBER</span><br>
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <td aling="left">Tel:</td>
                                        <td width="10">&nbsp;</td>
                                        <td aling="left">(662) 254-4760</td>
                                    </tr>
                                    <tr>
                                        <td aling="left">Mobile:</td>
                                        <td width="10">&nbsp;</td>
                                        <td aling="left">(668) 1922-0669</td>
                                    </tr>
                                    <tr>
                                        <td aling="left">Fax:</td>
                                        <td width="10">&nbsp;</td>
                                        <td aling="left">(662) 254-4762</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <br>
                                <span class="txtBig">ONLINE URL</span><br>
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <td aling="left">Website:</td>
                                        <td width="10">&nbsp;</td>
                                        <td aling="left"><a href="http://www.theempiretailors.com"
                                                            style="color: rgb(51, 51, 51);">www.theempiretailors.com</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td aling="left">Email Address:</td>
                                        <td width="10">&nbsp;</td>
                                        <td aling="left"><a href="mailto:sunny@theempiretailors.com"
                                                            style="color: rgb(51, 51, 51);">sunny@theempiretailors.com</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <div id="divSubmit"><a
                                            href="http://www.theempiretailors.com/userfiles/image/contact-top-banner-01.jpg"
                                            class="btnPrint" style="color:white;">Print Map</a></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <ul class="form-list">
                            <li class="lname">
                                <label for="lastname" class="required">Surname</label>
                                <div class="input-box">
                                    <input type="text" name="lastname" id="lastname" class="input-text"/>
                                </div>
                            </li>
                            <li class="fname">
                                <label for="firstname" class="required">First name</label>
                                <div class="input-box">
                                    <input type="text" name="firstname" id="firstname"
                                           class="input-text required-entry validate-firstname "/>
                                </div>
                            </li>
                            <li>
                                <label for="email" class="required">Email address</label>
                                <div class="input-box">
                                    <input type="text" name="email" id="email" class="input-text"/>
                                </div>
                            </li>
                            <li>
                                <label for="telephone" class="required">Phone</label>
                                <div class="input-box">
                                    <input type="tel" name="telephone" id="telephone" class="input-text"/>
                                </div>
                            </li>

                            <li>
                                <label for="telephone" class="required">Subject</label>
                                <div class="input-box">
                                    <input type="text" name="topic" id="topic" class="input-text"/>
                                </div>
                            </li>


                            <li>
                                <label for="topic" class="required">Message</label>
                                <div class="subject">
                                    {{--<select id="topic" name="topic">--}}
                                    {{--<option value="brand">Questions about the brand</option>--}}
                                    {{--<option value="order">Questions about your pending order</option>--}}
                                    {{--<option value="partnership">Partnership</option>--}}
                                    {{--<option value="employment">Job application</option>--}}
                                    {{--</select>--}}
                                    <div class="input-box">
                                        <textarea name="message" class="input-text required-entry"
                                                  id="message"></textarea>
                                    </div>
                                </div>
                            </li>
                            <li></li>
                        </ul>
                        <div class="buttons">
                            <button type="submit" class="button button-black"><span>Confirm</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>




@endsection
@section('js')
    <script type="text/javascript" src="{{asset('/js/frontEnd/validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/frontEnd/form_validation.js')}}"></script>
@endsection