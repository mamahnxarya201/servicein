<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250120073959 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE katalog (
          id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\',
          tipe VARCHAR(255) NOT NULL,
          name VARCHAR(255) NOT NULL,
          harga VARCHAR(255) NOT NULL,
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_schedule (
          id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\',
          user_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\',
          detail VARCHAR(255) NOT NULL,
          alamat VARCHAR(255) NOT NULL,
          notelp VARCHAR(255) NOT NULL,
          date DATETIME NOT NULL,
          type VARCHAR(255) NOT NULL,
          INDEX IDX_A34E4AC6A76ED395 (user_id),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE
          service_schedule
        ADD
          CONSTRAINT FK_A34E4AC6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE
          paket
        ADD
          user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\',
        ADD
          barang_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE
          paket
        ADD
          CONSTRAINT FK_B70A89B2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE
          paket
        ADD
          CONSTRAINT FK_B70A89B229711AE0 FOREIGN KEY (barang_id) REFERENCES katalog (id)');
        $this->addSql('CREATE INDEX IDX_B70A89B2A76ED395 ON paket (user_id)');
        $this->addSql('CREATE INDEX IDX_B70A89B229711AE0 ON paket (barang_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE paket DROP FOREIGN KEY FK_B70A89B229711AE0');
        $this->addSql('ALTER TABLE service_schedule DROP FOREIGN KEY FK_A34E4AC6A76ED395');
        $this->addSql('DROP TABLE katalog');
        $this->addSql('DROP TABLE service_schedule');
        $this->addSql('ALTER TABLE paket DROP FOREIGN KEY FK_B70A89B2A76ED395');
        $this->addSql('DROP INDEX IDX_B70A89B2A76ED395 ON paket');
        $this->addSql('DROP INDEX IDX_B70A89B229711AE0 ON paket');
        $this->addSql('ALTER TABLE paket DROP user_id, DROP barang_id');
    }
}
