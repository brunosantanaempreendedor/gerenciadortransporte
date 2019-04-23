<?php 

require_once 'db.php';

class vistorias extends db {

	protected $tabela = 'vistorias';


	public function findAll() {
			$sql = "SELECT * FROM $this->tabela";
			$stm = db::prepare($sql);
			$stm->execute();
			return $stm->fetchAll();
		}


	public function findCOD($codigo) {
			$sql = "SELECT * FROM $this->tabela WHERE codigo=:codigo";
			$stm = db::prepare($sql);
			$stm->bindparam(":codigo",$codigo);
			$stm->execute();
			return $stm->fetch();
		}


	public function getID($id)
		{
			$sql = "SELECT * FROM $this->tabela WHERE id=:id";
			$stm = db::prepare($sql);
			$stm->bindparam(":id",$id);
			$stm->execute();
			return $stm->fetch();
		}

	
	public function delID($id)
		{
			$sql = "DELETE FROM $this->tabela WHERE id=:id";
			$stmt = db::prepare($sql);
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			return true;
		}

	public function foto($codigo,$mini,$img)
	{
		try
		{

			$sql 	= "UPDATE $this->tabela SET 
			foto	=:img, 
			thumb	=:mini
			WHERE
			id		=:id";
			$stmt = db::prepare($sql);
			$stmt->bindparam(":id",$codigo);
			$stmt->bindparam(":img",$img);
			$stmt->bindparam(":mini",$mini);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}	



public function cadastro($nr_associado,$alvara,$autorizacao,$tacografo,$inmetro,$particular,$gratuito)
	{
		try
		{
			
			$sql = "INSERT INTO $this->tabela (nr_associado,alvara,autorizacao,tacografo,inmetro,particular,gratuito) VALUES(:nr_associado, :alvara, :autorizacao, :tacografo, :inmetro, :particular, :gratuito)";
			$stmt = db::prepare($sql);
			$stmt->bindparam(":nr_associado",$nr_associado);
			$stmt->bindparam(":alvara",$alvara);
			$stmt->bindparam(":autorizacao",$autorizacao);
			$stmt->bindparam(":tacografo",$tacografo);
			$stmt->bindparam(":inmetro",$inmetro);
			$stmt->bindparam(":particular",$particular);
			$stmt->bindparam(":gratuito",$gratuito);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}	


	public function editar($a_id,$nr_associado,$alvara,$autorizacao,$tacografo,$inmetro,$particular,$gratuito)
	{
		try
		{

			$sql = "UPDATE $this->tabela SET
			nr_associado 		=:nr_associado, 
			alvara				=:alvara,
			autorizacao			=:autorizacao,
			tacografo			=:tacografo,
			inmetro				=:inmetro,
			particular			=:particular,
			gratuito			=:gratuito
			WHERE 
			id					=:a_id";

			$stmt = db::prepare($sql);
			$stmt->bindparam(":a_id",$a_id);
			$stmt->bindparam(":nr_associado",$nr_associado);
			$stmt->bindparam(":alvara",$alvara);
			$stmt->bindparam(":autorizacao",$autorizacao);
			$stmt->bindparam(":tacografo",$tacografo);
			$stmt->bindparam(":inmetro",$inmetro);
			$stmt->bindparam(":particular",$particular);
			$stmt->bindparam(":gratuito",$gratuito);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}


	
}



 ?>