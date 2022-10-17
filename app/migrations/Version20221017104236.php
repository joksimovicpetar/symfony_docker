<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221017104236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {

        $this->addSql("
                            INSERT INTO symfony_docker.image (id, image_path) VALUES (1, 'uploads/white_rice.png');
                            INSERT INTO symfony_docker.image (id, image_path) VALUES (2, 'uploads/brown_rice.png');
                            INSERT INTO symfony_docker.image (id, image_path) VALUES (3, 'uploads/quinoa.png');
                            INSERT INTO symfony_docker.image (id, image_path) VALUES (4, 'uploads/chicken_poke_bowl.png');
                            INSERT INTO symfony_docker.image (id, image_path) VALUES (5, 'uploads/salmon_poke_bowl.png');
                            INSERT INTO symfony_docker.image (id, image_path) VALUES (6, 'uploads/tuna_poke_bowl.png');
                            INSERT INTO symfony_docker.image (id, image_path) VALUES (7, 'uploads/vegan_poke_bowl.png');
                            
                            INSERT INTO symfony_docker.base (id, name, description, image_id) VALUES (1, 'White Rice', 'Because white rice is missing the bran and the germ, it''s a simpler carbohydrate, meaning your body has an easier time breaking it down.', 1);
                            INSERT INTO symfony_docker.base (id, name, description, image_id) VALUES (2, 'Brown Rice', 'Brown rice is a rich source of dietary fiber, which can reduce your risk of death from heart disease.', 2);
                            INSERT INTO symfony_docker.base (id, name, description, image_id) VALUES (3, 'Quinoa', 'The fiber in quinoa can help with cholesterol and blood sugar levels. Is rich in antioxidants, which can prevent damage to your heart and other organs.', 3);
                            
                            INSERT INTO symfony_docker.bowl (id, name, description, image_id) VALUES (1, 'Chicken Poke Bowl', 'Chicken meat is one of the leading sources of proteins for humans due to its availability.', 4);
                            INSERT INTO symfony_docker.bowl (id, name, description, image_id) VALUES (2, 'Salmon Poke Bowl', 'Salmon is a great source of protein, healthy fats, and various essential vitamins and minerals.', 5);
                            INSERT INTO symfony_docker.bowl (id, name, description, image_id) VALUES (3, 'Tuna Poke Bowl', 'Tuna is rich in potassium – a mineral that lowers the blood pressure significantly.', 6);
                            INSERT INTO symfony_docker.bowl (id, name, description, image_id) VALUES (4, 'Vegan Poke Bowl', 'TA vegan diet reduces your risk of heart disease by lowering cholesterol levels.', 7);

                            INSERT INTO symfony_docker.sauce (id, name, description) VALUES (1, 'Ponzu sauce', 'Ponzu sauce is a Japanese dipping sauce made from soy sauce or tamari, citrus juice, mirin, katsuobushi (bonito flakes), kombu (kelp), and rice vinegar.');
                            INSERT INTO symfony_docker.sauce (id, name, description) VALUES (2, 'Ginger sauce', 'The sauce is made with peeled and finely chopped fresh ginger, light soy sauce, and rice vinegar.');
                            INSERT INTO symfony_docker.sauce (id, name, description) VALUES (3, 'Sesame sauce', 'Chinese sesame paste is a richly flavored, thick paste made from toasted white sesame seeds.');
                            INSERT INTO symfony_docker.sauce (id, name, description) VALUES (4, 'Eel sauce', 'Easy to make, eel sauce is a simple reduction of only four ingredients: sake, mirin, sugar, and soy sauce.');
                            INSERT INTO symfony_docker.sauce (id, name, description) VALUES (5, 'Wasabi sauce', 'True wasabi is made from the rhizome (like a plant stem that grows underground where you would expect to see a root) of the Wasabia japonica plant.');
                            INSERT INTO symfony_docker.sauce (id, name, description) VALUES (6, 'Korean spicy sauce', 'This delicious, distinctive taste comes from gochujang, a fermented Korean chili paste made from glutinous rice, fermented soybeans, red chili pepper flakes, and salt.');
                            INSERT INTO symfony_docker.sauce (id, name, description) VALUES (7, 'Soy sauce', 'Soy sauce is known as shoyu and soya sauce. It''s made with soybeans, wheat, salt, and a fermenting agent.');
                            INSERT INTO symfony_docker.sauce (id, name, description) VALUES (8, 'Tai Peanut sauce', 'Thai Peanut Sauce is made up of peanut butter, soy sauce, ginger, a sweetener (I used maple syrup), rice wine vinegar, sesame seeds, a spice and water.');
                                                       
                            INSERT INTO symfony_docker.size (id, name, description, currency, price) VALUES (1, 'Small', 'Contains 30 grams and up to 5 additional ingredients.', '$', 5);
                            INSERT INTO symfony_docker.size (id, name, description, currency, price) VALUES (2, 'Medium', 'Contains 60 grams and up to 8 additional ingredients.', '$', 6.99);
                            INSERT INTO symfony_docker.size (id, name, description, currency, price) VALUES (3, 'Large', 'Contains 100 grams of salmon and up to 10 additional ingredients.', '$', 8.99);

                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (1, 'Avocado');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (2, 'Edamame');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (3, 'Spring Onion');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (4, 'Chili pepper');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (5, 'Shallots');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (6, 'Carrot');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (7, 'Green Salad');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (8, 'Beet');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (9, 'Pickles');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (10, 'Cucumber');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (11, 'Corn');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (12, 'Mango');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (13, 'Wasabi');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (14, 'Pineapple');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (15, 'Kohlrabi');
                            INSERT INTO symfony_docker.ingridient (id, name) VALUES (16, 'Nori algae');
                            
                            INSERT INTO symfony_docker.extra_ingridient (id, name, currency, price) VALUES (1, 'Avocado +4 slices', '$', 0.99);
                            INSERT INTO symfony_docker.extra_ingridient (id, name, currency, price) VALUES (2, 'Guacamole paste', '$', 0.49);
                            INSERT INTO symfony_docker.extra_ingridient (id, name, currency, price) VALUES (3, 'Ginger', '$', 0.49);
                            INSERT INTO symfony_docker.extra_ingridient (id, name, currency, price) VALUES (4, 'Wakame algae', '$', 0.99);
                            INSERT INTO symfony_docker.extra_ingridient (id, name, currency, price) VALUES (5, 'Black sesame', '$', 0.49);
                            INSERT INTO symfony_docker.extra_ingridient (id, name, currency, price) VALUES (6, 'Pumpkin seeds', '$', 0.99);
                            INSERT INTO symfony_docker.extra_ingridient (id, name, currency, price) VALUES (7, 'Shiitake mushrooms', '$', 0.49);
                            INSERT INTO symfony_docker.extra_ingridient (id, name, currency, price) VALUES (8, 'Tuna +50g', '$', 1.49);
                            INSERT INTO symfony_docker.extra_ingridient (id, name, currency, price) VALUES (9, 'Salmon +50g', '$', 1.49);
                            INSERT INTO symfony_docker.extra_ingridient (id, name, currency, price) VALUES (10, 'Chicken +50g', '$', 0.49);
                            
                            INSERT INTO symfony_docker.item_order (id, bowl_id, size_id, base_id, sauce_id) VALUES (1, null, null, null, null);
                            INSERT INTO symfony_docker.item_order (id, bowl_id, size_id, base_id, sauce_id) VALUES (2, null, null, null, null);
                            INSERT INTO symfony_docker.item_order (id, bowl_id, size_id, base_id, sauce_id) VALUES (3, null, null, null, null);
                            INSERT INTO symfony_docker.item_order (id, bowl_id, size_id, base_id, sauce_id) VALUES (4, null, null, null, null);
                            INSERT INTO symfony_docker.item_order (id, bowl_id, size_id, base_id, sauce_id) VALUES (5, null, null, null, null);
                            INSERT INTO symfony_docker.item_order (id, bowl_id, size_id, base_id, sauce_id) VALUES (6, null, null, null, null);
                            INSERT INTO symfony_docker.item_order (id, bowl_id, size_id, base_id, sauce_id) VALUES (7, null, null, null, null);
                            INSERT INTO symfony_docker.item_order (id, bowl_id, size_id, base_id, sauce_id) VALUES (8, null, null, null, null);

                            INSERT INTO symfony_docker.item_order_extra_ingridient (id, item_order_id, extra_ingridient_id) VALUES (1, 1, 1);
                            INSERT INTO symfony_docker.item_order_extra_ingridient (id, item_order_id, extra_ingridient_id) VALUES (2, 1, 2);
                            INSERT INTO symfony_docker.item_order_extra_ingridient (id, item_order_id, extra_ingridient_id) VALUES (3, 1, 3);
                            INSERT INTO symfony_docker.item_order_extra_ingridient (id, item_order_id, extra_ingridient_id) VALUES (4, 2, 1);
                            INSERT INTO symfony_docker.item_order_extra_ingridient (id, item_order_id, extra_ingridient_id) VALUES (5, 2, 2);
                            INSERT INTO symfony_docker.item_order_extra_ingridient (id, item_order_id, extra_ingridient_id) VALUES (6, 2, 3);
                                                      
                            INSERT INTO symfony_docker.item_order_ingridient (id, item_order_id, ingridient_id) VALUES (3, 1, 1);
                            INSERT INTO symfony_docker.item_order_ingridient (id, item_order_id, ingridient_id) VALUES (4, 1, 2);
                            INSERT INTO symfony_docker.item_order_ingridient (id, item_order_id, ingridient_id) VALUES (5, 2, 3);
                            INSERT INTO symfony_docker.item_order_ingridient (id, item_order_id, ingridient_id) VALUES (6, 2, 4);
                            INSERT INTO symfony_docker.item_order_ingridient (id, item_order_id, ingridient_id) VALUES (7, 2, 5);
                                                      
        ");

    }

    public function down(Schema $schema): void
    {


    }
}
