/** Custom JS **/
console.log('JS is on!');

function goBack() {
    window.history.back();
}

$(document).ready(function() {
    var a = 400;
    $(".top__mobilebar > div").click(function() {

    	var tab_name = $(this).attr('data-bar');
    	var targeted_popup_class = jQuery(this).attr('data-bar');
    	$('[data-tab="' + targeted_popup_class + '"]').addClass('open').css("z-index", a++);
    	$(this).find('.mobile__contact--close').addClass('active');
    	$(this).find('.mobile__search--close').addClass('active');

    });

    $('.mobile__contact--close').on('click', function(event)  {
    	event.stopPropagation();
   		var targeted_popup_class = $(this).attr('data-close');
   		$(this).removeClass("active");
   		$('[data-tab="' + targeted_popup_class + '"]').removeClass('open');
 	});

 	$('.mobile__search--close').on('click', function(event)  {
    	event.stopPropagation();
   		var targeted_popup_class = $(this).attr('data-close');
   		$(this).removeClass("active");
   		$('[data-tab="' + targeted_popup_class + '"]').removeClass('open');
 	});
	
	$('ul.fp-table__tabs li').click(function(e){
		var tab_id = $(this).attr('data-tab');

		$('ul.fp-table__tabs li').removeClass('current');
		$('.tabbed--content').removeClass('current');
		$('ul.fp-table__connector li').removeClass('current');

		$(this).addClass('current');
		$("."+tab_id).addClass('current');
	});


  $('.accordion .accordion__header').bind('click',function(e){
    e.preventDefault();
    var self = this;
    setTimeout(function() {
      theOffset = $(self).offset();
      $('body,html').animate({ scrollTop: theOffset.top - 80 });
    }, 100);
    $(this).parent().toggleClass('active');
  });

  $('[data-name]').on('click', function(e) {
    $('body').addClass('modal__open');
    var popup_name = $(this).attr('data-name');
    var targeted_popup_class = $(this).attr('data-name');
    $('[data-popup="' + targeted_popup_class + '"]').fadeIn(150);
    var plan_price = $(this).attr('data-price');
    e.preventDefault();
    calcFirst(plan_price);
  });

   $('[data-popup-open]').on('click', function(e) {
    e.preventDefault();
    $('body').addClass('modal__open');
    var popup_name = $(this).attr('data-popup-open');
    var targeted_popup_class = $(this).attr('data-popup-open');
    $('[data-popup="' + targeted_popup_class + '"]').fadeIn(150);
  });

  $(".plan__calculator--duration ul li").on('click', function(){
    var duration__number = $(this).attr('data-duration');
    $('.plan__calculator--duration ul li').removeClass('active');
    $(this).addClass('active');
    var plan_price = $(this).closest('.modal').attr('data-full-price');
    calc(duration__number, plan_price);
  });

  function calcFirst(price) {
    var base__price = price;
    var duration__months = $('.plan__calculator--duration ul li:first-child').attr('data-duration');
        base__price = (Number(base__price));

    $('.plan__full__price > h3').html("£"+base__price);
    $('.duration__number').html(duration__months+" monthly payments");

    var deposit = (Number(149));
    var months = duration__months;
    var years = (months/12);

    var interest = (years*0.047)+1;
    var interest2 = interest.toFixed(2);
    if (years <= 2) {
      interest = 1;
    }

    var balanceIncInterest = (base__price-deposit)*interest;
    var monthlyPayment = (balanceIncInterest/months);
        monthlyPayment = monthlyPayment.toFixed(2);
    var interestPayable = (Number(balanceIncInterest) - Number(base__price) + Number(deposit));

    if(monthlyPayment > 0) {
        $(".total__month").html("£"+monthlyPayment);
        $(".per_month").val(monthlyPayment); 
        $(".plan__curamount h3").html("£"+monthlyPayment);
    } else {
        $(".total__month").html("£"+base__price+" <small>Single Payment</small>");
    }

    if(months < 25) {
      interestPayable = 0; 
    }

    if(interestPayable > 0 || months > 25) {
        $(".total__interest").text("£"+interestPayable.toFixed(2));
    } else {
        $(".total__interest").text("£0");      
    }

    var from_inmonths = 120;
    var from_months = from_inmonths;
    var from_years = (from_months/12);

    var from_interest = (from_years*0.047)+1;
        from_interest = from_interest.toFixed(2);

    var from_balanceIncInterest = (base__price-deposit)*from_interest;
    var from_monthlyPayment = (from_balanceIncInterest/from_months);
        from_monthlyPayment = from_monthlyPayment.toFixed(2);   
  }

  function calc(thisObj, thisObj2) {
      
      var base_plan_price = thisObj2;      
      var duration_inmonths = thisObj;      
          base_plan_price = (Number(base_plan_price));
      
      $('.duration__number').html(duration_inmonths+" monthly payments"); 

      var deposit = (Number(149));
      var months = duration_inmonths;     
      var years = (months/12);

      var interest = (years*0.047)+1;
      var interest2 = interest.toFixed(2);
      if(years <= 2) {
        interest = 1; 
      }

      var balanceIncInterest = (base_plan_price-deposit)*interest;
      var monthlyPayment = (balanceIncInterest/months);
          monthlyPayment = monthlyPayment.toFixed(2);
      var interestPayable = (Number(balanceIncInterest) - Number(base_plan_price) + Number(deposit));
  
      if(monthlyPayment > 0) {
        $(".total__month").html("£"+monthlyPayment);
        $(".per_month").val(monthlyPayment); 
        $(".plan__curamount h3").html("£"+monthlyPayment);
      } else {
        $(".total__month").html(base_plan_price+" <small>One-off payment</small>");
      }
      
      if(months < 25) {
        interestPayable = 0; 
      }
      
      if(interestPayable > 0 || months > 25) {
        $(".total__interest").text("£"+interestPayable.toFixed(2));
      } else {
        $(".total__interest").text("£0");
        //$(".tot-int-payable").text(interestPayable.toFixed(2));       
      }

      var from_inmonths = 120;
      var from_months = from_inmonths;
      var from_years = (from_months/12);

      var from_interest = (from_years*0.047)+1;
          from_interest = from_interest.toFixed(2);

      var from_balanceIncInterest = (base_plan_price-deposit)*from_interest;
      var from_monthlyPayment = (from_balanceIncInterest/from_months);
          from_monthlyPayment = from_monthlyPayment.toFixed(2);
  }

$('[data-popup-close], .modal__fixedbg').on('click', function(e)  {
    var targeted_popup_class = jQuery(this).attr('data-popup-close');
    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeOut(150);
    e.preventDefault();
    $('body').removeClass('modal__open');
});

$('[data-fees-close], .third-fees__bg').on('click', function(e)  {
    var targeted_popup_class = jQuery(this).attr('data-fees-close');
    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeOut(150);
    e.preventDefault();
    $('body').removeClass('modal__open');
});

$('[data-request-name]').on('click', function(e) {
    e.preventDefault();
    $('body').addClass('modal__open');
    var popup_name = $(this).attr('data-request-name');
    var targeted_popup_class = $(this).attr('data-request-name');
    $('[data-request="' + targeted_popup_class + '"]').fadeIn(150);
});

$('[data-request-close], .request-callback__bg').on('click', function(e)  {
    var targeted_popup_class = jQuery(this).attr('data-request-close');
    jQuery('[data-request="' + targeted_popup_class + '"]').fadeOut(150);
    e.preventDefault();
    $('body').removeClass('modal__open');
});

$('.entry__drawer').hover(
  function() {
    $(this).find('li').addClass("open");
  }, function() {
    $(this).find('li').removeClass("open");
  }
);

});

$('.form__validation').each(function() {

$.validator.addMethod("phoneValidation", 
  function(value, element) {

  var elementID = $(element).val();
  elementResult = $(element);
  PhoneNumberValidation_Interactive_Validate_v2_10Begin(elementID);
  return $(element).hasClass("success");
}, "This phone number is invalid. Please try again.");

$.validator.addMethod("emailValidation", 
  function(value, element) {

  var emailID = $(element).val();
  elementResultEmail = $(element);
  EmailValidation_Interactive_Validate_v2_00(emailID);
  return $(element).hasClass("success");
}, "This email address is invalid. Please try again.");

var validCharactersRegex = /^[a-z][- a-z ]*[- ][- a-z ]*[ a-z ]$/i;
function name__valid(value) {
    return validCharactersRegex.test(value);
}

$.validator.addMethod("custom__name", function(value, element) {
    return name__valid(value);
}, 'Please give your full name.');

var form = $(this);
var formMessages = $(this).find('#form-messages');

$(this).validate({
  errorClass: "result fail",
  validClass: "result success",
  rules: {
    'full-name': {
      required: true,
      custom__name: true,
    },
    email: {
      required: true,
      emailValidation: true,
    },
    phone: {
      required: true,
      phoneValidation: true,
    },
    'optIn': {
      required: true,
    }
  },
  messages: {
    password: {
      required: "This field is required",
    },
    'optIn': {
      required: "",
    } 
  },
  highlight: function(element) {
      $(element).removeClass('success').addClass('fail');
      $(element).parent().removeClass('success').addClass('fail');
      $(element).parent().find('label').removeClass('success').addClass('fail');
  },
  unhighlight: function(element) {
      $(element).removeClass('fail').addClass('success');
      $(element).parent().addClass('success').removeClass('fail');
      $(element).parent().find('label').removeClass('fail').addClass('success');
  },
  errorPlacement: function(error, element) {
      if( element.is(":checkbox") ) {
        error.hide();
      } else { 
        error.insertAfter(element);
      }
  },
  submitHandler: function(form, response, data) {
      $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
      })
      .done(function(response) {
        function addThanks () { 
          url = 'thank-you';
          history.pushState(null,null, url);
        }
        addThanks();
        $(formMessages).removeClass('error');
        $(formMessages).addClass('success');

        $(formMessages).text(response);
        $(formMessages).load("//damsonsfutureplanning.co.uk/scripts/success.html");
        $('#name, #email, #phone').val('');
      })
      .fail(function(data) {
        $(formMessages).removeClass('success');
        $(formMessages).addClass('error');

        // Set the message text.
        if (data.responseText !== '') {
          $(formMessages).text(data.responseText);
        } else {
          $(formMessages).text('Oops! An error occured and your message could not be sent.');
        }         
      });
  },
});

function PhoneNumberValidation_Interactive_Validate_v2_10Begin(elementID) {

    var elementPhone = elementID;
    var script = document.createElement("script"),
        head = document.getElementsByTagName("head")[0],
        url = "https://services.postcodeanywhere.co.uk/PhoneNumberValidation/Interactive/Validate/v2.10/json3.ws?";

    url += "&Key=" + encodeURIComponent('WP74-ZE29-WJ54-PK69');
    url += "&Phone=" + encodeURIComponent(elementPhone);
    url += "&Country=" + encodeURIComponent('GB');
    url += "&callback=PhoneNumberValidation_Interactive_Validate_v2_10End";

    script.src = url;
    script.onload = script.onreadystatechange = function () {
        if (!this.readyState || this.readyState === "loaded" || this.readyState === "complete") {
            script.onload = script.onreadystatechange = null;
            if (head && script.parentNode)
                head.removeChild(script);
        }
    };
    head.insertBefore(script, head.firstChild);
}

function EmailValidation_Interactive_Validate_v2_00(emailID) {
    var elementEmail = emailID;
    $.getJSON("http://services.postcodeanywhere.co.uk/EmailValidation/Interactive/Validate/v2.00/json3.ws?callback=?",
    {
        Key: 'WP74-ZE29-WJ54-PK69',
        Email: elementEmail,
        Timeout: 500
    },
    function (data) {
        // Test for an error
        if (data.Items.length == 1 && typeof(data.Items[0].Error) != "undefined") {
            // Show the error message
            alert(data.Items[0].Description);
        }
        else {
            // Check if there were any items found
            if (data.Items.length == 0)
                alert("Sorry, there were no results");
            else {
                var data = data.Items[0];
                var message = data.ResponseMessage;
                switch (data.ResponseCode.toLowerCase()) {
                  case "invalid":
                  elementResultEmail.removeClass('success').addClass('fail');
                  elementResultEmail.next().removeClass('success').addClass('fail');
                break;
                  case "valid":
                  elementResultEmail.removeClass('fail').addClass('success');
                  elementResultEmail.next().removeClass('fail').addClass('success');
                  elementResultEmail.next().empty();
                break;
                }
            }
        }
    });
}

});

$('.top__hamburger').click(function(e){
 e.preventDefault();
 $('.top__mobile-menu').toggleClass('open');
});

function PhoneNumberValidation_Interactive_Validate_v2_10End(response) {

    if (response.Items.length == 1 && typeof(response.Items[0].Error) != "undefined") {
    }
    else {
        if (response.Items.length === 0)
            alert("Sorry, there were no results");
        else {
          var data = response.Items[0];
          switch (data.IsValid) {
          case "No":
          elementResult.removeClass('success').addClass('fail');
          elementResult.next().removeClass('success').addClass('fail');
          break;
          case "Yes":
          elementResult.removeClass('fail').addClass('success');
          elementResult.next().removeClass('fail').addClass('success');
          elementResult.next().empty();
          break;
          }
        }
    }
}

$('a.copy-url').click(function(e) {
  e.preventDefault();
});

var url = document.location.href;
var clipboard = new Clipboard('.copy-url', {
  text: function() {
    return url;
  }
});

clipboard.on('success', function(e) {
  var message = "Copied!";
  $('.copy-url__tooltip').text(message).show();
  $('.copy-url__tooltip').fadeOut(2000);
});

clipboard.on('error', function(e) {
  var message = "Failed!";
  $('.copy-url__tooltip').text(message).show();
  $('.copy-url__tooltip').fadeOut(2000);
});

$('.fb-share').click(function() {
  FB.ui({
    method: 'share',
    href: document.location.href,
  }, function(response){});
});

(function() {
    window.PinIt = window.PinIt || { loaded:false };
    if (window.PinIt.loaded) return;
    window.PinIt.loaded = true;
    function async_load(){
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://assets.pinterest.com/js/pinit.js";
        var x = document.getElementsByTagName("script")[0];
        x.parentNode.insertBefore(s, x);
    }
    if (window.attachEvent)
        window.attachEvent("onload", async_load);
    else
        window.addEventListener("load", async_load, false);
})();
