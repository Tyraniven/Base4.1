<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180928222543 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE clase DROP FOREIGN KEY FK_199FACCECFA9EFC6');
        $this->addSql('DROP TABLE grupo');
        $this->addSql('DROP INDEX IDX_199FACCECFA9EFC6 ON clase');
        $this->addSql('ALTER TABLE clase CHANGE codigo_clase codigo_clase VARCHAR(255) NOT NULL, CHANGE nombre nombre VARCHAR(255) NOT NULL, CHANGE id_clase_id id_docente_id INT NOT NULL');
        $this->addSql('ALTER TABLE clase ADD CONSTRAINT FK_199FACCE3168F5F2 FOREIGN KEY (id_docente_id) REFERENCES docente (id)');
        $this->addSql('CREATE INDEX IDX_199FACCE3168F5F2 ON clase (id_docente_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE grupo (id INT AUTO_INCREMENT NOT NULL, codigo_grupo VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, nombre VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clase DROP FOREIGN KEY FK_199FACCE3168F5F2');
        $this->addSql('DROP INDEX IDX_199FACCE3168F5F2 ON clase');
        $this->addSql('ALTER TABLE clase CHANGE nombre nombre VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE codigo_clase codigo_clase VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE id_docente_id id_clase_id INT NOT NULL');
        $this->addSql('ALTER TABLE clase ADD CONSTRAINT FK_199FACCECFA9EFC6 FOREIGN KEY (id_clase_id) REFERENCES grupo (id)');
        $this->addSql('CREATE INDEX IDX_199FACCECFA9EFC6 ON clase (id_clase_id)');
    }
}
