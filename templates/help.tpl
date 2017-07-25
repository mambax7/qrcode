<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>QRCode module instructions</title>
    <style type="text/css">
        <!--

        /* ~~ this container surrounds all other divs giving them their percentage-based width ~~ */
        .container {
            width: 80%;
            max-width: 1260px; /* a max-width may be desirable to keep this layout from getting too wide on a large monitor. This keeps line length more readable. IE6 does not respect this declaration. */
            min-width: 780px; /* a min-width may be desirable to keep this layout from getting too narrow. This keeps line length more readable in the side columns. IE6 does not respect this declaration. */
            background: #FFF;
            margin: 0 auto; /* the auto value on the sides, coupled with the width, centers the layout. It is not needed if you set the .container's width to 100%. */
        }

        /* ~~ This is the layout information. ~~

        1) Padding is only placed on the top and/or bottom of the div. The elements within this div have padding on their sides. This saves you from any "box model math". Keep in mind, if you add any side padding or border to the div itself, it will be added to the width you define to create the *total* width. You may also choose to remove the padding on the element in the div and place a second div within it with no width and the padding necessary for your design.

        */
        .content {
            padding: 10px 0;
        }

        /* ~~ This grouped selector gives the lists in the .content area space ~~ */
        .content ul, .content ol {
            padding: 0 15px 15px 40px; /* this padding mirrors the right padding in the headings and paragraph rule above. Padding was placed on the bottom for space between other elements on the lists and on the left to create the indention. These may be adjusted as you wish. */
        }

        /* ~~ miscellaneous float/clear classes ~~ */
        .fltrt { /* this class can be used to float an element right in your page. The floated element must precede the element it should be next to on the page. */
            float: right;
            margin-left: 8px;
        }

        .fltlft { /* this class can be used to float an element left in your page. The floated element must precede the element it should be next to on the page. */
            float: left;
            margin-right: 8px;
        }

        .clearfloat { /* this class can be placed on a <br> or empty div as the final element following the last floated div (within the #container) if the overflow:hidden on the .container is removed */
            clear: both;
            height: 0;
            font-size: 1px;
            line-height: 0px;
        }

        .coder {
            margin: 10px;
            padding: 5px;
            border: 1px dashed #666;
            background-color: #ddd;
            font-family: "Courier New", Courier, monospace;
            font-size: 12px;
        }

        -->
    </style>
</head>

<body>

<div class="container">
    <div class="content">
        <img src="../assets/images/logo.png" align="baseline"><BR><strong>&nbsp;QRCode module</strong>
        <h1>Features</h1>
        <p>Currently the QRCode module allows for creations of the following QRCodes:
        <ul>
            <li>Visit a website</li>
            <li>Call a phonenumber</li>
            <li>Send a SMS to a cellphone</li>
            <li>Plain text</li>
            <li>Send an email</li>
            <li>Lookup GPS coordinates</li>
            <li>Create a business card</li>
        </ul>
        The implementation used for creating the QRCodes allows for 80% of all QRCode readers to understand the codes
        used.<BR><BR>
        <i>If your QRCode reader does not understand all the actions taken, try switching to another reader. We suggest
            the Quickmar QRCode reader. Available for various platforms. Link to their
            website <a href="http://2lk.nl/5p" target="_blank">here</a>.</i><BR><BR>
        </p>
        <h1>Instructions</h1>
        <p>To check if a person has the QRCode module installed use the following code (Thanks to Wishcraft!!):</p>
        <p class="coder">$moduleHandler = xoops_gethandler('module'); <br>
            $xoModule = $moduleHandler-&gt;getByDirname('qrcode'); <br>
            if (!is_object($xoModule)) { <br>
                 $GLOBALS['qrcode_module'] = false;  // Module Not Installed Code <br>
            } else { <br>
                 $GLOBALS['qrcode_module'] = $xoModule-&gt;getVar('isactive'); // Module Installed Code whether active or not
            <br>
            }</p>
        <p>With the global variable available you can now check if the QRCode module is installed and active.</p>
        <p>&nbsp;</p>
        <h2>Creating QRCodes</h2>
        <p>Now that you know if the QRCode module is installed you can start creating QRCodes.<br>
            The QRCode module returns the QRCode image.</p>
        <p>First include the module (after you've checked if it is installed)</p>
        <p class="coder">include_once XOOPS_ROOT_PATH.&quot;/modules/qrcode/qrcode.php&quot;;</p>
        <p>The function wants two variables :
        <ul>
            <li>$type [string]</li>
            <li>$data [array]</li>
            <li>$size [string]</li>
        </ul>
        Here's how to call the function with the various types available:
        </p>
        <p class="coder">//Visit website<br>
            $data = array();
            <br>
            $type = &quot;url&quot;;<br>
            $data['url']=&quot;http://www.designburo.nl&quot;;<br>
            $size=&quot;250&quot;; // image will be 250x250px
            <br>
            echo qrcode($type,$data,$size);
        </p>
        <p class="coder">//Call a phonenumber<br>
            $data = array();
            <br>
            $type = &quot;phone&quot;;<br>
            $data['phonenr']=&quot;+31162741021&quot;;<br>
            $size=&quot;250&quot;; // image will be 250x250px
            <br>
            echo qrcode($type,$data,$size);
        </p>
        <p class="coder">//Send SMS<br>
            $data = array();
            <br>
            $type = &quot;sms&quot;;<br>
            $data['phonenr']=&quot;put cellphonenumber here&quot;;<br>
            $data['txt']=&quot;Hi! I am sending you this sms message! Greetz&quot;; <br>
            $size=&quot;250&quot;; // image will be 250x250px
            <br>
            echo qrcode($type,$data,$size);
        </p>
        <p class="coder">//Plain text<br>
            $data = array();
            <br>
            $type = &quot;txt&quot;;<br>
            $data['txt']=&quot;Text that will be embeded in the QRCode&quot;; <br>
            echo qrcode($type,$data); // Note that no size is used. Then default size will be 250x250px.
        </p>
        <p class="coder">//Send an email<br>
            $data = array();
            <br>
            $type = &quot;email&quot;;<br>
            $data['email']=&quot;info@designburo.nl&quot;; // Send email to ?<br>
            $data['subject']=&quot;This is a test email&quot;; // Subject of the email<br>
            $data['txt']=&quot;Hi there! Just a quick test email to see if this is working!&quot;; // Body of the
            email<br>
            $size=&quot;250&quot;; // image will be 250x250px <br>
            echo qrcode($type,$data,$size);</p>
        <p class="coder">//Visit gps coordinates<br>
            $data = array();
            <br>
            $type = &quot;gps&quot;;<br>
            $data['lat']=&quot;<span jstcache="47" jscontent="latlng">51,647010</span>&quot;; // Latitude<br>
            $data['long']=&quot;<span jstcache="47" jscontent="latlng">4,829894</span>&quot;; // Longtitude<br>
            $size=&quot;250&quot;; // image will be 250x250px
            <br>
            echo qrcode($type,$data,$size);
        </p>
        <p class="coder">//Create a businesscard. When scanned the scanner will ask ifto add the contactinformation into
            your addressbook<br>
            $data = array();
            <br>
            $type = &quot;contact&quot;;<br>
            $data['surname']=&quot;<span jstcache="47" jscontent="latlng">Last name</span>&quot;; // Last name<br>
            $data['name']=&quot;<span jstcache="47" jscontent="latlng">First name</span>&quot;; // First name<br>
            $data['mobile']=&quot;<span jstcache="47" jscontent="latlng">Mobile number here</span>&quot;; // Cellphone
            number<br>
            $data['phonenr']=&quot;<span jstcache="47" jscontent="latlng">Phone number</span>&quot;; // Phone number<br>
            $data['adres']=&quot;<span jstcache="47" jscontent="latlng">Some street 5</span>&quot;; // Street +
            number<br>
            $data['state']=&quot;<span jstcache="47" jscontent="latlng">State</span>&quot;; // State<br>
            $data['city']=&quot;Oosterhout&quot;; // City<br>
            $data['zipcode']=&quot;<span jstcache="47" jscontent="latlng">1234 AA</span>&quot;; // Zipcode<br>
            $data['country']=&quot;the Netherlands&quot;; // Country<br>
            $data['email']=&quot;<span jstcache="47" jscontent="latlng">info@designburo.nl</span>&quot;; // emailaddress<br>
            $data['url']=&quot;<span jstcache="47" jscontent="latlng">http://www.designburo.nl</span>&quot;; //
            Website<br>
            $data['title']=&quot;<span jstcache="47" jscontent="latlng">General manager</span>&quot;; // title<br>
            $data['company']=&quot;<span jstcache="47" jscontent="latlng">Designburo.nl</span>&quot;; // company
            name<br>
            $data['b_year']=&quot;<span jstcache="47" jscontent="latlng">1971</span>&quot;; // birth year<br>
            $data['b_month']=&quot;<span jstcache="47" jscontent="latlng">08</span>&quot;; // birth month<br>
            $data['b_day']=&quot;<span jstcache="47" jscontent="latlng">01</span>&quot;; // birth day<br>
            $size=&quot;250&quot;; // image will be 250x250px
            <br>
            echo qrcode($type,$data,$size);
        </p>
    </div>
    <!-- end .container --></div>
</body>
</html>
