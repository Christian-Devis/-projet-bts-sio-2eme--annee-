<?php
$action = $_REQUEST['action'];
switch($action)
{   
    case 'Afficheformulaire' :
    {
        $lesMois=$pdo->getLesDates();
        $lesTypeFrais=$pdo->getLesTypeDeFrais();
        include "vues/v_gestion.php" ;
        break;
    }
    case 'AfficheCompte' :
    {
        
        $leMois = $_REQUEST['moisAnnee'];
        $leTypeFrais =$_REQUEST['typefrais'];
        $lesNumeroVisiteurs = $pdo->getLesnumerosComptes($leMois,$leTypeFrais);
        $MontantVisiteurs =$pdo->getLesnumerosComptes($leMois,$leTypeFrais) ;
        $lesMois=$pdo->getLesDates();
        $lesTypeFrais=$pdo->getLesTypeDeFrais();
        include "vues/v_gestion.php" ;
        include "vues/v_gestionAffichecompte.php";
        break;
    }
}
?>





