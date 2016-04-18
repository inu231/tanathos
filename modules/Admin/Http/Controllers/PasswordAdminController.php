<?php namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Admin;
use Illuminate\Support\Str;


class PasswordAdminController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
			$this->middleware('guest');
	}


	public function resetInit(Request $request)
	{
			$this->validate(
					$request,
					$this->getResetValidationRules(),
					$this->getResetValidationMessages(),
					$this->getResetValidationCustomAttributes()
			);

			$credentials = $request->only(
					'email', 'password', 'password_confirmation', 'token'
			);

			$broker = $this->getBroker();
			$email = $credentials['email'];
			$password = $credentials['password'];
			$admin = Admin::where(['email' => $email])->first();

			if ($admin)
			{
					$this->resetAdminPassword($admin, $password);
					return redirect('/admin/login')->with('msg', 'Senha atualizada com sucesso!');
			} else {
					return redirect('/admin/login')->with('error-msg', 'Não foi possível completar a operação. O usuário informado é inválido.');
			}

	}


	protected function resetAdminPassword($admin, $password)
	{
			$admin->forceFill([
					'password' => bcrypt($password),
					'remember_token' => Str::random(60),
			])->save();
	}


	public function getReset(Request $request, $token = null)
	{
			return $this->showResetForm($request, $token);
	}

	public function showResetForm(Request $request, $token = null)
	{
		 if (is_null($token)) {
					return $this->getEmail();
			}

			$email = $request->input('email');


			if (property_exists($this, 'resetView')) {
					return view($this->resetView)->with(compact('token', 'email'));
			}

			if (view()->exists('admin::admin.passwords.reset')) {
					return view('admin::admin.passwords.reset')->with(compact('token', 'email'));
			}

			return view('admin::admin.reset')->with(compact('token', 'email'));
	}

	public function showLinkRequestForm()
	{
			if (property_exists($this, 'linkRequestView')) {
					return view($this->linkRequestView);
			}

			if (view()->exists('admin::admin.passwords.email')) {
					return view('admin::admin.passwords.email');
			}

			return view('admin::admin.password');
	}


}
