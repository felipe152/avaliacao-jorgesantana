<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\Files\UploadedFile;

class Paciente extends Controller
{
	public function index()
	{
		$pacienteModel = new \App\Models\Pacientes();
		$lista = $pacienteModel->listAll();
		
		return view('lista', array('lista' => $lista));
	}

	public function registro($id = 0){
		helper('form');
		$msg = '';
		$reg = null;
		$pacienteModel = new \App\Models\Pacientes();

		//Salvar
		if ($this->request->getMethod() == 'post') {
			if ($this->validate($pacienteModel->validationRules)) {
				unset($_POST['mysubmit']);
				$id = $pacienteModel->salvar($_POST);
				$msg = 'Paciente salvo com sucesso';
			} else {
				$msg = 'Dados inválidos, verifique os campos digitados';
			}
		}
		$reg = $pacienteModel->getById($id);
		if ($reg===null) {
			foreach ($pacienteModel->allowedFields as $value) {
				$reg[$value] = '';
			}
			$reg['id'] = '0';
			$msg = 'Preencha os campos para inserir um novo paciente.';
		}
		return view('paciente', array('reg' => $reg, 'msg' => $msg));
	}

	public function deletar($id = 0){
		$pacienteModel = new \App\Models\Pacientes();
		$pacienteModel->deleteById($id);
		return redirect('pacientes');
	}

	public function impotacao()
	{
		$msg = '';
		if (!is_null($this->request->getFile('arquivo'))) {
			$file = $this->request->getFile('arquivo');
			if (! $file->isValid() ){
				$msg = 'Erro: '.$file->getErrorString();
			} else{
				$ext = $file->getClientExtension();
				if ($ext != 'txt') {
					$msg = 'Arquivo não permitido. Utilize TXT.';
				} else {
					$newName = $file->getRandomName();
					$file->move(WRITEPATH.'uploads', $newName);
					if ($file->hasMoved()) {
						$msg = 'Upload feito com sucesso!';
						$pacienteModel = new \App\Models\Pacientes();
						$import = $pacienteModel->importacao(WRITEPATH.'uploads\\'.$newName);
						if ($import===false) {
							$msg = '<br /> Não foi possível inserir os dados, verifique seu arquivo.';
						}
						$msg = '<br /> '.$import.' Registros importados.';
					}
				}
			}
		}

		return view('impotacao',array('msg' => $msg));
	}

}