@component('mail::table')
<table width="600" align="center" cellpadding="0" cellspacing="0"
        style="border-spacing: 0; border-collapse: 0; border: 0; margin: 0 auto; display: block; padding-top:30px; margin-bottom: 50px; color: #005899;">
        <tr>
            <td colspan="2" style="padding: 10px; background: #ffffff; text-align: center">
                <img src="{{ asset('assets/images/logo.jpg') }}"
                    alt="" style="width: 100px;">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                    style="border-spacing: 0; border-collapse: collapse; border: 0; margin: 0 auto; display: block; width: 100%;">
                    <tr style="border: 1px solid #005899">
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px; font-size: 14px;">
                            <strong>PRIVATE SERVICE</strong></td>
                        <td colspan="3"
                            style="width: 450px; border: 1px solid #005899;  padding: 5px; font-size: 16px; text-align: center;">
                            <strong>'.$message_t.' TRANSFER VOUCHER '.$voucher.'</strong>
                        </td>
                    </tr>
                    <tr style="border: 1px solid #005899">
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Name</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">'.$fullname.'</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Arrival Date</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">'.
                            date('m/d/Y', strtotime($request['_arrival_date'])). " ".
                            date('h:i a', strtotime($request['_arrival_time'])).'
                        </td>
                    </tr>
                    <tr style="border: 1px solid #005899">
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Email</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">
                            '.$request['_contact_email'].'</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Phone number</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">
                            '.$request['_contact_phone'].'</td>
                    </tr>
                    <tr style="border: 1px solid #005899">
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Hotel</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">'.$location_start.'</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Passengers</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">'.$request['_passengers'].'
                        </td>
                    </tr>
                    <tr style="border: 1px solid #005899">
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Arrival Flight</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">'.
                            $request['_arrival_company']." ".$request['_arrival_flight'].
                            '</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Vehicle</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">'.$unit->name.'</td>
                    </tr>
                    <tr style="border: 1px solid #005899">
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Total</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">$ '.$request['_total'].' usd
                        </td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Pay method</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">
                            '.ucfirst($request['pay_method']).'</td>
                    </tr>
                    <tr style="border: 1px solid #005899">
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Comments</td>
                        <td colspan="3" style="width: 450px; border: 1px solid #005899; padding: 5px;">'.
                            $request['_contact_request'].
                            '</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <br><br>
                <p style="text-align: center; color: #005899; font-size: 16px;">Dear client Once you have collected your
                    bags and cleared customs, please proceed to exit sliding doors. It is very important to note that
                    you must proceed all the way outside without stopping inside the terminal.</p>
                <p style="text-align: center; color: #005899; font-size: 16px;">Sales representatives within the
                    terminal are extremely creative and persistent in their techniques and should be avoided if you are
                    not interested in purchasing their products and services.
                </p>
                <p style="text-align: center; color: #005899; font-size: 16px;">Outside the terminal, waiting staff will
                    be standing canopy number 3 with a sign with <span style="color: #ec7728; font-weight: bold;">YOUR
                        NAME</span> on it to provide proper meet and greet service, and to direct you to your transfer
                    vehicle.</p>
                <p style="text-align: center; color: #005899; font-size: 16px;">
                    <strong>For any changes, please advise at least 24 hours before at 52 1 (624) 229 38 91 or email us
                        at aonecabo@gmail.com</strong>
                </p>
                <br><br>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="background: #ffffff; color: #a4a7ac; padding: 30px; text-align: center;">
                <p>&copy;2019 A One Cabo Deluxe Transportation. All Rights Reserved.</p>
                <p>Office +52 1 (624) 355 29 38 - Mobile +52 1 (624) 229 38 91</p>
            </td>
        </tr>
    </table>

@endcomponent

    {{-- <table width="600" align="center" cellpadding="0" cellspacing="0"
        style="border-spacing: 0; border-collapse: 0; border: 0; margin: 0 auto; display: block; padding-top:30px; margin-bottom: 50px; color: #005899;">
        <tr>
            <td colspan="2" style="padding: 10px; background: #ffffff; text-align: center">
                <img src="http://www.aonecabodeluxetransportation.com/wp-content/uploads/2017/11/cropped-logo.png"
                    alt="" style="width: 100px;">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                    style="border-spacing: 0; border-collapse: collapse; border: 0; margin: 0 auto; display: block; width: 100%;">
                    <tr style="border: 1px solid #005899">
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px; font-size: 14px;">
                            <strong>PRIVATE SERVICE</strong></td>
                        <td colspan="3"
                            style="width: 450px; border: 1px solid #005899;  padding: 5px; font-size: 16px; text-align: center;">
                            <strong>'.$message_t.' TRANSFER VOUCHER '.$voucher.'</strong>
                        </td>
                    </tr>
                    <tr style="border: 1px solid #005899">
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Name</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">'.$fullname.'</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Arrival Date</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">'.
                            date('m/d/Y', strtotime($request['_arrival_date'])). " ".
                            date('h:i a', strtotime($request['_arrival_time'])).'
                        </td>
                    </tr>
                    <tr style="border: 1px solid #005899">
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Email</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">
                            '.$request['_contact_email'].'</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Phone number</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">
                            '.$request['_contact_phone'].'</td>
                    </tr>
                    <tr style="border: 1px solid #005899">
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Hotel</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">'.$location_start.'</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Passengers</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">'.$request['_passengers'].'
                        </td>
                    </tr>
                    <tr style="border: 1px solid #005899">
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Arrival Flight</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">'.
                            $request['_arrival_company']." ".$request['_arrival_flight'].
                            '</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Vehicle</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">'.$unit->name.'</td>
                    </tr>
                    <tr style="border: 1px solid #005899">
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Total</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">$ '.$request['_total'].' usd
                        </td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Pay method</td>
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">
                            '.ucfirst($request['pay_method']).'</td>
                    </tr>
                    <tr style="border: 1px solid #005899">
                        <td style="width: 149px; border: 1px solid #005899; padding: 5px;">Comments</td>
                        <td colspan="3" style="width: 450px; border: 1px solid #005899; padding: 5px;">'.
                            $request['_contact_request'].
                            '</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <br><br>
                <p style="text-align: center; color: #005899; font-size: 16px;">Dear client Once you have collected your
                    bags and cleared customs, please proceed to exit sliding doors. It is very important to note that
                    you must proceed all the way outside without stopping inside the terminal.</p>
                <p style="text-align: center; color: #005899; font-size: 16px;">Sales representatives within the
                    terminal are extremely creative and persistent in their techniques and should be avoided if you are
                    not interested in purchasing their products and services.
                </p>
                <p style="text-align: center; color: #005899; font-size: 16px;">Outside the terminal, waiting staff will
                    be standing canopy number 3 with a sign with <span style="color: #ec7728; font-weight: bold;">YOUR
                        NAME</span> on it to provide proper meet and greet service, and to direct you to your transfer
                    vehicle.</p>
                <p style="text-align: center; color: #005899; font-size: 16px;">
                    <strong>For any changes, please advise at least 24 hours before at 52 1 (624) 229 38 91 or email us
                        at aonecabo@gmail.com</strong>
                </p>
                <br><br>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="background: #ffffff; color: #a4a7ac; padding: 30px; text-align: center;">
                <p>&copy;2019 A One Cabo Deluxe Transportation. All Rights Reserved.</p>
                <p>Office +52 1 (624) 355 29 38 - Mobile +52 1 (624) 229 38 91</p>
            </td>
        </tr>
    </table> --}}

