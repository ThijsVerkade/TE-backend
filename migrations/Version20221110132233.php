<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221110132233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE transport_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE vehicle_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE transport (id INT NOT NULL, uuid VARCHAR(255) NOT NULL, status INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE vehicle (id INT NOT NULL, transport_id INT NOT NULL, uuid UUID NOT NULL, vehicle_reference_id VARCHAR(255) NOT NULL, distance_address INT NOT NULL, status INT NOT NULL, closing_date DATE NOT NULL, delivery_from_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivery_to_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, pickup_from_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, pickup_to_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, currency VARCHAR(3) NOT NULL, price_amount NUMERIC(10, 0) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1B80E4869909C13F ON vehicle (transport_id)');
        $this->addSql('COMMENT ON COLUMN vehicle.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4869909C13F FOREIGN KEY (transport_id) REFERENCES transport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE transport_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE vehicle_id_seq CASCADE');
        $this->addSql('ALTER TABLE vehicle DROP CONSTRAINT FK_1B80E4869909C13F');
        $this->addSql('DROP TABLE transport');
        $this->addSql('DROP TABLE vehicle');
    }
}
