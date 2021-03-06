<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Neopolitan Confirm Email</title>
    <!-- Designed by https://github.com/kaytcat -->
    <!-- Robot header image designed by Freepik.com -->

    <style type="text/css">
        @import url(http://fonts.googleapis.com/css?family=Droid+Sans);

        /* Take care of image borders and formatting */

        img {
            max-width: 600px;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a {
            text-decoration: none;
            border: 0;
            outline: none;
            color: #bbbbbb;
        }

        a img {
            border: none;
        }

        /* General styling */

        td, h1, h2, h3  {
            font-family: Helvetica, Arial, sans-serif;
            font-weight: 400;
        }

        td {
            text-align: center;
        }

        body {
            -webkit-font-smoothing:antialiased;
            -webkit-text-size-adjust:none;
            width: 100%;
            height: 100%;
            color: #37302d;
            background: #ffffff;
            font-size: 16px;
        }

        table {
            border-collapse: collapse !important;
        }

        .headline {
            color: #ffffff;
            font-size: 36px;
        }

        .force-full-width {
            width: 100% !important;
        }

        .force-width-80 {
            width: 80% !important;
        }




    </style>

    <style type="text/css" media="screen">
        @media screen {
            /*Thanks Outlook 2013! http://goo.gl/XLxpyl*/
            td, h1, h2, h3 {
                font-family: 'Droid Sans', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
            }
        }
    </style>

    <style type="text/css" media="only screen and (max-width: 480px)">
        /* Mobile styles */
        @media only screen and (max-width: 480px) {

            table[class="w320"] {
                width: 320px !important;
            }

            td[class="mobile-block"] {
                width: 100% !important;
                display: block !important;
            }


        }
    </style>
</head>
<body class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff">
<table align="center" cellpadding="0" cellspacing="0" class="force-full-width" height="100%" >
    <tr>
        <td align="center" valign="top" bgcolor="#ffffff"  width="100%">
            <center>
                <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="600" class="w320">
                    <tr>
                        <td align="center" valign="top">

                            <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" class="force-full-width" style="margin:0 auto;">
                                <tr>
                                    <a href="http://thecompete.com/">
                                        <td style="font-size: 30px; text-align:center;">
                                            <br>
                                            thecompete.com
                                            <br>
                                            <br>
                                        </td>
                                    </a>
                                </tr>
                            </table>

                            <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" class="force-full-width" bgcolor="#4dbfbf">
                                <tr>
                                    <td class="headline">
                                        Ur entry pass
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <center>
                                            <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="60%">
                                                <tr>
                                                    <td style="color:#187272;">
                                                        <br>
                                                        <p><Strong>Name: </Strong>{{$eventName}}</p>
                                                        <p><Strong>Organiser: </Strong>{{$organiser}}</p>
                                                        <p><Strong>Date: </Strong>{{$date}}</p>
                                                        <p><Strong>Address: </Strong>{{$address}}</p>
                                                        <p><Strong>Fees: </Strong>{{$fees}}</p>
                                                        @if(!empty($first)||!empty($second)||!empty($third))
                                                            <p><strong>Prizes: </strong></p>
                                                        @endif
                                                        @if(!empty($first))
                                                            <p class="col-sm-4"><strong>2st: </strong>{{$first}}</p>
                                                        @endif
                                                        @if(!empty($second))
                                                            <p class="col-sm-4"><strong>2st: </strong>{{$second}}</p>
                                                        @endif
                                                        @if(!empty($third))
                                                            <p class="col-sm-4"><strong>3st: </strong>{{$third}}</p>
                                                        @endif

                                                        <p><Strong>contact: </Strong>{{$contactNumber}}</p>
                                                        <br>

                                                        <br>
                                                    </td>
                                                </tr>
                                            </table>
                                        </center>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div><!--[if mso]>
                                            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="8%" stroke="f" fillcolor="#178f8f">
                                                <w:anchorlock/>
                                                <center>
                                            <![endif]-->
                                            <!--[if mso]>
                                            </center>
                                            </v:roundrect>
                                            <![endif]--></div>
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                            </table>

                            <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" class="force-full-width" bgcolor="#f5774e">
                                <tr>
                                    <td style="background-color:#f5774e;">

                                        <center>
                                            <table style="margin:0 auto;" cellspacing="0" cellpadding="0" class="force-width-80">
                                                <tr>
                                                    <td style="text-align:left; color:#933f24">
                                                        <br>
                                                        <br>
                                                        <p><strong>Name: </strong>{{$name}}</p>
                                                        <p><strong>Email: </strong>{{$email}}</p>
                                                        <p><strong>College Name: </strong>{{$clgName}}</p>
                                                        <p><strong>Contact: </strong>{{$contact}}</p>


                                                        <br>
                                                        <hr>
                                                        <p><strong>Note: </strong>you have to pay when you are going to an event</p>

                                                    </td>

                                                </tr>
                                            </table>

                                            <table style="margin: 0 auto;" cellspacing="0" cellpadding="0" class="force-width-80">
                                                <tr>
                                                    <td style="text-align:left; color:#933f24;">
                                                        <br>
                                                        Thank you for your business. Please <a style="color:#ffffff;" href="#">contact us</a> with any questions regarding website.
                                                        <br>
                                                        <br>
                                                        thecompete
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </td>
                                                </tr>
                                            </table>
                                        </center>



                                    </td>
                                </tr>


                            </table>

                            <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" class="force-full-width" bgcolor="#414141" style="margin: 0 auto">
                                <tr>
                                    <td style="background-color:#414141;">
                                        <br>
                                        <br>
                                        <a href="https://www.facebook.com/thecompete1/"><img src="https://www.filepicker.io/api/file/cvmSPOdlRaWQZnKFnBGt" alt="facebook"></a>
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color:#bbbbbb; font-size:12px;">
                                        A Atharv Bhute production
                                        <br>
                                        thecompete © 2017
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
</table>
</body>
</html>