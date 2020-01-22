<?php
session_start();
// DataTables PHP library
include( "../../php/DataTables.php" );

// Alias Editor classes so they are easy to use
$datesaisie = new \Datetime();
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate,
    DataTables\Editor\ValidateOptions;


/*
 * Example PHP implementation used for the joinLinkTable.html example
 */

Editor::inst( $db, 'etudiantmoyennes', array('idetudiant', 'idanacademie','idspecialite','idcategoriemoyenne','idecu','idue','idsemestre') )
    ->field(



        Field::inst( 'etudiant.id' ),
        Field::inst( 'etudiant.nom' ),
        Field::inst( 'etudiant.prenom' ),
        Field::inst( 'etudiant.datenais' )->getFormatter( Format::dateSqlToFormat( 'd/m/Y' ) ),
        Field::inst( 'etudiant.lieunais' ),
        Field::inst( 'etudiant.genre' ),

        Field::inst( 'etudiantmoyennes.moyeva' )

            ->getFormatter( function($val, $data, $field) {return str_replace ( '.' , ',' , $val );})
            ->setFormatter( function($val, $data, $field) {return str_replace ( ',' , '.' , $val );})
            ->validator( function ( $val, $data, $field, $host ) {
                if  ($val < 0 )
                {
                    return 'la moyenne doit être superieure à 0 ';
                }elseif  ($val > 20 )
                {
                    return 'la moyenne doit être inférieure à 20 ';
                }


                else
                {
                    return true;
                }

            } ),

 Field::inst( 'etudiantmoyennes.datesaisie' )->setValue( date('c') ),
 Field::inst( 'etudiantmoyennes.usersaisie' )->setValue( $_SESSION['leconccecte'])


    )
    ->leftJoin( 'etudiant', 'etudiantmoyennes.idetudiant', '=', 'etudiant.id' )

    ->where( 'etudiantmoyennes.idanacademie', $_SESSION['idanac'])
    ->where( 'etudiantmoyennes.idspecialite',  $_SESSION['idspec'])
    ->where( 'etudiantmoyennes.idsemestre',  $_SESSION['idsem'])
    ->where( 'etudiantmoyennes.idue',  $_SESSION['idue'])
    ->where( 'etudiantmoyennes.idecu', $_SESSION['idecu'])
    ->where( 'etudiantmoyennes.idcategoriemoyenne',$_SESSION['catnote'])
    ->process($_POST)
    ->json();

