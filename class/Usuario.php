<?php 

class Usuario{

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getId(){
		return $this->idusuario;
	}

	public function setId($value){
		$this->idusuario = $value;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}

	public function getdtCadastro(){
		return $this->dtcadastro;
	}

	public function setdtCadastro($value){
		$this->dtcadastro = $value;
	}

	public function loadById($idusuario){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(

			":ID"=>$idusuario
		));

		if(count($results) > 0) {

			$this->setData($results[0]);

		}

	}

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
	}

	public static function search($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(

			':SEARCH'=>"%".$login."%"
		));
	}

	public function login($login, $senha){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :SENHA", array(

			":LOGIN"=>$login,
			":SENHA"=>$senha
		));

		if(count($results) > 0) {

			$this->setData($results[0]);
			
		} else {
			
			throw new Exception('Login e/ou senha inválidos!');

		}

	}

	public function setData($data){

		$this->setId($data['idusuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setdtCadastro(new DateTime($data['dtcadastro']));
	}

	public function insert(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :SENHA)", array(
			':LOGIN'=>$this->getDeslogin(),
			':SENHA'=>$this->getDessenha()
		));

		if(count($results) > 0){

			$this->setData($results[0]);

		}
	}

	public function update($login, $senha){

		$this->setDeslogin($login);
		$this->setDessenha($senha);

		$sql = new Sql();

		$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :SENHA WHERE idusuario = :ID", array(

		':LOGIN'=>$this->getDeslogin(),
		':SENHA'=>$this->getDessenha(),
		':ID'=>$this->getId()
		));
	}

	public function delete(){

		$sql = new Sql();

		$sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
			':ID'=>$this->getId()
		));

		$this->setId(0);
		$this->setDeslogin("");
		$this->setDessenha("");
		$this->setdtCadastro(new DateTime());
	}

	public function __construct($login = "", $senha = ""){

		$this->setDeslogin($login);
		$this->setDessenha($senha);
	}

	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getId(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha()
		));
	}
}


 ?>