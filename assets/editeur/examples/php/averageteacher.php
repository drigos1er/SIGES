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

Editor::inst( $db, 'student_averages', array('studentid', 'acadyearid','specialityid','typeof_averages','ecuid','ueid','semesterid') )
    ->field(



        Field::inst( 'student.id' ),
        Field::inst( 'student.firstname' ),
        Field::inst( 'student.lastname' ),
        Field::inst( 'student.birthdate' )->getFormatter( Format::dateSqlToFormat( 'd/m/Y' ) ),
        Field::inst( 'student.placeofbirth' ),
        Field::inst( 'student.kind' ),

        Field::inst( 'student_averages.average' )

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

 Field::inst( 'student_averages.entry_date' )->setValue( date('c') ),
 Field::inst( 'student_averages.entry_user' )->setValue( $_SESSION['leconccecte'])


    )
    ->leftJoin( 'student', 'student_averages.studentid', '=', 'student.id' )
    ->leftJoin( 'student_speciality', 'student.id', '=', 'student_speciality.studentid' )

    ->where( 'student_speciality.acadyearid', $_SESSION['idanac'])
    ->where( 'student_averages.acadyearid', $_SESSION['idanac'])
    ->where( 'student_speciality.specialityid',  $_SESSION['idspec'])
    ->where( 'student_averages.semesterid',  $_SESSION['idsem'])
    ->where( 'student_averages.ueid',  $_SESSION['idue'])
    ->where( 'student_averages.ecuid', $_SESSION['idecu'])
    ->where( 'student_averages.typeof_averages',$_SESSION['catnote'])
    ->where( 'student_speciality.school_classeid',$_SESSION['idclasse'])
    ->process($_POST)
    ->json();

