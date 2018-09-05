$(function() {
	Array.prototype.slice.call(document.querySelectorAll(".switchery")).forEach(function(e) {
        new Switchery(e)
    }),  jQuery.validator.addMethod("lettersOnly", function(e, t) {
        return this.optional(t) || /^[a-z\s]+$/i.test(e)
    }, "Only letters are allowed."), jQuery.validator.addMethod("onlyNumbers", function(e, t) {
        return this.optional(t) || /\d$/i.test(e)
    }, "Only numbers are allowed."), jQuery.validator.addMethod("usernameValidate", function(e, t) {
        return this.optional(t) || /^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*(?:-[A-Za-z0-9]+)*$/i.test(e)
    }, "Username must start with a letter, can not have special character except underscore and hyphen and can not have underscore and hyphen together."), jQuery.validator.addMethod("urlValidate", function(e, t) {
        return this.optional(t) || /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[A-Za-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/.test(e)
    }, "It must be a valid URL Structure."), jQuery.validator.addMethod("facebookUrlValidate", function(e, t) {
        return this.optional(t) || /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)?(facebook.com\/|m.facebook.com\/)([A-Za-z0-9]+[\-\_\.\?\=]*)+?(\/.*)?$/.test(e)
    }, "Facebook page must be a valid URL Structure."), jQuery.validator.addMethod("twitterUrlValidate", function(e, t) {
        return this.optional(t) || /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)?(twitter.com\/|m.twitter.com\/)([A-Za-z0-9]+[\-\_\.\?\=]*)+?(\/.*)?$/.test(e)
    }, "Twitter page must be a valid URL Structure."), jQuery.validator.addMethod("linkedInUrlValidate", function(e, t) {
        return this.optional(t) || /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)?([A-Za-z0-9]+[\.]+)*(linkedin.com\/|m.linkedin.com\/)([A-Za-z0-9]+[\-\_\.\?\=]*)+?(\/.*)?$/.test(e)
    }, "Linkedin page must be a valid URL Structure."), jQuery.validator.addMethod("googlePlusUrlValidate", function(e, t) {
        return this.optional(t) || /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)?(plus.google.com\/|m.plus.google.com\/)([A-Za-z0-9]+[\-\_\.\?\=]*)+?(\/.*)?$/.test(e)
    }, "Google plus page must be a valid URL Structure."), jQuery.validator.addMethod("instagramURLUrlValidate", function(e, t) {
        return this.optional(t) || /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)?(instagram.com\/|m.instagram.com\/)([A-Za-z0-9]+[\-\_\.\?\=]*)+?(\/.*)?$/.test(e)
    }, "Instagram must be a valid URL Structure."), jQuery.validator.addMethod("phoneNumberValidate", function(e, t) {
        return this.optional(t) || /[0]\d{10}$/.test(e)
    }, "Please enter a valid phone number of 11 digits."), jQuery.validator.addMethod("discountValidate", function(e, t) {
        return this.optional(t) || /^(\d?[1-9]|[1-9]0)$/.test(e)
    }, "Please enter the number between 1 to 99."), jQuery.validator.addMethod("accountNumberValidate", function(e, t) {
        return this.optional(t) || /^\d{10}$/.test(e)
    }, "Please enter a valid account number of 10 digits."), jQuery.validator.addMethod("oneToHundredNumberValidate", function(e, t) {
        return this.optional(t) || /^[1-9]$|^0[1-9]$|^1[0-9]$|^100$/.test(e)
    }, "Please enter a number 1-100 only."), jQuery.validator.addMethod("positiveNonZeroValidate", function(e, t) {
        return this.optional(t) || /^[+]?([0-9])*$/.test(e) && /^([1-9][0-9]{0,7}|99999999)$/.test(e)
    }, "Please enter a valid value between 1 to 99999999. Zero/Negative Number/Decimal/Comma are not allowed."), jQuery.validator.addMethod("minFiveMaxTwelveChars", function(e, t) {
        return this.optional(t) || /^.{5,12}$/i.test(e)
    }, "The field must be at least 5 characters and can not exceed 12 characters."), jQuery.validator.addMethod("maxTwentyFiveChars", function(e, t) {
        return this.optional(t) || /^.{0,25}$/i.test(e)
    }, "Can not Exceed 25 characters."), jQuery.validator.addMethod("maxThirtyChars", function(e, t) {
        return this.optional(t) || /^.{0,30}$/i.test(e)
    }, "Can not Exceed 30 characters."), jQuery.validator.addMethod("maxSixtyChars", function(e, t) {
        return this.optional(t) || /^.{0,60}$/i.test(e)
    }, "Can not Exceed 60 characters."), jQuery.validator.addMethod("passwordValidate", function(e, t) {
        return this.optional(t) || /^.{6,16}$/i.test(e)
    }, "The password must be at least 6 characters and not more than 16 characters."), jQuery.validator.addMethod("emailValidate", function(e, t) {
        return this.optional(t) || /^.{0,60}$/i.test(e)
    }, "Email can not exceed 60 characters."), jQuery.validator.addMethod("atleastOneLetter", function(e, t) {
        return this.optional(t) || /\w*[a-zA-Z]\w*/i.test(e)
    }, "Can not have numbers without letters."), jQuery.validator.addMethod("onlyLettersNumbers", function(e, t) {
        return this.optional(t) || /^[A-Za-z0-9\s]*$/i.test(e)
    }, "Can only contain letters and numbers."), jQuery.validator.addMethod("minThreeChars", function(e, t) {
        return this.optional(t) || /^.{3,}$/i.test(e)
    }, "Can not have less than 3 characters."), jQuery.validator.addMethod("minTwoChars", function(e, t) {
        return this.optional(t) || /^.{2,}$/i.test(e)
    }, "Can not have less than 2 characters."), jQuery.validator.addMethod("maxFiftyFiveChars", function(e, t) {
        return this.optional(t) || /^.{0,55}$/i.test(e)
    }, "Can not exceed 55 characters."), jQuery.validator.addMethod("lettersNumbersHyphens", function(e, t) {
        return this.optional(t) || /^[A-Za-z0-9\-]*$/i.test(e)
    }, "Can only enter Letters, numbers and hyphens (-)."), jQuery.validator.addMethod("lettersNumbersAt", function(e, t) {
        return this.optional(t) || /^[A-Za-z0-9\@\s]*$/i.test(e)
    }, "Can only enter Letters, numbers and @"), jQuery.validator.addMethod("lettersNumbersHyphensAt", function(e, t) {
        return this.optional(t) || /^[A-Za-z0-9\-\@\s]*$/i.test(e)
    }, "Can only enter Letters, numbers, hyphens (-) and @"), jQuery.validator.addMethod("notStartHyphenNorEndHyphen", function(e, t) {
        return this.optional(t) || /^([^-]|[^-].*[^-])$/i.test(e)
    }, "Can not begin nor end a domain name with a hyphen."), jQuery.validator.addMethod("doubleHyphenNotAllowed", function(e, t) {
        return this.optional(t) || /^.([^-]+-?)+$/i.test(e)
    }, "Can not have a double hyphen however you can have multiple instances of a hyphen."), jQuery.validator.addMethod("maxTwoHundredChars", function(e, t) {
        return this.optional(t) || /^.{0,200}$/i.test(e)
    }, "Can not Exceed 200 characters."), jQuery.validator.addMethod("maxOneHundredChars", function(e, t) {
        return this.optional(t) || /^.{0,100}$/i.test(e)
    }, "Can not Exceed 100 characters."), jQuery.validator.addMethod("startWithZero", function(e, t) {
        return this.optional(t) || /[0](.*)$/i.test(e)
    }, "Please Enter a valid phone number that start with zero."), jQuery.validator.addMethod("minElevenDigitPhoneNumber", function(e, t) {
        return this.optional(t) || /^.{11}$/i.test(e)
    }, "Phone Number must be 11 digits."), jQuery.validator.addMethod("customUrl", function(e, t) {
        return this.optional(t) || /(http(s)?:\/\/)?(www\.)?[^www][-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&\/\/=]*)/i.test(e)
    }, "The Link must be a valid url."), jQuery.validator.addMethod("customEmail", function(e, t) {
        return this.optional(t) || /(?:[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/i.test(e)
    }, "Please enter a valid email address."), jQuery.validator.addMethod("cropRequired", function(e, t) {
        return !($("#cropedImage").length > 0) || "" != $("#cropedImage").val()
    }, "This Field is Required."), jQuery.validator.addMethod("multiCropRequired", function(e, t) {
        return !(0 == $(".current_images_row .uploaded-images").length && $("#cropedImage").length > 0) || "" != $("#cropedImage").val()
    }, "This Field is Required."), jQuery.validator.addMethod("restrictSme9ja", function(e, t) {
        return !this.optional(t) && !/sme9ja/i.test(e)
    }, "SME9ja is reserved word, you can not enter it."), jQuery.validator.addMethod("Sme9jaNotAllow", function(e, t) {
        return temp = e.replace(/ /g, "").toLowerCase(), !(temp.indexOf("sme9ja") > -1)
    }, "SME9ja is reserved word, you can not enter it."), jQuery.validator.addMethod("contactWithComma", function(e, t) {
        return console.log("in"), this.optional(t) || /^[0-9]+(,[0-9]+)*$/i.test(e)
    }, "Enter valid contact numbers seprated by comma(,)."), jQuery.validator.addMethod("checkEventDates", function(e, t) {
        return dateFrom = new Date($("#start_date").data("daterangepicker").startDate._d), dateTo = new Date($("#end_date").data("daterangepicker").startDate._d), today = new Date, dateTo > dateFrom && dateTo > today
    }, "The end date must be a date after start date and today.");
    var e = {
            password: {
                minlength: 6,
                required: true,
            },
            current_pwd: {
                minlength: 6,
                required: true,
            },
            new_pwd: {
                minlength: 6,
                required: true,
            },
            confirm_pwd: {
                equalTo: "#new_pwd"
            },
            repeat_password: {
                equalTo: "#password"
            },
            password_confirmation: {
                equalTo: "#password"
            }, 
            email: {
                email: !0,
                customEmail: !0,
                required: true,
            },
            emailconfirm: {
                email: !0,
                customEmail: !0,
                required: true,
            },
            repeat_email: {
                equalTo: "#email"
            },
            minimum_characters: {
                minlength: 10
            },
            maximum_characters: {
                maxlength: 10
            },
            minimum_number: {
                min: 10
            },
            maximum_number: {
                max: 10
            },
            number_range: {
                range: [10, 20]
            },
            url: {
                url: !0
            },
            date: {
                date: !0
            },
            date_iso: {
                dateISO: !0
            },
            numbers: {
                number: !0
            },
            digits: {
                digits: !0
            },
            creditcard: {
                creditcard: !0
            },
            basic_checkbox: {
                minlength: 2
            },
            styled_checkbox: {
                minlength: 2
            },
            switchery_group: {
                minlength: 2
            },
            switch_group: {
                minlength: 2
            },
            firstname: {
                required: true
            },
            message: {
                required: true
            },
            telephone: {
                required: true
            },
            threshold: {
                required: true
            },
            lastname: {
                required: true
            }
        },
        t = {};
    var a = $(".form-validate-jquery").validate({
        ignore: "input[type=hidden]",
        errorClass: "validation-error-label",
        // successClass: "validation-valid-label",
        highlight: function(e, t) {
            $(e).removeClass(t)
        },
        unhighlight: function(e, t) {
            $(e).removeClass(t)
        },
        errorPlacement: function(e, t) {
        	e.insertAfter(t);
        	console.log(e);
        },
        // validClass: "validation-valid-label",
        // success: function(e) {
        //     e.addClass("validation-valid-label").text("Success.")
        // },
        rules: e,
        messages: {
            custom: {
                required: "This is a custom error message."
            },
            agree: "Please accept our policy."
        },
        submitHandler: function(e) {
            $(".full-page-loader-overlay").show(), $(".full-page-loader").show(), e.submit()
        }
    });

    var b = $(".form-validate-jquery-1").validate({
        ignore: "input[type=hidden]",
        errorClass: "validation-error-label",
        successClass: "validation-valid-label",
        highlight: function(e, t) {
            $(e).removeClass(t)
        },
        unhighlight: function(e, t) {
            $(e).removeClass(t)
        },
        errorPlacement: function(e, t) {
        	e.insertAfter(t.parentsUntil('main_input_box').first());
        	console.log(e);
        },
        validClass: "validation-valid-label",
        // success: function(e) {
        //     // e.addClass("validation-valid-label").text("Success.")
        // },
        rules: e,
        messages: {
            custom: {
                required: "This is a custom error message."
            },
            agree: "Please accept our policy."
        },
        submitHandler: function(e) {
            $(".full-page-loader-overlay").show(), $(".full-page-loader").show(), e.submit()
        }
    });

    var c = $(".form-validate-jquery-2").validate({
        ignore: "input[type=hidden]",
        errorClass: "validation-error-label",
        successClass: "validation-valid-label",
        highlight: function(e, t) {
            $(e).removeClass(t)
        },
        unhighlight: function(e, t) {
            $(e).removeClass(t)
        },
        errorPlacement: function(e, t) {
            e.insertAfter(t.parentsUntil('main_input_box').first());
            console.log(e);
        },
        validClass: "validation-valid-label",
        // success: function(e) {
        //     // e.addClass("validation-valid-label").text("Success.")
        // },
        rules: e,
        messages: {
            custom: {
                required: "This is a custom error message."
            },
            agree: "Please accept our policy."
        },
        submitHandler: function(e) {
            $(".full-page-loader-overlay").show(), $(".full-page-loader").show(), e.submit()
        }
    });
    $.validator.messages.url = "Please Enter a Valid URL Structure. Make sure you put http or https with url.", $.validator.messages.required = "This Field is Required.", $.validator.messages.digits = "Only Digits are Allowed.", $("#reset").on("click", function() {
        a.resetForm()
        b.resetForm()
        c.resetForm()
    })
}); 