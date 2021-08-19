<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210819134411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81D8A48BBD');
        $this->addSql('DROP INDEX IDX_D4E6F81D8A48BBD ON address');
        $this->addSql('ALTER TABLE address CHANGE country_id_id country_id INT NOT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_D4E6F81F92F3E70 ON address (country_id)');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F48E1E977');
        $this->addSql('DROP INDEX IDX_4FBF094F48E1E977 ON company');
        $this->addSql('ALTER TABLE company CHANGE address_id_id address_id INT NOT NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_4FBF094FF5B7AF75 ON company (address_id)');
        $this->addSql('ALTER TABLE food DROP FOREIGN KEY FK_D43829F79D86650F');
        $this->addSql('ALTER TABLE food DROP FOREIGN KEY FK_D43829F7D6277CB3');
        $this->addSql('DROP INDEX IDX_D43829F7D6277CB3 ON food');
        $this->addSql('DROP INDEX IDX_D43829F79D86650F ON food');
        $this->addSql('ALTER TABLE food ADD food_name_id INT NOT NULL, ADD user_id INT NOT NULL, DROP food_name_id_id, DROP user_id_id');
        $this->addSql('ALTER TABLE food ADD CONSTRAINT FK_D43829F73E8840EE FOREIGN KEY (food_name_id) REFERENCES food_name (id)');
        $this->addSql('ALTER TABLE food ADD CONSTRAINT FK_D43829F7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D43829F73E8840EE ON food (food_name_id)');
        $this->addSql('CREATE INDEX IDX_D43829F7A76ED395 ON food (user_id)');
        $this->addSql('ALTER TABLE food_name DROP FOREIGN KEY FK_EB04D6D79D86650F');
        $this->addSql('DROP INDEX IDX_EB04D6D79D86650F ON food_name');
        $this->addSql('ALTER TABLE food_name CHANGE user_id_id user_id INT NOT NULL, CHANGE created_at created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE food_name ADD CONSTRAINT FK_EB04D6D7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_EB04D6D7A76ED395 ON food_name (user_id)');
        $this->addSql('ALTER TABLE house DROP FOREIGN KEY FK_67D5399D48E1E977');
        $this->addSql('DROP INDEX IDX_67D5399D48E1E977 ON house');
        $this->addSql('ALTER TABLE house CHANGE address_id_id address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE house ADD CONSTRAINT FK_67D5399DF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('CREATE INDEX IDX_67D5399DF5B7AF75 ON house (address_id)');
        $this->addSql('ALTER TABLE inventory_location DROP FOREIGN KEY FK_EAD4335AA4A739AF');
        $this->addSql('DROP INDEX IDX_EAD4335AA4A739AF ON inventory_location');
        $this->addSql('ALTER TABLE inventory_location CHANGE house_id_id house_id INT NOT NULL');
        $this->addSql('ALTER TABLE inventory_location ADD CONSTRAINT FK_EAD4335A6BB74515 FOREIGN KEY (house_id) REFERENCES house (id)');
        $this->addSql('CREATE INDEX IDX_EAD4335A6BB74515 ON inventory_location (house_id)');
        $this->addSql('ALTER TABLE inventory_location_image DROP FOREIGN KEY FK_9D27ABCB3ABE0B4');
        $this->addSql('DROP INDEX IDX_9D27ABCB3ABE0B4 ON inventory_location_image');
        $this->addSql('ALTER TABLE inventory_location_image CHANGE inventory_location_id_id inventory_location_id INT NOT NULL');
        $this->addSql('ALTER TABLE inventory_location_image ADD CONSTRAINT FK_9D27ABC72BF1D41 FOREIGN KEY (inventory_location_id) REFERENCES inventory_location (id)');
        $this->addSql('CREATE INDEX IDX_9D27ABC72BF1D41 ON inventory_location_image (inventory_location_id)');
        $this->addSql('ALTER TABLE item_info DROP FOREIGN KEY FK_3B975AC4F9775AE');
        $this->addSql('ALTER TABLE item_info DROP FOREIGN KEY FK_3B975AC55E38587');
        $this->addSql('ALTER TABLE item_info DROP FOREIGN KEY FK_3B975ACB3ABE0B4');
        $this->addSql('DROP INDEX IDX_3B975AC55E38587 ON item_info');
        $this->addSql('DROP INDEX IDX_3B975ACB3ABE0B4 ON item_info');
        $this->addSql('DROP INDEX IDX_3B975AC4F9775AE ON item_info');
        $this->addSql('ALTER TABLE item_info ADD retailer_id INT DEFAULT NULL, ADD inventory_location_id INT DEFAULT NULL, DROP retailer_id_id, DROP inventory_location_id_id, CHANGE item_id_id item_id INT NOT NULL');
        $this->addSql('ALTER TABLE item_info ADD CONSTRAINT FK_3B975AC126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE item_info ADD CONSTRAINT FK_3B975AC23F5ED09 FOREIGN KEY (retailer_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE item_info ADD CONSTRAINT FK_3B975AC72BF1D41 FOREIGN KEY (inventory_location_id) REFERENCES inventory_location (id)');
        $this->addSql('CREATE INDEX IDX_3B975AC126F525E ON item_info (item_id)');
        $this->addSql('CREATE INDEX IDX_3B975AC23F5ED09 ON item_info (retailer_id)');
        $this->addSql('CREATE INDEX IDX_3B975AC72BF1D41 ON item_info (inventory_location_id)');
        $this->addSql('ALTER TABLE related_item DROP FOREIGN KEY FK_F409811B55E38587');
        $this->addSql('ALTER TABLE related_item DROP FOREIGN KEY FK_F409811BDF2E8D37');
        $this->addSql('DROP INDEX IDX_F409811B55E38587 ON related_item');
        $this->addSql('DROP INDEX IDX_F409811BDF2E8D37 ON related_item');
        $this->addSql('ALTER TABLE related_item ADD item_id INT NOT NULL, ADD related_item_id INT NOT NULL, DROP item_id_id, DROP related_item_id_id');
        $this->addSql('ALTER TABLE related_item ADD CONSTRAINT FK_F409811B126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE related_item ADD CONSTRAINT FK_F409811B2D7698FB FOREIGN KEY (related_item_id) REFERENCES item (id)');
        $this->addSql('CREATE INDEX IDX_F409811B126F525E ON related_item (item_id)');
        $this->addSql('CREATE INDEX IDX_F409811B2D7698FB ON related_item (related_item_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81F92F3E70');
        $this->addSql('DROP INDEX IDX_D4E6F81F92F3E70 ON address');
        $this->addSql('ALTER TABLE address CHANGE country_id country_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81D8A48BBD FOREIGN KEY (country_id_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_D4E6F81D8A48BBD ON address (country_id_id)');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FF5B7AF75');
        $this->addSql('DROP INDEX IDX_4FBF094FF5B7AF75 ON company');
        $this->addSql('ALTER TABLE company CHANGE address_id address_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F48E1E977 FOREIGN KEY (address_id_id) REFERENCES address (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_4FBF094F48E1E977 ON company (address_id_id)');
        $this->addSql('ALTER TABLE food DROP FOREIGN KEY FK_D43829F73E8840EE');
        $this->addSql('ALTER TABLE food DROP FOREIGN KEY FK_D43829F7A76ED395');
        $this->addSql('DROP INDEX IDX_D43829F73E8840EE ON food');
        $this->addSql('DROP INDEX IDX_D43829F7A76ED395 ON food');
        $this->addSql('ALTER TABLE food ADD food_name_id_id INT NOT NULL, ADD user_id_id INT NOT NULL, DROP food_name_id, DROP user_id');
        $this->addSql('ALTER TABLE food ADD CONSTRAINT FK_D43829F79D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE food ADD CONSTRAINT FK_D43829F7D6277CB3 FOREIGN KEY (food_name_id_id) REFERENCES food_name (id)');
        $this->addSql('CREATE INDEX IDX_D43829F7D6277CB3 ON food (food_name_id_id)');
        $this->addSql('CREATE INDEX IDX_D43829F79D86650F ON food (user_id_id)');
        $this->addSql('ALTER TABLE food_name DROP FOREIGN KEY FK_EB04D6D7A76ED395');
        $this->addSql('DROP INDEX IDX_EB04D6D7A76ED395 ON food_name');
        $this->addSql('ALTER TABLE food_name CHANGE user_id user_id_id INT NOT NULL, CHANGE created created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE food_name ADD CONSTRAINT FK_EB04D6D79D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_EB04D6D79D86650F ON food_name (user_id_id)');
        $this->addSql('ALTER TABLE house DROP FOREIGN KEY FK_67D5399DF5B7AF75');
        $this->addSql('DROP INDEX IDX_67D5399DF5B7AF75 ON house');
        $this->addSql('ALTER TABLE house CHANGE address_id address_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE house ADD CONSTRAINT FK_67D5399D48E1E977 FOREIGN KEY (address_id_id) REFERENCES address (id)');
        $this->addSql('CREATE INDEX IDX_67D5399D48E1E977 ON house (address_id_id)');
        $this->addSql('ALTER TABLE inventory_location DROP FOREIGN KEY FK_EAD4335A6BB74515');
        $this->addSql('DROP INDEX IDX_EAD4335A6BB74515 ON inventory_location');
        $this->addSql('ALTER TABLE inventory_location CHANGE house_id house_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE inventory_location ADD CONSTRAINT FK_EAD4335AA4A739AF FOREIGN KEY (house_id_id) REFERENCES house (id)');
        $this->addSql('CREATE INDEX IDX_EAD4335AA4A739AF ON inventory_location (house_id_id)');
        $this->addSql('ALTER TABLE inventory_location_image DROP FOREIGN KEY FK_9D27ABC72BF1D41');
        $this->addSql('DROP INDEX IDX_9D27ABC72BF1D41 ON inventory_location_image');
        $this->addSql('ALTER TABLE inventory_location_image CHANGE inventory_location_id inventory_location_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE inventory_location_image ADD CONSTRAINT FK_9D27ABCB3ABE0B4 FOREIGN KEY (inventory_location_id_id) REFERENCES inventory_location (id)');
        $this->addSql('CREATE INDEX IDX_9D27ABCB3ABE0B4 ON inventory_location_image (inventory_location_id_id)');
        $this->addSql('ALTER TABLE item_info DROP FOREIGN KEY FK_3B975AC126F525E');
        $this->addSql('ALTER TABLE item_info DROP FOREIGN KEY FK_3B975AC23F5ED09');
        $this->addSql('ALTER TABLE item_info DROP FOREIGN KEY FK_3B975AC72BF1D41');
        $this->addSql('DROP INDEX IDX_3B975AC126F525E ON item_info');
        $this->addSql('DROP INDEX IDX_3B975AC23F5ED09 ON item_info');
        $this->addSql('DROP INDEX IDX_3B975AC72BF1D41 ON item_info');
        $this->addSql('ALTER TABLE item_info ADD retailer_id_id INT DEFAULT NULL, ADD inventory_location_id_id INT DEFAULT NULL, DROP retailer_id, DROP inventory_location_id, CHANGE item_id item_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE item_info ADD CONSTRAINT FK_3B975AC4F9775AE FOREIGN KEY (retailer_id_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE item_info ADD CONSTRAINT FK_3B975AC55E38587 FOREIGN KEY (item_id_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE item_info ADD CONSTRAINT FK_3B975ACB3ABE0B4 FOREIGN KEY (inventory_location_id_id) REFERENCES inventory_location (id)');
        $this->addSql('CREATE INDEX IDX_3B975AC55E38587 ON item_info (item_id_id)');
        $this->addSql('CREATE INDEX IDX_3B975ACB3ABE0B4 ON item_info (inventory_location_id_id)');
        $this->addSql('CREATE INDEX IDX_3B975AC4F9775AE ON item_info (retailer_id_id)');
        $this->addSql('ALTER TABLE related_item DROP FOREIGN KEY FK_F409811B126F525E');
        $this->addSql('ALTER TABLE related_item DROP FOREIGN KEY FK_F409811B2D7698FB');
        $this->addSql('DROP INDEX IDX_F409811B126F525E ON related_item');
        $this->addSql('DROP INDEX IDX_F409811B2D7698FB ON related_item');
        $this->addSql('ALTER TABLE related_item ADD item_id_id INT NOT NULL, ADD related_item_id_id INT NOT NULL, DROP item_id, DROP related_item_id');
        $this->addSql('ALTER TABLE related_item ADD CONSTRAINT FK_F409811B55E38587 FOREIGN KEY (item_id_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE related_item ADD CONSTRAINT FK_F409811BDF2E8D37 FOREIGN KEY (related_item_id_id) REFERENCES item (id)');
        $this->addSql('CREATE INDEX IDX_F409811B55E38587 ON related_item (item_id_id)');
        $this->addSql('CREATE INDEX IDX_F409811BDF2E8D37 ON related_item (related_item_id_id)');
    }
}
