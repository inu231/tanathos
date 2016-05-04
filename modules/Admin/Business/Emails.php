<?php

namespace Modules\Admin\Business;

use App\Http\Requests;
use Illuminate\Http\Request;
use Mail;

class Emails
{

    public function sendMail(array $data)
    {
            $order = 1;
            $email = $request->get('email');
            $name = $request->get('name');
            $subject = $request->get('subject');
            $message = $request->get('message');

            $data = [
                'order' => $order,
                'email' => $email,
                'name' => $name,
                'subject' => $subject,
                'message' => $message,
            ];

            $appEmail = 'jtsoft.inc@gmail.com';

            Mail::send('pages.emails.sendmail', ['data' => $data], function ($message) use ($appEmail, $subject, $name, $order,  $email) {
                $message->to($appEmail, $name)->subject($subject);
            });

            return redirect('/contato')->with('msg' , 'Email enviado com sucesso!');
        }
    }
