/*!
 * clipboard.js v1.6.0
 * https://zenorocha.github.io/clipboard.js
 *
 * Licensed MIT © Zeno Rocha
 */
!function(e){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=e();else if("function"==typeof define&&define.amd)define([],e);else{var t;t="undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this,t.Clipboard=e()}}(function(){var e,t,n;return function e(t,n,o){function i(a,c){if(!n[a]){if(!t[a]){var l="function"==typeof require&&require;if(!c&&l)return l(a,!0);if(r)return r(a,!0);var u=new Error("Cannot find module '"+a+"'");throw u.code="MODULE_NOT_FOUND",u}var s=n[a]={exports:{}};t[a][0].call(s.exports,function(e){var n=t[a][1][e];return i(n?n:e)},s,s.exports,e,t,n,o)}return n[a].exports}for(var r="function"==typeof require&&require,a=0;a<o.length;a++)i(o[a]);return i}({1:[function(e,t,n){function o(e,t){for(;e&&e.nodeType!==i;){if(e.matches(t))return e;e=e.parentNode}}var i=9;if(Element&&!Element.prototype.matches){var r=Element.prototype;r.matches=r.matchesSelector||r.mozMatchesSelector||r.msMatchesSelector||r.oMatchesSelector||r.webkitMatchesSelector}t.exports=o},{}],2:[function(e,t,n){function o(e,t,n,o,r){var a=i.apply(this,arguments);return e.addEventListener(n,a,r),{destroy:function(){e.removeEventListener(n,a,r)}}}function i(e,t,n,o){return function(n){n.delegateTarget=r(n.target,t),n.delegateTarget&&o.call(e,n)}}var r=e("./closest");t.exports=o},{"./closest":1}],3:[function(e,t,n){n.node=function(e){return void 0!==e&&e instanceof HTMLElement&&1===e.nodeType},n.nodeList=function(e){var t=Object.prototype.toString.call(e);return void 0!==e&&("[object NodeList]"===t||"[object HTMLCollection]"===t)&&"length"in e&&(0===e.length||n.node(e[0]))},n.string=function(e){return"string"==typeof e||e instanceof String},n.fn=function(e){var t=Object.prototype.toString.call(e);return"[object Function]"===t}},{}],4:[function(e,t,n){function o(e,t,n){if(!e&&!t&&!n)throw new Error("Missing required arguments");if(!c.string(t))throw new TypeError("Second argument must be a String");if(!c.fn(n))throw new TypeError("Third argument must be a Function");if(c.node(e))return i(e,t,n);if(c.nodeList(e))return r(e,t,n);if(c.string(e))return a(e,t,n);throw new TypeError("First argument must be a String, HTMLElement, HTMLCollection, or NodeList")}function i(e,t,n){return e.addEventListener(t,n),{destroy:function(){e.removeEventListener(t,n)}}}function r(e,t,n){return Array.prototype.forEach.call(e,function(e){e.addEventListener(t,n)}),{destroy:function(){Array.prototype.forEach.call(e,function(e){e.removeEventListener(t,n)})}}}function a(e,t,n){return l(document.body,e,t,n)}var c=e("./is"),l=e("delegate");t.exports=o},{"./is":3,delegate:2}],5:[function(e,t,n){function o(e){var t;if("SELECT"===e.nodeName)e.focus(),t=e.value;else if("INPUT"===e.nodeName||"TEXTAREA"===e.nodeName){var n=e.hasAttribute("readonly");n||e.setAttribute("readonly",""),e.select(),e.setSelectionRange(0,e.value.length),n||e.removeAttribute("readonly"),t=e.value}else{e.hasAttribute("contenteditable")&&e.focus();var o=window.getSelection(),i=document.createRange();i.selectNodeContents(e),o.removeAllRanges(),o.addRange(i),t=o.toString()}return t}t.exports=o},{}],6:[function(e,t,n){function o(){}o.prototype={on:function(e,t,n){var o=this.e||(this.e={});return(o[e]||(o[e]=[])).push({fn:t,ctx:n}),this},once:function(e,t,n){function o(){i.off(e,o),t.apply(n,arguments)}var i=this;return o._=t,this.on(e,o,n)},emit:function(e){var t=[].slice.call(arguments,1),n=((this.e||(this.e={}))[e]||[]).slice(),o=0,i=n.length;for(o;o<i;o++)n[o].fn.apply(n[o].ctx,t);return this},off:function(e,t){var n=this.e||(this.e={}),o=n[e],i=[];if(o&&t)for(var r=0,a=o.length;r<a;r++)o[r].fn!==t&&o[r].fn._!==t&&i.push(o[r]);return i.length?n[e]=i:delete n[e],this}},t.exports=o},{}],7:[function(t,n,o){!function(i,r){if("function"==typeof e&&e.amd)e(["module","select"],r);else if("undefined"!=typeof o)r(n,t("select"));else{var a={exports:{}};r(a,i.select),i.clipboardAction=a.exports}}(this,function(e,t){"use strict";function n(e){return e&&e.__esModule?e:{default:e}}function o(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var i=n(t),r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},a=function(){function e(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}return function(t,n,o){return n&&e(t.prototype,n),o&&e(t,o),t}}(),c=function(){function e(t){o(this,e),this.resolveOptions(t),this.initSelection()}return a(e,[{key:"resolveOptions",value:function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};this.action=t.action,this.emitter=t.emitter,this.target=t.target,this.text=t.text,this.trigger=t.trigger,this.selectedText=""}},{key:"initSelection",value:function e(){this.text?this.selectFake():this.target&&this.selectTarget()}},{key:"selectFake",value:function e(){var t=this,n="rtl"==document.documentElement.getAttribute("dir");this.removeFake(),this.fakeHandlerCallback=function(){return t.removeFake()},this.fakeHandler=document.body.addEventListener("click",this.fakeHandlerCallback)||!0,this.fakeElem=document.createElement("textarea"),this.fakeElem.style.fontSize="12pt",this.fakeElem.style.border="0",this.fakeElem.style.padding="0",this.fakeElem.style.margin="0",this.fakeElem.style.position="absolute",this.fakeElem.style[n?"right":"left"]="-9999px";var o=window.pageYOffset||document.documentElement.scrollTop;this.fakeElem.style.top=o+"px",this.fakeElem.setAttribute("readonly",""),this.fakeElem.value=this.text,document.body.appendChild(this.fakeElem),this.selectedText=(0,i.default)(this.fakeElem),this.copyText()}},{key:"removeFake",value:function e(){this.fakeHandler&&(document.body.removeEventListener("click",this.fakeHandlerCallback),this.fakeHandler=null,this.fakeHandlerCallback=null),this.fakeElem&&(document.body.removeChild(this.fakeElem),this.fakeElem=null)}},{key:"selectTarget",value:function e(){this.selectedText=(0,i.default)(this.target),this.copyText()}},{key:"copyText",value:function e(){var t=void 0;try{t=document.execCommand(this.action)}catch(e){t=!1}this.handleResult(t)}},{key:"handleResult",value:function e(t){this.emitter.emit(t?"success":"error",{action:this.action,text:this.selectedText,trigger:this.trigger,clearSelection:this.clearSelection.bind(this)})}},{key:"clearSelection",value:function e(){this.target&&this.target.blur(),window.getSelection().removeAllRanges()}},{key:"destroy",value:function e(){this.removeFake()}},{key:"action",set:function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"copy";if(this._action=t,"copy"!==this._action&&"cut"!==this._action)throw new Error('Invalid "action" value, use either "copy" or "cut"')},get:function e(){return this._action}},{key:"target",set:function e(t){if(void 0!==t){if(!t||"object"!==("undefined"==typeof t?"undefined":r(t))||1!==t.nodeType)throw new Error('Invalid "target" value, use a valid Element');if("copy"===this.action&&t.hasAttribute("disabled"))throw new Error('Invalid "target" attribute. Please use "readonly" instead of "disabled" attribute');if("cut"===this.action&&(t.hasAttribute("readonly")||t.hasAttribute("disabled")))throw new Error('Invalid "target" attribute. You can\'t cut text from elements with "readonly" or "disabled" attributes');this._target=t}},get:function e(){return this._target}}]),e}();e.exports=c})},{select:5}],8:[function(t,n,o){!function(i,r){if("function"==typeof e&&e.amd)e(["module","./clipboard-action","tiny-emitter","good-listener"],r);else if("undefined"!=typeof o)r(n,t("./clipboard-action"),t("tiny-emitter"),t("good-listener"));else{var a={exports:{}};r(a,i.clipboardAction,i.tinyEmitter,i.goodListener),i.clipboard=a.exports}}(this,function(e,t,n,o){"use strict";function i(e){return e&&e.__esModule?e:{default:e}}function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function a(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function c(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}function l(e,t){var n="data-clipboard-"+e;if(t.hasAttribute(n))return t.getAttribute(n)}var u=i(t),s=i(n),f=i(o),d=function(){function e(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}return function(t,n,o){return n&&e(t.prototype,n),o&&e(t,o),t}}(),h=function(e){function t(e,n){r(this,t);var o=a(this,(t.__proto__||Object.getPrototypeOf(t)).call(this));return o.resolveOptions(n),o.listenClick(e),o}return c(t,e),d(t,[{key:"resolveOptions",value:function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};this.action="function"==typeof t.action?t.action:this.defaultAction,this.target="function"==typeof t.target?t.target:this.defaultTarget,this.text="function"==typeof t.text?t.text:this.defaultText}},{key:"listenClick",value:function e(t){var n=this;this.listener=(0,f.default)(t,"click",function(e){return n.onClick(e)})}},{key:"onClick",value:function e(t){var n=t.delegateTarget||t.currentTarget;this.clipboardAction&&(this.clipboardAction=null),this.clipboardAction=new u.default({action:this.action(n),target:this.target(n),text:this.text(n),trigger:n,emitter:this})}},{key:"defaultAction",value:function e(t){return l("action",t)}},{key:"defaultTarget",value:function e(t){var n=l("target",t);if(n)return document.querySelector(n)}},{key:"defaultText",value:function e(t){return l("text",t)}},{key:"destroy",value:function e(){this.listener.destroy(),this.clipboardAction&&(this.clipboardAction.destroy(),this.clipboardAction=null)}}],[{key:"isSupported",value:function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:["copy","cut"],n="string"==typeof t?[t]:t,o=!!document.queryCommandSupported;return n.forEach(function(e){o=o&&!!document.queryCommandSupported(e)}),o}}]),t}(s.default);e.exports=h})},{"./clipboard-action":7,"good-listener":4,"tiny-emitter":6}]},{},[8])(8)});
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
