<!DOCTYPE html>
<html lang="en">

<!-- Define Charset -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<!-- Responsive Meta Tag -->
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">

<title>Welcome to Meeza</title>

<!-- Responsive and Valid Styles -->

<style type="text/css">

    body {
        width: 100%;
        background-color: #F1F2F7;
        margin: 0;
        padding: 0;
        -webkit-font-smoothing: antialiased;
        font-family: arial;
    }

    html {
        width: 100%;
    }

    table {
        font-size: 14px;
        border: 0;
    }

    /* ----------- responsive ----------- */
    @media only screen and (max-width: 640px) {

        /*------ top header ------ */
        .header-bg {
            width: 440px !important;
            height: 10px !important;
        }

        .main-header {
            line-height: 28px !important;
        }

        .main-subheader {
            line-height: 28px !important;
        }

        .container {
            width: 440px !important;
        }

        .container-middle {
            width: 420px !important;
        }

        .mainContent {
            width: 400px !important;
        }

        .main-image {
            width: 400px !important;
            height: auto !important;
        }

        .banner {
            width: 400px !important;
            height: auto !important;
        }

        /*------ sections ---------*/
        .section-item {
            width: 400px !important;
        }

        .section-img {
            width: 400px !important;
            height: auto !important;
        }

        /*------- prefooter ------*/
        .prefooter-header {
            padding: 0 10px !important;
            line-height: 24px !important;
        }

        .prefooter-subheader {
            padding: 0 10px !important;
            line-height: 24px !important;
        }

        /*------- footer ------*/
        .top-bottom-bg {
            width: 420px !important;
            height: auto !important;
        }

    }

    @media only screen and (max-width: 479px) {

        /*------ top header ------ */
        .header-bg {
            width: 280px !important;
            height: 10px !important;
        }

        .top-header-left {
            width: 260px !important;
            text-align: center !important;
        }

        .top-header-right {
            width: 260px !important;
        }

        .main-header {
            line-height: 28px !important;
            text-align: center !important;
        }

        .main-subheader {
            line-height: 28px !important;
            text-align: center !important;
        }

        /*------- header ----------*/
        .logo {
            width: 260px !important;
        }

        .nav {
            width: 260px !important;
        }

        .container {
            width: 280px !important;
        }

        .container-middle {
            width: 260px !important;
        }

        .mainContent {
            width: 240px !important;
        }

        .main-image {
            width: 240px !important;
            height: auto !important;
        }

        .banner {
            width: 240px !important;
            height: auto !important;
        }

        /*------ sections ---------*/
        .section-item {
            width: 240px !important;
        }

        .section-img {
            width: 240px !important;
            height: auto !important;
        }

        /*------- prefooter ------*/
        .prefooter-header {
            padding: 0 10px !important;
            line-height: 28px !important;
        }

        .prefooter-subheader {
            padding: 0 10px !important;
            line-height: 28px !important;
        }

        /*------- footer ------*/
        .top-bottom-bg {
            width: 260px !important;
            height: auto !important;
        }

    }


</style>

<style type="text/css" charset="utf-8">

    /** reset styling **/

    .firebugResetStyles {

        z-index: 2147483646 !important;

        top: 0 !important;

        left: 0 !important;

        display: block !important;

        border: 0 none !important;

        margin: 0 !important;

        padding: 0 !important;

        outline: 0 !important;

        min-width: 0 !important;

        max-width: none !important;

        min-height: 0 !important;

        max-height: none !important;

        position: fixed !important;

        transform: rotate(0deg) !important;

        transform-origin: 50% 50% !important;

        border-radius: 0 !important;

        box-shadow: none !important;

        background: transparent none !important;

        pointer-events: none !important;

        white-space: normal !important;

    }

    .firebugBlockBackgroundColor {

        background-color: transparent !important;

    }

    .firebugResetStyles:before, .firebugResetStyles:after {

        content: "" !important;

    }

    /**actual styling to be modified by firebug theme**/

    .firebugCanvas {

        display: none !important;

    }

    /* ------------------------- */

    .firebugLayoutBox {

        width: auto !important;

        position: static !important;

    }

    .firebugLayoutBoxOffset {

        opacity: 0.8 !important;

        position: fixed !important;

    }

    .firebugLayoutLine {

        opacity: 0.4 !important;

        background-color: #000000 !important;

    }

    .firebugLayoutLineLeft, .firebugLayoutLineRight {

        width: 1px !important;

        height: 100% !important;

    }

    .firebugLayoutLineTop, .firebugLayoutLineBottom {

        width: 100% !important;

        height: 1px !important;

    }

    .firebugLayoutLineTop {

        margin-top: -1px !important;

        border-top: 1px solid #999999 !important;

    }

    .firebugLayoutLineRight {

        border-right: 1px solid #999999 !important;

    }

    .firebugLayoutLineBottom {

        border-bottom: 1px solid #999999 !important;

    }

    .firebugLayoutLineLeft {

        margin-left: -1px !important;

        border-left: 1px solid #999999 !important;

    }

    /* ----------------- */

    .firebugLayoutBoxParent {

        border-top: 0 none !important;

        border-right: 1px dashed #dc217e !important;

        border-bottom: 1px dashed #dc217e !important;

        border-left: 0 none !important;

        position: fixed !important;

        width: auto !important;

    }

    .firebugRuler {

        position: absolute !important;

    }

    .firebugRulerH {

        top: -15px !important;

        left: 0 !important;

        width: 100% !important;

        height: 14px !important;

        border-top: 1px solid #BBBBBB !important;

        border-right: 1px dashed #BBBBBB !important;

        border-bottom: 1px solid #000000 !important;

    }

    .firebugRulerV {

        top: 0 !important;

        left: -15px !important;

        width: 14px !important;

        height: 100% !important;

        border-left: 1px solid #BBBBBB !important;

        border-right: 1px solid #000000 !important;

        border-bottom: 1px dashed #BBBBBB !important;

    }

    .overflowRulerX > .firebugRulerV {

        left: 0 !important;

    }

    .overflowRulerY > .firebugRulerH {

        top: 0 !important;

    }

    /* --------------------------------- */

    .fbProxyElement {

        position: fixed !important;

        pointer-events: auto !important;

    }

</style>

</head>


<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0" bgcolor="#f0f8ff">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
    <tr>
        <td height="30"></td>
    </tr>
    <tr bgcolor="#F1F2F7">
        <td align="center" bgcolor="#F1F2F7" valign="top" width="100%">

            <!--  top header -->
            <table class="container" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                <tbody>
                <tr bgcolor="#d454a8">
                    <td height="15"></td>
                </tr>

                <tr bgcolor="#d454a8">
                    <td align="center">
                        <table class="container-middle" align="center" border="0" cellpadding="5" cellspacing="0"
                               width="860">
                            <tbody>
                            <tr>
                                <td>
                                    <table class="top-header-left" align="left" border="0" cellpadding="0"
                                           cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td align="center">
                                                <table class="date" border="0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <img style="display: block;"
                                                                 src="{{Request::root()}}/backend/img/logo.png"
                                                                 alt="logo" width="13">
                                                        </td>
                                                        <td>&nbsp;&nbsp;</td>
                                                        <td style="color: #fefefe; font-size: 11px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                                            <b>
                                                                <singleline>
                                                                    {{$title}}
                                                                </singleline>
                                                            </b>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table class="top-header-right" align="left" border="0" cellpadding="0"
                                           cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="20" width="30"></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table class="top-header-right" align="right" border="0" cellpadding="0"
                                           cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td align="center">
                                                <table class="tel" align="center" border="0" cellpadding="0"
                                                       cellspacing="0">
                                                    <tbody>
                                                    <tr>

                                                        <td style="color: #fefefe; font-size: 11px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                                            <b>
                                                                <singleline>
                                                                    {{date('D d F,Y')}}
                                                                </singleline>
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr bgcolor="#d454a8">
                    <td height="10"></td>
                </tr>

                </tbody>
            </table>

            <!--  end top header  -->


            <!-- main content -->
            <table class="container" align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                   bgcolor="ffffff">


                <!--Header-->
                <tbody>
                <tr>
                    <td height="40"></td>
                </tr>

                <!--<tr>
                    <td>
                        <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0"
                               width="860">
                            <tbody>
                            <tr>
                                <td>
                                    <table class="logo" align="center" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td align="center">
                                                <a href="" style="display: block;">
                                                    <img style="display: block;" src="{//{Request::root()}}/images/logo.png" alt="logo" width="150"></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>-->
                <tr>
                    <td height="7"></td>
                </tr>

                <!--<tr>
                    <td align="center"><img style="display: block;" class="main-image"
                                            src="{//{Request::root()}}/img/email-img/sbd-email.png" alt="large image"
                                            height="auto" width="800"></td>
                </tr>-->

                <tr>
                    <td height="20"></td>
                </tr>

                <tr>
                    <td height="40"></td>
                </tr>
                <!-- end header -->

                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <p>
                                        Dear Member<br/><br/>

                                        Password Reset link <br/>
                                        please follow to reset password<br/>
                                        <a href="http://test.meeza-backend.com/password/reset/{{$token}}">here</a><br/>
                                    </p>



                                </td>
                            </tr>


                        </table>
                    </td>

                </tr>


                <tr>
                    <td height="35"></td>
                </tr>


                <!--section 1 -->
                <tr>
                    <td>
                        <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0"
                               width="860">
                            <tr>
                                <td>
                                    <table class="mainContent" align="center" border="0" cellpadding="0" cellspacing="0"
                                           width="528">
                                        <tbody>
                                        <tr>
                                            <td height="20"></td>
                                        </tr>


                                    </table>
                                </td>
                            </tr>
                            <!-- end section 1-->


                            <!-- prefooter -->

                            <tr>
                                <td>
                                    <table class="container-middle" align="center" border="0" cellpadding="0"
                                           cellspacing="0" width="860">
                                        <tbody>
                                        <tr>
                                            <td>


                                                <table class="nav" align="center" border="0" cellpadding="0"
                                                       cellspacing="0">
                                                    <tbody>
                                                    <tr>
                                                        <td height="10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 13px; font-family: Helvetica, Arial, sans-serif;"
                                                            align="center">
                                                            <table align="center" border="0" cellpadding="0"
                                                                   cellspacing="0">
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                    </td>
                                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                                    <td>
                                                                        <a style="display: block; width: 16px;"
                                                                           href="https://www.youtube.com/"><img
                                                                                    style="display: block;"
                                                                                    src="{{Request::root()}}/img/email-img/social-youtube.png"
                                                                                    alt="youtube" width="16"></a>
                                                                    </td>
                                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                                    <td>
                                                                        <a style="display: block; width: 16px;"
                                                                           href="https://www.facebook.com/"><img
                                                                                    style="display: block;"
                                                                                    src="{{Request::root()}}/img/email-img/social-facebook.png"
                                                                                    alt="facebook" width="16"></a>
                                                                    </td>
                                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                                    <td>
                                                                        <a style="display: block; width: 16px;"
                                                                           href="https://twitter.com/"><img
                                                                                    style="display: block;"
                                                                                    src="{{Request::root()}}/img/email-img/social-twitter.png"
                                                                                    alt="twitter" width="16"></a>
                                                                    </td>
                                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                                    <td>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <!-- end prefooter  -->


                            <tr>
                                <td style="color: #939393; font-size: 11px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;"
                                    class="prefooter-header" align="center">

                                </td>
                            </tr>

                            <tr>
                                <td height="30"></td>
                            </tr>

                            <!--<tr>
                                <td style="color: #939393; font-size: 11px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;"
                                    class="prefooter-subheader" align="center">

                                    <span style="color: #d454a8">Adress :</span> 361 ElHorreya Road ,Sedi Gaber &nbsp;&nbsp;&nbsp;
                                    <span style="color: #d454a8">Phone :</span> +20-128-168-5995 &nbsp;&nbsp;&nbsp;
                                    <span style="color: #d454a8">Email :</span> sales@sbd-egypt.com


                                </td>
                            </tr>-->

                            <tr>
                                <td height="30"></td>
                            </tr>
                        </table>
                </tbody>
            </table>

            <!--end main Content -->


            <!-- footer -->
            <table class="container" border="0" cellpadding="0" cellspacing="0" width="860">
                <tbody>
                <tr bgcolor="#d454a8">
                    <td height="15"></td>
                </tr>
                <tr bgcolor="#d454a8">
                    <td style="color: #fff; font-size: 10px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;"
                        align="center">

                        <a href="http://www.meeza.com" target="_blank"> Meeza </a>
                        © Copyright {{date('Y')}} . All Rights Reserved

                    </td>
                </tr>

                <tr>
                    <td bgcolor="#d454a8" height="14"></td>
                </tr>
                </tbody>
            </table>
            <!-- end footer-->
        </td>
    </tr>

    <tr>
        <td height="30"></td>
    </tr>

    </tbody>
</table>


</body>
</html>
