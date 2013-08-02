<?php
include("header.php");
?>

<div id="pfbc_screenshots">
	<h4>Screenshots:</h4>
	<div>
		<a href="examples/layout.php"><img src="screenshots/1.png" alt="Flexible Layout Options"/></a><br/>
		<a href="examples/google-maps.php"><img src="screenshots/2.png" alt="Google Maps Support"/></a><br/>
		<a href="examples/captcha.php"><img src="screenshots/3.png" alt="TinyMCE and reCAPTCHA Integrations"/></a>
	</div>
</div>
<h4>About This Project:</h4>
<div>
The goals of this project are to...
	<ul style="margin-top: 0; padding-top: 0;">
		<li>promote rapid development of forms through an object-oriented PHP structure.</li>
		<li>eliminate the grunt/repetitive work of writing the html and javascript/php validation when building forms.</li>
		<li>reduce human error by using a consistent/tested utility.</li>
		<li>incorporate complex elements such as jquery, google maps, google spreadsheets, tooltips, recaptcha, and html web editors quickly and with little effort.</li>
	</ul>
</div>

<h4>Included Functionality:</h4>
<div>
	<ul style="margin-top: 0; padding-top: 0;">
		<li>Ajax Form Submission</li>
		<li>Javascript and PHP Validation</li>
		<li>jQuery Elements - date, daterange, sort, checksort, slider, color (<a href="http://www.jquery.com/">jQuery</a>)</li>
		<li>jQuery UI Themes - (<a href="http://jqueryui.com">jQuery UI</a>)</li>
		<li>Google Maps Element - latlng (<a href="http://code.google.com/apis/maps/documentation/v3/">Google Maps API v3</a>)</li>
		<li>Hybrid Form Element Types - state, country, yesno, truefalse, date, daterange, expdate, sort, latlng, checksort, webeditor, slider, captcha, html, color, email, button, htmlexternal</li>
		<li>File Upload Support</li>
		<li>Email Address Validation</li>
		<li>Integer, Float, and Alphanumeric Validation</li>
		<li>Two Wysiwyg Web Editors (<a href="http://tinymce.moxiecode.com/">TinyMCE</a>, <a href="http://ckeditor.com/">CKEditor</a>)</li>
		<li>Tooltips (<a href="http://vadikom.com/tools/poshy-tip-jquery-plugin-for-stylish-tooltips/">jQuery Poshy Tip Plugin</a>)</li>
		<li>Captcha (<a href="http://recaptcha.net">reCAPTCHA</a>)</li>
		<li>Flexible Div Layout</li>
		<li>XHTML 1.0 Strict Compliant</li>
		<li>Google Docs Spreadsheet Integration (<a href="http://code.google.com/apis/spreadsheets/data/3.0/developers_guide.html">Google Spreadsheets API v3</a>)</li>
		<li>Email Support w/<a href="http://phpmailer.worxware.com/">PHPMailer</a> + <a href="http://mail.google.com/">Google's Gmail Service</a></li>
	</ul>
</div>

<h4>Installation Instructions:</h4>
<div>
	<ol style="margin-top: 0; padding-top: 0;">
		<li><a href="http://php-form-builder-class.googlecode.com/files/formbuilder-<?php echo($version);?>.zip">Download</a> and unzip formbuilder-<?php echo($version);?>.zip</li>
		<li>Upload the php-form-builder-class directory within the public path of your web server.</li>
		<li>The only files/directories you need for production are class.form.php, license, and includes.  The other files/directories are included only for instruction and can be omitted.</li>
		<li>If you are using a symbolic link to reference the php-form-builder-class directory in a public path, it is recommended that you place this symbolic link at your server's document root.  Doing this will eliminate the need for specifying the <i>jsIncludesPath</i> attribute while building your forms.</li>
		<li>Be sure to review the examples provided below as well as review the source of class.form.php.</li>
		<li>If you have any questions about using this project, suggestions for new features, or need to report a bug, please use the Google Code Project Hosting issue tracker located at http://code.google.com/p/php-form-builder-class/issues/list</li>
	</ol>
</div>

<h4>System Requirements:</h4>
<div>
	<ul style="margin-top: 0; padding-top: 0;">
		<li>PHP 5 or greater</li>
	</ul>
</div>	

<h4>Documentation:</h4>
<div>
	<ul style="margin-top: 0; padding-top: 0;">
		<li><a href="documentation/index.php">User's Reference Guide</a></li>
		<li>This is an unfinished work in progress.  Contributions to enhance this section are always appreciated.</li>
	</ul>
</div>	

<h4>Included Tutorials/Examples:</h4>
<div>
	<ul style="margin-top: 0; padding-top: 0;">
		<li><a href="examples/form-elements.php">All Supported Form Elements</a></li>
		<li><a href="examples/validation.php">Validation</a></li>
		<li><a href="examples/ajax.php">Ajax</a></li>
		<li><a href="examples/layout.php">Layout</a></li>
		<li><a href="examples/jquery.php">jQuery</a></li>
		<li><a href="examples/google-maps.php">Google Maps</a></li>
		<li><a href="examples/google-spreadsheets.php">Google Spreadsheets</a></li>
		<li><a href="examples/email.php">Email w/PHPMailer + Google's Gmail Service</a></li>
		<li><a href="examples/captcha.php">Captcha</a></li>
		<li><a href="examples/web-editors.php">Web Editors</a></li>
		<li><a href="examples/buttons.php">Buttons</a></li>
		<li><a href="examples/fieldsets.php">Fieldsets</a></li>
		<li><a href="examples/conditional-scenarios.php">Conditional Scenarios</a></li>
		<li><a href="examples/synchronous-resource-loading.php">Synchronous Resource Loading</a></li>
	</ul>
</div>

<h4>Donate:</h4>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<div>
	If you would like to support the development of this project with a monetary donation, please use the button provided below to securely submit your donation through PayPal.<br/>
	<table cellpadding="2" cellspacing="0" border="0">
	<tr>
		<td align="left" valign="top">
			<input type="hidden" name="cmd" value="_s-xclick" />
			<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----"/>
			<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!"/>
			<img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"/>
		</td>
		<td align="left" valign="top">
			<img src="http://www.paypal.com/en_US/i/logo/paypal_logo.gif" alt="paypal"/>
		</td>
	</tr>
	</table>
</div>
</form>

<?php
include("footer.php");
?>
