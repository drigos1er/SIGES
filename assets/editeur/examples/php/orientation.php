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

Editor::inst( $db, 'orientation', array('studentid', 'acadyearid','specialityid') )
    ->field(



        Field::inst( 'student.id' ),
        Field::inst( 'student.firstname' ),
        Field::inst( 'student.lastname' ),
        Field::inst( 'student.datenais' )->getFormatter( Format::dateSqlToFormat( 'd/m/Y' ) ),
        Field::inst( 'student.birthdate' ),
        Field::inst( 'student.kind' ),
        Field::inst( 'orientation.averagean' ),
        Field::inst( 'orientation.averagescient' ),
        Field::inst( 'orientation.decisan' ),
        Field::inst( 'orientation.choice1' ),
        Field::inst( 'orientation.choice2' ),
        Field::inst( 'orientation.choice3' ),

        Field::inst( 'orientation.orientation')

            ,

 Field::inst( 'orientation.datedelib' )->setValue( date('c') ),
 Field::inst( 'orientation.userdelib' )->setValue('admin')


    )
    ->leftJoin( 'student', 'orientation.studentid', '=', 'student.id' )

    ->where( 'orientation.acadyearid', $_SESSION['idanac'])
    ->where( 'orientation.specialityid',  $_SESSION['idspec'])
    ->where( 'orientation.decisan',  $_SESSION['decisan'])
    ->process($_POST)
    ->json();

