<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201007225529 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE houses ADD id INT AUTO_INCREMENT NOT NULL, ADD peice NUMERIC(8, 2) NOT NULL, DROP Price, CHANGE Discount discount NUMERIC(8, 2) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE reservations CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE houses MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE houses DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE houses ADD Price INT NOT NULL, DROP id, DROP peice, CHANGE discount Discount INT NOT NULL');
        $this->addSql('ALTER TABLE houses ADD PRIMARY KEY (Address)');
        $this->addSql('ALTER TABLE reservations CHANGE id id INT NOT NULL');
    }
}
