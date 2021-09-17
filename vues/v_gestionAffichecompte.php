</div>
<div class="container2">
<div ><fieldset class="fieldset">
   <legend class="legend2">Frais au forfait </legend>
        <div class="container3">
        <div class="">
<?php
    $total=0;
    foreach($MontantVisiteurs as $montant )
    {   
        $total+=$montant['montant'];
    ?>    
    <?php
    }
    ?>
    <fieldset><div class="case"><?php echo "Montant total : ". $total.' euros' ; ?></div></fieldset>
</div>
            <div class=""> 
                <?php 
                    foreach($lesNumeroVisiteurs as $num)
                        {
                            $numeroduvisiteur = $num['id'];
                ?>
                <fieldset><div class="case"><?php echo "NUMERO COMPTE : ".$numeroduvisiteur ; ?></div></fieldset>
                <?php
                }
                ?>
            </div>
                    <div class="">
                        <?php
                        foreach($MontantVisiteurs as $montant )
                        {               
                        $retour=$montant['montant'];
                        ?>    
                        <fieldset><div class="case"><?php echo "Montant : ". $retour.' euros' ; ?></div></fieldset>
                        <?php
                        }
                        ?>
                    </div>
        </div>
</fieldset>
</div>
</div>
