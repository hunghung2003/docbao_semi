<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230625103717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE baiviet (id INT AUTO_INCREMENT NOT NULL, tacgia_id INT DEFAULT NULL, theloai_id INT DEFAULT NULL, tieude VARCHAR(255) NOT NULL, noidung VARCHAR(255) NOT NULL, ngayxuatban VARCHAR(255) NOT NULL, INDEX IDX_907F6E597610D6B0 (tacgia_id), INDEX IDX_907F6E59AD50A1BF (theloai_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE binhluan (id INT AUTO_INCREMENT NOT NULL, baiviet_id INT DEFAULT NULL, tacgia_id INT DEFAULT NULL, noidungbinhluan VARCHAR(255) NOT NULL, INDEX IDX_8758D7863EE8FA1B (baiviet_id), INDEX IDX_8758D7867610D6B0 (tacgia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tacgia (id INT AUTO_INCREMENT NOT NULL, tentacgia VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theloai (id INT AUTO_INCREMENT NOT NULL, tentheloai VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE baiviet ADD CONSTRAINT FK_907F6E597610D6B0 FOREIGN KEY (tacgia_id) REFERENCES tacgia (id)');
        $this->addSql('ALTER TABLE baiviet ADD CONSTRAINT FK_907F6E59AD50A1BF FOREIGN KEY (theloai_id) REFERENCES theloai (id)');
        $this->addSql('ALTER TABLE binhluan ADD CONSTRAINT FK_8758D7863EE8FA1B FOREIGN KEY (baiviet_id) REFERENCES baiviet (id)');
        $this->addSql('ALTER TABLE binhluan ADD CONSTRAINT FK_8758D7867610D6B0 FOREIGN KEY (tacgia_id) REFERENCES tacgia (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE baiviet DROP FOREIGN KEY FK_907F6E597610D6B0');
        $this->addSql('ALTER TABLE baiviet DROP FOREIGN KEY FK_907F6E59AD50A1BF');
        $this->addSql('ALTER TABLE binhluan DROP FOREIGN KEY FK_8758D7863EE8FA1B');
        $this->addSql('ALTER TABLE binhluan DROP FOREIGN KEY FK_8758D7867610D6B0');
        $this->addSql('DROP TABLE baiviet');
        $this->addSql('DROP TABLE binhluan');
        $this->addSql('DROP TABLE tacgia');
        $this->addSql('DROP TABLE theloai');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
