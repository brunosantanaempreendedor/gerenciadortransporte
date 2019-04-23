<?php 

require_once 'db.php';

class usuarios extends db {

	protected $tabela = 'usuarios';


	public function findAll() {
			$sql = "SELECT * FROM $this->tabela";
			$stm = db::prepare($sql);
			$stm->execute();
			return $stm->fetchAll();
		}

	public function find(){
		$sql  = "SELECT * FROM $this->tabela LIMIT 1";
		$stmt = db::prepare($sql);
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return $stmt->fetch();
	}

	
	public function getID($id)
		{
			$sql = "SELECT * FROM $this->tabela WHERE user_id=:id";
			$stmt = db::prepare($sql);
			$stmt->execute(array(":id"=>$id));
			$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
			return $editRow;
		}

	
	public function delID($id)
		{
			$sql = "DELETE FROM $this->tabela WHERE user_id=:id";
			$stmt = db::prepare($sql);
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			return true;
		}


	public function cadastro($codigo,$nome,$usuario,$cargo,$email,$pass,$nivel,$data_atual)
	{
		try
		{
			$new_password = password_hash($pass, PASSWORD_DEFAULT);

			$sql = "INSERT INTO $this->tabela (user_codigo,user_name,user_usuario,user_cargo,user_email,user_pass,user_nivel,user_date) VALUES(:codigo, :nome, :usuario, :cargo, :email, :pass, :nivel, :data_atual)";
			$stmt = db::prepare($sql);
			$stmt->bindparam(":codigo",$codigo);
			$stmt->bindparam(":nome",$nome);
			$stmt->bindparam(":usuario",$usuario);
			$stmt->bindparam(":cargo",$cargo);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":pass",$new_password);
			$stmt->bindparam(":nivel",$nivel);
			$stmt->bindparam(":data_atual",$data_atual);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}		

	public function resetar($senha,$codigo)
	{
		try
		{
			$new_password = password_hash($senha, PASSWORD_DEFAULT);

			$sql = "UPDATE $this->tabela
			SET 
			user_pass		=:senha
			WHERE
			user_codigo		=:codigo";
			$stmt = db::prepare($sql);
			$stmt->bindparam(":codigo",$codigo);
			$stmt->bindparam(":senha",$new_password);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}


	public function editar($u_id,$nome,$usuario,$cargo,$email,$nivel)
	{
		try
		{

			$sql = "UPDATE $this->tabela SET user_name=:nome, user_usuario=:usuario, user_cargo=:cargo, user_email=:email, user_nivel=:nivel WHERE user_id=:u_id";
			$stmt = db::prepare($sql);
			$stmt->bindparam(":u_id",$u_id);
			$stmt->bindparam(":nome",$nome);
			$stmt->bindparam(":usuario",$usuario);
			$stmt->bindparam(":cargo",$cargo);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":nivel",$nivel);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}	


	public function doLogin($usuario,$upass) {
		$sql = "SELECT * FROM $this->tabela WHERE user_usuario=:usuario";
		$stm = db::prepare($sql);
		$stm->bindParam(':usuario', $usuario);
		$stm->execute();
		//return $stm->fetch();
		$userRow=$stm->fetch(PDO::FETCH_ASSOC);
			if($stm->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['user_pass']))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
					return true;
				}
				else
				{
					return false;
				}
			}

	}

	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}

}



 ?>