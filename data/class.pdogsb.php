<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application GSB
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoGsb{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=mission1';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoGsb=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp); 
		PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoGsb::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
 
 * @return l'unique objet de la classe PdoGsb
 */
	public  static function getPdoGsb(){
		if(PdoGsb::$monPdoGsb==null)
		{
			PdoGsb::$monPdoGsb= new PdoGsb();
		}
		return PdoGsb::$monPdoGsb;  
	}
/**
 * Test : retourne les informations d'un visiteur par son id
 
 * @param $id 
 * @return le nom et le prénom sous la forme d'un tableau associatif 
*/
	public function getLesDates()
	{
		$req = "select distinct mois from fichefrais order by mois desc";
		$rs = PdoGsb::$monPdo->query($req);
		$ligne = $rs->fetchall();
		return $ligne;
	}
	public function getLesTypeDeFrais(){
		$req = "select id from fraisforfait";
		$rs = PdoGsb::$monPdo->query($req);
		$ligne = $rs->fetchall();
		return $ligne;
	}
	public function getLesnumerosComptes($mois,$typefrais)
	{
		$req ="select (lignefraisforfait.quantite*fraisforfait.montant) as montant , lignefraisforfait.idVisiteur as id 
	    from fraisforfait 
	    inner join lignefraisforfait 
	    on fraisforfait.id = lignefraisforfait.idFraisForfait 
	    where lignefraisforfait.mois ='$mois' and fraisforfait.id ='$typefrais' 
	    group by lignefraisforfait.idVisiteur"  ; 
		$rs = PdoGsb::$monPdo->query($req);
		$ligne = $rs->fetchall();
		return $ligne ;
	}
		
}

?>