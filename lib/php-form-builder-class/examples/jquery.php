<?php
error_reporting(E_ALL);
session_start();
include("../class.form.php");

if(isset($_POST["cmd"]) && in_array($_POST["cmd"], array("submit_0", "submit_1", "submit_2", "submit_3", "submit_4", "submit_5", "submit_6", "submit_7"))) {
	$form = new form("jquery_" . substr($_POST["cmd"], -1));
	if($form->validate())
		header("Location: jquery.php?errormsg_" . substr($_POST["cmd"], -1) . "=" . urlencode("Congratulations! The information you enter passed the form's validation."));
	else
		header("Location: jquery.php");
	exit();
}
elseif(!isset($_GET["cmd"]) && !isset($_POST["cmd"])) {
	$title = "jQuery";
	$headextra = <<<STR
<style type="text/css">
	.tooltipTitle {
		font-weight: bold;
		color: #990000;;
		font-weight: bold;
		border-bottom: 1px solid #ccc;
		font-size: 14px;
		padding-bottom: 2px;
	}
	.tooltipBody {
		font-size: 12px;
		padding-top: 5px;
	}
</style>
		
STR;
	include("../header.php");
	?>

	<p><b>jQuery</b> - jQuery's javascript library and jQueryUI's functionality are leveraged heavily throughout this project.  Below you'll find two lists.  The first list serves as this example file's table of contents and will help you find the specific subsection you're looking for in this lengthy webpage.  The second list provides more details on the various form/element attributes that affect jQuery's behavior within
	this project.</p>

	<h4>Table of Contents</h4>
	<ul style="margin: 0;">
		<li><a href="#date">jQueryUI Datepicker Widget</a></li>
		<li><a href="#daterange">jQuery Date Range Picker Plugin</a></li>
		<li><a href="#slider">jQueryUI Slider Widget</a></li>
		<li><a href="#sort">jQueryUI Sortable Interaction</a></li>
		<li><a href="#color">jQuery Color Picker Plugin</a></li>
		<li><a href="#button">jQueryUI Button Widget</a></li>
		<li><a href="#tooltip">jQuery Poshy Tip Plugin</a></li>
	</ul>

	<h4 style="margin-top: 1em;">Form/Element Attributes</h4>
	<ul style="margin: 0;">
		<li>preventJQueryLoad - Including jQuery and jQueryUI's core javascript files are a requirement for this project to function correctly.  Because of this, the latest versions, 1.4.3 and 1.8.6 respectively, are automatically included with every form rendered.
		The "preventJQueryLoad" form attribute can be used to prevent jQuery's js file from being loaded by the project.  If you're already including jQuery's js file outside of this project, you will need to make use of this attribute to prevent
		duplicate includes.</li>
		<li>preventJQueryUILoad - This form attribute is identical to "preventJQueryLoad" except it affects jQueryUI's js file.  See the previous attribute for more information.</li>
		<li>jqueryDateFormat - The "jqueryDateFormat" form attribute controls the date format returned by both the date and daterange elements.
		See <a href="http://docs.jquery.com/UI/Datepicker/$.datepicker.formatDate">http://docs.jquery.com/UI/Datepicker/$.datepicker.formatDate</a> for a reference guide on how to set this attribute.</li>
		<li>jqueryUIButtons - This form attribute will replace all standard html buttons added to a form with jQueryUI's button widget functionality.</li>
		<li>jqueryUITheme - The "jqueryUITheme" form attribute can be used to specify one of the twenty-four supported jQueryUI themes.  Available themes include "black-tie", "blitzer", "cupertino", "dark-hive", "dot-luv", "eggplant", "excite-bike", "flick", "hot-sneaks", "humanity", "le-frog", "mint-choc", "overcast", "pepper-grinder", "redmond", "smoothness", "south-street", "start", "sunny", "swanky-purse", "trontastic", "ui-darkness", "ui-lightness", "vader". 
		To view each of these themes, see <a href="http://jqueryui.com/themeroller/">http://jqueryui.com/themeroller/</a>.</li>
		<li>jqueryOptions - The "jqueryOptions" element attribute gives you - the developer - the flexibility to apply jQuery options that are supported by the specific widget/plugin used by the element.  This attribute can be used on
		the following elements - date, daterange, slider, and rating.  See the <a href="../documentation/index.php#Additional-Parameters">additionalParams Element Parameter</a> section in the documentation for an example of how to set this attribute.</li>
		<li>jqueryUI - This element attribute only applies to the addButton function.  It is identical to the jqueryUIButtons form attribute, except it is applied on the element level and only affects a single button - 
		not all buttons added to a form.</li>
		<li>tooltip - The "tooltip" element attribute allows you to specify text or html content for a tooltip, which provides your users with more information about the element.  This project utilizes the Poshy Tip jQuery plugin for its tooltip functionality.</li>
	</ul>

	<p><b><a name="date">jQueryUI Datepicker Widget</a></b> - The date element utilizes jQueryUI's datepicker widget.  Below, you'll find several ways you can use the addDate function in your forms.  See <a href="http://jqueryui.com/demos/datepicker/">http://jqueryui.com/demos/datepicker/</a> for more information on this jQueryUI widget.</p>

	<?php
	$form = new form("jquery_0");
	$form->setAttributes(array(
		"width" => 400
	));

	if(!empty($_GET["errormsg_0"]))
		$form->errorMsg = filter_var(stripslashes($_GET["errormsg_0"]), FILTER_SANITIZE_SPECIAL_CHARS);

	$form->addHidden("cmd", "submit_0");
	$form->addDate("Date:", "MyDate");
	$form->addDate("Date w/Default Value:", "MyDatePrefilled", date("F j, Y", strtotime("+1 week")));
	$form->addDate("Date w/Modified Hint:", "MyDateHint", "", array("hint" => "Click here to schedule your appointment date."));
	$form->addDate("Date w/Modified Date Format:", "MyDateDateFormat", "", array("jqueryOptions" => array("dateFormat" => "mm/dd/yy")));
	$form->addDate("Date w/Multiple Months and Range Limit:", "MyDateMultipleMonthsRangeLimit", "", array("jqueryOptions" => array("numberOfMonths" => 3, "minDate" => "-30", "maxDate" => "+30")));
	$form->addDate("Date w/Modified Year Range:", "MyDateYearRange", "", array("jqueryOptions" => array("yearRange" => date("Y") - 100 . ":" . date("Y"))));
	$form->addButton();
	$form->render();

	echo '<pre>', highlight_string('<?php
$form = new form("jquery_0");
$form->setAttributes(array(
	"width" => 400
));

if(!empty($_GET["errormsg_0"]))
	$form->errorMsg = filter_var(stripslashes($_GET["errormsg_0"]), FILTER_SANITIZE_SPECIAL_CHARS);

$form->addHidden("cmd", "submit_0");
$form->addDate("Date:", "MyDate");
$form->addDate("Date w/Default Value:", "MyDatePrefilled", date("F j, Y", strtotime("+1 week")));
$form->addDate("Date w/Modified Hint:", "MyDateHint", "", array("hint" => "Click here to schedule your appointment date."));
$form->addDate("Date w/Modified Date Format:", "MyDateDateFormat", "", array("jqueryOptions" => array("dateFormat" => "mm/dd/yy")));
$form->addDate("Date w/Multiple Months and Range Limit:", "MyDateMultipleMonthsRangeLimit", "", array("jqueryOptions" => array("numberOfMonths" => 3, "minDate" => "-30", "maxDate" => "+30")));
$form->addDate("Date w/Modified Year Range:", "MyDateYearRange", "", array("jqueryOptions" => array("yearRange" => date("Y") - 100 . ":" . date("Y"))));
$form->addButton();
$form->render();
?>', true), '</pre>';
	?>

	<p><b><a name="daterange">jQuery Date Range Picker Plugin</a></b> - The daterange element utilizes the Date Range Picker jQuery plugin developed by Filament Group, Inc.  Below, you'll find several ways you can use the addDateRange function in your forms.  See <a href="http://www.filamentgroup.com/lab/date_range_picker_using_jquery_ui_16_and_jquery_ui_css_framework/">http://www.filamentgroup.com/lab/date_range_picker_using_jquery_ui_16_and_jquery_ui_css_framework/</a> for more information on this jQuery plugin.</p>

	<?php
	$form = new form("jquery_1");
	$form->setAttributes(array(
		"noAutoFocus" => 1,
		"preventJQueryLoad" => 1,
		"preventJQueryUILoad" => 1,
		"width" => 400
	));

	if(!empty($_GET["errormsg_1"]))
		$form->errorMsg = filter_var(stripslashes($_GET["errormsg_1"]), FILTER_SANITIZE_SPECIAL_CHARS);

	$form->addHidden("cmd", "submit_1");
	$form->addDateRange("Date Range:", "MyDateRange");
	$form->addDateRange("Date Range w/Default Value:", "MyDateRangePrefilled", date("F j, Y") . " - " . date("F j, Y", strtotime("+1 week")));
	$form->addDateRange("Date Range w/Modified Hint:", "MyDateRangeHint", "", array("hint" => "Click here to select your report's date range."));
	$form->addDateRange("Date Range w/Modified Date Format:", "MyDateRangeDateFormat", "", array("jqueryOptions" => array("dateFormat" => "mm/dd/yy")));
	$form->addDateRange("Date Range w/Minimum and Maximum Dates:", "MyDateRangeMinMaxDates", "", array("jqueryOptions" => array("minDate" => "-30", "maxDate" => "+30")));
	$form->addButton();
	$form->render();

	echo '<pre>', highlight_string('<?php
$form = new form("jquery_1");
$form->setAttributes(array(
	"width" => 400
));

if(!empty($_GET["errormsg_1"]))
	$form->errorMsg = filter_var(stripslashes($_GET["errormsg_1"]), FILTER_SANITIZE_SPECIAL_CHARS);

$form->addHidden("cmd", "submit_1");
$form->addDateRange("Date Range:", "MyDateRange");
$form->addDateRange("Date Range w/Default Value:", "MyDateRangePrefilled", date("F j, Y") . " - " . date("F j, Y", strtotime("+1 week")));
$form->addDateRange("Date Range w/Modified Hint:", "MyDateRangeHint", "", array("hint" => "Click here to select your report\'s date range."));
$form->addDateRange("Date Range w/Modified Date Format:", "MyDateRangeDateFormat", "", array("jqueryOptions" => array("dateFormat" => "mm/dd/yy")));
$form->addDateRange("Date Range w/Minimum and Maximum Dates:", "MyDateRangeMinMaxDates", "", array("jqueryOptions" => array("minDate" => "-30", "maxDate" => "+30")));
$form->addButton();
$form->render();
?>', true), '</pre>';
	?>

	<p><b><a name="slider">jQueryUI Slider Widget</a></b> - The slider element utilizes jQueryUI's slider widget.  Below, you'll find several ways you can use the addSlider function in your forms.  See <a href="http://jqueryui.com/demos/slider/">http://jqueryui.com/demos/slider/</a> for more information on this jQueryUI widget.</p>

	<?php
	$form = new form("jquery_2");
	$form->setAttributes(array(
		"noAutoFocus" => 1,
		"preventJQueryLoad" => 1,
		"preventJQueryUILoad" => 1,
		"width" => 400
	));

	if(!empty($_GET["errormsg_2"]))
		$form->errorMsg = filter_var(stripslashes($_GET["errormsg_2"]), FILTER_SANITIZE_SPECIAL_CHARS);

	$form->addHidden("cmd", "submit_2");
	$form->addSlider("Slider:", "MySlider");
	$form->addSlider("Slider w/Step Increment:", "MySliderStepIncrement", "", array("jqueryOptions" => array("step" => 5)));
	$form->addSlider("Slider w/Suffix:", "MySliderSuffix", "", array("suffix" => "%"));
	$form->addSlider("Slider w/Prefix and Custom Min/Max Values:", "MySliderPrefixMinMax", "", array("prefix" => "$", "jqueryOptions" => array("min" => 10, "max" => 90)));
	$form->addSlider("Slider w/Range:", "MySliderRange", array(30, 70), array("prefix" => "$"));
	$form->addSlider("Slider w/Vertical Orientation:", "MySliderVerticle", "", array("height" => 150, "jqueryOptions" => array("orientation" => "vertical")));
	$form->addButton();
	$form->render();

	echo '<pre>', highlight_string('<?php
$form = new form("jquery_2");
$form->setAttributes(array(
	"width" => 400
));

if(!empty($_GET["errormsg_2"]))
	$form->errorMsg = filter_var(stripslashes($_GET["errormsg_2"]), FILTER_SANITIZE_SPECIAL_CHARS);

$form->addHidden("cmd", "submit_2");
$form->addSlider("Slider:", "MySlider");
$form->addSlider("Slider w/Step Increment:", "MySliderStepIncrement", "", array("jqueryOptions" => array("step" => 5)));
$form->addSlider("Slider w/Suffix:", "MySliderSuffix", "", array("suffix" => "%"));
$form->addSlider("Slider w/Prefix and Custom Min/Max Values:", "MySliderPrefixMinMax", "", array("prefix" => "$", "jqueryOptions" => array("min" => 10, "max" => 90)));
$form->addSlider("Slider w/Range:", "MySliderRange", array(30, 70), array("prefix" => "$"));
$form->addSlider("Slider w/Vertical Orientation:", "MySliderVerticle", "", array("height" => 150, "jqueryOptions" => array("orientation" => "vertical")));
$form->addButton();
$form->render();
?>', true), '</pre>';
	?>

	<p><b><a name="sort">jQueryUI Sortable Interaction</a></b> - The sort and checksort elements utilize jQueryUI's sortable interaction.  Below, you'll find several ways you can use the addSort and addChecksort functions in your forms.  See <a href="http://jqueryui.com/demos/sortable/">http://jqueryui.com/demos/sortable/</a> for more information on this jQueryUI interaction.</p>

	<?php
	$form = new form("jquery_3");
	$form->setAttributes(array(
		"noAutoFocus" => 1,
		"preventJQueryLoad" => 1,
		"preventJQueryUILoad" => 1,
		"width" => 400
	));

	if(!empty($_GET["errormsg_3"]))
		$form->errorMsg = filter_var(stripslashes($_GET["errormsg_3"]), FILTER_SANITIZE_SPECIAL_CHARS);

	$form->addHidden("cmd", "submit_3");
	$form->addSort("Sort:", "MySort", array("Option #1", "Option #2", "Option #3"));
	$form->addSort("Sort w/Associative Array of Options:", "MySortAssociative", array("option1" => "Option #1", "option2" => "Option #2", "option3" => "Option #3"));
	$form->addCheckSort("Checksort:", "MyChecksort", "", array("Option #1", "Option #2", "Option #3"));
	$form->addCheckSort("Checksort w/nobreak Attribute:", "MyChecksortNoBreak", "", array("Option #1", "Option #2", "Option #3"), array("nobreak" => 1));
	$form->addCheckSort("Checksort w/Single Default Value:", "MyChecksortSingleDefault", "Option #3", array("Option #1", "Option #2", "Option #3"));
	$form->addCheckSort("Checksort w/Array of Default Values:", "MyChecksortArrayDefault", array("option1", "option2"), array("option1" => "Option #1", "option2" => "Option #2", "option3" => "Option #3"));
	$form->addButton();
	$form->render();

	echo '<pre>', highlight_string('<?php
$form = new form("jquery_3");
$form->setAttributes(array(
	"width" => 400
));

if(!empty($_GET["errormsg_3"]))
	$form->errorMsg = filter_var(stripslashes($_GET["errormsg_3"]), FILTER_SANITIZE_SPECIAL_CHARS);

$form->addHidden("cmd", "submit_3");
$form->addSort("Sort:", "MySort", array("Option #1", "Option #2", "Option #3"));
$form->addSort("Sort w/Associative Array of Options:", "MySortAssociative", array("option1" => "Option #1", "option2" => "Option #2", "option3" => "Option #3"));
$form->addCheckSort("Checksort:", "MyChecksort", "", array("Option #1", "Option #2", "Option #3"));
$form->addCheckSort("Checksort w/NoBreak Attribute:", "MyChecksortNoBreak", "", array("Option #1", "Option #2", "Option #3"), array("nobreak" => 1));
$form->addCheckSort("Checksort w/Single Default Value:", "MyChecksortSingleDefault", "Option #3", array("Option #1", "Option #2", "Option #3"));
$form->addCheckSort("Checksort w/Array of Default Values:", "MyChecksortArrayDefault", array("option1", "option2"), array("option1" => "Option #1", "option2" => "Option #2", "option3" => "Option #3"));
$form->addButton();
$form->render();
?>', true), '</pre>';
	?>

	<p><b><a name="color">jQuery Color Picker Plugin</a></b> - The color element utilizes the Color Picker jQuery plugin.  Below, you'll find several ways you can use the addColor function in your forms.  See <a href="http://eyecon.ro/colorpicker/">http://eyecon.ro/colorpicker/</a> for more information on this jQuery plugin.</p>

	<?php
	$form = new form("jquery_4");
	$form->setAttributes(array(
		"noAutoFocus" => 1,
		"preventJQueryLoad" => 1,
		"preventJQueryUILoad" => 1,
		"width" => 400
	));

	if(!empty($_GET["errormsg_4"]))
		$form->errorMsg = filter_var(stripslashes($_GET["errormsg_4"]), FILTER_SANITIZE_SPECIAL_CHARS);

	$form->addHidden("cmd", "submit_4");
	$form->addColor("Color:", "MyColor");
	$form->addColor("Color w/Custom Hint:", "MyColorHint", "", array("hint" => "Click here to select your paint color."));
	$form->addColor("Color w/Default Value:", "MyColorPrefilled", "#660099");
	$form->addButton();
	$form->render();

	echo '<pre>', highlight_string('<?php
$form = new form("jquery_4");
$form->setAttributes(array(
	"width" => 400
));

if(!empty($_GET["errormsg_4"]))
	$form->errorMsg = filter_var(stripslashes($_GET["errormsg_4"]), FILTER_SANITIZE_SPECIAL_CHARS);

$form->addHidden("cmd", "submit_4");
$form->addColor("Color:", "MyColor");
$form->addColor("Color w/Custom Hint:", "MyColorHint", "", array("hint" => "Click here to select your paint color."));
$form->addColor("Color w/Default Value:", "MyColorPrefilled", "660099");
$form->addButton();
$form->render();
?>', true), '</pre>';
	?>

	<p><b><a name="button">jQueryUI Button Widget</a></b> - This project includes support for jQueryUI's button widget.  The two forms below demonstrate how 
	to activate jQueryUI buttons - either globally with the "jqueryUIButtons" form attribute or by using the "jqueryUI" element attribute to activate a single 
	button.  See <a href="http://jqueryui.com/demos/button/">http://jqueryui.com/demos/button/</a> for more information on this jQueryUI widget.</p>

	<?php
	$form = new form("jquery_5");
	$form->setAttributes(array(
		"noAutoFocus" => 1,
		"preventJQueryLoad" => 1,
		"preventJQueryUILoad" => 1,
		"jqueryUIButtons" => 1,
		"width" => 400
	));

	if(!empty($_GET["errormsg_5"]))
		$form->errorMsg = filter_var(stripslashes($_GET["errormsg_5"]), FILTER_SANITIZE_SPECIAL_CHARS);

	$form->addHidden("cmd", "submit_5");
	$form->addTextbox('Enable all form buttons w/"jqueryUIButtons" form attribute:', "MyTextbox");
	$form->addButton("Button #1");
	$form->addButton("Button #2");
	$form->addButton("Button #3");
	$form->render();
	?>

	<br/><br/>

	<?php
	$form = new form("jquery_6");
	$form->setAttributes(array(
		"noAutoFocus" => 1,
		"preventJQueryLoad" => 1,
		"preventJQueryUILoad" => 1,
		"width" => 400
	));

	if(!empty($_GET["errormsg_6"]))
		$form->errorMsg = filter_var(stripslashes($_GET["errormsg_6"]), FILTER_SANITIZE_SPECIAL_CHARS);

	$form->addHidden("cmd", "submit_6");
	$form->addTextbox('Enable single button w/"jqueryUI" element attribute:', "MyTextbox");
	$form->addButton("Button #1");
	$form->addButton("Button #2", "submit", array("jqueryUI" => 1));
	$form->addButton("Button #3");
	$form->render();

	echo '<pre>', highlight_string('<?php
$form = new form("jquery_5");
$form->setAttributes(array(
	"jqueryUIButtons" => 1,
	"width" => 400
));

if(!empty($_GET["errormsg_5"]))
	$form->errorMsg = filter_var(stripslashes($_GET["errormsg_5"]), FILTER_SANITIZE_SPECIAL_CHARS);

$form->addHidden("cmd", "submit_5");
$form->addTextbox(\'Enable all form buttons w/"jqueryUIButtons" form attribute:\', "MyTextbox");
$form->addButton("Button #1");
$form->addButton("Button #2");
$form->addButton("Button #3");
$form->render();
?>

<br/><br/>

<?php
$form = new form("jquery_6");
$form->setAttributes(array(
	"width" => 400
));

if(!empty($_GET["errormsg_6"]))
	$form->errorMsg = filter_var(stripslashes($_GET["errormsg_6"]), FILTER_SANITIZE_SPECIAL_CHARS);

$form->addHidden("cmd", "submit_6");
$form->addTextbox(\'Enable single button w/"jqueryUI" element attribute:\', "MyTextbox");
$form->addButton("Button #1");
$form->addButton("Button #2", "submit", array("jqueryUI" => 1));
$form->addButton("Button #3");
$form->render();
?>', true), '</pre>';
	?>

	<p><b><a name="tooltip">jQuery Tooltip Plugin</a></b> - This project utilizes the Poshy Tip jQuery plugin for handling tooltips.  To activate a tooltip, simply set the "tooltip" element attribute to a string.  Both plain-text and html content are supported.  See <a href="http://vadikom.com/tools/poshy-tip-jquery-plugin-for-stylish-tooltips/">http://vadikom.com/tools/poshy-tip-jquery-plugin-for-stylish-tooltips/</a> for more information on this jQuery plugin.</p>

	<?php
	$form = new form("jquery_7");
	$form->setAttributes(array(
		"noAutoFocus" => 1,
		"preventJQueryLoad" => 1,
		"preventJQueryUILoad" => 1,
		"width" => 400
	));

	if(!empty($_GET["errormsg_7"]))
		$form->errorMsg = filter_var(stripslashes($_GET["errormsg_7"]), FILTER_SANITIZE_SPECIAL_CHARS);

	$form->addHidden("cmd", "submit_7");
	$form->addTextbox("Tooltip:", "MyTextbox", "", array("tooltip" => "This is a text-only tooltip."));
	$form->addTextbox("Tooltip w/Rich Text:", "MyTextboxRichText", "", array("tooltip" => '<div class="tooltipTitle">This is my rich-text tooltip.</div><div class="tooltipBody">The "tooltip" element attribute can accept either text or html.</div>'));
	$form->addTextbox("Tooltip w/Image:", "MyTextboxImage", "", array("tooltip" => '<img src="http://www.imavex.com/php-form-builder-class/screenshots/1.png" style="background: #fff; padding: 10px; border: 1px solid #ccc;"/>'));
	$form->addButton();
	$form->render();

	echo '<pre>', highlight_string('<?php
$form = new form("jquery_7");
$form->setAttributes(array(
	"width" => 400
));

if(!empty($_GET["errormsg_7"]))
	$form->errorMsg = filter_var(stripslashes($_GET["errormsg_7"]), FILTER_SANITIZE_SPECIAL_CHARS);

$form->addHidden("cmd", "submit_7");
$form->addTextbox("Tooltip:", "MyTextbox", "", array("tooltip" => "This is a text-only tooltip."));
$form->addTextbox("Tooltip w/Rich Text:", "MyTextboxRichText", "", array("tooltip" => \'<div class="tooltipTitle">This is my rich-text tooltip.</div><div class="tooltipBody">The "tooltip" element attribute can accept either text or html.</div>\'));
$form->addTextbox("Tooltip w/Image:", "MyTextboxImage", "", array("tooltip" => \'<img src="http://www.imavex.com/php-form-builder-class/screenshots/1.png" style="background: #fff; padding: 10px; border: 1px solid #ccc;"/>\'));
$form->addButton();
$form->render();
?>', true), '</pre>';
	
	include("../footer.php");
}
?>

