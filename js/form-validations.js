$(document).ready(function() {
	  $("#change_password").validate({
	  rules: {
			password: {
				required: true
			},
			new_password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#new_password"
			}
		},
		messages: {
			password: {
				required: "Please enter current password"
			},
			new_password: {
				required: "Please enter  new password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password: {
				required: "Please re-type your new password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			}
		}
		});
		
	  $("#add_distance").validate();
	  $("#admin_settings_form").validate();
	  $("#seo_settings").validate();
	  $("#add_cms_rule").validate();
	  $("#newsletter").validate();
	  $("#api_hotel").validate();
	  $("#add_amenity").validate();
});