<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180611211956 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER SEQUENCE table_jeu_id_seq INCREMENT BY 1');
        $this->addSql('ALTER SEQUENCE table_jeu_type_id_seq INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE jeu_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE jeu (id INT NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER SEQUENCE table_jeu_id_seq INCREMENT BY 1');
        $this->addSql('ALTER SEQUENCE table_jeu_type_id_seq INCREMENT BY 1');
        $this->addSql('DROP SEQUENCE jeu_id_seq CASCADE');
        $this->addSql('DROP TABLE jeu');
    }
}
