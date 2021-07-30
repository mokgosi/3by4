<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210730174229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` ADD country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_F5299398F92F3E70 ON `order` (country_id)');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBF92F3E70');
        $this->addSql('DROP INDEX IDX_1ADAD7EBF92F3E70 ON patient');
        $this->addSql('ALTER TABLE patient DROP country_id, CHANGE create_at create_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398F92F3E70');
        $this->addSql('DROP INDEX IDX_F5299398F92F3E70 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP country_id');
        $this->addSql('ALTER TABLE patient ADD country_id INT DEFAULT NULL, CHANGE create_at create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EBF92F3E70 ON patient (country_id)');
    }
}
