<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180611185849 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER SEQUENCE table_jeu_id_seq INCREMENT BY 1');
        $this->addSql('ALTER SEQUENCE table_jeu_type_id_seq INCREMENT BY 1');
        $this->addSql('CREATE TABLE utilisateur (email VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, PRIMARY KEY(email))');
        $this->addSql('ALTER TABLE table_jeu RENAME COLUMN email_organisateur TO email_utilisateur_id');
        $this->addSql('ALTER TABLE table_jeu ADD CONSTRAINT FK_8B0107D12377FD86 FOREIGN KEY (email_utilisateur_id) REFERENCES utilisateur (email) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8B0107D12377FD86 ON table_jeu (email_utilisateur_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE table_jeu DROP CONSTRAINT FK_8B0107D12377FD86');
        $this->addSql('ALTER SEQUENCE table_jeu_id_seq INCREMENT BY 1');
        $this->addSql('ALTER SEQUENCE table_jeu_type_id_seq INCREMENT BY 1');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP INDEX IDX_8B0107D12377FD86');
        $this->addSql('ALTER TABLE table_jeu RENAME COLUMN email_utilisateur_id TO email_organisateur');
    }
}
