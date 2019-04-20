<?php
require '../entities/rdv.php';
require 'rdvC.php';

if (isset($_POST['date']) and isset($_POST['time']) and isset($_POST['refp'])){

//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
if($_POST['date']=="" or $_POST['time']=="" or $_POST['refp']=="")
{
	echo "<script type='text/javascript'>";
echo "alert('please no empty fields!');";
echo "</script>";
	
}
else if (  strtotime($_POST['date']) > strtotime('now'))
{
	 $rdv1=new Rdv($_POST['date'],$_POST['time'],$_POST['refp'],$_POST['username']);
     $rdv1C=new RdvC();
     $rdv1C->ajouterRdv($rdv1);
     //header('Location: ../views/front/sendRdv.php');
		
     
}
else 
{
	
	 //echo "nom doit etre une chaine!";
	    echo "<script type='text/javascript'>";
        echo " alert('please enter the date correctly!');";
        echo "</script>";
}	
}
?>