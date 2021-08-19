<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210819094816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E38B53C32');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E9D86650F');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251ECCF931AA');
        $this->addSql('DROP INDEX IDX_1F1B251ECCF931AA ON item');
        $this->addSql('DROP INDEX IDX_1F1B251E38B53C32 ON item');
        $this->addSql('DROP INDEX IDX_1F1B251E9D86650F ON item');
        $this->addSql('ALTER TABLE item ADD item_type_id INT NOT NULL, ADD user_id INT NOT NULL, DROP item_type_id_id, DROP user_id_id, CHANGE company_id_id company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251ECE11AAC7 FOREIGN KEY (item_type_id) REFERENCES item_type (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_1F1B251ECE11AAC7 ON item (item_type_id)');
        $this->addSql('CREATE INDEX IDX_1F1B251EA76ED395 ON item (user_id)');
        $this->addSql('CREATE INDEX IDX_1F1B251E979B1AD6 ON item (company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251ECE11AAC7');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EA76ED395');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E979B1AD6');
        $this->addSql('DROP INDEX IDX_1F1B251ECE11AAC7 ON item');
        $this->addSql('DROP INDEX IDX_1F1B251EA76ED395 ON item');
        $this->addSql('DROP INDEX IDX_1F1B251E979B1AD6 ON item');
        $this->addSql('ALTER TABLE item ADD item_type_id_id INT NOT NULL, ADD user_id_id INT NOT NULL, DROP item_type_id, DROP user_id, CHANGE company_id company_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E38B53C32 FOREIGN KEY (company_id_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251ECCF931AA FOREIGN KEY (item_type_id_id) REFERENCES item_type (id)');
        $this->addSql('CREATE INDEX IDX_1F1B251ECCF931AA ON item (item_type_id_id)');
        $this->addSql('CREATE INDEX IDX_1F1B251E38B53C32 ON item (company_id_id)');
        $this->addSql('CREATE INDEX IDX_1F1B251E9D86650F ON item (user_id_id)');
    }
}
