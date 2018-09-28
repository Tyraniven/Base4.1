<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180928221916 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE docente DROP FOREIGN KEY FK_FD9FCFA43168F5F2');
        $this->addSql('DROP INDEX IDX_FD9FCFA43168F5F2 ON docente');
        $this->addSql('ALTER TABLE docente DROP id_docente_id, DROP cedula, CHANGE nombre nombre VARCHAR(255) NOT NULL, CHANGE apellido apellido VARCHAR(255) NOT NULL, CHANGE no_docente no_docente VARCHAR(255) NOT NULL, CHANGE telefono telefono INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE docente ADD id_docente_id INT NOT NULL, ADD cedula VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE nombre nombre VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE apellido apellido VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE telefono telefono VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE no_docente no_docente VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE docente ADD CONSTRAINT FK_FD9FCFA43168F5F2 FOREIGN KEY (id_docente_id) REFERENCES clase (id)');
        $this->addSql('CREATE INDEX IDX_FD9FCFA43168F5F2 ON docente (id_docente_id)');
    }
}
