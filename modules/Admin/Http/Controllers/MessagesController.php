<?php namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Admin\Entities\Message;
use Modules\Admin\Business\Emails;
use Illuminate\Http\Request;
use App\User;
use Validator;
use DateTime;

class MessagesController extends Controller {

	public function index()
	{
		$messages = Message::whereRaw("id > 0")->orderBy('id', 'asc')->paginate(30);
		return view('admin::messages.message', ['messages' => $messages]);
	}

	public function getMessage($id)
	{
			$message = Message::find($id);

			if($message)
			{
					return $message;
			} else
			{
					return "Erro, mensagem não encontrada";
			}
	}

	public function sendMail(Request $request)
	{
			$body = $request->get('body');
			$email = $request->get('email');
			
			$mail = new Emails();

			$mail->sendMail($request);
	}

}
