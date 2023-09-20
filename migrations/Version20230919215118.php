<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230919215118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pair ADD other_sock_id INT NOT NULL');
        $this->addSql('ALTER TABLE pair ADD CONSTRAINT FK_95A1E691A65796 FOREIGN KEY (other_sock_id) REFERENCES sock (id)');
        $this->addSql('CREATE INDEX IDX_95A1E691A65796 ON pair (other_sock_id)');
        $this->addSql('ALTER TABLE pattern DROP FOREIGN KEY FK_A3BCFC8E12FBC9FA');
        $this->addSql('DROP INDEX IDX_A3BCFC8E12FBC9FA ON pattern');
        $this->addSql('ALTER TABLE pattern DROP sock_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pair DROP FOREIGN KEY FK_95A1E691A65796');
        $this->addSql('DROP INDEX IDX_95A1E691A65796 ON pair');
        $this->addSql('ALTER TABLE pair DROP other_sock_id');
        $this->addSql('ALTER TABLE pattern ADD sock_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pattern ADD CONSTRAINT FK_A3BCFC8E12FBC9FA FOREIGN KEY (sock_id) REFERENCES sock (id)');
        $this->addSql('CREATE INDEX IDX_A3BCFC8E12FBC9FA ON pattern (sock_id)');
    }
}
