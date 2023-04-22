<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230403151941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE category ADD date_modification DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE product ADD date_modification DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD description VARCHAR(255) DEFAULT NULL');
        $this->addSql("INSERT INTO category (`id`, `name`, `date_creation`, `date_modification`) VALUES
                    (1, 'Chaussures', '2023-04-03 06:59:22', NULL),
                    (2, 'Vetement', '2023-04-03 14:33:08', NULL),
                    (3, 'Short', '2023-04-03 16:39:49', '2023-04-03 16:40:00'),
                    (4, 'CHAPEAU', '2023-04-03 18:17:58', '2023-04-03 20:17:00');");
        $this->addSql("INSERT INTO product (`id`, `name`, `price`, `category_id`, `date_creation`, `image`, `image_size`, `date_modification`, `description`) VALUES
                (2, 'Jordan Retro 4', 13000, 1, '2023-04-03 08:28:16', 'sneak1-642a8e20aaaf8135657036.png', 165948, NULL, NULL),
                (3, 'Jordan Retro 4  rouge', 1300, 1, '2023-04-03 14:28:25', 'sneak2-642ae289e84aa771246828.png', 212280, NULL, NULL),
                (4, 'Jordan Retro 4 vert', 2300, 1, '2023-04-03 14:29:10', 'sneak3-642ae2b66c0df986531735.png', 184376, NULL, NULL),
                (5, 'Jordan Retro 4 Violet', 8500, 1, '2023-04-03 14:30:06', 'sneak1-642ae2ee565dc630564893.png', 165948, NULL, NULL),
                (6, 'Jordan Retro 4 Noir', 8500, 1, '2023-03-01 14:31:39', 'sneak5-642ae34b95fe8479134061.png', 432294, NULL, NULL),
                (7, 'Nike tee shirt Vert', 4500, 2, '2023-04-03 14:33:48', 'tenu1-2-642ae3cc54138120029970.jpeg', 140914, NULL, NULL),
                (8, 'Nike tee shirt Rouge', 4500, 2, '2023-04-03 14:34:48', 'tenu4-642ae40830737085285068.jpeg', 127998, NULL, NULL),
                (9, 'Nike tee shirt  violet', 4500, 2, '2023-04-03 14:35:54', 'tenu3-642ae44ad284c949688570.jpeg', 150822, NULL, NULL),
                (10, 'Nike tee shirt  orange', 4500, 2, '2023-04-03 14:36:32', 'tenu2-642ae470b89a2957223685.jpeg', 152687, NULL, NULL),
                (11, 'Jordan Retro 4 Noirr', 8500, 1, '2023-01-01 15:28:41', 'sneak6-642af0a983d19474037774.png', 245697, '2023-04-03 15:28:41', 'La Jordan 4 Retro Noir est une chaussure de basket-ball fabriquée par Nike en collaboration avec le joueur de basket-ball Michael Jordan. La chaussure est également équipée de la marque Jumpman de Michael Jordan sur le talon et la langue, un must-have pou'),
                (12, 'Nike tee shirt', 4500, 2, '2023-04-03 16:34:25', 'tenu1-642b00118bc89179300550.jpeg', 132838, '2023-04-03 16:34:25', NULL);");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category DROP date_modification');
        $this->addSql('ALTER TABLE product DROP date_modification, DROP description');
    }
}
