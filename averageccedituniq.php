<?php
session_start();
if($_GET['leconnecte']){

    $_SESSION['leconccecte']=$_GET['leconnecte'];

}
if($_GET['idanac']){

    $_SESSION['idanac']=$_GET['idanac'];

}
if($_GET['idspec']){

    $_SESSION['idspec']=$_GET['idspec'];

}if($_GET['idsem']){

    $_SESSION['idsem']=$_GET['idsem'];

}
if($_GET['idue']){

    $_SESSION['idue']=$_GET['idue'];

}
if($_GET['idecu']){

    $_SESSION['idecu']=$_GET['idecu'];

}

if($_GET['typeofaver']){

    $_SESSION['catnote']=$_GET['typeofaver'];

}


if($_GET['idetud']){

    $_SESSION['idetud']=$_GET['idetud'];

}



if($_GET['idses']){

    $_SESSION['idses']=$_GET['idses'];

}




    header("Location:http://localhost:8888/SIGES/public/delibarea/edituniqaveragecc");






//header("Location:http://localhost/SIGESV2/SIGESV2/web/bundles/esaticuser/designsiges/editeur/examples/php/averageteacher.php");

// DataTables PHP library
/* include( "../../php/DataTables.php" );

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
/*
Editor::inst( $db, 'student_averages', array('studentid', 'acadyearid','specialityid','typesof_averages','ecuid','ueid','semesterid') )
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
    ->leftJoin( 'etudiantspecialite', 'etudiant.id', '=', 'etudiantspecialite.idetudiant' )

    ->where( 'etudiantspecialite.idanacademie', $_SESSION['idanac'])
    ->where( 'etudiantmoyennes.idanacademie', $_SESSION['idanac'])
    ->where( 'etudiantspecialite.idspecialite',  $_SESSION['idspec'])
    ->where( 'etudiantmoyennes.idsemestre',  $_SESSION['idsem'])
    ->where( 'etudiantmoyennes.idue',  $_SESSION['idue'])
    ->where( 'etudiantmoyennes.idecu', $_SESSION['idecu'])
    ->where( 'etudiantmoyennes.idcategoriemoyenne',$_SESSION['catnote'])
    ->where( 'etudiantspecialite.idclasse',$_SESSION['idclasse'])
    ->process($_POST)
    ->json();

*/