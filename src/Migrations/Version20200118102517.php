<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200118102517 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE siges_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(150) NOT NULL, firstname VARCHAR(150) NOT NULL, lastname VARCHAR(255) NOT NULL, gender VARCHAR(1) NOT NULL, type VARCHAR(150) NOT NULL, phone VARCHAR(25) DEFAULT NULL, birthdate DATE DEFAULT NULL, email VARCHAR(255) NOT NULL, title VARCHAR(150) DEFAULT NULL, speciality VARCHAR(255) DEFAULT NULL, discipline VARCHAR(255) DEFAULT NULL, up VARCHAR(255) DEFAULT NULL, picture VARCHAR(150) DEFAULT NULL, updprofil TINYINT(1) NOT NULL, enabled TINYINT(1) NOT NULL, last_login DATETIME DEFAULT NULL, password VARCHAR(255) NOT NULL, token VARCHAR(255) DEFAULT NULL, creatdat DATETIME NOT NULL, pwddate DATETIME NOT NULL, tokendat DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE siges_user');
    }
}
