<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180619151633 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER SEQUENCE jeu_id_seq INCREMENT BY 1');
        $this->addSql('ALTER SEQUENCE table_jeu_id_seq INCREMENT BY 1');
        $this->addSql('ALTER SEQUENCE table_jeu_type_id_seq INCREMENT BY 1');
        $this->addSql('ALTER TABLE jeu ADD description TEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER SEQUENCE table_jeu_id_seq INCREMENT BY 1');
        $this->addSql('ALTER SEQUENCE table_jeu_type_id_seq INCREMENT BY 1');
        $this->addSql('ALTER SEQUENCE jeu_id_seq INCREMENT BY 1');
        $this->addSql('ALTER TABLE jeu DROP description');
    }
}
