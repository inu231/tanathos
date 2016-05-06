<?php

namespace Modules\Admin\Business;

use App\Http\Requests;
use Illuminate\Http\Request;
use Mail;

class Emails
{

    public function sendMail(Request $request)
    {
            $order = 1;
            $email = $request->get('email');
            $name = $request->get('name');
            $subject = 'JT Soft';
            $message = $request->get('message');

            $data = [
                'email' => $email,
                'name' => $name,
                'subject' => $subject,
                'message' => $message,
            ];

            //$appEmail = 'felipe.inu@gmail.com';

            Mail::send('admin::admin.emails.answer', ['data' => $data], function ($message) use ($subject, $name, $email) {
                $message->to($email, $name)->subject($subject);
            });

            //return redirect('/contato')->with('msg' , 'Email enviado com sucesso!');
        }
    }
