<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180526144657 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE table_jeu_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE table_jeu_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE table_jeu (id INT NOT NULL, type_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description TEXT NOT NULL, ville VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, email_organisateur VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8B0107D1C54C8C93 ON table_jeu (type_id)');
        $this->addSql('CREATE TABLE table_jeu_type (id INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE table_jeu ADD CONSTRAINT FK_8B0107D1C54C8C93 FOREIGN KEY (type_id) REFERENCES table_jeu_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE table_jeu DROP CONSTRAINT FK_8B0107D1C54C8C93');
        $this->addSql('DROP SEQUENCE table_jeu_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE table_jeu_type_id_seq CASCADE');
        $this->addSql('DROP TABLE table_jeu');
        $this->addSql('DROP TABLE table_jeu_type');
    }
}
