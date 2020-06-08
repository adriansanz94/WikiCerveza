<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200608091701 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D6493A909126 (nombre), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cerveza (id INT AUTO_INCREMENT NOT NULL, categoria_id INT DEFAULT NULL, nombre VARCHAR(255) DEFAULT NULL, graduacion DOUBLE PRECISION DEFAULT NULL, INDEX IDX_133492793397707A (categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cerveza_etiqueta (cerveza_id INT NOT NULL, etiqueta_id INT NOT NULL, INDEX IDX_AB57D42C5FA28AD1 (cerveza_id), INDEX IDX_AB57D42CD53DA3AB (etiqueta_id), PRIMARY KEY(cerveza_id, etiqueta_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etiqueta (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(1000) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cerveza ADD CONSTRAINT FK_133492793397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE cerveza_etiqueta ADD CONSTRAINT FK_AB57D42C5FA28AD1 FOREIGN KEY (cerveza_id) REFERENCES cerveza (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cerveza_etiqueta ADD CONSTRAINT FK_AB57D42CD53DA3AB FOREIGN KEY (etiqueta_id) REFERENCES etiqueta (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cerveza_etiqueta DROP FOREIGN KEY FK_AB57D42C5FA28AD1');
        $this->addSql('ALTER TABLE cerveza_etiqueta DROP FOREIGN KEY FK_AB57D42CD53DA3AB');
        $this->addSql('ALTER TABLE cerveza DROP FOREIGN KEY FK_133492793397707A');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE cerveza');
        $this->addSql('DROP TABLE cerveza_etiqueta');
        $this->addSql('DROP TABLE etiqueta');
        $this->addSql('DROP TABLE categoria');
    }
}
