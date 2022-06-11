/*--begin::sat holiday men--*/
$(function() {
    holiday_m_sat_fun();
    $("#holiday_m_sat").click(holiday_m_sat_fun);
  });
  
  function holiday_m_sat_fun() {
    if (this.checked) {
        $("#l_in_time_m_sat").attr("disabled", true).css('color','#F5F8FA');
        $("#f_in_time_m_sat").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_m_sat").attr("disabled", true).css('color','#F5F8FA');
        $("#f_out_time_m_sat").attr("disabled", true).css('color','#F5F8FA');
        $("#full_time_m_sat").attr("disabled", true);
    } else {
        $("#l_in_time_m_sat").removeAttr("disabled").css('color','#5E6278');
        $("#f_in_time_m_sat").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_m_sat").removeAttr("disabled").css('color','#5E6278');
        $("#f_out_time_m_sat").removeAttr("disabled").css('color','#5E6278');
        $("#full_time_m_sat").removeAttr("disabled");
    }
  }
/*--end::sat holiday men--*/
/*--begin::sat full time men--*/
$(function() {
    full_time_m_sat_fun();
    $("#full_time_m_sat").click(full_time_m_sat_fun);
  });
  
  function full_time_m_sat_fun() {
    if (this.checked) {
        $("#l_in_time_m_sat").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_m_sat").attr("disabled", true).css('color','#F5F8FA');

    } else {
        $("#l_in_time_m_sat").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_m_sat").removeAttr("disabled").css('color','#5E6278');

    }
  }
/*--end::sat full time men--*/
/*--begin::sun holiday men--*/
$(function() {
    holiday_m_sun_fun();
    $("#holiday_m_sun").click(holiday_m_sun_fun);
  });
  
  function holiday_m_sun_fun() {
    if (this.checked) {
        $("#l_in_time_m_sun").attr("disabled", true).css('color','#F5F8FA');
        $("#f_in_time_m_sun").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_m_sun").attr("disabled", true).css('color','#F5F8FA');
        $("#f_out_time_m_sun").attr("disabled", true).css('color','#F5F8FA');
        $("#full_time_m_sun").attr("disabled", true);
    } else {
        $("#l_in_time_m_sun").removeAttr("disabled").css('color','#5E6278');
        $("#f_in_time_m_sun").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_m_sun").removeAttr("disabled").css('color','#5E6278');
        $("#f_out_time_m_sun").removeAttr("disabled").css('color','#5E6278');
        $("#full_time_m_sun").removeAttr("disabled");
    }
  }
/*--end::sun holiday men--*/
/*--begin::sun full time men--*/
$(function() {
    full_time_m_sun_fun();
    $("#full_time_m_sun").click(full_time_m_sun_fun);
  });
  
  function full_time_m_sun_fun() {
    if (this.checked) {
        $("#l_in_time_m_sun").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_m_sun").attr("disabled", true).css('color','#F5F8FA');
    } else {
        $("#l_in_time_m_sun").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_m_sun").removeAttr("disabled").css('color','#5E6278');
    }
  }
/*--end::sun full time men--*/
/*--begin::mon holiday men--*/
$(function() {
    holiday_m_mon_fun();
    $("#holiday_m_mon").click(holiday_m_mon_fun);
  });
  
  function holiday_m_mon_fun() {
    if (this.checked) {
        $("#l_in_time_m_mon").attr("disabled", true).css('color','#F5F8FA');
        $("#f_in_time_m_mon").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_m_mon").attr("disabled", true).css('color','#F5F8FA');
        $("#f_out_time_m_mon").attr("disabled", true).css('color','#F5F8FA');
        $("#full_time_m_mon").attr("disabled", true);
    } else {
        $("#l_in_time_m_mon").removeAttr("disabled").css('color','#5E6278');
        $("#f_in_time_m_mon").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_m_mon").removeAttr("disabled").css('color','#5E6278');
        $("#f_out_time_m_mon").removeAttr("disabled").css('color','#5E6278');
        $("#full_time_m_mon").removeAttr("disabled");
    }
  }
/*--end::mon holiday men--*/
/*--begin::mon full time men--*/
$(function() {
    full_time_m_mon_fun();
    $("#full_time_m_mon").click(full_time_m_mon_fun);
  });
  
  function full_time_m_mon_fun() {
    if (this.checked) {
        $("#l_in_time_m_mon").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_m_mon").attr("disabled", true).css('color','#F5F8FA');
    } else {
        $("#l_in_time_m_mon").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_m_mon").removeAttr("disabled").css('color','#5E6278');
    }
  }
/*--end::mon full time men--*/
/*--begin::tue holiday men--*/
$(function() {
    holiday_m_tue_fun();
    $("#holiday_m_tue").click(holiday_m_tue_fun);
  });
  
  function holiday_m_tue_fun() {
    if (this.checked) {
        $("#l_in_time_m_tue").attr("disabled", true).css('color','#F5F8FA');
        $("#f_in_time_m_tue").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_m_tue").attr("disabled", true).css('color','#F5F8FA');
        $("#f_out_time_m_tue").attr("disabled", true).css('color','#F5F8FA');
        $("#full_time_m_tue").attr("disabled", true);
    } else {
        $("#l_in_time_m_tue").removeAttr("disabled").css('color','#5E6278');
        $("#f_in_time_m_tue").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_m_tue").removeAttr("disabled").css('color','#5E6278');
        $("#f_out_time_m_tue").removeAttr("disabled").css('color','#5E6278');
        $("#full_time_m_tue").removeAttr("disabled");
    }
  }
/*--end::tue holiday men--*/
/*--begin::tue full time men--*/
$(function() {
    full_time_m_tue_fun();
    $("#full_time_m_tue").click(full_time_m_tue_fun);
  });
  
  function full_time_m_tue_fun() {
    if (this.checked) {
        $("#l_in_time_m_tue").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_m_tue").attr("disabled", true).css('color','#F5F8FA');
    } else {
        $("#l_in_time_m_tue").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_m_tue").removeAttr("disabled").css('color','#5E6278');

    }
  }
/*--end::tue full time men--*/
/*--begin::thu holiday men--*/
$(function() {
    holiday_m_thu_fun();
    $("#holiday_m_thu").click(holiday_m_thu_fun);
  });
  
  function holiday_m_thu_fun() {
    if (this.checked) {
        $("#l_in_time_m_thu").attr("disabled", true).css('color','#F5F8FA');
        $("#f_in_time_m_thu").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_m_thu").attr("disabled", true).css('color','#F5F8FA');
        $("#f_out_time_m_thu").attr("disabled", true).css('color','#F5F8FA');
        $("#full_time_m_thu").attr("disabled", true);
    } else {
        $("#l_in_time_m_thu").removeAttr("disabled").css('color','#5E6278');
        $("#f_in_time_m_thu").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_m_thu").removeAttr("disabled").css('color','#5E6278');
        $("#f_out_time_m_thu").removeAttr("disabled").css('color','#5E6278');
        $("#full_time_m_thu").removeAttr("disabled");
    }
  }
/*--end::thu holiday men--*/
/*--begin::thu full time men--*/
$(function() {
    full_time_m_thu_fun();
    $("#full_time_m_thu").click(full_time_m_thu_fun);
  });
  
  function full_time_m_thu_fun() {
    if (this.checked) {
        $("#l_in_time_m_thu").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_m_thu").attr("disabled", true).css('color','#F5F8FA');
    } else {
        $("#l_in_time_m_thu").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_m_thu").removeAttr("disabled").css('color','#5E6278');
    }
  }
/*--end::thu full time men--*/
/*--begin::fri holiday men--*/
$(function() {
    holiday_m_fri_fun();
    $("#holiday_m_fri").click(holiday_m_fri_fun);
  });
  
  function holiday_m_fri_fun() {
    if (this.checked) {
        $("#l_in_time_m_fri").attr("disabled", true).css('color','#F5F8FA');
        $("#f_in_time_m_fri").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_m_fri").attr("disabled", true).css('color','#F5F8FA');
        $("#f_out_time_m_fri").attr("disabled", true).css('color','#F5F8FA');
        $("#full_time_m_fri").attr("disabled", true);
    } else {
        $("#l_in_time_m_fri").removeAttr("disabled").css('color','#5E6278');
        $("#f_in_time_m_fri").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_m_fri").removeAttr("disabled").css('color','#5E6278');
        $("#f_out_time_m_fri").removeAttr("disabled").css('color','#5E6278');
        $("#full_time_m_fri").removeAttr("disabled");
    }
  }
/*--end::fri holiday men--*/
/*--begin::fri full time men--*/
$(function() {
    full_time_m_fri_fun();
    $("#full_time_m_fri").click(full_time_m_fri_fun);
  });
  
  function full_time_m_fri_fun() {
    if (this.checked) {
        $("#l_in_time_m_fri").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_m_fri").attr("disabled", true).css('color','#F5F8FA');
    } else {
        $("#l_in_time_m_fri").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_m_fri").removeAttr("disabled").css('color','#5E6278');
    }
  }
/*--end::fri full time men--*/
/*--begin::sat holiday women--*/
$(function() {
    holiday_w_sat_fun();
    $("#holiday_w_sat").click(holiday_w_sat_fun);
  });
  
  function holiday_w_sat_fun() {
    if (this.checked) {
        $("#l_in_time_w_sat").attr("disabled", true).css('color','#F5F8FA');
        $("#f_in_time_w_sat").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_w_sat").attr("disabled", true).css('color','#F5F8FA');
        $("#f_out_time_w_sat").attr("disabled", true).css('color','#F5F8FA');
        $("#full_time_w_sat").attr("disabled", true);
    } else {
        $("#l_in_time_w_sat").removeAttr("disabled").css('color','#5E6278');
        $("#f_in_time_w_sat").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_w_sat").removeAttr("disabled").css('color','#5E6278');
        $("#f_out_time_w_sat").removeAttr("disabled").css('color','#5E6278');
        $("#full_time_w_sat").removeAttr("disabled");
    }
  }
/*--end::sat holiday women--*/
/*--begin::sat full time women--*/
$(function() {
    full_time_w_sat_fun();
    $("#full_time_w_sat").click(full_time_w_sat_fun);
  });
  
  function full_time_w_sat_fun() {
    if (this.checked) {
        $("#l_in_time_w_sat").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_w_sat").attr("disabled", true).css('color','#F5F8FA');
    } else {
        $("#l_in_time_w_sat").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_w_sat").removeAttr("disabled").css('color','#5E6278');
    }
  }
/*--end::sat full time  women--*/
/*--begin::sun holiday women--*/
$(function() {
    holiday_w_sun_fun();
    $("#holiday_w_sun").click(holiday_w_sun_fun);
  });
  
  function holiday_w_sun_fun() {
    if (this.checked) {
        $("#l_in_time_w_sun").attr("disabled", true).css('color','#F5F8FA');
        $("#f_in_time_w_sun").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_w_sun").attr("disabled", true).css('color','#F5F8FA');
        $("#f_out_time_w_sun").attr("disabled", true).css('color','#F5F8FA');
        $("#full_time_w_sun").attr("disabled", true);
    } else {
        $("#l_in_time_w_sun").removeAttr("disabled").css('color','#5E6278');
        $("#f_in_time_w_sun").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_w_sun").removeAttr("disabled").css('color','#5E6278');
        $("#f_out_time_w_sun").removeAttr("disabled").css('color','#5E6278');
        $("#full_time_w_sun").removeAttr("disabled");
    }
  }
/*--end::sun holiday women--*/
/*--begin::sun full time women--*/
$(function() {
    full_time_w_sun_fun();
    $("#full_time_w_sun").click(full_time_w_sun_fun);
  });
  
  function full_time_w_sun_fun() {
    if (this.checked) {
        $("#l_in_time_w_sun").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_w_sun").attr("disabled", true).css('color','#F5F8FA');
    } else {
        $("#l_in_time_w_sun").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_w_sun").removeAttr("disabled").css('color','#5E6278');
    }
  }
/*--end::sun full time  women--*/
/*--begin::mon holiday women--*/
$(function() {
    holiday_w_mon_fun();
    $("#holiday_w_mon").click(holiday_w_mon_fun);
  });
  
  function holiday_w_mon_fun() {
    if (this.checked) {
        $("#l_in_time_w_mon").attr("disabled", true).css('color','#F5F8FA');
        $("#f_in_time_w_mon").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_w_mon").attr("disabled", true).css('color','#F5F8FA');
        $("#f_out_time_w_mon").attr("disabled", true).css('color','#F5F8FA');
        $("#full_time_w_mon").attr("disabled", true);
    } else {
        $("#l_in_time_w_mon").removeAttr("disabled").css('color','#5E6278');
        $("#f_in_time_w_mon").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_w_mon").removeAttr("disabled").css('color','#5E6278');
        $("#f_out_time_w_mon").removeAttr("disabled").css('color','#5E6278');
        $("#full_time_w_mon").removeAttr("disabled");
    }
  }
/*--end::mon holiday women--*/
/*--begin::mon full time women--*/
$(function() {
    full_time_w_mon_fun();
    $("#full_time_w_mon").click(full_time_w_mon_fun);
  });
  
  function full_time_w_mon_fun() {
    if (this.checked) {
        $("#l_in_time_w_mon").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_w_mon").attr("disabled", true).css('color','#F5F8FA');
    } else {
        $("#l_in_time_w_mon").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_w_mon").removeAttr("disabled").css('color','#5E6278');
    }
  }
/*--end::mon full time  women--*/
/*--begin::tue holiday women--*/
$(function() {
    holiday_w_tue_fun();
    $("#holiday_w_tue").click(holiday_w_tue_fun);
  });
  
  function holiday_w_tue_fun() {
    if (this.checked) {
        $("#l_in_time_w_tue").attr("disabled", true).css('color','#F5F8FA');
        $("#f_in_time_w_tue").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_w_tue").attr("disabled", true).css('color','#F5F8FA');
        $("#f_out_time_w_tue").attr("disabled", true).css('color','#F5F8FA');
        $("#full_time_w_tue").attr("disabled", true);
    } else {
        $("#l_in_time_w_tue").removeAttr("disabled").css('color','#5E6278');
        $("#f_in_time_w_tue").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_w_tue").removeAttr("disabled").css('color','#5E6278');
        $("#f_out_time_w_tue").removeAttr("disabled").css('color','#5E6278');
        $("#full_time_w_tue").removeAttr("disabled");
    }
  }
/*--end::tue holiday women--*/
/*--begin::tue full time women--*/
$(function() {
    full_time_w_tue_fun();
    $("#full_time_w_tue").click(full_time_w_tue_fun);
  });
  
  function full_time_w_tue_fun() {
    if (this.checked) {
        $("#l_in_time_w_tue").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_w_tue").attr("disabled", true).css('color','#F5F8FA');
    } else {
        $("#l_in_time_w_tue").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_w_tue").removeAttr("disabled").css('color','#5E6278');
    }
  }
/*--end::tue full time  women--*/
/*--begin::wed holiday women--*/
$(function() {
    holiday_w_wed_fun();
    $("#holiday_w_wed").click(holiday_w_wed_fun);
  });
  
  function holiday_w_wed_fun() {
    if (this.checked) {
        $("#l_in_time_w_wed").attr("disabled", true).css('color','#F5F8FA');
        $("#f_in_time_w_wed").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_w_wed").attr("disabled", true).css('color','#F5F8FA');
        $("#f_out_time_w_wed").attr("disabled", true).css('color','#F5F8FA');
        $("#full_time_w_wed").attr("disabled", true);
    } else {
        $("#l_in_time_w_wed").removeAttr("disabled").css('color','#5E6278');
        $("#f_in_time_w_wed").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_w_wed").removeAttr("disabled").css('color','#5E6278');
        $("#f_out_time_w_wed").removeAttr("disabled").css('color','#5E6278');
        $("#full_time_w_wed").removeAttr("disabled");
    }
  }
/*--end::wed holiday women--*/
/*--begin::wed full time women--*/
$(function() {
    full_time_w_wed_fun();
    $("#full_time_w_wed").click(full_time_w_wed_fun);
  });
  
  function full_time_w_wed_fun() {
    if (this.checked) {
        $("#l_in_time_w_wed").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_w_wed").attr("disabled", true).css('color','#F5F8FA');
    } else {
        $("#l_in_time_w_wed").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_w_wed").removeAttr("disabled").css('color','#5E6278');
    }
  }
/*--end::wed full time  women--*/
/*--begin::thu holiday women--*/
$(function() {
    holiday_w_thu_fun();
    $("#holiday_w_thu").click(holiday_w_thu_fun);
  });
  
  function holiday_w_thu_fun() {
    if (this.checked) {
        $("#l_in_time_w_thu").attr("disabled", true).css('color','#F5F8FA');
        $("#f_in_time_w_thu").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_w_thu").attr("disabled", true).css('color','#F5F8FA');
        $("#f_out_time_w_thu").attr("disabled", true).css('color','#F5F8FA');
        $("#full_time_w_thu").attr("disabled", true);
    } else {
        $("#l_in_time_w_thu").removeAttr("disabled").css('color','#5E6278');
        $("#f_in_time_w_thu").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_w_thu").removeAttr("disabled").css('color','#5E6278');
        $("#f_out_time_w_thu").removeAttr("disabled").css('color','#5E6278');
        $("#full_time_w_thu").removeAttr("disabled");
    }
  }
/*--end::thu holiday women--*/
/*--begin::thu full time women--*/
$(function() {
    full_time_w_thu_fun();
    $("#full_time_w_thu").click(full_time_w_thu_fun);
  });
  
  function full_time_w_thu_fun() {
    if (this.checked) {
        $("#l_in_time_w_thu").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_w_thu").attr("disabled", true).css('color','#F5F8FA');

    } else {
        $("#l_in_time_w_thu").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_w_thu").removeAttr("disabled").css('color','#5E6278');
    }
  }
/*--end::thu full time  women--*/
/*--begin::fri holiday women--*/
$(function() {
    holiday_w_fri_fun();
    $("#holiday_w_fri").click(holiday_w_fri_fun);
  });
  
  function holiday_w_fri_fun() {
    if (this.checked) {
        $("#l_in_time_w_fri").attr("disabled", true).css('color','#F5F8FA');
        $("#f_in_time_w_fri").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_w_fri").attr("disabled", true).css('color','#F5F8FA');
        $("#f_out_time_w_fri").attr("disabled", true).css('color','#F5F8FA');
        $("#full_time_w_fri").attr("disabled", true);
    } else {
        $("#l_in_time_w_fri").removeAttr("disabled").css('color','#5E6278');
        $("#f_in_time_w_fri").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_w_fri").removeAttr("disabled").css('color','#5E6278');
        $("#f_out_time_w_fri").removeAttr("disabled").css('color','#5E6278');
        $("#full_time_w_fri").removeAttr("disabled");
    }
  }
/*--end::fri holiday women--*/
/*--begin::fri full time women--*/
$(function() {
    full_time_w_fri_fun();
    $("#full_time_w_fri").click(full_time_w_fri_fun);
  });
  
  function full_time_w_fri_fun() {
    if (this.checked) {
        $("#l_in_time_w_fri").attr("disabled", true).css('color','#F5F8FA');
        $("#l_out_time_w_fri").attr("disabled", true).css('color','#F5F8FA');
    } else {
        $("#l_in_time_w_fri").removeAttr("disabled").css('color','#5E6278');
        $("#l_out_time_w_fri").removeAttr("disabled").css('color','#5E6278');

    }
  }
/*--end::fri full time  women--*/

$(".T-time").flatpickr({
  enableTime: true,
  noCalendar: true,
  dateFormat: "H:i",
});

$(".T-date").flatpickr({
});
$( ".radio" ).on( "click", function() {
  $( "#user_tr" ).html('');
});

$( "#user" ).on( "click", function() {
  $( "#user_tr" ).html( '<td class="text-gray-800" id="user_id_title">معرف المشترك</td>'+
                        '<!--end::Label-->'+
                        '<td>'+
                          '<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">'+
                            '<input class="form-control form-control-solid" type="text" value="" id="user_id" name="user_id">'+
                          '</label>'+
                        '</td>');
});
