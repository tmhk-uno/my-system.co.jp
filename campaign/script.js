var current_mode = 'index';
var add_ing = 0;

function check_data() {
    current_mode = 'index';

    $('#form_parent').show();
    $('#form_parent_new').remove();
    
    $([document.documentElement, document.body]).animate({
        scrollTop: $( "#form_parent" ).offset().top - 150
    }, 500, function() {
        $( "#form_parent" ).focus();
    });

    $('.check_btn').show();
    $('.back_btn').hide();
    $('.submit_btn').hide();
}

function add_data() {
    if(add_ing == 1) return;
    add_ing = 1;

    var last_top = 99999;
    var error_element = '';
    var textyn_ary = [];

    if($('.re').val() === 'yes') {
        $('.re_alert').removeClass('alert_show');
    } else {
        $('.re_alert').addClass('alert_show');
        error_element = "html_element";
    }

    temp_result = check_all('#method_radio_1','',0,1);
    if(temp_result.check === 0 || temp_result.value) {
        $('.method_radio_alert').removeClass('alert_show');
    } else {
        $('.method_radio_alert').addClass('alert_show');
        error_element = "method_radio_1";
    }

    temp_result = check_all('#addr3','',0,1);
    if(temp_result.check === 0 || temp_result.value) {
        $('.addr_alert').removeClass('alert_show');
    } else {
        $('.addr_alert').addClass('alert_show');
        error_element = "addr3";
    }

    temp_result = check_all('#addr2','',0,1);
    if(temp_result.check === 0 || temp_result.value) {
        $('.addr_alert').removeClass('alert_show');
    } else {
        $('.addr_alert').addClass('alert_show');
        error_element = "addr2";
    }

    temp_result = check_all('#addr1','',0,1);
    if(temp_result.check === 0 || temp_result.value) {
        $('.addr_alert').removeClass('alert_show');
    } else {
        $('.addr_alert').addClass('alert_show');
        error_element = "addr1";
    }

    var t_zip1 = $('#zip1').val();
    var t_zip2 = $('#zip2').val();
    if(t_zip1 == '' || t_zip2 == '') {
        $('.zip_alert').addClass('alert_show');
        error_element = "zip1";
    } else {
        $('.zip_alert').removeClass('alert_show');
    }

    temp_result = check_all('#tel','',0,1);
    if(temp_result.check === 0 || temp_result.value) {
        $('.tel_alert').removeClass('alert_show');

        if(temp_result.value !== "" && !validateTel(temp_result.value)) {
            $('.tel2_alert').addClass('alert_show');
            error_element = "tel";
        }
        else {
            $('.tel2_alert').removeClass('alert_show');
        }
    } else {
        $('.tel_alert').addClass('alert_show');
        error_element = "tel";
    }

    temp_result = check_all('#email','',0,1);
    if(temp_result.check === 0 || temp_result.value) {
        $('.email_alert').removeClass('alert_show');
    } else {
        $('.email_alert').addClass('alert_show');
        error_element = "email";
    }

    var t_email = $('#email').val();
    var t_email_repeat = $('#email_repeat').val();

    if(t_email !== "" && !validateEmail(t_email)) {
        $('.email2_alert').addClass('alert_show');
        error_element = "email";
    }
    else {
        $('.email2_alert').removeClass('alert_show');
    }

    if(t_email != t_email_repeat) {
        $('.email3_alert').addClass('alert_show');
        error_element = "email_repeat";
    }
    else {
        $('.email3_alert').removeClass('alert_show');
    }

    temp_result = check_all('#user_name','',0,1);
	if(temp_result.check === 0 || temp_result.value) {
	    $('.user_name_alert').removeClass('alert_show');
	} else {
	    $('.user_name_alert').addClass('alert_show');
	    error_element = "user_name";
	}

	temp_result = check_all('#company_name','',0,1);
	if(temp_result.check === 0 || temp_result.value) {
	    $('.company_name_alert').removeClass('alert_show');
	} else {
	    $('.company_name_alert').addClass('alert_show');
	    error_element = "company_name";
	}

    if(error_element != '') {
        $([document.documentElement, document.body]).animate({
            scrollTop: $( ":input[name='" + error_element + "']" ).offset().top - 150
        }, 500, function() {
            $( ":input[name='" + error_element + "']" ).focus();
        });

        add_ing = 0;

        return false;
    }
    else {
        if(current_mode == 'index') {
            current_mode = 'confirm';

            var new_element = $('#form_parent').clone();
            new_element.attr('id', 'form_parent_new');
            new_element.appendTo('#form_section');
            $('#form_parent').hide();
            $('#form_parent_new').find('input').attr('disabled', 'disabled');

            var zip1 = $('#zip1').val();
            var zip2 = $('#zip2').val();
            $('#form_parent_new').find('.postal_code_txt_1').text('〒 ' + zip1 + '-' + zip2);

            var addr1 = $('#addr1').val();
            var addr2 = $('#addr2').val();
            var addr3 = $('#addr3').val();
            $('#form_parent_new').find('.address_txt_1').text(addr1 + ' ' + addr2 + ' ' + addr3);

            var method_radio = $('input:radio[name=method_radio]:checked').val();
            var method = '';
            if(method_radio == '口座振替') {
                method = '口座振替';
            }
            else if(method_radio == '請求書払い') {
                method = '請求書払い';
            }

            if(method != '') {
                $('#form_parent_new').find('.method_box').append('<p>' + method + '</p>');
            }

            $('#form_parent_new').find('.confirm_hide').hide();

            $([document.documentElement, document.body]).animate({
                scrollTop: $( "#form_parent_new" ).offset().top - 150
            }, 500, function() {
                $( "#form_parent_new" ).focus();
            });

            $('.check_btn').hide();
            $('.back_btn').css('display', 'block');
            $('.submit_btn').css('display', 'block');
        }
        else if(current_mode == 'confirm') {
            var tForm = document.createElement('form');
            tForm.id = "campaign_form";
            tForm.target = "addIframe";
            tForm.method = "POST";
            tForm.action = "./input.php";
            document.body.appendChild(tForm);

            var form_ary = $('#form_parent').find(':input').serializeArray();

            if(form_ary.length > 0) {
                var j = form_ary.length;
                for(var i = 0; i < j; i++) {
                    var t_name = form_ary[i]['name'];
                    var t_value = form_ary[i]['value'];

                    var input = document.createElement("input");
                    input.setAttribute("type", "hidden");
                    input.setAttribute("name", t_name);
                    input.setAttribute("value", t_value);
                    tForm.appendChild(input);
                }
            }

            var input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", 'method_radio');
            input.setAttribute("value", $('input:radio[name=method_radio]:checked').val());
            tForm.appendChild(input);

            var csrfToken = generateCsrfToken();
            setCookie('csrf_token_campaign', encodeURIComponent(csrfToken));
            var input = document.createElement("input");
            input.setAttribute("name", 'csrf_token_campaign');
            input.setAttribute("value", csrfToken);
            tForm.appendChild(input);

            tForm.submit();

            $('#form_parent').find('#campaign_form').trigger('reset');

            add_ing = 0;

            return false;
        }

        add_ing = 0;

        return false;
    }

    add_ing = 0;
}

function get_form_data(element){
    element = element || '';
    var all_page_data = {};
    var all_forms_data_temp = {};
    if(!element){
        element = 'body';
    }

    if($(element)[0] == undefined){
        return null;
    }

    $(element).find('input,select,textarea').each(function(i){
        all_forms_data_temp[i] = $(this);
    });

    $.each(all_forms_data_temp,function(){
        var input = $(this);
        var element_name;
        var element_value;

        if((input.attr('type') == 'submit') || (input.attr('type') == 'button')){
            return true;
        }

        if((input.attr('name') !== undefined) && (input.attr('name') != '')){
            element_name = input.attr('name').trim();
        } else if((input.attr('id') !== undefined) && (input.attr('id') != '')){
            element_name = input.attr('id').trim();
        } else if((input.attr('class') !== undefined) && (input.attr('class') != '')){
            element_name = input.attr('class').trim();
        }

        if(input.val() !== undefined){
            if(input.attr('type') == 'checkbox'){
                element_value = input.parent().find('input[name="'+element_name+'"]:checked').val();
            } else if((input.attr('type') == 'radio')){
                element_value = $('input[name="'+element_name+'"]:checked',element).val();
            } else {
                element_value = input.val();
            }
        } else if(input.text() != undefined){
            element_value = input.text();
        }

        if(element_value === undefined){
            element_value = '';
        }

        if(element_name !== undefined){
            var element_array = new Array();
            if(element_name.indexOf(' ') !== -1){
                element_array = element_name.split(/(\s+)/);
            } else {
                element_array.push(element_name);
            }

            $.each(element_array,function(index, name){
                name = name.trim();
                if(name != ''){
                    all_page_data[name] = element_value;
                }
            });
        }
    });
    return all_page_data;
}

function validEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

var generateCsrfToken = function() { function generateRandomString(length) { var text = ""; var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"; for(var i = 0; i < length; i++) { text += possible.charAt(Math.floor(Math.random() * possible.length)); } return text; }; return btoa(generateRandomString(32)); }
var setCookie = function (cname, cvalue) { document.cookie = cname + "=" + cvalue + ";path=/"; }

function check_all(newId,newErrMeg,newNew,newCheck) {
  var current_ele = $(newId);
  var temp_return_val;

  if(current_ele.get(0).tagName === "INPUT") {
    var current_input_type = current_ele.attr('type');

    if(current_input_type == "radio") {
      temp_return_val = radio_check(newId,newCheck);
    }
    else if(current_input_type == "text") {
      temp_return_val = text_check(newId,newCheck);
    }
    else if(current_input_type == "email") {
      temp_return_val = text_check(newId,newCheck);
    }
    else if(current_input_type == "tel") {
      temp_return_val = text_check(newId,newCheck);
    }
    else if(current_input_type == "number") {
      temp_return_val = text_check(newId,newCheck);
    }
    else if(current_input_type == "checkbox") {
      temp_return_val = checkbox_check(newId,newCheck);
    }
    else if(current_input_type == "hidden") {
      temp_return_val = text_check(newId,newCheck);
    }
    else if(current_input_type == "password") {
      temp_return_val = text_check(newId,newCheck);
    }
  }
  else if(current_ele.get(0).tagName === "SELECT") {
    temp_return_val = select_check(newId,newNew,newCheck);
  }
  else if(current_ele.get(0).tagName === "TEXTAREA") {
    temp_return_val = textarea_check(newId,newCheck);
  }

  var return_val = {check:newCheck,value:temp_return_val};

  if(newCheck === 0) {
    return return_val;
  }
  if(!temp_return_val) {

    return return_val;
  }
  else {
    return return_val;
  }
}

function select_check(newId, newNew, newCheck) {
  var return_value = newNew;
  var selected_value = $(newId+' option:selected');
  selected_value.each(function() {
    return_value = this.value;
  });
  if(newCheck === 0) {
    return return_value;
  }
  else if(return_value == newNew) {
    return 0;
  }

  return return_value;
}

function text_check(newId, newCheck) {
  var temp_title = $(newId).val();

  if(newCheck === 0) {
    return temp_title;
  }
  else if(!temp_title) {
    return 0;
  }

  return temp_title;
}

function textarea_check(newId, newCheck) {
  var temp_title = $(newId).val();
  if(newCheck === 0) {
    return temp_title;
  }
  else if(!temp_title) {
    return 0;
  }

  return temp_title;
}

function checkbox_check(newId,newCheck) {
  var temp_id = newId.substring(1,newId.length);
  if(document.getElementById(temp_id).checked) {
    return 1;
  }
  else {
    return 0;
  }
}

function radio_check(newId, newCheck) {
  var current_ele_name = $(newId).attr('name');
  var return_value = $('input:radio[name='+current_ele_name+']:checked').val();

  if(newCheck === 0) {
    return return_value;
  }
  else if(!return_value) {
    return 0;
  }

  return return_value;
}

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validateTel(tel) {
  var re = /^[\+]?[(]?[0-9]{3,4}[)]?[-\s\.]?[0-9]{3,4}[-\s\.]?[0-9]{4,6}$/im
  ;
  return re.test(tel);
}

var zip_ing = 0;
// $("#zip2").on("change paste keyup", function() {
//   if(zip_ing == 1) { return; }
//   zip_ing = 1;

//   var zip1 = $.trim($('#zip1').val());
//   var zip2 = $.trim($('#zip2').val());
//   var zipcode = zip1 + zip2;

//   if(zipcode.length < 7) {
//     zip_ing = 0;
//     return;
//   }

//   check_zip(zipcode);
// });

// $("#zip2").blur(function() {
//   if(zip_ing == 1) { return; }
//   zip_ing = 1;

//   var zip1 = $.trim($('#zip1').val());
//   var zip2 = $.trim($('#zip2').val());
//   var zipcode = zip1 + zip2;

//   check_zip(zipcode);
// });

$('.postal_code_btn a').click(function() {
    if(zip_ing == 1) { return; }
    zip_ing = 1;

    var zip1 = $.trim($('#zip1').val());
    var zip2 = $.trim($('#zip2').val());
    var zipcode = zip1 + zip2;

    if(zipcode.length < 7) {
        zip_ing = 0;
        return;
    }

  check_zip(zipcode);
});

function check_zip(zipcode) {
  $.ajax({
    type: "post",
    url: "./inquiry/get_addr.php",
    data: JSON.stringify(zipcode),
    crossDomain: false,
    dataType : "jsonp",
    scriptCharset: 'utf-8'
  }).done(function(data){
    zip_ing = 0;
    if(data[0] === ""){
      $('.zip2_alert').addClass('alert_show');
    } else {
      $('.zip2_alert').removeClass('alert_show');

      $('#addr1').val(data[0]);
      $('#addr2').val(data[1]);
      $('#addr3').val(data[2]);
      $('#addr3').focus();
    }
  }).fail(function(XMLHttpRequest, textStatus, errorThrown){
      zip_ing = 0;
  });
}

$(function() {
    let andelaytime = 0.75;

    $('.ani-delay').each(function(){
        let $andelayitem = $(this).find('.ani-delay-item');
        
        for (let i = 0; i < $andelayitem.length; i++) {
            $andelayitem.eq(i).css({
                animationdelay: i * andelaytime + 's',
                transitiondelay: i * andelaytime + 's'
            });
        }
    });
});

$(document).ready(function() {
    $('.to_form_section').click(function() {
        console.log('tt');
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#form_section").offset().top - 150
        }, 500);
    });

    $(window).on('load scroll', function(){
        let scroll = $(window).scrollTop();
        let windowheight = $(window).height();

        $('.ani-true, .ani-delay').each(function(){
            let elempos = $(this).offset().top;
            
            if (scroll > elempos - windowheight + 250) {
                let anclass = $(this).attr('class');
                
                if(anclass == "ani-delay"){
                    $(this).find('.ani-delay-item').addClass('scrollin');
                } else {
                    $(this).addClass('scrollin');
                }
            }
        });
    });
});
