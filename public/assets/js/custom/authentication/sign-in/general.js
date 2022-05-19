"use strict";

// Class definition
var KTSigninGeneral = function() {
    // Elements
    var form;
    var submitButton;
    var validator;

    // Handle form
    var handleForm = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
			form,
			{
				fields: {					
					'phone': {
                        validators: {
							notEmpty: {
								message: 'Phone Number is required'
							},
                            integer: {
								message: 'The value is not a valid Phone'
							}
						}
					},
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            }
                        }
                    } 
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row'
                    })
				}
			}
		);		
    }

    // Public functions
    return {
        // Initialization
        init: function() {
            form = document.querySelector('#sign_in_form');
            submitButton = document.querySelector('#kt_sign_in_submit');
            
            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTSigninGeneral.init();
});
