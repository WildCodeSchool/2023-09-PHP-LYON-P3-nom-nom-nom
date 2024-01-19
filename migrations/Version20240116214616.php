<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240116214616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE favoriteList RENAME INDEX idx_1dbf2e0a76ed395 TO IDX_A1E95DDEA76ED395');
        $this->addSql('ALTER TABLE favoriteList RENAME INDEX idx_1dbf2e059d8a214 TO IDX_A1E95DDE59D8A214');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe DROP slug');
        $this->addSql('ALTER TABLE favoriteList RENAME INDEX idx_a1e95dde59d8a214 TO IDX_1DBF2E059D8A214');
        $this->addSql('ALTER TABLE favoriteList RENAME INDEX idx_a1e95ddea76ed395 TO IDX_1DBF2E0A76ED395');
    }
}
