<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class Pacientes extends Model
{
    protected $table      = 'pacientes';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    public $allowedFields = ['nome','idade','telefone','matricula'];

    protected $useTimestamps = false;

    public $validationRules    = [
    	'id' => 'required|numeric',
    	'nome' => 'required',
    	'idade' => 'required|numeric',
    	'telefone' => 'required',
    	'matricula' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = true;


    public function listAll(){
    	return $this->findAll();
    }

    public function getById($id = 0){
    	if ($id==0) {
    		return null;
    	}
    	return $this->where('id',$id)->first();
    }

    public function deleteById($id = 0){
    	if ($id==0) {
    		return false;
    	}
    	return $this->delete(['id' => $id]);;
    }

    public function salvar($data){
    	$id = $data['id'];
    	unset($data['id']);
    	if ($id==0) {
    		if ($this->insert($data,true)) {
    			$id = $this->insertID(); 
    		}
    	} else {
			$this->update($id,$data);
    	}
    	return $id;
    }

    public function importacao($file){
    	$content = file_get_contents($file);
    	$linhas = explode(PHP_EOL, $content);
		if (!is_array($linhas)){
			return false;
		}
		$i = 0;
		foreach ($linhas as $l) {
			$campos = explode("\t", $l);
			$data = [
		        'nome' => $campos[0],
		        'idade'  => $campos[1],
		        'telefone'  => $campos[2],
		        'matricula'  => $campos[3],
			];

			$this->insert($data);
			$i++;
		}
		if ($i==0) {
			return false;
		}
		return $i;
    }
}