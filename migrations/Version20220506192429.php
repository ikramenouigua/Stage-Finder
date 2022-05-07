<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220506192429 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A6C8A81A9');
        $this->addSql('ALTER TABLE orders_details DROP FOREIGN KEY FK_835379F16C8A81A9');
        $this->addSql('CREATE TABLE offres (id INT AUTO_INCREMENT NOT NULL, categories_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price INT NOT NULL, stock INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, INDEX IDX_C6AC3544A21214B7 (categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offres ADD CONSTRAINT FK_C6AC3544A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP INDEX IDX_E01FBE6A6C8A81A9 ON images');
        $this->addSql('ALTER TABLE images CHANGE products_id offres_id INT NOT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A6C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6A6C83CD9F ON images (offres_id)');
        $this->addSql('DROP INDEX IDX_835379F16C8A81A9 ON orders_details');
        $this->addSql('ALTER TABLE orders_details DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE orders_details CHANGE products_id offres_id INT NOT NULL');
        $this->addSql('ALTER TABLE orders_details ADD CONSTRAINT FK_835379F16C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id)');
        $this->addSql('CREATE INDEX IDX_835379F16C83CD9F ON orders_details (offres_id)');
        $this->addSql('ALTER TABLE orders_details ADD PRIMARY KEY (orders_id, offres_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A6C83CD9F');
        $this->addSql('ALTER TABLE orders_details DROP FOREIGN KEY FK_835379F16C83CD9F');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, categories_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, price INT NOT NULL, stock INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_B3BA5A5AA21214B7 (categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('DROP TABLE offres');
        $this->addSql('DROP INDEX IDX_E01FBE6A6C83CD9F ON images');
        $this->addSql('ALTER TABLE images CHANGE offres_id products_id INT NOT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6A6C8A81A9 ON images (products_id)');
        $this->addSql('DROP INDEX IDX_835379F16C83CD9F ON orders_details');
        $this->addSql('ALTER TABLE orders_details DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE orders_details CHANGE offres_id products_id INT NOT NULL');
        $this->addSql('ALTER TABLE orders_details ADD CONSTRAINT FK_835379F16C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_835379F16C8A81A9 ON orders_details (products_id)');
        $this->addSql('ALTER TABLE orders_details ADD PRIMARY KEY (orders_id, products_id)');
    }
}
