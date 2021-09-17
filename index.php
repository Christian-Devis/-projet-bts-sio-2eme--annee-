<!DOCTYPE html>
<?php
include 'data/class.pdogsb.php';
include 'vues/v_entete.php';
include 'vues/v_bandeau.php'; 
/* création de l'objet $pdo d'accès aux données*/
$pdo = PdoGsb::getPdoGsb();

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc']; 

switch($uc)
{
	case 'accueil':
		{include 'vues/v_accueil.php';
        break;}

	case 'gestion' :
		{
            include 'controleurs/c_gestionCompte.php';
            
            break;
        }
}
 include 'vues/v_pied.php' ;