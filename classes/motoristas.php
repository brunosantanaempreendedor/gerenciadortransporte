<?php 

require_once 'db.php';

class motoristas extends db {

	protected $tabela = 'motoristas';


	public function findAll() {
			$sql = "SELECT * FROM $this->tabela ORDER BY nome ASC";
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


	public function findValidade30($trintaDias,$agora) {
			$sql = "SELECT * FROM $this->tabela WHERE validade BETWEEN :agora AND :trintaDias";
			$stm = db::prepare($sql);
			$stm->bindparam(":trintaDias",$trintaDias);
			$stm->bindparam(":agora",$agora);
			$stm->execute();
			return $stm->fetchAll();
		}


	public function findInativos() {
			$sql = "SELECT * FROM $this->tabela WHERE status = 0";
			$stm = db::prepare($sql);
			$stm->execute();
			return $stm->fetchAll();
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



public function cadastro($nr_associado,$nome,$rua,$numero,$bairro,$cep,$cidade,$uf,$email,$telefone,$celular1,$celular2,$mae,$pai,$cpf,$estado_civil,$rg,$orgao_exp,$nascimento,$naturalidade,$natural_uf,$cnh,$validade,$senha_detran,$curso,$particular,$gratuito,$crm)
	{
		try
		{
			
			$sql = "INSERT INTO $this->tabela (nr_associado,nome,rua,numero,bairro,cep,cidade,uf,email,telefone,celular1,celular2,mae,pai,cpf,estado_civil,rg,orgao_exp,nascimento,naturalidade,natural_uf,cnh,validade,senha_detran,curso,particular,gratuito,crm) VALUES(:nr_associado, :nome, :rua, :numero, :bairro, :cep, :cidade, :uf, :email, :telefone, :celular1, :celular2, :mae, :pai, :cpf, :estado_civil, :rg, :orgao_exp, :nascimento, :naturalidade, :natural_uf, :cnh, :validade, :senha_detran, :curso, :particular, :gratuito, :crm)";
			$stmt = db::prepare($sql);
			$stmt->bindparam(":nr_associado",$nr_associado);
			$stmt->bindparam(":nome",$nome);
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
			$stmt->bindparam(":mae",$mae);
			$stmt->bindparam(":pai",$pai);
			$stmt->bindparam(":cpf",$cpf);
			$stmt->bindparam(":estado_civil",$estado_civil);
			$stmt->bindparam(":rg",$rg);
			$stmt->bindparam(":orgao_exp",$orgao_exp);
			$stmt->bindparam(":nascimento",$nascimento);
			$stmt->bindparam(":naturalidade",$naturalidade);
			$stmt->bindparam(":natural_uf",$natural_uf);
			$stmt->bindparam(":cnh",$cnh);
			$stmt->bindparam(":validade",$validade);
			$stmt->bindparam(":senha_detran",$senha_detran);
			$stmt->bindparam(":curso",$curso);
			$stmt->bindparam(":particular",$particular);
			$stmt->bindparam(":gratuito",$gratuito);
			$stmt->bindparam(":crm",$crm);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}	


	public function editar($a_id,$nr_associado,$nome,$rua,$numero,$bairro,$cep,$cidade,$uf,$email,$telefone,$celular1,$celular2,$mae,$pai,$cpf,$estado_civil,$rg,$orgao_exp,$nascimento,$naturalidade,$natural_uf,$cnh,$validade,$senha_detran,$curso,$particular,$gratuito,$crm)
	{
		try
		{

			$sql = "UPDATE $this->tabela SET
			nr_associado 		=:nr_associado, 
			nome				=:nome,
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
			mae					=:mae,
			pai   				=:pai,
			cpf					=:cpf,
			estado_civil		=:estado_civil,
			rg					=:rg,
			orgao_exp			=:orgao_exp,
			nascimento			=:nascimento,
			naturalidade		=:naturalidade,
			natural_uf			=:natural_uf,
			cnh					=:cnh,
			validade			=:validade,
			senha_detran		=:senha_detran,
			curso				=:curso,
			particular			=:particular,
			gratuito			=:gratuito,
			crm 				=:crm
			WHERE 
			id					=:a_id";

			$stmt = db::prepare($sql);
			$stmt->bindparam(":a_id",$a_id);
			$stmt->bindparam(":nr_associado",$nr_associado);
			$stmt->bindparam(":nome",$nome);
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
			$stmt->bindparam(":mae",$mae);
			$stmt->bindparam(":pai",$pai);
			$stmt->bindparam(":cpf",$cpf);
			$stmt->bindparam(":estado_civil",$estado_civil);
			$stmt->bindparam(":rg",$rg);
			$stmt->bindparam(":orgao_exp",$orgao_exp);
			$stmt->bindparam(":nascimento",$nascimento);
			$stmt->bindparam(":naturalidade",$naturalidade);
			$stmt->bindparam(":natural_uf",$natural_uf);
			$stmt->bindparam(":cnh",$cnh);
			$stmt->bindparam(":validade",$validade);
			$stmt->bindparam(":senha_detran",$senha_detran);
			$stmt->bindparam(":curso",$curso);
			$stmt->bindparam(":particular",$particular);
			$stmt->bindparam(":gratuito",$gratuito);
			$stmt->bindparam(":crm",$crm);
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