<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\IncomingRequest;


class Login extends Controller
{
	public function index(){
		$request = service('request');
		$msg = '';
		if (isset($_POST)) {
			$usuario = $request->getPost('usuario');
			$senha = $request->getPost('senha');
			$userModel = new \App\Models\Usuarios();
			
			$go = $userModel->logaByUserSenha($usuario,$senha);
			if ($go) {
				return redirect()->route('pacientes');
			} else{
				$msg = 'Usuário ou senha inválidos.';
			}
		}

		echo view('login',array('msg' => $msg));
	}

	public function logout(){
		$session = session();
		$session->destroy();
		return redirect('login');
	}
}
