-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 14 mars 2025 à 13:58
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum-ep`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('4d134bc072212ace2df385dae143139da74ec0ef:timer', 'i:1739121975;', 1739121975),
('4d134bc072212ace2df385dae143139da74ec0ef', 'i:2;', 1739121975),
('22d200f8670dbdb3e253a90eee5098477c95c23d:timer', 'i:1739122196;', 1739122196),
('22d200f8670dbdb3e253a90eee5098477c95c23d', 'i:1;', 1739122196);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siret` int UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_id` int UNSIGNED NOT NULL,
  `description` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`company_id`),
  KEY `companies_sector_id_foreign` (`sector_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `companies`
--

INSERT INTO `companies` (`company_id`, `name`, `siret`, `logo`, `sector_id`, `description`, `location`, `website`, `email`, `phone`) VALUES
(1, 'Company 1', 4294967295, 'reject_1741614244.png', 16, 'Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des 1 Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des 1', 'Paris', 'https://company1.com', 'anne.passelegue@edu.esiee.fr', '1234567895'),
(2, 'Company 2', 4294967295, 'logo-company-2.png', 2, 'Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans desLe Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des 2', 'Paris', 'https://company2.com', 'contact2@company2.com', '123456789'),
(3, 'Company 3', 4294967295, 'logo-company-3.png', 3, 'Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des 3', 'Paris', 'https://company3.com', 'contact3@company3.com', '123456789'),
(4, 'Company 4', 4294967295, 'logo-company-4.png', 4, 'Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des 4', 'Noisy-le-grand', 'https://company4.com', 'contact4@company4.com', '123456789'),
(5, 'Company 5', 4294967295, 'logo-company-5.png', 5, 'Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant desLorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des 5', 'Noisy-le-grand', 'https://company5.com', 'contact5@company5.com', '123456789'),
(6, 'Company 6', 4294967295, 'logo-company-6.png', 1, 'Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans desdu Lorem Ipsum, et, plus récemment, par son inclusion dans des 6', 'Champs-sur-Marne', 'https://company6.com', 'contact6@company6.com', '123456789'),
(7, 'Company 7', 4294967295, 'logo-company-7.png', 2, 'Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des 7', 'Paris', 'https://company7.com', 'contact7@company7.com', '123456789'),
(8, 'Company 8', 4294967295, 'logo-company-8.png', 3, 'Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des 8', 'Paris', 'https://company8.com', 'contact8@company8.com', '123456789'),
(9, 'Company 9', 4294967295, 'logo-company-9.png', 4, 'Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des 9', 'Champs-sur-Marne', 'https://company9.com', 'contact9@company9.com', '123456789'),
(10, 'Company 10', 4294967295, 'logo-company-10.png', 5, 'Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des du Lorem Ipsum, et, plus récemment, par son inclusion dans des 10', 'Paris', 'https://company10.com', 'contact10@company10.com', '123456789');

-- --------------------------------------------------------

--
-- Structure de la table `email_verification_tokens`
--

DROP TABLE IF EXISTS `email_verification_tokens`;
CREATE TABLE IF NOT EXISTS `email_verification_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `faq_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `faqs`
--

INSERT INTO `faqs` (`faq_id`, `question`, `answer`) VALUES
(1, 'Comment accéder au forum ?', 'Le forum a lieu dans le bâtiment Perrault à Champs-sur-Marne (77), n\'hésiter pas à consulter la rubrique \"plan d\'accès\" disponible sur la page d\'accueil.'),
(2, 'Comment puis-je consulter la liste des entreprises présentes ?', 'La liste des entreprises participantes est accessible directement depuis l’onglet \"Entreprises participantes\" dans le menu principal du site. Une fois sur la page, vous trouverez un moteur de recherche vous permettant de filtrer les entreprises par secteur d\'activité, spécialité ou type de stage proposé (stage ouvrier, stage de fin d\'études, etc.). Chaque entreprise dispose d’une fiche descriptive où vous pourrez consulter :\n\nUne présentation de l’entreprise et de ses activités principales.\nLes domaines dans lesquels elle recrute, par exemple, ingénierie informatique, génie mécanique, ou gestion de projet.\nLes offres de stage disponibles, avec les prérequis attendus.\nLes contacts des recruteurs et les liens vers leur site officiel.\nPour gagner du temps, nous vous recommandons d’utiliser ces filtres pour repérer les entreprises qui correspondent à vos objectifs professionnels avant de vous rendre au forum. Vous pourrez également télécharger les brochures des entreprises pour en savoir plus sur leurs missions et valeurs.'),
(3, 'Ce forum est-il ouvert uniquement aux étudiants de l\'école ?', 'Oui, ce forum est exclusivement réservé aux étudiants inscrits à l’école. L’objectif est de permettre à nos élèves d’entrer en contact direct avec nos entreprises partenaires. Cependant, certains événements annexes, comme les conférences thématiques ou les webinaires d’information, pourraient être accessibles à un public plus large sur inscription préalable.\n\n'),
(4, 'Comment m’inscrire au forum en tant qu\'étudiant ?', 'Pour participer au forum des stages, connectez-vous à la plateforme avec vos identifiants étudiants. Une fois connecté, cliquez sur \"S’inscrire au forum\" dans le tableau de bord. Vous pourrez alors :\n- Choisir les entreprises que vous souhaitez rencontrer.\n- Télécharger votre CV pour qu’il soit visible par les recruteurs avant l’événement.'),
(5, 'Les stages proposés sont-ils rémunérés ?', 'Cela dépend des entreprises et des stages proposés. En France, les stages de plus de deux mois sont légalement tenus d’être rémunérés à hauteur de 4,05 € par heure en 2025, soit environ 600 € par mois pour un stage à temps plein.'),
(6, ' Que dois-je préparer avant le forum ?', 'Une bonne préparation est essentielle pour maximiser vos chances au forum. Voici quelques conseils :\n\nMettez à jour votre CV : Assurez-vous qu’il soit clair, concis et adapté aux entreprises que vous ciblez. Si possible, personnalisez-le en fonction des stages que vous visez.\nRenseignez-vous sur les entreprises : Consultez leurs fiches sur le site pour connaître leurs activités, leurs valeurs et les postes qu’elles proposent. Préparez des questions spécifiques à poser aux recruteurs pour montrer votre intérêt.\nPréparez une brève présentation personnelle : Vous aurez peu de temps pour convaincre les recruteurs. Entraînez-vous à présenter votre parcours, vos compétences et vos objectifs professionnels en moins de deux minutes.\nImprimez des copies de votre CV : Même si beaucoup d’échanges se font en ligne, il est toujours utile d’avoir des copies papier pour les donner directement aux recruteurs sur place.\nEnfin, habillez-vous de manière professionnelle et soignez votre présentation. Une première impression réussie peut faire la différence !'),
(7, 'Les entreprises présentes recrutent-elles dans tous les domaines ?', 'Les entreprises présentes au forum couvrent une très grande variété de secteurs :\n\nInformatique et développement logiciel : Intelligence artificielle, data science, cybersécurité.\nÉnergie et environnement : Énergies renouvelables, génie thermique, gestion de l’eau.\nGénie civil et infrastructures : Conception de bâtiments, grands travaux, transport.\nIndustrie et production : Robotique, mécatronique, production durable.\nVous pouvez filtrer les entreprises par domaine sur le site pour identifier celles qui correspondent à votre spécialisation ou à vos centres d’intérêt.'),
(8, 'Comment m\'inscrire en tant qu\'exposant ?', 'Pour participer, remplissez une demande de devis directement sur le site. Une fois la demande validée, vous recevrez vos identifiants par mail pour vous connecter au site, afin de personnaliser votre profil et consulter la liste de nos filières et de nos étudiants.'),
(9, 'Les entreprises présentes recrutent-elles dans tous les domaines ?', 'Les entreprises présentes couvrent une large gamme de domaines, comme l’informatique, l’énergie, le génie civil, ou encore les télécommunications. Consultez leurs fiches pour savoir si elles proposent des stages dans votre spécialité.');

-- --------------------------------------------------------

--
-- Structure de la table `forum_editions`
--

DROP TABLE IF EXISTS `forum_editions`;
CREATE TABLE IF NOT EXISTS `forum_editions` (
  `forum_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ending_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `forum_editions`
--

INSERT INTO `forum_editions` (`forum_id`, `date`, `picture`, `starting_hour`, `ending_hour`) VALUES
(4, '2023-04-30', 'forum2023.jpg', '08:30', '17:00'),
(5, '2019-05-05', 'forum2019.jpg', '09:00', '18:30'),
(6, '2020-06-10', 'forum2020.jpg', '09:30', '18:00'),
(7, '2021-07-15', 'forum2021.jpg', '10:00', '19:00'),
(8, '2022-08-20', 'forum2022.jpg', '08:45', '17:15'),
(10, '2024-10-30', 'forum2024.jpg', '09:15', '18:00');

-- --------------------------------------------------------

--
-- Structure de la table `forum_edition_companies`
--

DROP TABLE IF EXISTS `forum_edition_companies`;
CREATE TABLE IF NOT EXISTS `forum_edition_companies` (
  `forum_edition_company_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `forum_id` int UNSIGNED NOT NULL,
  `company_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`forum_edition_company_id`),
  KEY `forum_edition_companies_forum_id_foreign` (`forum_id`),
  KEY `forum_edition_companies_company_id_foreign` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `forum_edition_companies`
--

INSERT INTO `forum_edition_companies` (`forum_edition_company_id`, `forum_id`, `company_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4),
(5, 3, 5),
(6, 3, 6),
(7, 4, 7),
(8, 4, 8),
(9, 5, 9),
(10, 5, 10),
(11, 6, 1),
(12, 6, 2),
(13, 7, 3),
(14, 7, 4),
(15, 8, 5),
(16, 8, 6),
(17, 4, 1),
(18, 4, 5),
(19, 10, 9),
(20, 10, 10),
(21, 10, 1),
(22, 10, 8),
(23, 10, 2),
(24, 10, 5),
(25, 10, 4);

-- --------------------------------------------------------

--
-- Structure de la table `internship_offers`
--

DROP TABLE IF EXISTS `internship_offers`;
CREATE TABLE IF NOT EXISTS `internship_offers` (
  `internship_offer_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_duration` int UNSIGNED NOT NULL,
  `max_duration` int UNSIGNED NOT NULL,
  PRIMARY KEY (`internship_offer_id`),
  KEY `internship_offers_company_id_foreign` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `internship_offers`
--

INSERT INTO `internship_offers` (`internship_offer_id`, `title`, `offer_description`, `company_id`, `location`, `date`, `min_duration`, `max_duration`) VALUES
(1, 'Internship 1', 'Link / PDF of Internship 1', 1, 'Paris', 'Janvier', 5, 6),
(2, 'Internship 2', 'Link / PDF of Internship 2', 2, 'Paris', 'Février', 4, 6),
(3, 'Internship 3', 'Link / PDF of Internship 3', 3, 'Paris', 'Mars', 6, 12),
(4, 'Internship 4', 'Link / PDF of Internship 4', 4, 'Paris', 'Avril', 4, 6),
(5, 'Internship 5', 'Link / PDF of Internship 5', 5, 'Paris', 'Mai', 6, 12),
(6, 'Internship 6', 'Link / PDF of Internship 6', 6, 'Champs-sur-marne', 'Mai', 3, 4),
(7, 'Internship 7', 'Link / PDF of Internship 7', 7, 'Noisiel', 'Janvier', 4, 6),
(8, 'Internship 8', 'Link / PDF of Internship 8', 8, 'Paris', 'Janvier', 4, 6),
(9, 'Internship 9', 'Link / PDF of Internship 9', 9, 'Noisy-le-grand', 'Février', 4, 6),
(10, 'Internship 10', 'Link / PDF of Internship 10', 10, 'Lyon', 'Avril', 4, 6),
(11, 'Internship 11', 'Link / PDF of Internship 11', 2, 'Paris', 'Mars', 4, 6),
(12, 'Internship 12', 'Link / PDF of Internship 12', 1, 'Toulouse', 'Avril', 2, 4),
(13, 'Internship 13', 'Link / PDF of Internship 13', 3, 'Paris', 'Février', 4, 6),
(14, 'Internship 14', 'Link / PDF of Internship 14', 3, 'Champs-sur-Marne', 'Janvier', 4, 6),
(15, 'Internship 15', 'Link / PDF of Internship 15', 5, 'Paris', 'Janvier', 4, 6),
(16, 'Internship 16', 'Link / PDF of Internship 16', 6, 'Aubervillier', 'Mars', 2, 4),
(17, 'Internship 17', 'Link / PDF of Internship 17', 7, 'Paris', 'Janvier', 4, 6),
(18, 'Internship 18', 'Link / PDF of Internship 18', 8, 'Paris', 'Février', 4, 6),
(19, 'Internship 19', 'Link / PDF of Internship 19', 9, 'Noisy-le-grand', 'Mai', 4, 6),
(20, 'Internship 20', 'Link / PDF of Internship 20', 10, 'Noisy-le-grand', 'Mars', 4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_12_04_085353_create_database', 1),
(2, '2024_12_05_085353_create_database', 2),
(3, '2024_12_06_create_database', 3),
(4, '2024_12_11_create_email_verification_tokens_table_2', 4),
(5, '2024_12_11_001843_create_cache_table', 5),
(6, '2024_12_10_232250_create_password_reset_tokens_table', 6),
(7, '2024_12_10_233741_add_remember_token_to_users_table', 6);

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `option_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `option_label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`option_id`, `option_label`) VALUES
(1, 'Comptoir accueil (100X50 H110 – portes / étagère / serrure)'),
(2, 'Tabouret (H75) '),
(3, 'Présentoir à documentation (10 formats A4)'),
(4, 'Portemanteau sur pied '),
(5, 'Petit-déjeuner + déjeuner - Supplément par personne ');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `quotes`
--

DROP TABLE IF EXISTS `quotes`;
CREATE TABLE IF NOT EXISTS `quotes` (
  `quote_id` int NOT NULL AUTO_INCREMENT,
  `quote_name` varchar(255) NOT NULL,
  `is_validated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`quote_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `quotes`
--

INSERT INTO `quotes` (`quote_id`, `quote_name`, `is_validated`) VALUES
(7, 'Demande_devis_TOUTOUT.xlsx', 0),
(2, 'Demande_devis_jhzbd.xlsx', 0),
(3, 'Demande_devis_AAAAAAAAAAA.xlsx', 0),
(4, 'Demande_devis_bqs,jbdsbfshjfsf.xlsx', 0),
(5, 'Demande_devis_monentreprise.xlsx', 0),
(6, 'Demande_devis_UUUUUUUUUUUU.xlsx', 0);

-- --------------------------------------------------------

--
-- Structure de la table `school_levels`
--

DROP TABLE IF EXISTS `school_levels`;
CREATE TABLE IF NOT EXISTS `school_levels` (
  `school_level_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_level_label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`school_level_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_levels`
--

INSERT INTO `school_levels` (`school_level_id`, `school_level_label`) VALUES
(2, 'E2'),
(3, 'E3'),
(4, 'E4'),
(5, 'E5'),
(6, 'E6'),
(7, 'E7'),
(8, 'Année spéciale'),
(9, 'Césure'),
(1, 'E1');

-- --------------------------------------------------------

--
-- Structure de la table `school_level_offers`
--

DROP TABLE IF EXISTS `school_level_offers`;
CREATE TABLE IF NOT EXISTS `school_level_offers` (
  `school_level_offer_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `internship_offer_id` int UNSIGNED NOT NULL,
  `school_level_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`school_level_offer_id`),
  KEY `school_level_offers_internship_offer_id_foreign` (`internship_offer_id`),
  KEY `school_level_offers_school_level_id_foreign` (`school_level_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_level_offers`
--

INSERT INTO `school_level_offers` (`school_level_offer_id`, `internship_offer_id`, `school_level_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 1, 2),
(7, 2, 7),
(8, 3, 8),
(9, 4, 2),
(10, 2, 1),
(11, 6, 6),
(12, 7, 7),
(13, 8, 8),
(14, 9, 9),
(15, 10, 10),
(16, 11, 1),
(17, 12, 2),
(18, 13, 3),
(19, 14, 4),
(20, 15, 5),
(21, 11, 2),
(22, 12, 7),
(23, 13, 8),
(24, 14, 2),
(25, 12, 1),
(26, 16, 6),
(27, 17, 7),
(28, 18, 8),
(29, 19, 9),
(30, 20, 10);

-- --------------------------------------------------------

--
-- Structure de la table `school_paths`
--

DROP TABLE IF EXISTS `school_paths`;
CREATE TABLE IF NOT EXISTS `school_paths` (
  `school_path_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_path_label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`school_path_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_paths`
--

INSERT INTO `school_paths` (`school_path_id`, `school_path_label`) VALUES
(1, 'Informatique, algorithmes et développement'),
(2, 'Cybersécurité'),
(3, 'Datascience et intelligence artificielle'),
(4, 'Intelligence artificielle et cybersécurité'),
(5, 'Systèmes embarqués'),
(6, 'Systèmes électroniques intelligents'),
(7, 'Génie industriel, performance et innovation'),
(8, 'E-santé et biotechnologies'),
(9, 'Energie'),
(10, 'IMAC - Image, Multimédia, Audiovisuel & Communication');

-- --------------------------------------------------------

--
-- Structure de la table `school_path_offers`
--

DROP TABLE IF EXISTS `school_path_offers`;
CREATE TABLE IF NOT EXISTS `school_path_offers` (
  `school_path_offer_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `internship_offer_id` int UNSIGNED NOT NULL,
  `school_path_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`school_path_offer_id`),
  KEY `school_path_offers_internship_offer_id_foreign` (`internship_offer_id`),
  KEY `school_path_offers_school_path_id_foreign` (`school_path_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_path_offers`
--

INSERT INTO `school_path_offers` (`school_path_offer_id`, `internship_offer_id`, `school_path_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 1, 2),
(7, 2, 7),
(8, 3, 8),
(9, 4, 2),
(10, 2, 1),
(11, 6, 6),
(12, 7, 7),
(13, 8, 8),
(14, 9, 9),
(15, 10, 10),
(16, 11, 1),
(17, 12, 2),
(18, 13, 3),
(19, 14, 4),
(20, 15, 5),
(21, 11, 2),
(22, 12, 7),
(23, 13, 8),
(24, 14, 2),
(25, 12, 1),
(26, 16, 6),
(27, 17, 7),
(28, 18, 8),
(29, 19, 9),
(30, 20, 10);

-- --------------------------------------------------------

--
-- Structure de la table `sectors`
--

DROP TABLE IF EXISTS `sectors`;
CREATE TABLE IF NOT EXISTS `sectors` (
  `sector_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `sector_label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`sector_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sectors`
--

INSERT INTO `sectors` (`sector_id`, `sector_label`) VALUES
(1, 'Adminisatration publique'),
(2, 'Aéronautique défense & spatial'),
(3, 'Aéronautique et industrie de l\'armement'),
(4, 'Audit et conseil'),
(5, 'Automobile'),
(7, 'Banque'),
(8, 'Bureau de contrôle et coordination CSPS'),
(9, 'Conseil'),
(10, 'Cybersécurité'),
(11, 'Défense'),
(12, 'Energie'),
(13, 'ESN (Entreprise du Service Numérique)'),
(14, 'Finance / conseil juridique'),
(15, 'Informatique'),
(16, 'Ingénierie'),
(17, 'Logiciels informatiques'),
(18, 'Numérique'),
(19, 'Télécommunications'),
(20, 'Transport');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `setting_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_footer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ico` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`setting_id`, `logo`, `logo_footer`, `ico`, `description`, `image`, `video`, `building`, `contact`) VALUES
(1, 'logo-esiee.svg', 'logo-esiee-footer.svg', 'favicon.ico', 'Le Forum des Stages ESIEE Paris est un événement clé pour connecter les étudiants avec des entreprises partenaires représentant une grande diversité de secteurs : informatique, énergie, génie civil, robotique, et bien d’autres. De nombreuses entreprises participent chaque année pour présenter leurs activités, proposer des offres de stages et échanger directement avec les étudiants.  C’est une opportunité unique de découvrir des métiers, d’élargir votre réseau et de vous préparer efficacement à votre future carrière, que vous soyez en recherche d’un stage ou d’une première expérience dans le monde professionnel.\r\nLe site du forum quant à lui au étudiant de regarder au préalable les entreprises dont les offres pourraient les intéresser. Pour les exposant, il est possible sur le site de consulter l\'ensemble de nos filières ainsi que les CVs de nos étudiants.', 'ESIEE-Home-Main-Picture.webp', 'video1.mp', 'Bâtiment Perrault', 'caroline.dasneves@esiee.fr & elza.ngouapo@esiee.fr');

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_level_id` int UNSIGNED DEFAULT NULL,
  `school_path_id` int UNSIGNED DEFAULT NULL,
  `abroad` tinyint(1) NOT NULL DEFAULT '0',
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `students_school_level_id_foreign` (`school_level_id`),
  KEY `students_school_path_id_foreign` (`school_path_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`student_id`, `last_name`, `first_name`, `school_level_id`, `school_path_id`, `abroad`, `cv`) VALUES
(1, 'Doe', 'John', 2, 1, 0, 'John_Doe_1741615503.pdf'),
(2, 'Smith', 'Jane', 2, 2, 1, 'cv-jane-smith.pdf'),
(3, 'Brown', 'Charlie', 3, 3, 1, 'cv-charlie-brown.pdf'),
(4, 'Johnson', 'Chris', 4, 4, 0, 'cv-chris-johnson.pdf'),
(5, 'Lee', 'Anna', 5, 5, 0, 'cv-anna-lee.pdf'),
(6, 'Taylor', 'Emma', 6, 6, 1, 'cv-emma-taylor.pdf'),
(7, 'Williams', 'Liam', 7, 7, 0, 'cv-liam-williams.pdf'),
(8, 'Jones', 'Sophia', 8, 8, 0, 'cv-sophia-jones.pdf'),
(9, 'Miller', 'James', 9, 9, 1, 'cv-james-miller.pdf'),
(10, 'Wilson-Rodrigo', 'Oliviaviavia', 10, 10, 0, 'cv-oliviaviavia-wilson-rodrigo.pdf'),
(11, 'Passelegue', 'Anne', 8, 4, 0, NULL),
(12, 'azertyuiop', 'azertyuiop', 1, 5, 0, NULL),
(13, 'Passelègue', 'Anne', 4, 1, 0, 'cvs/8D3COe3idvwLQ3DrEyI1UzMDLCfjVsozorwZKFqN.pdf'),
(14, 'zzzzzzzzzzzzzzzzzz', 'zzzzzzzzzzzzzzzzzzzzzzzzzz', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('student','company','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int UNSIGNED DEFAULT NULL,
  `company_id` int UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `users_student_id_foreign` (`student_id`),
  KEY `users_company_id_foreign` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `type`, `student_id`, `company_id`, `remember_token`) VALUES
(1, 'company1.user', 'companypass1', 'company', NULL, 1, NULL),
(2, 'company2.user', 'companypass2', 'company', NULL, 2, NULL),
(3, 'company3.user', 'companypass3', 'company', NULL, 3, NULL),
(4, 'company4.user', 'companypass4', 'company', NULL, 4, NULL),
(5, 'company5.user', 'companypass5', 'company', NULL, 5, NULL),
(6, 'company6.user', 'companypass6', 'company', NULL, 6, NULL),
(7, 'company7.user', 'companypass7', 'company', NULL, 7, NULL),
(8, 'company8.user', 'companypass8', 'company', NULL, 8, NULL),
(9, 'company9.user', 'companypass9', 'company', NULL, 9, NULL),
(10, 'company10.user', 'companypass10', 'company', NULL, 10, NULL),
(11, 'admin1', 'adminpass1', 'admin', NULL, NULL, NULL),
(12, 'admin2', 'adminpass2', 'admin', NULL, NULL, NULL),
(13, 'admin3', 'adminpass3', 'admin', NULL, NULL, NULL),
(14, 'john.doe@edu.essiefr', 'password123', 'student', 1, NULL, NULL),
(15, 'jane.smith@edu.essiefr', 'password456', 'student', 2, NULL, NULL),
(16, 'charlie.brown@edu.essiefr', 'password789', 'student', 3, NULL, NULL),
(17, 'chris.johnson@edu.essiefr', 'password321', 'student', 4, NULL, NULL),
(18, 'anna.lee@edu.essiefr', 'password654', 'student', 5, NULL, NULL),
(19, 'emma.taylor@edu.essiefr', 'password987', 'student', 6, NULL, NULL),
(20, 'liam.williams@edu.essiefr', 'password111', 'student', 7, NULL, NULL),
(21, 'sophia.jones@edu.essiefr', 'password222', 'student', 8, NULL, NULL),
(22, 'james.miller@edu.essiefr', 'password333', 'student', 9, NULL, NULL),
(23, 'olivia.wilson@edu.essiefr', 'password444', 'student', 10, NULL, NULL),
(24, 'anne.passelegue@edu.esiee.fr', '$2y$12$lFAT71ZqQwcTGdqoIOz9QOVS.Gf6qHmDYpUvfDSWStjjhNgADUsuO', 'student', 1, 1, NULL),
(25, 'admin@edu.esiee.fr', '$2y$12$x6KeUm8LDYX4z5.OekOlzeVjoJVPZKwHBWZjkRcEV057/208pRE5', 'student', NULL, 1, NULL),
(26, 'justine.@edu.esiee.com', '$2y$12$f1XHhjKrhw3kVde8Tx9MROdihW3vDFEcxHiE8zhon1wyRban2K21q', 'admin', NULL, NULL, NULL),
(27, 'louane.galois@edu.esiee.fr', '$2y$12$a53la0b8fWCU1ODf0vIiH.wMVjCc81lluF8KRj0Ux4/5htDW4IS02', 'student', 11, NULL, NULL),
(28, 'a.a@edu.esiee.fr', '$2y$12$7W3acDZPuWdboUe/eFHIXugc5V6YyM2/5K8RA2GQh3PCmDS2GSg4y', 'student', 12, NULL, NULL),
(29, 'aanne.passelegue@edu.esiee.fr', '$2y$12$hyaIcll94KrLFpyl.5U.t.uK6HQu5dmIMgti6WU.sDqamJdGdZgx6', 'company', NULL, 5, NULL),
(30, 'zzz.zzz@edu.esiee.fr', '$2y$12$vc7bz.Frjak5CF/wiiVvjuhiva6kRQ6M48pSlJZgt5Qkb2SKffUvC', 'student', 14, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
