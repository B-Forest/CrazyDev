<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920123157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, sock_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, tw_class VARCHAR(255) NOT NULL, INDEX IDX_665648E912FBC9FA (sock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pair (id INT AUTO_INCREMENT NOT NULL, sock_id INT NOT NULL, other_sock_id INT NOT NULL, pair_story LONGTEXT NOT NULL, INDEX IDX_95A1E6912FBC9FA (sock_id), INDEX IDX_95A1E691A65796 (other_sock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pattern (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sock (id INT AUTO_INCREMENT NOT NULL, pair_id INT DEFAULT NULL, color_id INT NOT NULL, pattern_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, story VARCHAR(255) NOT NULL, is_found TINYINT(1) NOT NULL, is_matched TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8FF5DCC7E7927C74 (email), INDEX IDX_8FF5DCC77EB8B2A3 (pair_id), INDEX IDX_8FF5DCC77ADA1FB5 (color_id), INDEX IDX_8FF5DCC7F734A20F (pattern_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E912FBC9FA FOREIGN KEY (sock_id) REFERENCES sock (id)');
        $this->addSql('ALTER TABLE pair ADD CONSTRAINT FK_95A1E6912FBC9FA FOREIGN KEY (sock_id) REFERENCES sock (id)');
        $this->addSql('ALTER TABLE pair ADD CONSTRAINT FK_95A1E691A65796 FOREIGN KEY (other_sock_id) REFERENCES sock (id)');
        $this->addSql('ALTER TABLE sock ADD CONSTRAINT FK_8FF5DCC77EB8B2A3 FOREIGN KEY (pair_id) REFERENCES pair (id)');
        $this->addSql('ALTER TABLE sock ADD CONSTRAINT FK_8FF5DCC77ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE sock ADD CONSTRAINT FK_8FF5DCC7F734A20F FOREIGN KEY (pattern_id) REFERENCES pattern (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E912FBC9FA');
        $this->addSql('ALTER TABLE pair DROP FOREIGN KEY FK_95A1E6912FBC9FA');
        $this->addSql('ALTER TABLE pair DROP FOREIGN KEY FK_95A1E691A65796');
        $this->addSql('ALTER TABLE sock DROP FOREIGN KEY FK_8FF5DCC77EB8B2A3');
        $this->addSql('ALTER TABLE sock DROP FOREIGN KEY FK_8FF5DCC77ADA1FB5');
        $this->addSql('ALTER TABLE sock DROP FOREIGN KEY FK_8FF5DCC7F734A20F');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE pair');
        $this->addSql('DROP TABLE pattern');
        $this->addSql('DROP TABLE sock');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
