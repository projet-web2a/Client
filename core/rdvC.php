<?PHP
require 'config.php';
class RdvC
{
	function ajouterRdv($rdv){
		$sql="insert into rdv (date_rdv,time_rdv,refProduit_rdv,username) values (:p,:n,:i,:u)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        
        $date=$rdv->getDateR();
		$time=$rdv->getTime();
        $refp=$rdv->getRefp();
		$user=$rdv->getUser();
	
			
		$req->bindValue(':p',$date);
		$req->bindValue(':n',$time);
		$req->bindValue(':i',$refp);
		$req->bindValue(':u',$user);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherRdv(){
		$db = config::getConnexion();
       		$sql="SELECT * FROM rdv";

		try{
 		$req=$db->prepare($sql);
 	    $req->execute();
 		$rdv= $req->fetchALL(PDO::FETCH_OBJ);
		return $rdv;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
	
	function confirmerRdv($id)
	{
 	$db = config::getConnexion();
 	$sql="UPDATE rdv SET  etat=1 where id_rdv=:u";
 		try{

        $req=$db->prepare($sql);
		
        
		
		
        $req->bindValue(':u',$id);
		
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}
	
	function afficherRdvFront($user){
		$sql="SELECT * FROM rdv WHERE username = '$user' ";
	$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
 	    $req->execute();
 		$rdv= $req->fetchALL(PDO::FETCH_OBJ);
		return $rdv;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
	
	function recupererRdv($id){
		
		$sql="SELECT * FROM rdv WHERE id_rdv = '$id' ";
	$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
 	    $req->execute();
 		$rdv= $req->fetchALL(PDO::FETCH_OBJ);
		return $rdv;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
	
	function modifierRdv($rdv,$id)
	{
 	$db = config::getConnexion();
 	$sql="UPDATE rdv SET  date_rdv=:p , time_rdv=:n , refProduit_rdv=:pw where id_rdv=:u";
 		try{

        $req=$db->prepare($sql);
		
        
		
		$req->bindValue(':p',$rdv->getDateR());
		$req->bindValue(':n',$rdv->getTime());
		$req->bindValue(':pw',$rdv->getRefp());
        $req->bindValue(':u',$id);
		
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}
	
	function SupprimerRdv($id){
		$sql="DELETE  FROM rdv WHERE id_rdv= '$id' ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
 	    $req->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function recupererEmail($id)
	{
		$db = config::getConnexion();
				$sql = "select * from rdv ";
		try{
		$req = $db->prepare($sql);
		
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_OBJ);
		return $result;}
		catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}
?>