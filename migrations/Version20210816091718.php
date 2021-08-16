<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210816091718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, country_id_id INT NOT NULL, street VARCHAR(255) NOT NULL, street_number INT NOT NULL, street_number_2 INT DEFAULT NULL, city VARCHAR(85) NOT NULL, zipcode INT NOT NULL, INDEX IDX_D4E6F81D8A48BBD (country_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, address_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, logo_url VARCHAR(2048) DEFAULT NULL, type VARCHAR(255) NOT NULL, website_url VARCHAR(2048) DEFAULT NULL, description VARCHAR(1000) DEFAULT NULL, email VARCHAR(320) DEFAULT NULL, INDEX IDX_4FBF094F48E1E977 (address_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE food (id INT AUTO_INCREMENT NOT NULL, food_name_id_id INT NOT NULL, user_id_id INT NOT NULL, cooked_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D43829F7D6277CB3 (food_name_id_id), INDEX IDX_D43829F79D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE food_name (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(1000) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_EB04D6D79D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE house (id INT AUTO_INCREMENT NOT NULL, address_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(1000) DEFAULT NULL, INDEX IDX_67D5399D48E1E977 (address_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inventory_location (id INT AUTO_INCREMENT NOT NULL, house_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(1000) DEFAULT NULL, INDEX IDX_EAD4335AA4A739AF (house_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inventory_location_image (id INT AUTO_INCREMENT NOT NULL, inventory_location_id_id INT NOT NULL, link VARCHAR(2048) NOT NULL, INDEX IDX_9D27ABCB3ABE0B4 (inventory_location_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, item_type_id_id INT NOT NULL, user_id_id INT NOT NULL, company_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(1000) DEFAULT NULL, ammount INT NOT NULL, INDEX IDX_1F1B251ECCF931AA (item_type_id_id), INDEX IDX_1F1B251E9D86650F (user_id_id), INDEX IDX_1F1B251E38B53C32 (company_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_image (id INT AUTO_INCREMENT NOT NULL, item_id_id INT NOT NULL, link VARCHAR(2048) NOT NULL, INDEX IDX_EF9A1F8F55E38587 (item_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_info (id INT AUTO_INCREMENT NOT NULL, item_id_id INT NOT NULL, retailer_id_id INT DEFAULT NULL, inventory_location_id_id INT DEFAULT NULL, purchase_date DATETIME NOT NULL, expiration_date DATETIME NOT NULL, last_used DATETIME DEFAULT NULL, purchase_price DOUBLE PRECISION NOT NULL, INDEX IDX_3B975AC55E38587 (item_id_id), INDEX IDX_3B975AC4F9775AE (retailer_id_id), INDEX IDX_3B975ACB3ABE0B4 (inventory_location_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE related_item (id INT AUTO_INCREMENT NOT NULL, item_id_id INT NOT NULL, related_item_id_id INT NOT NULL, INDEX IDX_F409811B55E38587 (item_id_id), INDEX IDX_F409811BDF2E8D37 (related_item_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81D8A48BBD FOREIGN KEY (country_id_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F48E1E977 FOREIGN KEY (address_id_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE food ADD CONSTRAINT FK_D43829F7D6277CB3 FOREIGN KEY (food_name_id_id) REFERENCES food_name (id)');
        $this->addSql('ALTER TABLE food ADD CONSTRAINT FK_D43829F79D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE food_name ADD CONSTRAINT FK_EB04D6D79D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE house ADD CONSTRAINT FK_67D5399D48E1E977 FOREIGN KEY (address_id_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE inventory_location ADD CONSTRAINT FK_EAD4335AA4A739AF FOREIGN KEY (house_id_id) REFERENCES house (id)');
        $this->addSql('ALTER TABLE inventory_location_image ADD CONSTRAINT FK_9D27ABCB3ABE0B4 FOREIGN KEY (inventory_location_id_id) REFERENCES inventory_location (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251ECCF931AA FOREIGN KEY (item_type_id_id) REFERENCES item_type (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E38B53C32 FOREIGN KEY (company_id_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE item_image ADD CONSTRAINT FK_EF9A1F8F55E38587 FOREIGN KEY (item_id_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE item_info ADD CONSTRAINT FK_3B975AC55E38587 FOREIGN KEY (item_id_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE item_info ADD CONSTRAINT FK_3B975AC4F9775AE FOREIGN KEY (retailer_id_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE item_info ADD CONSTRAINT FK_3B975ACB3ABE0B4 FOREIGN KEY (inventory_location_id_id) REFERENCES inventory_location (id)');
        $this->addSql('ALTER TABLE related_item ADD CONSTRAINT FK_F409811B55E38587 FOREIGN KEY (item_id_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE related_item ADD CONSTRAINT FK_F409811BDF2E8D37 FOREIGN KEY (related_item_id_id) REFERENCES item (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F48E1E977');
        $this->addSql('ALTER TABLE house DROP FOREIGN KEY FK_67D5399D48E1E977');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E38B53C32');
        $this->addSql('ALTER TABLE item_info DROP FOREIGN KEY FK_3B975AC4F9775AE');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81D8A48BBD');
        $this->addSql('ALTER TABLE food DROP FOREIGN KEY FK_D43829F7D6277CB3');
        $this->addSql('ALTER TABLE inventory_location DROP FOREIGN KEY FK_EAD4335AA4A739AF');
        $this->addSql('ALTER TABLE inventory_location_image DROP FOREIGN KEY FK_9D27ABCB3ABE0B4');
        $this->addSql('ALTER TABLE item_info DROP FOREIGN KEY FK_3B975ACB3ABE0B4');
        $this->addSql('ALTER TABLE item_image DROP FOREIGN KEY FK_EF9A1F8F55E38587');
        $this->addSql('ALTER TABLE item_info DROP FOREIGN KEY FK_3B975AC55E38587');
        $this->addSql('ALTER TABLE related_item DROP FOREIGN KEY FK_F409811B55E38587');
        $this->addSql('ALTER TABLE related_item DROP FOREIGN KEY FK_F409811BDF2E8D37');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251ECCF931AA');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE food');
        $this->addSql('DROP TABLE food_name');
        $this->addSql('DROP TABLE house');
        $this->addSql('DROP TABLE inventory_location');
        $this->addSql('DROP TABLE inventory_location_image');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_image');
        $this->addSql('DROP TABLE item_info');
        $this->addSql('DROP TABLE item_type');
        $this->addSql('DROP TABLE related_item');
    }
}
