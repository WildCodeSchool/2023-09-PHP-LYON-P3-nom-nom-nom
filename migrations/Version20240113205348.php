<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240113205348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favoritelist (user_id INT NOT NULL, recipe_id INT NOT NULL, INDEX IDX_1DBF2E0A76ED395 (user_id), INDEX IDX_1DBF2E059D8A214 (recipe_id), PRIMARY KEY(user_id, recipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE favoritelist ADD CONSTRAINT FK_1DBF2E0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoritelist ADD CONSTRAINT FK_1DBF2E059D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favoritelist DROP FOREIGN KEY FK_1DBF2E0A76ED395');
        $this->addSql('ALTER TABLE favoritelist DROP FOREIGN KEY FK_1DBF2E059D8A214');
        $this->addSql('DROP TABLE favoritelist');
    }
}
