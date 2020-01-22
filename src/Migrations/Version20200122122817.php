<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200122122817 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE half_yearly_delib (studentid VARCHAR(15) NOT NULL, acadyearid VARCHAR(15) NOT NULL, specialityid VARCHAR(15) NOT NULL, semesterid VARCHAR(15) NOT NULL, sessionid VARCHAR(15) NOT NULL, tvalidatecred INT NOT NULL, semaverage DOUBLE PRECISION NOT NULL, decision VARCHAR(15) NOT NULL, delib_date DATETIME NOT NULL, delib_user VARCHAR(255) NOT NULL, PRIMARY KEY(studentid, acadyearid, specialityid, semesterid, sessionid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semester (id VARCHAR(15) NOT NULL, level_id VARCHAR(15) NOT NULL, semname VARCHAR(15) NOT NULL, semtype VARCHAR(15) NOT NULL, INDEX IDX_F7388EED5FB14BA7 (level_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ue (id VARCHAR(15) NOT NULL, uename VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grade (id VARCHAR(15) NOT NULL, gradename VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE school_class (id VARCHAR(15) NOT NULL, specialityid VARCHAR(15) NOT NULL, levelid VARCHAR(15) NOT NULL, acadyearid VARCHAR(15) NOT NULL, classname VARCHAR(15) NOT NULL, studentnb INT NOT NULL, PRIMARY KEY(id, specialityid, levelid, acadyearid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teach_speciality (teacherid VARCHAR(100) NOT NULL, classeid VARCHAR(15) NOT NULL, acadyearid VARCHAR(15) NOT NULL, ueid VARCHAR(15) NOT NULL, ecuid VARCHAR(15) NOT NULL, semesterid VARCHAR(15) NOT NULL, hour_vol_cm INT NOT NULL, hour_vol_td INT NOT NULL, hour_vol_tp INT NOT NULL, PRIMARY KEY(teacherid, classeid, acadyearid, ueid, ecuid, semesterid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ue_speciality (acadyearid VARCHAR(15) NOT NULL, specialityid_id VARCHAR(15) NOT NULL, ueid_id VARCHAR(15) NOT NULL, semester_id VARCHAR(15) NOT NULL, creditvalue INT NOT NULL, INDEX IDX_E34573178BAE186A (specialityid_id), INDEX IDX_E3457317C263D751 (ueid_id), INDEX IDX_E34573174A798B6F (semester_id), PRIMARY KEY(specialityid_id, ueid_id, semester_id, acadyearid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecu (id VARCHAR(15) NOT NULL, ecuname VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_session (id VARCHAR(15) NOT NULL, sessionname VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_averages (studentid VARCHAR(15) NOT NULL, acadyearid VARCHAR(15) NOT NULL, specialityid VARCHAR(15) NOT NULL, typeof_averages VARCHAR(15) NOT NULL, ueid VARCHAR(15) NOT NULL, ecuid VARCHAR(15) NOT NULL, semesterid VARCHAR(15) NOT NULL, average DOUBLE PRECISION DEFAULT NULL, entry_date DATETIME NOT NULL, entry_user VARCHAR(255) NOT NULL, update_date DATETIME NOT NULL, update_user VARCHAR(255) NOT NULL, valid VARCHAR(255) DEFAULT NULL, valid_date DATETIME DEFAULT NULL, valid_user VARCHAR(255) DEFAULT NULL, PRIMARY KEY(studentid, acadyearid, specialityid, typeof_averages, ueid, ecuid, semesterid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id VARCHAR(15) NOT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, placeofbirth VARCHAR(255) NOT NULL, native_country VARCHAR(255) NOT NULL, kind VARCHAR(1) NOT NULL, nationality VARCHAR(15) NOT NULL, contact VARCHAR(15) NOT NULL, email VARCHAR(50) NOT NULL, typeof_iddoc VARCHAR(100) NOT NULL, numof_iddoc VARCHAR(100) NOT NULL, birth_act VARCHAR(100) NOT NULL, father_fisrtname VARCHAR(255) NOT NULL, father_lastname VARCHAR(255) NOT NULL, father_contact VARCHAR(25) NOT NULL, father_job VARCHAR(255) NOT NULL, father_email VARCHAR(255) NOT NULL, mother_fisrtname VARCHAR(255) NOT NULL, mother_lastname VARCHAR(255) NOT NULL, mother_contact VARCHAR(25) NOT NULL, mother_job VARCHAR(255) NOT NULL, mother_email VARCHAR(255) NOT NULL, guard_fisrtname VARCHAR(255) NOT NULL, guard_lastname VARCHAR(255) NOT NULL, guard_contact VARCHAR(25) NOT NULL, guard_job VARCHAR(255) NOT NULL, guard_email VARCHAR(255) NOT NULL, guard_residence VARCHAR(255) NOT NULL, yearof_admis VARCHAR(25) NOT NULL, typeof_exams VARCHAR(25) NOT NULL, series VARCHAR(100) NOT NULL, speciality VARCHAR(100) NOT NULL, diploma VARCHAR(100) NOT NULL, diploma_school VARCHAR(100) NOT NULL, yearof_bac VARCHAR(25) NOT NULL, numof_bac VARCHAR(25) NOT NULL, centerof_bac VARCHAR(25) NOT NULL, mention VARCHAR(50) NOT NULL, rankof_exams INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecu_speciality (acadyearid VARCHAR(15) NOT NULL, specialityid_id VARCHAR(15) NOT NULL, ueid_id VARCHAR(15) NOT NULL, semester_id VARCHAR(15) NOT NULL, ecuid_id VARCHAR(15) NOT NULL, creditvalue DOUBLE PRECISION NOT NULL, INDEX IDX_2D0E39ED8BAE186A (specialityid_id), INDEX IDX_2D0E39EDC263D751 (ueid_id), INDEX IDX_2D0E39ED4A798B6F (semester_id), INDEX IDX_2D0E39EDA5FED2F6 (ecuid_id), PRIMARY KEY(specialityid_id, ueid_id, semester_id, ecuid_id, acadyearid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level (id VARCHAR(15) NOT NULL, grade_id VARCHAR(15) NOT NULL, levelname VARCHAR(15) NOT NULL, INDEX IDX_9AEACC13FE19A1A8 (grade_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speciality (id VARCHAR(15) NOT NULL, specname VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speciality_grade (speciality_id VARCHAR(15) NOT NULL, grade_id VARCHAR(15) NOT NULL, INDEX IDX_8BFEE43F3B5A08D7 (speciality_id), INDEX IDX_8BFEE43FFE19A1A8 (grade_id), PRIMARY KEY(speciality_id, grade_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_exam_notes (studentid VARCHAR(15) NOT NULL, acadyearid VARCHAR(15) NOT NULL, specialityid VARCHAR(15) NOT NULL, typeof_examnotes VARCHAR(15) NOT NULL, ueid VARCHAR(15) NOT NULL, ecuid VARCHAR(15) NOT NULL, semesterid VARCHAR(15) NOT NULL, sessionid VARCHAR(15) NOT NULL, exam_notes DOUBLE PRECISION DEFAULT NULL, entry_date DATETIME NOT NULL, entry_user VARCHAR(255) NOT NULL, update_date DATETIME NOT NULL, update_user VARCHAR(255) NOT NULL, valid VARCHAR(255) DEFAULT NULL, valid_date DATETIME DEFAULT NULL, valid_user VARCHAR(255) DEFAULT NULL, PRIMARY KEY(studentid, acadyearid, specialityid, typeof_examnotes, ueid, ecuid, semesterid, sessionid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ue_validated (studentid VARCHAR(15) NOT NULL, acadyearid VARCHAR(15) NOT NULL, specialityid VARCHAR(15) NOT NULL, ueid VARCHAR(15) NOT NULL, semesterid VARCHAR(15) NOT NULL, sessionid VARCHAR(15) NOT NULL, creditvalided INT NOT NULL, ueaverage DOUBLE PRECISION NOT NULL, delib_date DATETIME NOT NULL, delib_user VARCHAR(255) NOT NULL, PRIMARY KEY(studentid, acadyearid, specialityid, ueid, semesterid, sessionid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_speciality (studentid VARCHAR(20) NOT NULL, levelid VARCHAR(15) NOT NULL, specialityid VARCHAR(15) NOT NULL, acadyearid VARCHAR(15) NOT NULL, school_classeid VARCHAR(15) NOT NULL, state VARCHAR(15) NOT NULL, scholar VARCHAR(15) NOT NULL, picture VARCHAR(255) NOT NULL, PRIMARY KEY(studentid, levelid, specialityid, acadyearid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE academic_year (id VARCHAR(15) NOT NULL, academic_year VARCHAR(15) NOT NULL, state VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE semester ADD CONSTRAINT FK_F7388EED5FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE ue_speciality ADD CONSTRAINT FK_E34573178BAE186A FOREIGN KEY (specialityid_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE ue_speciality ADD CONSTRAINT FK_E3457317C263D751 FOREIGN KEY (ueid_id) REFERENCES ue (id)');
        $this->addSql('ALTER TABLE ue_speciality ADD CONSTRAINT FK_E34573174A798B6F FOREIGN KEY (semester_id) REFERENCES semester (id)');
        $this->addSql('ALTER TABLE ecu_speciality ADD CONSTRAINT FK_2D0E39ED8BAE186A FOREIGN KEY (specialityid_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE ecu_speciality ADD CONSTRAINT FK_2D0E39EDC263D751 FOREIGN KEY (ueid_id) REFERENCES ue (id)');
        $this->addSql('ALTER TABLE ecu_speciality ADD CONSTRAINT FK_2D0E39ED4A798B6F FOREIGN KEY (semester_id) REFERENCES semester (id)');
        $this->addSql('ALTER TABLE ecu_speciality ADD CONSTRAINT FK_2D0E39EDA5FED2F6 FOREIGN KEY (ecuid_id) REFERENCES ecu (id)');
        $this->addSql('ALTER TABLE level ADD CONSTRAINT FK_9AEACC13FE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id)');
        $this->addSql('ALTER TABLE speciality_grade ADD CONSTRAINT FK_8BFEE43F3B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speciality_grade ADD CONSTRAINT FK_8BFEE43FFE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ue_speciality DROP FOREIGN KEY FK_E34573174A798B6F');
        $this->addSql('ALTER TABLE ecu_speciality DROP FOREIGN KEY FK_2D0E39ED4A798B6F');
        $this->addSql('ALTER TABLE ue_speciality DROP FOREIGN KEY FK_E3457317C263D751');
        $this->addSql('ALTER TABLE ecu_speciality DROP FOREIGN KEY FK_2D0E39EDC263D751');
        $this->addSql('ALTER TABLE level DROP FOREIGN KEY FK_9AEACC13FE19A1A8');
        $this->addSql('ALTER TABLE speciality_grade DROP FOREIGN KEY FK_8BFEE43FFE19A1A8');
        $this->addSql('ALTER TABLE ecu_speciality DROP FOREIGN KEY FK_2D0E39EDA5FED2F6');
        $this->addSql('ALTER TABLE semester DROP FOREIGN KEY FK_F7388EED5FB14BA7');
        $this->addSql('ALTER TABLE ue_speciality DROP FOREIGN KEY FK_E34573178BAE186A');
        $this->addSql('ALTER TABLE ecu_speciality DROP FOREIGN KEY FK_2D0E39ED8BAE186A');
        $this->addSql('ALTER TABLE speciality_grade DROP FOREIGN KEY FK_8BFEE43F3B5A08D7');
        $this->addSql('DROP TABLE half_yearly_delib');
        $this->addSql('DROP TABLE semester');
        $this->addSql('DROP TABLE ue');
        $this->addSql('DROP TABLE grade');
        $this->addSql('DROP TABLE school_class');
        $this->addSql('DROP TABLE teach_speciality');
        $this->addSql('DROP TABLE ue_speciality');
        $this->addSql('DROP TABLE ecu');
        $this->addSql('DROP TABLE exam_session');
        $this->addSql('DROP TABLE student_averages');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE ecu_speciality');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE speciality');
        $this->addSql('DROP TABLE speciality_grade');
        $this->addSql('DROP TABLE student_exam_notes');
        $this->addSql('DROP TABLE ue_validated');
        $this->addSql('DROP TABLE student_speciality');
        $this->addSql('DROP TABLE academic_year');
    }
}
