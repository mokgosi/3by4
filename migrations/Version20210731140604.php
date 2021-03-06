<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210731140604 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, iso_code VARCHAR(3) DEFAULT NULL, currency VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country_kit (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, kit_id INT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_63BCAE89F92F3E70 (country_id), INDEX IDX_63BCAE893A8E60EF (kit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, kit_id INT NOT NULL, patient_id INT NOT NULL, paid TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_F5299398F92F3E70 (country_id), INDEX IDX_F52993983A8E60EF (kit_id), INDEX IDX_F52993986B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, email VARCHAR(50) NOT NULL, create_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_1ADAD7EBE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE country_kit ADD CONSTRAINT FK_63BCAE89F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE country_kit ADD CONSTRAINT FK_63BCAE893A8E60EF FOREIGN KEY (kit_id) REFERENCES kit (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993983A8E60EF FOREIGN KEY (kit_id) REFERENCES kit (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993986B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country_kit DROP FOREIGN KEY FK_63BCAE89F92F3E70');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398F92F3E70');
        $this->addSql('ALTER TABLE country_kit DROP FOREIGN KEY FK_63BCAE893A8E60EF');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993983A8E60EF');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993986B899279');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE country_kit');
        $this->addSql('DROP TABLE kit');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE patient');
    }
}
