<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221201143833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {

        $this->addSql('ALTER TABLE logger DROP FOREIGN KEY logger_user_order');
        $this->addSql('DROP INDEX IDX_987E13F36D128938 ON logger');
        $this->addSql('ALTER TABLE logger ADD time_of_change DATETIME NOT NULL, DROP user_order_id');

    }

    public function down(Schema $schema): void
    {

    }
}
