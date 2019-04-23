<?php
 require_once("classes/classes.php");
 $codigo 	= $_POST['codigo'];

// A list of permitted file extensions
$allowed 	= array('png', 'jpg', 'jpeg', 'gif','JPG');

$pasta 		= 'fotos/';

if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){

	$id 	= $codigo;
    $assoc 	= $associados->getID($id);

	unlink("fotos/miniaturas/$assoc->thumb");
	unlink("fotos/$assoc->foto");

	

		// O nome original do arquivo no computador do usuário
	 	$arqName 		= $_FILES['file']['name'];
	  
		// O tipo mime do arquivo. Um exemplo pode ser "image/gif"
		$arqType 		= $_FILES['file']['type'];
		    
		// O nome temporário do arquivo, como foi guardado no servidor
	 	$arqTemp 		= $_FILES['file']['tmp_name'];

	  	$icode 			= substr(time().rand(10000,99999),-15);
		$img        	= $icode.'IMG.JPG';
		$mini       	= $icode.'TMB.JPG';
		$targetPath 	= $pasta;
		$targetPathmini = $targetPath . '/miniaturas/';
		$targetFile 	=  str_replace('//','/',$targetPath) . $img;
		$targetFilemini =  str_replace('//','/',$targetPath) . $mini;



		$extension 		= pathinfo($arqName, PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

		$upload 	= move_uploaded_file($arqTemp, $targetFile);



      	$imgsize 	= getimagesize($targetFile);
			switch(strtolower(substr($targetFile, -3))){
			    case "jpg":
			        $image = imagecreatefromjpeg($targetFile); 
			    break;
			    default:
			        exit;
			    break;
			}

			$g_width 	= 220; //Nova largura da imagem
			$g_height 	= $imgsize[1]/$imgsize[0]*$g_width; //para manter a proporção

			$width 		= 80; //Largura da miniatura    
			$height 	= $imgsize[1]/$imgsize[0]*$width; //para manter a proporção

			$src_w 		= $imgsize[0];
			$src_h 		= $imgsize[1];



			$g_picture = imagecreatetruecolor($g_width, $g_height);
			imagealphablending($g_picture, false);
			imagesavealpha($g_picture, true);
			$bool_g = imagecopyresampled($g_picture, $image, 0, 0, 0, 0, $g_width, $g_height, $src_w, $src_h); 


			$picture = imagecreatetruecolor($width, $height);
			imagealphablending($picture, false);
			imagesavealpha($picture, true);
			$bool = imagecopyresampled($picture, $image, 0, 0, 0, 0, $width, $height, $src_w, $src_h); 

			    
			//$imagemLogo = imagecreatefromgif( "logo_marca.gif" );
			//$larguraLogo = imagesx( $imagemLogo );
			//$alturaLogo = imagesy( $imagemLogo );
			//$x_logo = imagesx( $picture ) - $larguraLogo - 5;
			//$y_logo = imagesy( $picture ) - $alturaLogo - 5;
			//imagecopymerge( $picture, $imagemLogo, $x_logo, $y_logo, 0, 0, $larguraLogo, $alturaLogo, 100 );

			if($bool_g){
			    switch(strtolower(substr($targetFile, -3))){
			        case "jpg":
			            $bool_g2 = imagejpeg($g_picture,$targetPath.$img,100);
			        break;
			    }
			}

			if($bool){
			    switch(strtolower(substr($targetFilemini, -3))){
			        case "jpg":
			            $bool2 = imagejpeg($picture,$targetPathmini.$mini,100);
			        break;
			    }
			}


			imagedestroy($picture);
			imagedestroy($g_picture);
			imagedestroy($image);



	if($upload == true){

    	$associados->foto($codigo,$mini,$img);


		echo '{"status":"success"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;