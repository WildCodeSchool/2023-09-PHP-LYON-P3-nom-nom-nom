<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240116150345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, commentator_id INT DEFAULT NULL, recipe_id INT DEFAULT NULL, comment LONGTEXT DEFAULT NULL, note DOUBLE PRECISION DEFAULT NULL, INDEX IDX_9474526C506AFCC0 (commentator_id), INDEX IDX_9474526C59D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C506AFCC0 FOREIGN KEY (commentator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE favoritelist RENAME INDEX idx_1dbf2e0a76ed395 TO IDX_A1E95DDEA76ED395');
        $this->addSql('ALTER TABLE favoritelist RENAME INDEX idx_1dbf2e059d8a214 TO IDX_A1E95DDE59D8A214');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C506AFCC0');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C59D8A214');
        $this->addSql('DROP TABLE comment');
        $this->addSql('ALTER TABLE favoriteList RENAME INDEX idx_a1e95dde59d8a214 TO IDX_1DBF2E059D8A214');
        $this->addSql('ALTER TABLE favoriteList RENAME INDEX idx_a1e95ddea76ed395 TO IDX_1DBF2E0A76ED395');
    }
}
