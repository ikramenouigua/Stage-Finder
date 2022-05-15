<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220514200649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offres DROP FOREIGN KEY FK_C6AC3544A21214B7');
        $this->addSql('DROP INDEX IDX_C6AC3544A21214B7 ON offres');
        $this->addSql('ALTER TABLE offres ADD duree INT NOT NULL, ADD remuneration INT NOT NULL, DROP categories_id, DROP price, DROP stock');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offres ADD categories_id INT NOT NULL, ADD price INT NOT NULL, ADD stock INT NOT NULL, DROP duree, DROP remuneration');
        $this->addSql('ALTER TABLE offres ADD CONSTRAINT FK_C6AC3544A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_C6AC3544A21214B7 ON offres (categories_id)');
    }
}
