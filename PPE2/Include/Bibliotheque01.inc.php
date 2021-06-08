<?php

require_once './include/SourceDonnees.inc.php';

/**
 * 
 * @param type $TitreLabel
 * @param type $name
 * @param type $id
 * @param type $recordset
 * @param type $tabindex
 * @param type $selected
 * @return string
 */
function formSelectDepuisRecordset($TitreLabel, $name, $id, $recordset, $tabindex, $selected = null) {

    $code = '<label for="' . $id . '">' . $TitreLabel . '</label>' . "\n"
            . '    <select name="' . $name . '" id="' . $id . '" class="titre" tabindex="' . $tabindex . '">' . "\n";

    $recordset->setFetchMode(PDO::FETCH_NUM);
    $ligne = $recordset->fetch();

    if ($selected == null) {
        while ($ligne) {
            $code .= '<option value="' . $ligne[0] . '">' . $ligne[1] . '</option>' . "\n";
            $ligne = $recordset->fetch();
        }
    } else {
        while ($ligne) {
            $code .= '<option ' . ($ligne[0] == $selected ? 'selected="selected"' :'') . ' value="' . $ligne[0] . '">' . $ligne[1] . '</option>';
            $ligne = $recordset->fetch();
        }     
    }
    $code .= '</select>';
    return $code;
}

/**
 * 
 * @param type $nom
 * @param type $nomlabel
 * @param type $size
 * @param type $valeur
 * @param type $lectureSeule
 * @param type $required
 * @return string
 */
function formInputText($nom, $nomlabel, $size, $valeur, $lectureSeule,$required) {
    $codeHTML = '<label for="' . $nom . '">' . $nomlabel . '</label>'
            . '<input type="text" value="' . $valeur . '" size="' . $size . '" name="' . $nom . '"'
            . ($lectureSeule == TRUE ? ' readonly="readonly"' : '') 
            . ($required == TRUE ? ' required="required"' : '') . ' />';
    return $codeHTML;
}

/**
 * 
 * @param type $Nom
 * @param type $id
 * @param type $value
 * @return string
 */
function formInputHidden($Nom, $id, $value)
{
    $form = '<input type="hidden" name="' .$Nom. '"id="' .$id.'" value="' .$value. '"/>';
    return $form;    
}

/**
 * 
 * @param type $Nom
 * @param type $id
 * @param type $value
 * @param type $tabindex
 * @return string
 */
function formBoutonSubmit($Nom, $id, $value, $tabindex)
{
    $form = '<input type="submit" name="' .$Nom. '"id="' .$id.'" value="' .$value. '" tabindex="'.$tabindex.'"/>';
    return $form;
}
/**
 * 
 * @param type $label
 * @param type $nom
 * @param type $id
 * @param type $valeur
 * @param type $cols
 * @param type $rows
 * @param type $LongueurMaxi
 * @param type $Index
 * @param boolean $ReadOnly
 * @return string
 */
function formTextArea($label, $nom, $id, $valeur, $cols, $rows, $LongueurMaxi, $Index, $ReadOnly = false) {
    $code = '<label class="titre">' . $label . ' :</label>'
            . '<textarea name=' . $nom . ' id=' . $id . ' cols=' . $cols . ' rows=' . $rows . ' maxlength=' . $LongueurMaxi . ' tabindex=' . $Index;
    if ($ReadOnly == true) {
        $code .= ' readonly="readonly"> ' . $valeur . ' </textarea><br>';
    } else {
        $code .= ' > ' . $valeur . '</textarea><br>';
    }
    return $code;
}

/**
 * 
 * @param type $label
 * @param type $nom
 * @param type $id
 * @param type $value
 * @param type $size
 * @param type $MaxLenght
 * @param type $index
 * @param type $required
 * @return string
 */

function formInputPassword($label, $nom, $id, $value, $size, $MaxLenght, $index, $required)
{
    $code = '<label class="titre">' . $label . ' :</label>';
    $code .= '<input type="password" name="' .$nom. '"id="' .$id.'" value="' .$value. '" size="' .$size. '" Maxlenght="' .$MaxLenght.'" tabindex="'.$index.'';
    
    if ($required === true) {
        $code .= ' required="required"> ';
    } else {
        $code .= ' > ';
    }
    return $code;
}

?>


 





