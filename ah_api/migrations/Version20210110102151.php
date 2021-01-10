<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210110102151 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activities (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(100) NOT NULL, title VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activities_property (activities_id INT NOT NULL, property_id INT NOT NULL, INDEX IDX_2EF0DB912A4DB562 (activities_id), INDEX IDX_2EF0DB91549213EC (property_id), PRIMARY KEY(activities_id, property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, street VARCHAR(255) NOT NULL, postal_code INT NOT NULL, town VARCHAR(255) NOT NULL, region VARCHAR(100) NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, activities_id INT DEFAULT NULL, reservation_id INT DEFAULT NULL, comment_content VARCHAR(255) DEFAULT NULL, forbidden_words LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_5F9E962A2A4DB562 (activities_id), INDEX IDX_5F9E962AB83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, pool TINYINT(1) NOT NULL, baignoire TINYINT(1) NOT NULL, jaccuzzi TINYINT(1) NOT NULL, climatiseur TINYINT(1) NOT NULL, chauffage TINYINT(1) NOT NULL, wifi TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE indisponibility (id INT AUTO_INCREMENT NOT NULL, property_id INT DEFAULT NULL, date_start DATETIME DEFAULT NULL, date_end DATETIME DEFAULT NULL, INDEX IDX_93165F20549213EC (property_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pictures (id INT AUTO_INCREMENT NOT NULL, comments_id INT DEFAULT NULL, property_id INT DEFAULT NULL, activities_id INT DEFAULT NULL, url VARCHAR(255) NOT NULL, max_size INT NOT NULL, status LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_8F7C2FC063379586 (comments_id), INDEX IDX_8F7C2FC0549213EC (property_id), INDEX IDX_8F7C2FC02A4DB562 (activities_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property (id INT AUTO_INCREMENT NOT NULL, type_property_id INT NOT NULL, user_id INT NOT NULL, equipment_id INT DEFAULT NULL, address_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, surface INT NOT NULL, nbr_room INT NOT NULL, rate DOUBLE PRECISION NOT NULL, max_travelers INT NOT NULL, access_handicap TINYINT(1) NOT NULL, water VARCHAR(50) NOT NULL, electricity TINYINT(1) NOT NULL, tax DOUBLE PRECISION NOT NULL, status LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_8BF21CDE1F8BC47D (type_property_id), INDEX IDX_8BF21CDEA76ED395 (user_id), INDEX IDX_8BF21CDE517FE9FE (equipment_id), UNIQUE INDEX UNIQ_8BF21CDEF5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE propriete (id INT AUTO_INCREMENT NOT NULL, type_value_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, is_required TINYINT(1) NOT NULL, type VARCHAR(20) NOT NULL, INDEX IDX_73A85B9334DF9C5E (type_value_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE propriete_type_property (id INT AUTO_INCREMENT NOT NULL, propriete_id INT DEFAULT NULL, type_property_id INT DEFAULT NULL, valeur_id INT DEFAULT NULL, INDEX IDX_8784F39F18566CAF (propriete_id), INDEX IDX_8784F39F1F8BC47D (type_property_id), INDEX IDX_8784F39F4DAAD26 (valeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, property_id INT NOT NULL, date_debut DATETIME NOT NULL, date_end DATETIME NOT NULL, montant DOUBLE PRECISION NOT NULL, number_traveler INT NOT NULL, paid TINYINT(1) NOT NULL, proprietes JSON NOT NULL, historical JSON NOT NULL, INDEX IDX_42C84955A76ED395 (user_id), INDEX IDX_42C84955549213EC (property_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, couleur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_property (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(50) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_value (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(7) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(255) NOT NULL, phone INT DEFAULT NULL, role VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE valeur (id INT AUTO_INCREMENT NOT NULL, property_id INT NOT NULL, valeur VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_1B44CD51549213EC (property_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activities_property ADD CONSTRAINT FK_2EF0DB912A4DB562 FOREIGN KEY (activities_id) REFERENCES activities (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activities_property ADD CONSTRAINT FK_2EF0DB91549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A2A4DB562 FOREIGN KEY (activities_id) REFERENCES activities (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE indisponibility ADD CONSTRAINT FK_93165F20549213EC FOREIGN KEY (property_id) REFERENCES property (id)');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT FK_8F7C2FC063379586 FOREIGN KEY (comments_id) REFERENCES comments (id)');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT FK_8F7C2FC0549213EC FOREIGN KEY (property_id) REFERENCES property (id)');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT FK_8F7C2FC02A4DB562 FOREIGN KEY (activities_id) REFERENCES activities (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE1F8BC47D FOREIGN KEY (type_property_id) REFERENCES type_property (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE propriete ADD CONSTRAINT FK_73A85B9334DF9C5E FOREIGN KEY (type_value_id) REFERENCES type_value (id)');
        $this->addSql('ALTER TABLE propriete_type_property ADD CONSTRAINT FK_8784F39F18566CAF FOREIGN KEY (propriete_id) REFERENCES propriete (id)');
        $this->addSql('ALTER TABLE propriete_type_property ADD CONSTRAINT FK_8784F39F1F8BC47D FOREIGN KEY (type_property_id) REFERENCES type_property (id)');
        $this->addSql('ALTER TABLE propriete_type_property ADD CONSTRAINT FK_8784F39F4DAAD26 FOREIGN KEY (valeur_id) REFERENCES valeur (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955549213EC FOREIGN KEY (property_id) REFERENCES property (id)');
        $this->addSql('ALTER TABLE valeur ADD CONSTRAINT FK_1B44CD51549213EC FOREIGN KEY (property_id) REFERENCES property (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activities_property DROP FOREIGN KEY FK_2EF0DB912A4DB562');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A2A4DB562');
        $this->addSql('ALTER TABLE pictures DROP FOREIGN KEY FK_8F7C2FC02A4DB562');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEF5B7AF75');
        $this->addSql('ALTER TABLE pictures DROP FOREIGN KEY FK_8F7C2FC063379586');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE517FE9FE');
        $this->addSql('ALTER TABLE activities_property DROP FOREIGN KEY FK_2EF0DB91549213EC');
        $this->addSql('ALTER TABLE indisponibility DROP FOREIGN KEY FK_93165F20549213EC');
        $this->addSql('ALTER TABLE pictures DROP FOREIGN KEY FK_8F7C2FC0549213EC');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955549213EC');
        $this->addSql('ALTER TABLE valeur DROP FOREIGN KEY FK_1B44CD51549213EC');
        $this->addSql('ALTER TABLE propriete_type_property DROP FOREIGN KEY FK_8784F39F18566CAF');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AB83297E7');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE1F8BC47D');
        $this->addSql('ALTER TABLE propriete_type_property DROP FOREIGN KEY FK_8784F39F1F8BC47D');
        $this->addSql('ALTER TABLE propriete DROP FOREIGN KEY FK_73A85B9334DF9C5E');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEA76ED395');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('ALTER TABLE propriete_type_property DROP FOREIGN KEY FK_8784F39F4DAAD26');
        $this->addSql('DROP TABLE activities');
        $this->addSql('DROP TABLE activities_property');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE indisponibility');
        $this->addSql('DROP TABLE pictures');
        $this->addSql('DROP TABLE property');
        $this->addSql('DROP TABLE propriete');
        $this->addSql('DROP TABLE propriete_type_property');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE type_property');
        $this->addSql('DROP TABLE type_value');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE valeur');
    }
}
