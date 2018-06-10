<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180610174023 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER SEQUENCE table_jeu_id_seq INCREMENT BY 1');
        $this->addSql('ALTER SEQUENCE table_jeu_type_id_seq INCREMENT BY 1');
        $this->addSql('ALTER TABLE table_jeu ADD code_postal VARCHAR(5) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER SEQUENCE table_jeu_id_seq INCREMENT BY 1');
        $this->addSql('ALTER SEQUENCE table_jeu_type_id_seq INCREMENT BY 1');
        $this->addSql('ALTER TABLE table_jeu DROP code_postal');
    }
}
