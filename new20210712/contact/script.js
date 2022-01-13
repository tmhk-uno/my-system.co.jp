var add_ing = 0;
function check_form() {
  if(add_ing == 1) { return false; }
  else { add_ing = 1; }
  var temp_result;
  var error_element = "";

  if($('.re').val() === 'yes') {
    $('.re_alert').removeClass('alert_show');
  } else {
    $('.re_alert').addClass('alert_show');
    error_element = "#html_element";
  }

  temp_result = check_all('#comment','',0,1);
  if(temp_result.check === 0 || temp_result.value) {
    $('.comment_alert').removeClass('alert_show');
  } else {
    $('.comment_alert').addClass('alert_show');
    error_element = "#comment";
  }

  temp_result = check_all('#email','',0,1);
  if(temp_result.check === 0 || temp_result.value) {
    $('.email_alert').removeClass('alert_show');
  } else {
    $('.email_alert').addClass('alert_show');
    error_element = "#email";
  }

  var t_email = $('#email').val();
  var t_email_repeat = $('#email_repeat').val();

  if(t_email !== "" && !validateEmail(t_email)) {
    $('.email2_alert').addClass('alert_show');
    error_element = "#email";
  }
  else {
    $('.email2_alert').removeClass('alert_show');
  }

  if(t_email != t_email_repeat) {
    $('.email3_alert').addClass('alert_show');
    error_element = "#email_repeat";
  }
  else {
    $('.email3_alert').removeClass('alert_show');
  }

  temp_result = check_all('#tel','',0,1);
  if(temp_result.check === 0 || temp_result.value) {
    $('.tel_alert').removeClass('alert_show');
  } else {
    $('.tel_alert').addClass('alert_show');
    error_element = "#tel";
  }

  temp_result = check_all('#user_name_read','',0,1);
  if(temp_result.check === 0 || temp_result.value) {
    $('.user_name_read_alert').removeClass('alert_show');
  } else {
    $('.user_name_read_alert').addClass('alert_show');
    error_element = "#user_name_read";
  }

  temp_result = check_all('#user_name','',0,1);
  if(temp_result.check === 0 || temp_result.value) {
    $('.user_name_alert').removeClass('alert_show');
  } else {
    $('.user_name_alert').addClass('alert_show');
    error_element = "#user_name";
  }

  add_ing = 0;

  if(error_element !== "") {
    var current_ele = $(error_element);

    $('html, body').animate({
      scrollTop: current_ele.offset().top - 170
    }, 400, 'easeInOutQuart', function () {
      current_ele.focus();
    });

    return false;
  }

  document.getElementById('contact_form').submit();

  return true;
}

function check_all(newId,newErrMeg,newNew,newCheck) {
  var current_ele = $(newId);
  var temp_return_val;

  console.log(newId);

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

function go_next(newIndex) {
  window.onbeforeunload = null;

  var c_form = document.getElementById('edit_form');
  if(newIndex == '1') { c_form.action = "./"; }
  else if(newIndex == '2') { c_form.action = "./input.php"; }
  else { return; }
  c_form.submit();
}

function reset_form() {
  window.location = './reset.php';
}