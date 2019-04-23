<?php 

require_once 'db.php';

class empresas extends db {

	protected $tabela = 'empresas';


	public function findAll() {
			$sql = "SELECT * FROM $this->tabela";
			$stm = db::prepare($sql);
			$stm->execute();
			return $stm->fetchAll();
		}
	public function findAniver($month) {
			$sql = "SELECT *, DAY(nascimento) as dia FROM $this->tabela WHERE MONTH(nascimento)=:month ORDER BY DAY(nascimento) ASC";
			$stm = db::prepare($sql);
			$stm->bindparam(":month",$month);
			$stm->execute();
			return $stm->fetchAll();
		}


	public function findAtivos() {
			$sql = "SELECT * FROM $this->tabela WHERE status = 1 ORDER BY nome ASC";
			$stm = db::prepare($sql);
			$stm->execute();
			return $stm->fetchAll();
		}


	public function findInativos() {
			$sql = "SELECT * FROM $this->tabela WHERE status = 0";
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


	public function findID($AssId)
		{
			$sql = "SELECT * FROM $this->tabela WHERE nr_associado=:id";
			$stm = db::prepare($sql);
			$stm->bindparam(":id",$AssId);
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



public function cadastro($nr_associado,$razao_social,$rua,$numero,$bairro,$cep,$cidade,$uf,$email,$telefone,$celular1,$celular2,$cnpj,$ie)
	{
		try
		{
			
			$sql = "INSERT INTO $this->tabela (nr_associado,razao_social,rua,numero,bairro,cep,cidade,uf,email,telefone,celular1,celular2,cnpj,ie) VALUES(:nr_associado, :razao_social, :rua, :numero, :bairro, :cep, :cidade, :uf, :email, :telefone, :celular1, :celular2, :cnpj, :ie)";
			$stmt = db::prepare($sql);
			$stmt->bindparam(":nr_associado",$nr_associado);
			$stmt->bindparam(":razao_social",$razao_social);
			$stmt->bindparam(":rua",$rua);
			$stmt->bindparam(":numero",$numero);
			$stmt->bindparam(":bairro",$bairro);
			$stmt->bindparam(":cep",$cep);
			$stmt->bindparam(":cidade",$cidade);
			$stmt->bindparam(":uf",$uf);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":telefone",$telefone);
			$stmt->bindparam(":celular1",$celular1);
			$stmt->bindparam(":celular2",$celular2);
			$stmt->bindparam(":cnpj",$cnpj);
			$stmt->bindparam(":ie",$ie);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}	


	public function editar($a_id,$nr_associado,$razao_social,$rua,$numero,$bairro,$cep,$cidade,$uf,$email,$telefone,$celular1,$celular2,$cnpj,$ie)
	{
		try
		{

			$sql = "UPDATE $this->tabela SET
			nr_associado 		=:nr_associado, 
			razao_social		=:razao_social,
			rua					=:rua,
			numero				=:numero,
			bairro				=:bairro,
			cep					=:cep,
			cidade				=:cidade,
			uf 					=:uf,
			email 				=:email,
			telefone			=:telefone,
			celular1 			=:celular1,
			celular2 			=:celular2,
			cnpj				=:cnpj,
			ie   				=:ie
			WHERE 
			id					=:a_id";

			$stmt = db::prepare($sql);
			$stmt->bindparam(":a_id",$a_id);
			$stmt->bindparam(":nr_associado",$nr_associado);
			$stmt->bindparam(":razao_social",$razao_social);
			$stmt->bindparam(":rua",$rua);
			$stmt->bindparam(":numero",$numero);
			$stmt->bindparam(":bairro",$bairro);
			$stmt->bindparam(":cep",$cep);
			$stmt->bindparam(":cidade",$cidade);
			$stmt->bindparam(":uf",$uf);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":telefone",$telefone);
			$stmt->bindparam(":celular1",$celular1);
			$stmt->bindparam(":celular2",$celular2);
			$stmt->bindparam(":cnpj",$cnpj);
			$stmt->bindparam(":ie",$ie);
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