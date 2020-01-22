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

        Field::inst( 'etudiantmoyennes.moyeva' ),
        Field::inst( 'etudiantmoyennes.valid' )
            ->setFormatter( function ( $val, $data, $opts ) {
                return ! $val ? 0 : 1;
            } ),



 Field::inst( 'etudiantmoyennes.datevalid' )->setValue( date('c') ),
 Field::inst( 'etudiantmoyennes.uservalid' )->setValue( $_SESSION['leconccecte'])


    )
    ->leftJoin( 'etudiant', 'etudiantmoyennes.idetudiant', '=', 'etudiant.id' )
    ->leftJoin( 'etudiantspecialite', 'etudiant.id', '=', 'etudiantspecialite.idetudiant' )

    ->where( 'etudiantspecialite.idanacademie', $_SESSION['idanacva'])
    ->where( 'etudiantmoyennes.idanacademie', $_SESSION['idanacva'])
    ->where( 'etudiantspecialite.idspecialite',  $_SESSION['idspecva'])
    ->where( 'etudiantmoyennes.idsemestre',  $_SESSION['idsemva'])
    ->where( 'etudiantmoyennes.idue',  $_SESSION['idueva'])
    ->where( 'etudiantmoyennes.idecu', $_SESSION['idecuva'])
    ->where( 'etudiantmoyennes.idcategoriemoyenne',$_SESSION['catnoteva'])
    ->where( 'etudiantspecialite.idclasse',$_SESSION['idclasseva'])
    ->process($_POST)
    ->json();

