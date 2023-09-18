<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230918134535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, adress2 VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, birth_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', personal_phone_number VARCHAR(255) DEFAULT NULL, professional_phone_number VARCHAR(255) DEFAULT NULL, personal_email VARCHAR(255) DEFAULT NULL, professional_email VARCHAR(255) DEFAULT NULL, driving_license VARCHAR(255) DEFAULT NULL, entry_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', exit_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, immatriculation VARCHAR(255) NOT NULL, vehicle_brand VARCHAR(255) NOT NULL, vehicle_model VARCHAR(255) NOT NULL, entry_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', exit_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', insurance_policy VARCHAR(255) DEFAULT NULL, last_technical_control DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', next_technical_control DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', last_pollution_control DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', next_pollution_control DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', fuel_card_id VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_employee (vehicle_id INT NOT NULL, employee_id INT NOT NULL, INDEX IDX_808D7A35545317D1 (vehicle_id), INDEX IDX_808D7A358C03F15C (employee_id), PRIMARY KEY(vehicle_id, employee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehicle_employee ADD CONSTRAINT FK_808D7A35545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vehicle_employee ADD CONSTRAINT FK_808D7A358C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicle_employee DROP FOREIGN KEY FK_808D7A35545317D1');
        $this->addSql('ALTER TABLE vehicle_employee DROP FOREIGN KEY FK_808D7A358C03F15C');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP TABLE vehicle_employee');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
