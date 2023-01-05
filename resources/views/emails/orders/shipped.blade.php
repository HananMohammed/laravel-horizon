<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{__('Reset Password')}}</title>
</head>

<body>
<style>
    @font-face {
        font-family: 'Cairo';
        font-style: normal;
        font-weight: 400;
        src: url('{{asset('frontend/email-template/fonts/cairo-v4-latin-ext_latin_arabic-regular.eot')}}');
        /* IE9 Compat Modes */
        src: local('Cairo'), local('Cairo-Regular'),
        url('{{asset('frontend/email-template/fonts/cairo-v4-latin-ext_latin_arabic-regular.eot?#iefix')}}') format('embedded-opentype'),
            /* IE6-IE8 */
        url('{{asset('frontend/email-template/fonts/cairo-v4-latin-ext_latin_arabic-regular.woff2')}}') format('woff2'),
            /* Super Modern Browsers */
        url('{{asset('frontend/email-template/fonts/cairo-v4-latin-ext_latin_arabic-regular.woff')}}') format('woff'),
            /* Modern Browsers */
        url('{{asset('frontend/email-template/fonts/cairo-v4-latin-ext_latin_arabic-regular.ttf')}}') format('truetype'),
            /* Safari, Android, iOS */
        url('{{asset('frontend/email-template/fonts/cairo-v4-latin-ext_latin_arabic-regular.svg#Cairo')}}') format('svg');
        /* Legacy iOS */
    }

    body {
        font-family: 'Cairo', sans-serif;
    }

</style>
<table
    style="width:100%;padding: 30px 0;height:100%;background: #f5f5f5;color:#737373;font-size: 14px;line-height: 1.4rem;">
    <tbody>
    <tr>
        <td>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                }

            </style>
            <table id="main-wrapper"
                   style="width: 100%;max-width:600px;margin:0 auto;background: #fff;border-radius: 20px;border: 15px solid #EBBC6D;/*background: #093b56;background: #EBBC6D;*/border-left: 0;border-right: 0;">
                <tbody>
                <tr>
                    <td>
                        <table id="header"
                               style="width:calc( 100% - 40px);margin:0 20px;padding:20px 0;border-bottom: 2px solid #f5f5f5; @if(app()->getLocale() == 'ar') direction: rtl; @endif ">
                            <tbody>
                            <tr>
                                <td style='font-size: 20px;color:#000 '>
                                    <strong>{{__('Reset Password')}}</strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table id="main-content" style="width:calc( 100% - 40px);margin: 10px 10px 0;padding: 10px 10px 0;  @if(app()->getLocale() == 'ar') direction: rtl; @endif ">
                            <tbody>
                            <tr class="main-content-container">
                                <td>
                                    <h4 style="margin-bottom: 5px; font-size: 15px; @if(app()->getLocale() == 'ar') direction: rtl; @endif ">{{__('dear')}} Hanan</h4>
                                    <div style=" margin-bottom:20px; @if(app()->getLocale() == 'ar') direction: rtl; @endif">
                                        {{ __('You have requested to test Email Queues') }}
                                        {{ __(' We please    We please    We please    We please    We please    We please    We please   ') }}
                                    </div>
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

</body>

</html>
