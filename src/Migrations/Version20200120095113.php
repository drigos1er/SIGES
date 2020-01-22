<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200120095113 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE siges_role (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siges_role_siges_user (siges_role_id INT NOT NULL, siges_user_id INT NOT NULL, INDEX IDX_58204E34FDD7AF76 (siges_role_id), INDEX IDX_58204E348CBA5E4F (siges_user_id), PRIMARY KEY(siges_role_id, siges_user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE siges_role_siges_user ADD CONSTRAINT FK_58204E34FDD7AF76 FOREIGN KEY (siges_role_id) REFERENCES siges_role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE siges_role_siges_user ADD CONSTRAINT FK_58204E348CBA5E4F FOREIGN KEY (siges_user_id) REFERENCES siges_user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE siges_role_siges_user DROP FOREIGN KEY FK_58204E34FDD7AF76');
        $this->addSql('DROP TABLE siges_role');
        $this->addSql('DROP TABLE siges_role_siges_user');
    }
}
