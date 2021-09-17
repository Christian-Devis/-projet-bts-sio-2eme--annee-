<form method="post" action="index.php?uc=gestion&action=AfficheCompte">
    <h2>Etat de tous les frais par mois </h2>
    <fieldset classe="fieldset1">
        <legend>Periode</legend>
        <label for="Mois-Annee">Mois/Année :</label>
        <select name="moisAnnee" id="moisannee">
            <?php 
                foreach ($lesMois as $mois)
                {
                    $date=$mois['mois']; 
            ?>
            <option value="<?php echo $date ?>"> <?php echo $date ; ?> </option>
            <?php 
                } 
            ?>
        </select>
        <label for="type de frais">Type de frais:</label>
        <select name="typefrais" id="typesfrais" required>
            <?php 
                foreach($lesTypeFrais as $frais )
                {
                    $typeFrais = $frais['id'];
            ?>
            <option value="<?php echo $typeFrais?>"><?php echo $typeFrais?></option>
            <?php 
                }
            ?>
        </select>
        <button type="submit" formaction="index.php?uc=gestion&action=AfficheCompte"> Valider </button>
    </fieldset>
    <button type="submit" formaction="index.php?uc=accueil"> Retour </button>
</form>