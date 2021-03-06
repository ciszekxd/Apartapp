<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201009181837 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('CREATE TABLE input_form (id INT AUTO_INCREMENT NOT NULL, arrival_date DATE NOT NULL, length_of_visit INT NOT NULL, amount_of_people INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE houses ADD free_places NUMERIC(3, 0) NOT NULL, CHANGE peice price NUMERIC(8, 2) NOT NULL');
        $this->addSql('ALTER TABLE reservations ADD reserved_places NUMERIC(3, 0) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE input_form');
        $this->addSql('ALTER TABLE houses DROP free_places, CHANGE price peice NUMERIC(8, 2) NOT NULL');
        $this->addSql('ALTER TABLE reservations DROP reserved_places');
    }
}
