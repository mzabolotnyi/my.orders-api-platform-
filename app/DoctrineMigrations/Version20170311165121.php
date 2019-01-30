<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170311165121 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shop ADD icon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA254B9D732 FOREIGN KEY (icon_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_AC6A4CA254B9D732 ON shop (icon_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA254B9D732');
        $this->addSql('DROP INDEX IDX_AC6A4CA254B9D732 ON shop');
        $this->addSql('ALTER TABLE shop DROP icon_id');
    }
}
