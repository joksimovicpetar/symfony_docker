<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221125135021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE Table category(
                                id INT PRIMARY KEY AUTO_INCREMENT,
                                name text
                            );
                           ALTER TABLE `bowl`
                           ADD COLUMN category INT;

                           ALTER TABLE `bowl`
                           ADD CONSTRAINT `bowl_category`
                                FOREIGN KEY (`category`) REFERENCES category (id);
                                    
        ');
    }

    public function down(Schema $schema): void
    {

    }
}
