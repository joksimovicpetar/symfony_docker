<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221104104335 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE Table order_info(
                                                  id INT PRIMARY KEY AUTO_INCREMENT,
                                                  full_name text,
                                                  address text,
                                                  phone_number text,
                                                  delivery_time text,
                                                  payment text,
                                                  order_date text,
                                                  note text,
                                                  user_order_id INT,
                                                  FOREIGN KEY (user_order_id) REFERENCES user_order(id)
                            )
                          CREATE Table user(
                                                  id INT PRIMARY KEY AUTO_INCREMENT,
                                                  username VARCHAR(255),
                                                  roles text,
                                                  password VARCHAR(255),
                                                  name VARCHAR(255),
                                                  address VARCHAR(255),
                                                  phone VARCHAR(255),
                            );
                    ');
    }

    public function down(Schema $schema): void
    {

    }
}
