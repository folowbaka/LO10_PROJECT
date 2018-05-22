<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180522223327 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER SEQUENCE table_id_seq INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE table_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE table_type (id INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE "table" ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE "table" DROP categorie');
        $this->addSql('ALTER TABLE "table" ADD CONSTRAINT FK_F6298F46C54C8C93 FOREIGN KEY (type_id) REFERENCES table_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F6298F46C54C8C93 ON "table" (type_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "table" DROP CONSTRAINT FK_F6298F46C54C8C93');
        $this->addSql('ALTER SEQUENCE table_id_seq INCREMENT BY 1');
        $this->addSql('DROP SEQUENCE table_type_id_seq CASCADE');
        $this->addSql('DROP TABLE table_type');
        $this->addSql('DROP INDEX IDX_F6298F46C54C8C93');
        $this->addSql('ALTER TABLE "table" ADD categorie VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "table" DROP type_id');
    }
}
