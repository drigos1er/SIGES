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

        Field::inst( 'student_averages.average' ),

        Field::inst( 'student_averages.valid' )
            ->setFormatter( function ( $val, $data, $opts ) {
                return ! $val ? 0 : 1;
            } ),



 Field::inst( 'student_averages.valid_date' )->setValue( date('c') ),
 Field::inst( 'student_averages.valid_user' )->setValue( $_SESSION['leconccecteva'])


    )


    ->leftJoin( 'student', 'student_averages.studentid', '=', 'student.id' )
    ->leftJoin( 'student_speciality', 'student.id', '=', 'student_speciality.studentid' )

    ->where( 'student_speciality.acadyearid', $_SESSION['idanacva'])
    ->where( 'student_averages.acadyearid', $_SESSION['idanacva'])
    ->where( 'student_speciality.specialityid',  $_SESSION['idspecva'])
    ->where( 'student_averages.semesterid',  $_SESSION['idsemva'])
    ->where( 'student_averages.ueid',  $_SESSION['idueva'])
    ->where( 'student_averages.ecuid', $_SESSION['idecuva'])
    ->where( 'student_averages.typeof_averages',$_SESSION['catnoteva'])
    ->where( 'student_speciality.school_classeid',$_SESSION['idclasseva'])
    ->process($_POST)
    ->json();

