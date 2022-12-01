<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221201093341 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE logger ADD quantity JSON NOT NULL');
        $this->addSql('ALTER TABLE logger ADD CONSTRAINT logger_user_order FOREIGN KEY (user_order_id) REFERENCES user_order (id)');
        $this->addSql('ALTER TABLE logger ADD CONSTRAINT logger_item_order FOREIGN KEY (item_order_id) REFERENCES item_order (id)');
    }

    public function down(Schema $schema): void
    {

    }
}
