<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221017090813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'DB structure';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('
                            CREATE Table image(
                                                 id INT PRIMARY KEY AUTO_INCREMENT,
                                                 image_path text
                            );
                            
                            CREATE Table bowl(
                                                id INT PRIMARY KEY AUTO_INCREMENT,
                                                name varchar(255),
                                                description text,
                                                image_id INT,
                                                FOREIGN KEY (image_id) REFERENCES image(id)
                            );
                            
                            CREATE Table base(
                                                 id INT PRIMARY KEY AUTO_INCREMENT,
                                                 name varchar(255),
                                                 description text,
                                                 image_id INT,
                                                 FOREIGN KEY (image_id) REFERENCES image(id)
                            );
                            
                            CREATE Table sauce(
                                                 id INT PRIMARY KEY AUTO_INCREMENT,
                                                 name varchar(255),
                                                 description text
                            );
                            
                            CREATE Table ingridient(
                                                 id INT PRIMARY KEY AUTO_INCREMENT,
                                                 name varchar(255)
                            );
                            
                            CREATE Table size(
                                                  id INT PRIMARY KEY AUTO_INCREMENT,
                                                  name varchar(255),
                                                  description text,
                                                  currency varchar(100),
                                                  price double
                            );
                            
                            CREATE Table extra_ingridient(
                                                 id INT PRIMARY KEY AUTO_INCREMENT,
                                                 name varchar(255),
                                                 currency varchar(100),
                                                 price double
                            );
                            
                            CREATE Table item_order(
                                                  id INT PRIMARY KEY AUTO_INCREMENT,
                                                  bowl_id INT,
                                                  size_id INT,
                                                  base_id INT,
                                                  sauce_id INT,
                                                  FOREIGN KEY (bowl_id) REFERENCES bowl(id),
                                                  FOREIGN KEY (size_id) REFERENCES size(id),
                                                  FOREIGN KEY (base_id) REFERENCES base(id),
                                                  FOREIGN KEY (sauce_id) REFERENCES sauce(id)
                            );
                            
                            CREATE Table item_order_ingridient(
                                                 id INT PRIMARY KEY AUTO_INCREMENT,
                                                 item_order_id INT,
                                                 ingridient_id INT,
                                                 FOREIGN KEY (item_order_id) REFERENCES item_order(id),
                                                 FOREIGN KEY (ingridient_id) REFERENCES ingridient(id)
                            );
                            
                            CREATE TABLE item_order_extra_ingridient (
                                                  id INT PRIMARY KEY AUTO_INCREMENT,
                                                  item_order_id int NOT NULL,
                                                  extra_ingridient_id int NOT NULL,
                                                  FOREIGN KEY (item_order_id) REFERENCES item_order(id),
                                                  FOREIGN KEY (extra_ingridient_id) REFERENCES extra_ingridient(id)
                            );
        ');
    }

    public function down(Schema $schema): void
    {

    }
}
