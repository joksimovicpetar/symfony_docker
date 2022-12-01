<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221201142842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE logger (id INT AUTO_INCREMENT NOT NULL, user_order_id INT DEFAULT NULL, item_order_id INT DEFAULT NULL, quantity JSON NOT NULL, INDEX IDX_987E13F36D128938 (user_order_id), INDEX IDX_987E13F3E192A5F3 (item_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE logger ADD CONSTRAINT logger_user_order FOREIGN KEY (user_order_id) REFERENCES user_order (id)');
        $this->addSql('ALTER TABLE logger ADD CONSTRAINT logger_item_order FOREIGN KEY (item_order_id) REFERENCES item_order (id)');

    }

    public function down(Schema $schema): void
    {

    }
}
