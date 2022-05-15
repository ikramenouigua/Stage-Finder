<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220515013957 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offres DROP FOREIGN KEY FK_C6AC35443F9CD80D');
        $this->addSql('DROP INDEX IDX_C6AC35443F9CD80D ON offres');
        $this->addSql('ALTER TABLE offres CHANGE idE id_e_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offres ADD CONSTRAINT FK_C6AC35443F9CD80D FOREIGN KEY (id_e_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_C6AC35443F9CD80D ON offres (id_e_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offres DROP FOREIGN KEY FK_C6AC35443F9CD80D');
        $this->addSql('DROP INDEX IDX_C6AC35443F9CD80D ON offres');
        $this->addSql('ALTER TABLE offres CHANGE id_e_id idE INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offres ADD CONSTRAINT FK_C6AC35443F9CD80D FOREIGN KEY (idE) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_C6AC35443F9CD80D ON offres (idE)');
    }
}
