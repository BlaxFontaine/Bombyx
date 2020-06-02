<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200602125548 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE caregiver ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD is_verified TINYINT(1) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_27A9DEC5E7927C74 ON caregiver (email)');
        $this->addSql('ALTER TABLE pupil ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD is_verified TINYINT(1) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7DBD2B1E7927C74 ON pupil (email)');
        $this->addSql('ALTER TABLE teacher ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD is_verified TINYINT(1) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B0F6A6D5E7927C74 ON teacher (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX UNIQ_27A9DEC5E7927C74 ON caregiver');
        $this->addSql('ALTER TABLE caregiver DROP email, DROP roles, DROP password, DROP is_verified');
        $this->addSql('DROP INDEX UNIQ_C7DBD2B1E7927C74 ON pupil');
        $this->addSql('ALTER TABLE pupil DROP email, DROP roles, DROP password, DROP is_verified');
        $this->addSql('DROP INDEX UNIQ_B0F6A6D5E7927C74 ON teacher');
        $this->addSql('ALTER TABLE teacher DROP email, DROP roles, DROP password, DROP is_verified');
    }
}
