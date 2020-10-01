<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;


class Usuarios extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['login','senha'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;


    public function logaByUserSenha($usuario, $senha){
    	if (empty($usuario) or empty($senha)) {
    		return false;
    	}
    	$senha = sha1($senha);
    	$result = $this->where('login',$usuario)->where('senha',$senha)->first();
    	if (!empty($result)) {
    		unset($result['senha']);
    		$session = session();
    		$session->set(array('user'=>$result));
    		return true;
    	}
    	return false;
    }
}