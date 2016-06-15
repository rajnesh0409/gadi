<?php 
which takes three parameters :

1. Actual field name (e.g. uname).

2. Name of the field used to identify it (e.g. Username).

3. Validation rules for the form field.

$this->form_validation->set_rules('uname->for form input name', 'Username', 'required');

The third parameter can be set for multiple rules like this :


$this->form_validation->set_rules('uname', 'Username', 'required|min_length[4]|max_length[10]);

Here are some listing of the rules with their specification :

required // Returns FALSE if the form field is empty.

matches // Returns FALSE if the form field does not match the defined value of parameter.

is_unique // Returns FALSE if the form field is not unique to the table and field name in the parameter.

min_length // Returns FALSE if the form field is shorter than the parameter value.

max_length // Returns FALSE if the form field is longer than the parameter value.

exact_length // Returns FALSE if the form field is not exactly the parameter value.

greater_than // Returns FALSE if the form field is less than the parameter value or not numeric.

less_than // Returns FALSE if the form field is greater than the parameter value or not numeric.

alpha // Returns FALSE if the form field contains anything other than alphabetical characters.

alpha_numeric // Returns FALSE if the form field contains anything other than alpha-numeric characters.

alpha_dash // Returns FALSE if the field contains anything other than alpha-numeric characters, underscores or dashes.

numeric // Returns FALSE if the form field contains anything other than numeric characters.

integer // Returns FALSE if the form field contains anything other than an integer.

decimal // Returns FALSE if the form field contains anything other than a decimal number.

is_natural // Returns FALSE if the form field contains anything other than a natural number.

is_natural_no_zero // Returns FALSE if the form field contains anything other than a natural number, but not zero.

valid_email // Returns FALSE if the form field does not contain a valid email address.

valid_emails // Returns FALSE if any value provided in a comma separated list is not a valid email.

valid_ip // Returns FALSE if the supplied IP is not valid.

valid_base64 // Returns FALSE if the supplied string contains anything other than valid Base64 characters.


******************************************
in controller

<?php
class validate_ctrl extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('form_model');
}
function index()
{
// Including Validation Library
$this->load->library('form_validation');
// Displaying Errors In Div
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
// Validation For Name Field
$this->form_validation->set_rules('dname', 'Username', 'required|min_length[5]|max_length[15]');
// Validation For Email Field
$this->form_validation->set_rules('demail', 'Email', 'required|valid_email');
// Validation For Contact Field
$this->form_validation->set_rules('dmobile', 'Contact No.', 'required|regex_match[/^[0-9]{10}$/]');
// Validation For Address Field
$this->form_validation->set_rules('daddress', 'Address', 'required|min_length[10]|max_length[50]');
if ($this->form_validation->run() == FALSE)
{
$this->load->view('valform');
}
else
{
$this->load->view('formsubmit');
}
}
}
?>
?>