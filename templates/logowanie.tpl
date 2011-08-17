<?php
    /**
     * Szablon formularza logowania.
     *
     * @package dodaj_strone.tpl.php
     * @author Tomasz Chojna
     * @link http://www.epi.chojna.info.pl
     * @since 1.0.1 1.03.2011
     * @version 1.0.1 1.03.2011
     */
?>
<?php
    if ( isset($strona['status']['komunikaty']['bledy_formularza']) ):
?>  
    <div>
        Formularz został wypełniony nieprawidłowo. Proszę poprawić wskazane pola.
    </div>
<?php   
    endif;
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <legend>Logowanie</legend>
        <div>
            <label for="login">Identyfikator użytkownika:</label>
            <input type="text" id="login" name="login" size="16" maxlength="16" value="<?php echo (isset($strona['dane']['login'])?$strona['dane']['login']:'');?>" />
        </div>
        <?php
            if ( isset($strona['status']['komunikaty']['bledy_formularza']['login']) ):
        ?>
            <div>
                <?php echo $strona['status']['komunikaty']['bledy_formularza']['login']; ?>
            </div>      
        <?php
            endif;
        ?>
        <div>
            <label for="haslo">Hasło:</label>
            <input type="password" id="haslo" name="haslo" size="16" maxlength="16"  />
        </div>
        <?php
            if ( isset($strona['status']['komunikaty']['bledy_formularza']['haslo']) ):
        ?>
            <div>
                <?php echo $strona['status']['komunikaty']['bledy_formularza']['haslo']; ?>
            </div>      
        <?php
            endif;
        ?>
        <div>
            <input type="submit" id="przycisk" name="przycisk" value="Zaloguj się" />
        </div>
    </fieldset>
</form>