<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220811161458 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contest DROP FOREIGN KEY FK_1A95CB54D77E7D8');
        $this->addSql('ALTER TABLE contest DROP FOREIGN KEY FK_1A95CB5FC53D4E9');
        $this->addSql('DROP INDEX IDX_1A95CB54D77E7D8 ON contest');
        $this->addSql('DROP INDEX IDX_1A95CB5FC53D4E9 ON contest');
        $this->addSql('ALTER TABLE contest ADD game_id INT DEFAULT NULL, ADD winner_id INT DEFAULT NULL, DROP game_id_id, DROP winner_id_id');
        $this->addSql('ALTER TABLE contest ADD CONSTRAINT FK_1A95CB5E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE contest ADD CONSTRAINT FK_1A95CB55DFCD4B8 FOREIGN KEY (winner_id) REFERENCES player (id)');
        $this->addSql('CREATE INDEX IDX_1A95CB5E48FD905 ON contest (game_id)');
        $this->addSql('CREATE INDEX IDX_1A95CB55DFCD4B8 ON contest (winner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contest DROP FOREIGN KEY FK_1A95CB5E48FD905');
        $this->addSql('ALTER TABLE contest DROP FOREIGN KEY FK_1A95CB55DFCD4B8');
        $this->addSql('DROP INDEX IDX_1A95CB5E48FD905 ON contest');
        $this->addSql('DROP INDEX IDX_1A95CB55DFCD4B8 ON contest');
        $this->addSql('ALTER TABLE contest ADD game_id_id INT DEFAULT NULL, ADD winner_id_id INT DEFAULT NULL, DROP game_id, DROP winner_id');
        $this->addSql('ALTER TABLE contest ADD CONSTRAINT FK_1A95CB54D77E7D8 FOREIGN KEY (game_id_id) REFERENCES game (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE contest ADD CONSTRAINT FK_1A95CB5FC53D4E9 FOREIGN KEY (winner_id_id) REFERENCES player (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1A95CB54D77E7D8 ON contest (game_id_id)');
        $this->addSql('CREATE INDEX IDX_1A95CB5FC53D4E9 ON contest (winner_id_id)');
    }
}
