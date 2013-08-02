<?php
error_reporting(E_ALL);
session_start();
include("../class.form.php");
include("../header.php");
?>

<h4>Table of Contents:</h4>
<div>
	<ul style="margin-top: 0; padding-top: 0;">
		<li><a href="#Introduction">Introduction</a></li>
		<li><a href="#The-Hello-World-of-PHP-Form-Builder-Class">The "Hello World" of PHP Form Builder Class</a></li>
		<li><a href="#Form-Elements">Supported Form Elements</a>
			<ul>
				<li><a href="#Form-Elements-Textbox">Textbox</a></li>
				<li><a href="#Form-Elements-Selectbox">Selectbox</a></li>
				<li><a href="#Form-Elements-Checkbox">Checkbox</a></li>
				<li><a href="#Form-Elements-Radio-Button">Radio Button</a></li>
				<li><a href="#Form-Elements-Textarea">Textarea</a></li>
				<li><a href="#Form-Elements-Hidden">Hidden</a></li>
				<li><a href="#Form-Elements-File">File</a></li>
				<li><a href="#Form-Elements-State">State</a></li>
				<li><a href="#Form-Elements-Country">Country</a></li>
				<li><a href="#Form-Elements-Yes-No">Yes/No</a></li>
				<li><a href="#Form-Elements-True-False">True/False</a></li>
				<li><a href="#Form-Elements-Email">Email</a></li>
				<li><a href="#Form-Elements-Date">Date</a></li>
				<li><a href="#Form-Elements-Date-Range">Date Range</a></li>
				<li><a href="#Form-Elements-TinyMCE">TinyMCE Web Editor</a></li>
				<li><a href="#Form-Elements-CKEditor">CKEditor</a></li>
				<li><a href="#Form-Elements-Captcha">Captcha</a></li>
			</ul>	
		</li>	
		<li><a href="#Additional-Parameters">additionalParams Element Parameter</a></li>
	</ul>
</div>

<div class="pfbc_doc_section">
	<a name="Introduction"></a>
	<h3>Introduction</h3>
	<p>The purpose of this document is to provide a reference guide for users to access while incorporating this project into their development.</p>
</div>

<div class="pfbc_doc_section">
	<a name="The-Hello-World-of-PHP-Form-Builder-Class"></a>
	<h3>The "Hello World" of PHP Form Builder Class</h3>
	<p>Before getting started, you will need to <a href="http://code.google.com/p/php-form-builder-class/downloads/list">download the latest version
	of this project</a>, unzip formbuilder.zip, and install the php-form-builder-class directory in a publicly accessible location on your web server.  After you've done this, you're 
	ready to get started creating your first form using this project.</p>
		
	<p>Let's begin by looking at the code snippet of our "Hello World" form seen below...</p>	

	<?php
	echo '<pre>', highlight_string('<?php
include("php-form-builder-class/class.form.php");

$form = new form("HelloWorld");
$form->setAttributes(array(
	"width" => 400
));

$form->addTextbox("My Textbox:", "MyTextbox", "Hello World");
$form->addButton();
$form->render();
?>', true), '</pre>';
	?>

	<p>The first thing you'll notice is that class.form.php is included with...</p>

	<?php
	echo '<pre>', highlight_string('<?php
include("php-form-builder-class/class.form.php");
?>', true), '</pre>';
	?>

	<p>This file can be found within the php-form-builder-class directory, and must be included in each script that makes use of this project.</p>
	
	<p>Next, a new form object is created with...</p>	

	<?php
echo '<pre>', highlight_string('<?php
$form = new form("HelloWorld");
?>', true), '</pre>';
	?>

	<p>An identifier, "HelloWorld" in this case, is included.  If this identifier is not provided, "myform" will be used; however,
	it is recommended that you include an identifier with each form you create.  This becomes increasingly important when multiple
	forms are rendered on the same webpage.</p>	

	<p>Once the form object is created, the setAttributes() function is invoked...</p>

	<?php
	echo '<pre>', highlight_string('<?php
$form->setAttributes(array(
	"width" => 400
));
?>', true), '</pre>';
	?>

	<p>The setAttributes() function accepts an associative array of key/value pairs, and is used to assign various attributes to 
	the form.  Chances are, you will be calling this function in most all of the forms you create.  In this "Hello World" example, 
	the form's width is set to 400 pixels.</p>

	<p>Now, we're ready to add our form elements.  In our "Hello World" example, there's only one element - a textbox.</p>

	<?php
	echo '<pre>', highlight_string('<?php
$form->addTextbox("My Textbox:", "MyTextbox", "Hello World");
?>', true), '</pre>';
	?>
	
	<p>More information on how to work with textboxes and all the other form elements can be found 
	in the <a href="#Form-Elements">Form Elements</a> section.  This textbox has a label assigned as "My Textbox:", a name set to "MyTextbox", and a
	default value of "Hello World".</p>

	<p>A button is attached to the form with...</p>

	<?php
	echo '<pre>', highlight_string('<?php
$form->addButton();
?>', true), '</pre>';
	?>

	<p>The addButton() function has optional parameters for customizing the appearance and behavior of your buttons.  With no paramaters 
	provided, it will render a submit button titled "Submit".</p>

	<p>The final function called is render()...</p>

	<?php
	echo '<pre>', highlight_string('<?php
$form->render();
?>', true), '</pre>';
	?>

	<p>The render() function is responsible for a variety of tasks including building the form's html markup, including the appropriate
	javascript/css include files, and applying javascript validation if applicable.</p>

	<p>Congratulations!  You have just created your first form using the PHP Form Builder Class.  If you're like me, and like learning 
	about a new piece of software by jumping right in and using it, you should <a href="../examples">check out the other included examples</a>, 
	which provide a more in depth look at the various functionality included in this project.  If you're not like me, and like learning about a
	new piece of software by reading the manual first, then you should continue reading this document.</p>
</div>

<div class="pfbc_doc_section">
	<a name="Form-Elements"></a>
	<h3>Form Elements</h3>
	<p>The latest release of this project - version <?php echo(file_get_contents('../version'));?> - contains support for 26 form element types.  These 
	include button, captcha, checkbox, checksort, ckeditor, colorpicker, country, date, daterange, email, expdate, file, hidden, html, htmlexternal, latlng, 
	password, radio, select, sort, state, textarea, textbox, truefalse, webeditor, and yesno.  Let's take a closer look at how each of these form element
	types can be used in your development.</p>

	<a name="Form-Elements-Textbox"></a>
	<h4>Textbox:</h4><p>I chose to begin with textboxes because they're arguably the most frequently used form element on the web.  Chances are, the first form you build with this
	project will contain a textbox - so, let's get started.  Textboxes are added to your forms through the addTextbox function.  See the code snippet provided below.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addTextbox Function Declaration
public function addTextbox($label, $name, $value="", $additionalParams="") {}
*/

$form->addTextbox("My Textbox", "Textbox");
$form->addTextbox("My Prefilled Textbox", "Textbox", "This is my default value.");
$form->addTextbox("My Required Textbox", "Textbox", "", array("required" => 1));
?>', true), '</pre>';
	?>
	
	<p>This function has four available parameters: label, name, value, and additionalParams.  Many of the functions responsible for adding form elements follow this same pattern.
	The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the textbox.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute of the &lt;input&gt; tag.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Optional - Corresponds to the value attribute of the &lt;input&gt; tag.  This can be used to set the textbox's default value.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the textbox.  The third example seen above 
			demonstrates how this parameter can be used to apply the required setting.  See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings
			that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-Selectbox"></a>
	<h4>Selectbox:</h4><p>Selectboxes are added to your forms via the addSelect function.  This function is very similar to addTextbox; however, there is one additional parameter - options -
	that is used to populate the selectbox's &lt;option&gt; tags.  This parameter can be passed as either a one dimensional array or as an associative array of key/value pairs.  The first and second examples
	provided below illustrate how the options paramter affects the value and displayed text of each &lt;option&gt; tag.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addSelect Function Declaration
public function addSelect($label, $name, $value="", $options="", $additionalParams="") {}
*/

$form->addSelect("My Selectbox", "Selectbox", "", array("Option #1", "Option #2", "Option #3"));
/*
<option value="Option #1">Option #1</option>
<option value="Option #2">Option #2</option>
<option value="Option #3">Option #3</option>
*/

$form->addSelect("My Selectbox", "Selectbox", "", array("1" => "Option #1", "2" => "Option #2", "3" => "Option #3"));
/*
<option value="1">Option #1</option>
<option value="2">Option #2</option>
<option value="3">Option #3</option>
*/

$form->addSelect("My Prefilled Selectbox", "Selectbox", "Option #2", array("Option #1", "Option #2", "Option #3"));
$form->addSelect("My Prefilled Selectbox", "Selectbox", "1", array("1" => "Option #1", "2" => "Option #2", "3" => "Option #3"));
$form->addSelect("My Multiple Selectbox", "Selectbox", "", array("Option #1", "Option #2", "Option #3"), array("multiple" => "multiple"));
$form->addSelect("My Prefilled/Multiple Selectbox", "Selectbox", 
	array("Option #1", "Option #2"), 
	array("Option #1", "Option #2", "Option #3"), 
	array("multiple" => "multiple")
);
?>', true), '</pre>';
	?>
	
	<p>This function has five available parameters: label, name, value, options, and additionalParams.  The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the selectbox.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute of the &lt;select&gt; tag.  If you are using the multiple setting and do not append "[]" to the end this parameter, it
			will by appended for you automatically.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Corresponds to the value attribute of an &lt;option&gt; tag.  This can be used to set the selectbox's default value.  If the options parameter contains an associative array,
			the value will need to correspond with a key of that array.  This parameter can also contain an array of vales if the multiple setting is also being used.
			See the third, fourth, and sixth examples above for reference.</td>
		</tr>
		<tr>
			<td>options</td>
			<td>Used to populate the selectbox's options.  This parameter can either by passed as a one dimensional array, or as an associative array.  If a one dimensional array supplied,
			each option's value and displayed text will be set to the appropriate array's value.  If an associative array is supplied, the array's keys will be used for the option's values and the array's
			values will be used for the option's displayed text.  See the first and second examples above for reference.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the selectbox.  The fifth example seen above 
			demonstrates how this parameter can be used to apply the multiple setting.  See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings
			that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-Checkbox"></a>
	<h4>Checkbox:</h4><p>Checkboxes are added to your forms via the addCheckbox function.  This function is used to generate a group of checkboxes, not just one.  Similar to the addSelect function, there is an options parameter
	that is used to populate each checkbox's value and displayed text.  This parameter can be passed as either a one dimensional array or as an associative array of key/value pairs.  The first and second examples
	provided below illustrate how the options paramter affects each checkbox in the group.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addCheckbox Function Declaration
public function addCheckbox($label, $name, $value="", $options="", $additionalParams="") {}
*/

$form->addCheckbox("My Checkboxes", "Checkbox", "", array("Option #1", "Option #2", "Option #3"));
/*
<input type="checkbox" name="Checkbox[]" id="Checkbox-0" value="Option #1"/><label for="Checkbox-0">Option #1</label>
<input type="checkbox" name="Checkbox[]" id="Checkbox-1" value="Option #2"/><label for="Checkbox-1">Option #2</label>
<input type="checkbox" name="Checkbox[]" id="Checkbox-2" value="Option #3"/><label for="Checkbox-2">Option #3</label>
*/

$form->addCheckbox("My Checkboxes", "Checkbox", "", array("1" => "Option #1", "2" => "Option #2", "3" => "Option #3"));
/*
<input type="checkbox" name="Checkbox[]" id="Checkbox-0" value="1"/><label for="Checkbox-0">Option #1</label>
<input type="checkbox" name="Checkbox[]" id="Checkbox-1" value="2"/><label for="Checkbox-0">Option #2</label>
<input type="checkbox" name="Checkbox[]" id="Checkbox-2" value="3"/><label for="Checkbox-0">Option #3</label>
*/

$form->addCheckbox("My Selected Checkboxes", "Checkbox", "Option #2", array("Option #1", "Option #2", "Option #3"));
$form->addCheckbox("My Selected Checkboxes", "Checkbox", "1", array("1" => "Option #1", "2" => "Option #2", "3" => "Option #3"));
$form->addCheckbox("My Selected Checkboxes", "Checkbox", array("1", "3"), array("1" => "Option #1", "2" => "Option #2", "3" => "Option #3"));
?>', true), '</pre>';
	?>
	
	<p>This function has five available parameters: label, name, value, options, and additionalParams.  The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the group of checkboxes.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute for each &lt;input&gt; tag in the checkbox group. If you do not append "[]" to the end this parameter, it
			will by appended for you automatically.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Corresponds to the value attribute of each &lt;input&gt; tag in the checkbox group.  This can be used to check one or more of the checkboxes by default.  If the options parameter contains an associative array,
			the value will need to correspond with a key of that array.  This parameter can be a single value or an array of values.  See the third, fourth, and fifth examples above for reference.</td>
		</tr>
		<tr>
			<td>options</td>
			<td>Used to generate each &lt;input&gt; tag in the checkbox group.  This parameter can either by passed as a one dimensional array, or as an associative array.  If a one dimensional array supplied,
			each checkbox's value and displayed text will be set to the appropriate array's value.  If an associative array is supplied, the array's keys will be used for the checkbox's values and the array's
			values will be used for its displayed text.  See the first and second examples above for reference.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the checkbox group.
			See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-Radio-Button"></a>
	<h4>Radio Button:</h4><p>Radio buttons are added to your forms via the addRadio function.  This function is used to generate a group of radio buttons, not just one.  There is an options parameter
	that is used to populate each radio button's value and displayed text.  This parameter can be passed as either a one dimensional array or as an associative array of key/value pairs.  The first and second examples
	provided below illustrate how the options paramter affects each radio button in the group.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addRadio Function Declaration
public function addRadio($label, $name, $value="", $options="", $additionalParams="") {}
*/

$form->addRadio("My Radio Buttons", "Radio", "", array("Option #1", "Option #2", "Option #3"));
/*
<input type="radio" name="Radio" id="Radio-0" value="Option #1"/><label for="Radio-0">Option #1</label>
<input type="radio" name="Radio" id="Radio-1" value="Option #2"/><label for="Radio-1">Option #2</label>
<input type="radio" name="Radio" id="Radio-2" value="Option #3"/><label for="Radio-2">Option #3</label>
*/

$form->addRadio("My Radio Buttons", "Radio", "", array("1" => "Option #1", "2" => "Option #2", "3" => "Option #3"));
/*
<input type="radio" name="Radio" id="Radio-0" value="1"/><label for="Radio-0">Option #1</label>
<input type="radio" name="Radio" id="Radio-1" value="2"/><label for="Radio-0">Option #2</label>
<input type="radio" name="Radio" id="Radio-2" value="3"/><label for="Radio-0">Option #3</label>
*/

$form->addRadio("My Selected Radio Buttons", "Radio", "Option #2", array("Option #1", "Option #2", "Option #3"));
$form->addRadio("My Selected Radio Buttons", "Radio", "1", array("1" => "Option #1", "2" => "Option #2", "3" => "Option #3"));
?>', true), '</pre>';
	?>
	
	<p>This function has five available parameters: label, name, value, options, and additionalParams.  The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the group of radio buttons.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute for each &lt;input&gt; tag in the radio button group.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Corresponds to the value attribute of each &lt;input&gt; tag in the radio group.  This can be used to check one radio button by default.  If the options parameter contains an associative array,
			the value will need to correspond with a key of that array.  See the third and fourth examples above for reference.</td>
		</tr>
		<tr>
			<td>options</td>
			<td>Used to generate each &lt;input&gt; tag in the radio button group.  This parameter can either by passed as a one dimensional array, or as an associative array.  If a one dimensional array supplied,
			each radio button's value and displayed text will be set to the appropriate array's value.  If an associative array is supplied, the array's keys will be used for the radio button's values and the array's
			values will be used for its displayed text.  See the first and second examples above for reference.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the radio button group.
			See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-Textarea"></a>
	<h4>Textarea:</h4><p>Textboxes are added to forms by invoking the addTextarea function, which is nearly identical to the addTextbox function.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addTextarea Function Declaration
public function addTextarea($label, $name, $value="", $additionalParams="") {}
*/

$form->addTextarea("My Textarea", "Textarea");
$form->addTextarea("My Prefilled Textarea", "Textarea", "This is my default value.");
?>', true), '</pre>';
	?>
	
	<p>This function has four available parameters: label, name, value, and additionalParams.  The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the textarea.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute of the &lt;textarea&gt; tag.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Optional - Corresponds to the content between the opening and closing &lt;textarea&gt; tags.  This can be used to set the textarea's default value.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the textarea.
			See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-Hidden"></a>
	<h4>Hidden:</h4><p>Hidden inputs are added to forms by invoking the addHidden function.  The label parameter is not included in this function because hidden inputs do not make use
	of labels.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addHidden Function Declaration
public function addHidden($name, $value="", $additionalParams="") {}
*/

$form->addHidden("Hidden", "MyHiddenValue");
?>', true), '</pre>';
	?>
	
	<p>This function has three available parameters: name, value, and additionalParams.  The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute of the &lt;input&gt; tag.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Optional - Corresponds to the value attribute of the &lt;input&gt; tag.  This can be used to set the hidden input's default value.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the hidden input.
			See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-File"></a>
	<h4>File:</h4><p>File inputs are added to forms by invoking the addFile function.  The &lt;form&gt; tag's enctype attribute will be automatically set to "multipart/form-data" if this function
	is used on a form to attach a file element type.  There is no need for the value parameter, so it is omitted from the function's declaration.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addFile Function Declaration
public function addFile($label, $name, $additionalParams="") {}
*/

$form->addFile("My File", "File");
?>', true), '</pre>';
	?>
	
	<p>This function has three available parameters: label, name, and additionalParams.  The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the file input.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute of the &lt;input&gt; tag.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the file input.
			See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-State"></a>
	<h4>State:</h4><p>The state element type is a shortcut for adding a selectbox with options for each of the 50 U.S. states, 13 Canadian provinces/territories, and 7 U.S. territories.  
	The values for these options are set to their appropriate two character code.  Because the options are pre-determined, the options parameter is omitted from the function's declaration.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addState Function Declaration
public function addState($label, $name, $value="", $additionalParams="") {}
*/

$form->addState("My State", "State");
?>', true), '</pre>';
	?>
	
	<p>This function has four available parameters: label, name, value, and additionalParams.  The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the selectbox.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute of the &lt;select&gt; tag.  If you are using the multiple setting and do not append "[]" to the end this parameter, it
			will by appended for you automatically.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Corresponds to the value attribute of an &lt;option&gt; tag.  This can be used to set the selectbox's default value.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the selectbox.
			See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-Country"></a>
	<h4>Country:</h4><p>Like the state element type, the addCountry function is a shortcut for adding a selectbox with options for countries throughout the world.  
	The values for these options are set to their appropriate two character code.  Because the options are pre-determined, the options parameter is omitted from the function's declaration.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addCountry Function Declaration
public function addCountry($label, $name, $value="", $additionalParams="") {}
*/

$form->addCountry("My Country", "Country");
?>', true), '</pre>';
	?>
	
	<p>This function has four available parameters: label, name, value, and additionalParams.  The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the selectbox.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute of the &lt;select&gt; tag.  If you are using the multiple setting and do not append "[]" to the end this parameter, it
			will by appended for you automatically.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Corresponds to the value attribute of an &lt;option&gt; tag.  This can be used to set the selectbox's default value.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the selectbox.
			See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-Yes-No"></a>
	<h4>Yes/No:</h4><p>The addYesNo function is a shortcut for adding a radio button group with options for "Yes" and "No".  
	The values for these options are set to "1" and "0" respectively.  Because the options are pre-determined, the options parameter is omitted from the function's declaration.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addYesNo Function Declaration
public function addYesNo($label, $name, $value="", $additionalParams="") {}
*/

$form->addYesNo("My Yes/No", "YesNo");
?>', true), '</pre>';
	?>
	
	<p>This function has four available parameters: label, name, value, and additionalParams.  The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the radio button group.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute of each radio button's &lt;input&gt; tag in the group.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Corresponds to the value attribute of each radio button's &lt;input&gt; tag in the group.  This can be used to set the elements default value - "1" for "Yes", "0" for "No".</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the element.
			See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-True-False"></a>
	<h4>True/False:</h4><p>The addTrueFalse function is a shortcut for adding a radio button group with options for "True" and "False".  
	The values for these options are set to "1" and "0" respectively.  Because the options are pre-determined, the options parameter is omitted from the function's declaration.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addTrueFalse Function Declaration
public function addTrueFalse($label, $name, $value="", $additionalParams="") {}
*/

$form->addTrueFalse("My True/False", "TrueFalse");
?>', true), '</pre>';
	?>
	
	<p>This function has four available parameters: label, name, value, and additionalParams.  The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the radio button group.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute of each radio button's &lt;input&gt; tag in the group.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Corresponds to the value attribute of each radio button's &lt;input&gt; tag in the group.  This can be used to set the elements default value - "1" for "True", "0" for "False".</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the element.
			See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-Email"></a>
	<h4>Email:</h4><p>The email element type is essentially a textbox with built-in javascript/php email validation.  Javascript validation is triggered in the form's pre-defined onsubmit function.
	If the element's value is not empty, an AJAX call is made to validate the element's content.  If the textbox does not contain a valid email address, an appropriate error message will be dispalyed.  
	PHP validation is triggered by making use of the validate function after the form's data has been submitted.  Both javascript and php validation make use of an open source project found at 
	<a href="http://code.google.com/p/php-email-address-validation/">http://code.google.com/p/php-email-address-validation/</a>.  See the <a href="../examples/email-validation.php">Email Validation example</a> file for reference.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addEmail Function Declaration
public function addEmail($label, $name, $value="", $additionalParams="") {}
*/

$form->addEmail("My Textbox w/Email Validation", "Email");
?>', true), '</pre>';
	?>
	
	<p>This function has four available parameters: label, name, value, and additionalParams.  Many of the functions responsible for adding form elements follow this same pattern.
	The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the textbox.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute of the &lt;input&gt; tag.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Optional - Corresponds to the value attribute of the &lt;input&gt; tag.  This can be used to set the textbox's default value.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the textbox.  The third example seen above 
			demonstrates how this parameter can be used to apply the required setting.  See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings
			that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-Date"></a>
	<h4>Date:</h4><p>The date element type makes use of jQueryUI's datepicker functionality to allow a single date to be selected from a calendar.  The calendar is triggered from a pre-defined
	onclick javascript event.  By default, this element will have a hint set to "Click to Select Date..."; however, this can be modified by applying the hint element attribute as seen in the third
	example provided below.</p>
	
	<p>The formatting of the date returned from the calendar will be set to "MM d, yy" by default,  which is equivalent to "F j, Y" using  php's date function.  If you want to modify this
	formatting, you can include the "dateFormat" option in the jqueryOption element attribute.  The fourth example below shows how to change the date's formatting to a MySQL friendly format.  
	Use <a href="http://docs.jquery.com/UI/Datepicker/formatDate">http://docs.jquery.com/UI/Datepicker/formatDate</a> for a guide to using jQuery's date formatting options.</p>

	<p>When setting this element's default value via the function's value parameter, remember that the string passed to the function must match the date format that is being used.  See the second 
	example below for reference.</p>

	<p>jQueryUI's datepicker has many options you can use to tailor the functionality to fit to your specific needs.  To apply these options, make use of the jqueryOptions element attribute.  We've already
	seen how this attribute can be used to change the formatting of the date returned.  Now, let's look at example five below and see how we can display multiple months on the calendar as well as restrict the date range to plus or minus
	30 days.  See <a href="http://jqueryui.com/demos/datepicker/">http://jqueryui.com/demos/datepicker/</a> for more information on jQueryUI's datepicker plugin and all the available options that can be applied via the jqueryOptions
	element attribute.  Keep in mind that if you are setting a jQuery option to a piece of javascript code via the jqueryOptions attribute, you will need to prepend your string with "js:" for it to be handled correctly.</p>
	
	<?php
	echo '<pre>', highlight_string('<?php
/* addDate Function Declaration
public function addDate($label, $name, $value="", $additionalParams="") {}
*/

$form->addDate("My Date", "Date");
$form->addDate("My Prefilled Date", "Date", date("F j, Y"));
$form->addDate("My Date w/Custom Hint", "Date", "", array("hint" => "To select a date, click here..."));
$form->addDate("My Date w/MySQL Formatting", "Date", "", array("jqueryOptions" => array(
	"dateFormat" => "yy-mm-dd"
)));
$form->addDate("My Date w/Multiple Months & Restricted Range", "Date", "", array("jqueryOptions" => array(
	"numberOfMonths" => 2, 
	"minDate" => "-30",
	"maxDate" => "+30"
?>', true), '</pre>';
	?>
	
	<p>This function has four available parameters: label, name, value, and additionalParams.  Many of the functions responsible for adding form elements follow this same pattern.
	The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the textbox.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute of the &lt;input&gt; tag.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Optional - Corresponds to the value attribute of the &lt;input&gt; tag.  This can be used to set the textbox's default value.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the textbox.  The third example seen above 
			demonstrates how this parameter can be used to apply the required setting.  See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings
			that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-Date-Range"></a>
	<h4>Date Range:</h4><p>Like the date element, the addDateRange function makes use of jQueryUI's datepicker functionality; however, it allows a date range or single date to be selected from pre-defined list
	or a calendar - not just a single date.  To facilitate this, a jQuery plugin developed by filament group is used.  More information about this plugin can be found at 
	<a href="http://www.filamentgroup.com/lab/date_range_picker_using_jquery_ui_16_and_jquery_ui_css_framework/">http://www.filamentgroup.com/lab/date_range_picker_using_jquery_ui_16_and_jquery_ui_css_framework/</a>.  
	The list/calendar is triggered from a onclick javascript event which is automatically applied to the textbox.  By default, this element will have a hint set 
	to "Click to Select Date Range..."; however, this can be modified by applying the hint element attribute as seen in the third
	example provided below.</p>
	
	<p>The formatting of the dates returned from the calendar will be set to "MM d, yy" by default,  which is equivalent to "F j, Y" using  php's date function.  If you want to modify this
	formatting, you can include the "dateFormat" option in the jqueryOption element attribute.  The fourth example below shows how to change the date's formatting to a MySQL friendly format.  
	Use <a href="http://docs.jquery.com/UI/Datepicker/formatDate">http://docs.jquery.com/UI/Datepicker/formatDate</a> for a guide to using jQuery's date formatting options.</p>

	<p>When setting this element's default value via the function's value parameter, remember that the string passed to the function must match the date format that is being used.  See the second 
	example below for reference.</p>

	<p>jQueryUI's datepicker has many options you can use to tailor the functionality to fit to your specific needs.  To apply these options, make use of the jqueryOptions element attribute.  We've already
	seen how this attribute can be used to change the formatting of the date returned.  Now, let's look at example five below and see how we can restrict the date range to plus or minus
	60 days.  The same jQuery options that can can be applied to the date element type can also by applied in the addDateRange function.  See <a href="http://jqueryui.com/demos/datepicker/">http://jqueryui.com/demos/datepicker/</a> for more information on jQueryUI's datepicker plugin and all the available options that can be applied via the jqueryOptions
	element attribute.  Keep in mind that if you are setting a jQuery option to a piece of javascript code via the jqueryOptions attribute, you will need to prepend your string with "js:" for it to be handled correctly.</p>
	
	<?php
	echo '<pre>', highlight_string('<?php
/* addDateRange Function Declaration
public function addDateRange($label, $name, $value="", $additionalParams="") {}
*/

$form->addDateRange("My Date Range", "DateRange");
$form->addDateRange("My Prefilled Date Range", "DateRange", date("F j, Y", strtotime("-1 month")) . " - " . date("F j, Y"));
$form->addDateRange("My Date Range w/Custom Hint", "DateRange", "", array("hint" => "To select a date range, click here..."));
$form->addDateRange("My Date Range w/MySQL Formatting", "DateRange", "", array("jqueryOptions" => array(
	"dateFormat" => "yy-mm-dd"
)));
$form->addDateRange("My Date Range w/Multiple Months & Restricted Range", "DateRange", "", array("jqueryOptions" => array(
	"minDate" => "-60",
	"maxDate" => "+60"
?>', true), '</pre>';
	?>
	
	<p>This function has four available parameters: label, name, value, and additionalParams.  Many of the functions responsible for adding form elements follow this same pattern.
	The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the textbox.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute of the &lt;input&gt; tag.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Optional - Corresponds to the value attribute of the &lt;input&gt; tag.  This can be used to set the textbox's default value.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the textbox.  The third example seen above 
			demonstrates how this parameter can be used to apply the required setting.  See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings
			that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-TinyMCE"></a>
	<h4>TinyMCE Web Editor:</h4><p>TinyMCE's javascript WYSIWYG editor can be added with the addWebEditor function.  For more information on TinyMCE, see
	<a href="http://tinymce.moxiecode.com/">http://tinymce.moxiecode.com/</a>.  Like the CKEditor web editor, a simplified toolbar can be triggered by
	including the basic element attribute.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addWebEditor Function Declaration
public function addWebEditor($label, $name, $value="", $additionalParams="") {}
*/

$form->addWebEditor("My TinyMCE Web Editor", "TinyMCE");
$form->addWebEditor("My Prefilled TinyMCE Editor", "TinyMCE", "This is my default value.");
$form->addWebEditor("My Basic TinyMCE Editor", "TinyMCE", "", array("basic" => 1));
?>', true), '</pre>';
	?>
	
	<p>This function has four available parameters: label, name, value, and additionalParams.  The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the textarea.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute of the &lt;textarea&gt; tag.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Optional - Corresponds to the content between the opening and closing &lt;textarea&gt; tags.  This can be used to set the textarea's default value.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the textarea.
			See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-CKEditor"></a>
	<h4>CKEditor:</h4><p>CKEditor's WYSIWYG editor can be added with the addCKEditor function.  For more information on CKEditor, see
	<a href="http://ckeditor.com/">http://ckeditor.com/</a>.  Like the TinyMCE web editor, a simplified toolbar can be triggered by
	including the basic element attribute.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addCKEditor Function Declaration
public function addCKEditor($label, $name, $value="", $additionalParams="") {}
*/

$form->addCKEditor("My TinyMCE Web Editor", "TinyMCE");
$form->addCKEditor("My Prefilled TinyMCE Editor", "TinyMCE", "This is my default value.");
$form->addCKEditor("My Basic TinyMCE Editor", "TinyMCE", "", array("basic" => 1));
?>', true), '</pre>';
	?>
	
	<p>This function has four available parameters: label, name, value, and additionalParams.  The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Controls the content rendered inside &lt;label&gt; tags before the textarea.</td>
		</tr>
		<tr>
			<td>name</td>
			<td>Corresponds to the name attribute of the &lt;textarea&gt; tag.</td>
		</tr>
		<tr>
			<td>value</td>
			<td>Optional - Corresponds to the content between the opening and closing &lt;textarea&gt; tags.  This can be used to set the textarea's default value.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the textarea.
			See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings that can be passed in this array.</td>
		</tr>
	</table>

	<a name="Form-Elements-Captcha"></a>
	<h4>Captcha:</h4><p>This project leverages reCAPTCHA's anti-bot services to help prevent non-human activity by requiring the end-user to interpret and solve a challenge phrase.  See <a href="http://www.google.com/recaptcha">http://www.google.com/recaptcha</a> for more information about reCAPTCHA.
	The captcha form element is different in several ways from the other elements included in this project.</p>

	<?php
	echo '<pre>', highlight_string('<?php
/* addCaptcha Function Declaration
public function addCaptcha($label="", $additionalParams="") {}
*/

$form->addCaptcha();
$form->addCaptcha("My Captcha");
$form->addCKEditor("My Required Captcha", array("required" => 1));
?>', true), '</pre>';
	?>
	
	<p>This function has two available parameters: label and additionalParams.  The table provided below describes each of these parameters.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>label</td>
			<td>Optional - Controls the content rendered inside &lt;label&gt; tags before the captcha.</td>
		</tr>
		<tr>
			<td>additionalParams</td>
			<td>Optional - Associative array of key/value pairs allowing a variety of settings to be applied to the captcha.
			See the <a href="#Additional-Parameters">additionalParams</a> section for all available settings that can be passed in this array.</td>
		</tr>
	</table>
</div>	

<div class="pfbc_doc_section">
	<a name="Additional-Parameters"></a>
	<h3>additionalParams</h3>
	<p>Nearly all the functions for adding form elements have an optional, last parameter called additionalParams that can be used to apply various settings
	to form elements through an associative array of key/value pairs.  An example is provided below to demonstrate how this can be done.</p>
	<?php
	echo '<pre>', highlight_string('<?php
$form->addTextbox("My Textbox w/additionalParams", "MyTextbox", "", array(
	"required" => 1, 
	"class" => "myclass", 
	"onkeyup" => "filterTextbox(this.value);"
));
?>', true), '</pre>';
	?>
	<p>Many of the available settings that can be passed to the additionalParams parameter directly correspond with html attributes, like "class" and "onkeyup" as seen 
	in the code snippet above.  If you're unfamiliar with these supported html attributes, use <a href="http://www.w3schools.com/tags/tag_input.asp">this page from w3schools.com</a> as a reference.  
	Others available settings are custom functionality built into this project, like "required" - which triggers javascript validation.  All of these custom settings that can
	be passed to the additionalParams paramter are provided below for your reference.</p>

	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width: 150px;"><b>Parameter</b></td>
			<td style="width: 225px;"><b>Applicable Element Functions</b></td>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>alphanumeric</td>
			<td>addTextbox</td>
			<td>Limits the characters that can be typed into textboxes to letters and/or numbers.
			One important thing to note is that copy-and-paste is allowed, which provides the opportunity
			for invalid characters to make their way into the textbox's value.  Because of this, textboxes
			with the alphanumeric attribute will be validated by an onsubmit javascript function.  PHP validation
			can also be applied by invoking the validate function after the form's data has been submitted.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addTextbox("My Textbox", "Textbox", "", array("alphanumeric" => 1));
?>', true), '</pre>';
			?>

			</td>
		</tr>
		<tr>
			<td>basic</td>
			<td>addCKEditor, addWebEditor</td>
			<td>Triggers web editor's simplified control panel.  Both of the web editors integrated into this project - TinyMCE and CKEditor - have two
			control panels that can be used.  By default, the web editor will be displayed with a fully-featured set of controls; however, you can use the basic option
			to display a reduced set of controls including only bold, italics, ordered/unordered lists, and a few others.  Both control panels can be seen in the <a href="../examples/web-editors.php">Web Editors example</a>.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addWebEditor("My Web Editor", "WebEditor", "", array("basic" => 1));
?>', true), '</pre>';
			?>

			</td>
		</tr>
		<tr>
			<td>height</td>
			<td>addLatLng, addSlider</td>
			<td>Controls the height of the Google Map and jQuery slider (when orientation has been set to vertical).  When using the addLatLng function, the height of the container housing the 
			Google Map will be set to 200px by default; however, you can override this setting by making use of the height setting.  When using the addSlider function, the height setting
			can be used in combination with the orientation jqueryOption to control the slider's height.  In both functions, numbers passed with no suffix - "px", "%", etc - will be 
			interpreted in pixels.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addLatLng("My Latitude/Longitude", "LatLng", "", array("height" => 300));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>
		<tr>
			<td>hint</td>
			<td>addTextbox, addTextarea, addDate, addDateRange, addColorPicker, addLatLng, addEmail</td>
			<td>Prefills elements with a temporary value that is cleared with an onclick javascript function when engaged.  Several functions including addDate, addDateRange, addColorPicker, and addLatLng
			have this option set by default.  For instance, the addDate function has a hint set to "Click to Select Date...".  Hints are ignored for required fields during javascript validation.  Also, the form's
			built in onsubmit javascript function will remove hints before the data is submitted.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addTextbox("My Textbox", "Textbox", "", array("hint" => "My hint..."));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>
		<tr>
			<td>hideDisplay</td>
			<td>addSlider</td>
			<td>Prevents the selected value from being displayed below the slider element.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addSlider("My Slider", "Slider", "", array("hideDisplay" => 1));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>
		<tr>
			<td>hideJump</td>
			<td>addLatLng</td>
			<td>Prevents the location jump textbox from being rendered below the Google Map.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addLatLng("My Latitude/Longitude", "LatLng", "", array("hideJump" => 1));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>
		<tr>
			<td>integer</td>
			<td>addTextbox</td>
			<td>Limits the characters that can be typed into textboxes to numbers.
			One important thing to note is that copy-and-paste is allowed, which provides the opportunity
			for invalid characters to make their way into the textbox's value.  Because of this, textboxes
			with the integer attribute will be validated by an onsubmit javascript function.  PHP validation
			can also be applied by invoking the validate function after the form's data has been submitted.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addTextbox("My Textbox", "Textbox", "", array("integer" => 1));
?>', true), '</pre>';
			?>

			</td>
		</tr>
		<tr>
			<td>jqueryOptions</td>
			<td>addDate, addDateRange, addSlider</td>
			<td>Allows jQuery options to be applied to various form elements that leverage jQuery plugins/UI.  This option needs to be passed as an associative array of key/value pairs where the key corresponds to the jQuery option's
			name.  If the jQuery option's value is javascript code, "js:" will need to prepended in order to distinguish itself from a string.  Use the example below for reference.

			<?php
			echo '<pre>', highlight_string('<?php
$form->addDate("Schedule Appointment Date:", "AppointmentDate", "", array(
	"jqueryOptions" => array(
		"dateFormat" => "yy-mm-dd",
		"changeMonth" => false,
		"changeYear" => false,
		"numberOfMonths" => "js:[2, 3]"
	)
));
?>', true), '</pre>';
			?>

			</td>
		</tr>
		<tr>
			<td>labelPaddingRight</td>
			<td>All execpt addButton and addHTMLExternal</td>
			<td>Controls the amount of padding applied to the right side of the label when both the labelWidth and labelRightAlign form/element attributes are being used to render the label and the form element side-by-side.  
			This setting, as well as the labelWidth and labelRightAlign attributes, can be applied either in the form's setAttributes function or in an individual add element function.  If these settings are applied in the
			form's setAttributes function, they will affect each element in the form.  The labelPaddingRight attribute is set to "4px" by default.  Numbers passed with no suffix - "px", "%", etc - will be interpreted in pixels.
			See the 4th form in the <a href="../examples/layout.php">Layout example</a> file for reference.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->setAttributes(array(
	"width" => 400,
	"labelWidth" => 200,
	"labelRightAlign" => 1
));
$form->addTextbox("My Textbox", "Textbox", "", array("labelPaddingRight" => 5));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>
		<tr>
			<td>labelRightAlign</td>
			<td>All execpt addButton and addHTMLExternal</td>
			<td>Forces the element's label to be right aligned when both the labelWidth form/element attribute is being used to render the label and the form element side-by-side.  
			This setting, as well as the labelWidth attribute, can be applied either in the form's setAttributes function or in an individual add element function.  If these settings are applied in the
			form's setAttributes function, they will affect each element in the form.  See the 4th form in the <a href="../examples/layout.php">Layout example</a> file for reference.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->setAttributes(array(
	"width" => 400,
	"labelWidth" => 200,
));
$form->addTextbox("My Textbox", "Textbox", "", array("labelRightAlign" => 1));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>
		<tr>
			<td>labelWidth</td>
			<td>All execpt addButton and addHTMLExternal</td>
			<td>Forces the label to be displayed side-by-side with the form element.  This feature overrides the default behavior that displays labels above form elements.
			This setting can be applied either in the form's setAttributes function or in an individual add element function.  If this setting is applied in the
			form's setAttributes function, it will affect each element in the form.  See the 2nd, 3rd, and 4th form in the <a href="../examples/layout.php">Layout example</a> file for reference.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->setAttributes(array(
	"width" => 400
));
$form->addTextbox("My Textbox", "Textbox", "", array("labelWidth" => 200));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>	
		<tr>
			<td>noBreak</td>
			<td>addCheckbox, addRadio, addYesNo, addTrueFalse, addCheckSort</td>
			<td>Displays the radio buttons or checkboxes in a horizontal list.  This setting will be automatically set for the yesno and truefalse form elements.  The other elements - checkbox, radio, and checksort -
			will be listed vertically by default.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addCheckbox("My Checkboxes", "Checkbox[]", "", array("Option #1", "Option #2", "Option #3"), array("noBreak" => 1));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>
		<tr>
			<td>prefix</td>
			<td>addSlider</td>
			<td>Prepends the slider's selected value with a specified prefix.  See the 3rd slider in the <a href="../examples/jquery.php">jQuery example</a> file for reference.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addSlider("My Slider", "Slider", array(25, 75), array("prefix" => "$", "jqueryOptions" => array("step" => 5)));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>
		<tr>
			<td>preHTML</td>
			<td>All execpt addButton and addHTMLExternal</td>
			<td>Used to display text or html content before an element's label.  The addHTMLExternal function can also be used to insert text/html between form elements.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addTextbox("My Textbox", "Textbox", "", array("preHTML" => "This is my preHTML"));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>
		<tr>
			<td>postHTML</td>
			<td>All execpt addButton and addHTMLExternal</td>
			<td>Used to display text or html content after an element. See the <a href="../examples/conditional-scenarios.php">Conditional Scenarios example</a> file for reference. The addHTMLExternal function can also be used to insert text/html between form elements.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addTextbox("My Textbox", "Textbox", "", array("postHTML" => "This is my postHTML"));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>
		<tr>
			<td>required</td>
			<td>All execpt addButton, addHTMLExternal, addHTML, and addSort</td>
			<td>Activates javascript validation to ensure the element has been filled out.  This attribute will also trigger php validation when the validate function is invoked after the form's data has been submitted.
			See the <a href="../examples/js-validation.php">Javascript Validation</a> and <a href="../examples/php-validation.php">PHP Validation</a> example files for reference.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addTextbox("My Textbox", "Textbox", "", array("required" => 1));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>
		<tr>
			<td>suffix</td>
			<td>addSlider</td>
			<td>Appends the slider's selected value with a specified suffix.  See the 2nd slider in the <a href="../examples/jquery.php">jQuery example</a> file for reference.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addSlider("My Slider", "Slider", "", array("suffix" => "%"));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>
		<tr>
			<td>tooltip</td>
			<td>All execpt addButton, addHTML, and addHTMLExternal</td>
			<td>Actives tooltip icon beside the element's label, which displays text/html when hovered over.  Tooltips within this project leverage a jQuery plugin called <a href="http://vadikom.com/tools/poshy-tip-jquery-plugin-for-stylish-tooltips/">Poshy Tip</a>.  See the <a href="../examples/tooltips.php">Tooltip example</a> file for reference.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addTextbox("My Textbox", "Textbox", "", array("tooltip" => "This is my tooltip"));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>
		<tr>
			<td>zoom</td>
			<td>addLatLng</td>
			<td>Controls the zoom level of the Google Map.  This setting can range from 0 to 21, with 0 representing the farthest zoom level where the entire world can be seen on one map, and 21 being the closest zoom level where individual buildings can be seen.
			This attribute will be set to 9 by default.  See the <a href="../examples/google-maps.php">Google Maps</a> file for reference.

			<?php						
			echo '<pre>', highlight_string('<?php
$form->addLatLng("My Latitude/Longitude", "LatLng", "", array("zoom" => 14));
?>', true), '</pre>';
			?>
			
			</td>
		</tr>
	</table>
</div>	

<?php
include("../footer.php");
?>
