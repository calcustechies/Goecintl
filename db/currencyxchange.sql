-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2018 at 08:09 PM
-- Server version: 5.7.21
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `currencyxchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `sr_no` int(4) NOT NULL,
  `bh_code` varchar(20) NOT NULL,
  `bh_name` varchar(40) NOT NULL,
  `bh_adrs` mediumtext NOT NULL,
  `bh_tel` varchar(30) NOT NULL,
  `bh_contact` varchar(40) NOT NULL,
  `bh_frz` int(2) NOT NULL DEFAULT '0',
  `bh_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`sr_no`, `bh_code`, `bh_name`, `bh_adrs`, `bh_tel`, `bh_contact`, `bh_frz`, `bh_created`) VALUES
(1, '001', 'RUWI (MAIN) BRANCH', 'P.O Box No.3931,\r\nPost Code-112,\r\nRuwi High Street,\r\nSultanate of Oman', '+968-24834182', 'Manager', 0, '2017-11-29 04:53:10'),
(2, '2', 'sheeb branch', 'sheeban addr', '69856325', '9665966', 0, '2018-02-17 12:43:41'),
(3, '3', 'abcd', 'sdfgdgd', '645645645', 'suresh', 0, '2018-02-20 11:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `sr_no` int(4) NOT NULL,
  `cy_code` varchar(20) NOT NULL,
  `cy_nname` varchar(20) NOT NULL,
  `cy_name` varchar(30) NOT NULL,
  `cy_country` text NOT NULL,
  `cy_frz` int(2) NOT NULL DEFAULT '0',
  `bh_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`sr_no`, `cy_code`, `cy_nname`, `cy_name`, `cy_country`, `cy_frz`, `bh_code`) VALUES
(11, '1', 'US Dollar', 'USD', 'US', 0, '001'),
(12, '2', 'Oman Riyal', 'OMR', 'Oman', 0, '001'),
(13, '3', 'Indian Ruppee', 'INR', 'IN', 0, '001'),
(14, '4', 'Bangladesh Taka', 'BDT', 'Bengladesh', 0, '001'),
(15, '5', 'British Pound', 'GBP', 'England', 0, '001'),
(16, '6', 'Australian Dollar', 'AUD', 'Australia', 0, '001'),
(17, '7', 'Dirham', 'AED', 'UAE', 0, '001'),
(18, '8', 'Saudi Rial', 'SR', 'Saudi', 0, '001'),
(19, '9', 'Pakistan Rupee', 'PKR', 'Pakistan', 0, '001'),
(20, '10', 'Euro', 'EURO', 'European Union', 0, '001'),
(21, '10', 'Nepali Rupees', 'NPR', 'Nepal', 0, '001'),
(22, '11', 'Aruban', 'AWG', 'North America', 0, '6');

-- --------------------------------------------------------

--
-- Table structure for table `currency_rates`
--

CREATE TABLE `currency_rates` (
  `sr_no` int(4) NOT NULL,
  `frm_cy` varchar(30) NOT NULL DEFAULT '2',
  `to_cy` varchar(30) NOT NULL,
  `cy_ex_rate` float NOT NULL,
  `cy_pur_rate` float NOT NULL,
  `cy_sale_rate` float NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `bh_code` varchar(30) NOT NULL,
  `us_code` varchar(20) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency_rates`
--

INSERT INTO `currency_rates` (`sr_no`, `frm_cy`, `to_cy`, `cy_ex_rate`, `cy_pur_rate`, `cy_sale_rate`, `from_date`, `to_date`, `bh_code`, `us_code`, `active`) VALUES
(48, '2', '4', 4.63696, 4.63696, 5.1, '2018-01-14', '2999-12-31', '001', '5', 0),
(49, '2', '1', 0.00463696, 0.00463696, 0.0051, '2018-01-14', '2999-12-31', '001', '5', 0),
(50, '2', '4', 0.00463696, 0.00463696, 0.0051, '2018-01-14', '2999-12-31', '001', '5', 0),
(51, '2', '7', 0.088404, 0.088404, 0.105, '2018-01-14', '2999-12-31', '001', '5', 0),
(52, '2', '8', 0.0834625, 0.0834625, 0.103, '2018-01-14', '2999-12-31', '001', '5', 0),
(53, '2', '1', 0.385467, 0.385467, 0.386, '2018-01-14', '2999-12-31', '001', '5', 0),
(54, '2', '1', 0.385467, 0.385467, 0.386, '2018-01-14', '2999-12-31', '001', '5', 0),
(55, '2', '1', 0.385467, 0.385467, 0.386, '2018-01-14', '2999-12-31', '001', '5', 0),
(56, '2', '1', 0.385, 0.385, 0.386, '2018-01-14', '2999-12-31', '001', '5', 0),
(57, '2', '7', 0.104, 0.104, 0.105, '2018-01-14', '2999-12-31', '001', '5', 0),
(58, '2', '1', 0.00485, 0.00485, 0.0049, '2018-01-15', '2999-12-31', '001', '5', 0),
(59, '2', '4', 0.00485, 0.00485, 0.0049, '2018-01-15', '2999-12-31', '001', '5', 0),
(60, '2', '4', 0.0048, 0.0048, 0.0051, '2018-01-15', '2999-12-31', '001', '5', 0),
(61, '2', '8', 0.101, 0.101, 0.103, '2018-01-15', '2999-12-31', '001', '5', 1),
(62, '2', '7', 0.104, 0.104, 0.105, '2018-01-15', '2999-12-31', '001', '5', 0),
(63, '2', '4', 0.0048, 0.0048, 0.0051, '2018-01-15', '2999-12-31', '001', '5', 0),
(64, '2', '1', 0.385, 0.385, 0.386, '2018-01-15', '2999-12-31', '001', '5', 0),
(65, '2', '4', 0.0048, 0.0048, 0.0051, '2018-01-17', '2999-12-31', '001', '5', 0),
(66, '2', '4', 0.0048, 0.0048, 0.00505, '0000-00-00', '2999-12-31', '001', '5', 0),
(67, '2', '4', 0.0048, 0.0048, 0.0051, '2018-01-18', '2999-12-31', '001', '5', 0),
(68, '2', '4', 0.00475, 0.00475, 0.0051, '2018-01-18', '2999-12-31', '001', '5', 0),
(69, '2', '1', 0.384, 0.384, 0.385, '2018-01-20', '2999-12-31', '001', '5', 0),
(70, '2', '1', 0.385, 0.385, 0.386, '2018-01-20', '2999-12-31', '001', '5', 0),
(71, '2', '1', 0.384, 0.384, 0.386, '2018-01-20', '2999-12-31', '001', '5', 0),
(72, '2', '7', 0.1045, 0.1045, 0.105, '2018-01-22', '2999-12-31', '001', '5', 0),
(73, '2', '1', 0.104, 0.104, 0.105, '2018-01-22', '2999-12-31', '001', '5', 0),
(74, '2', '7', 0.104, 0.104, 0.105, '2018-01-22', '2999-12-31', '001', '5', 0),
(75, '2', '1', 0.384, 0.384, 0.386, '2018-01-22', '2999-12-31', '001', '5', 0),
(76, '2', '1', 0.38, 0.38, 0.86, '2018-01-22', '2999-12-31', '001', '5', 0),
(77, '2', '7', 0.1045, 0.1045, 0.105, '2018-01-23', '2999-12-31', '001', '5', 0),
(78, '2', '1', 0.104, 0.104, 0.1045, '2018-01-23', '2999-12-31', '001', '5', 0),
(79, '2', '7', 0.104, 0.104, 0.1045, '2018-01-23', '2999-12-31', '001', '5', 0),
(80, '2', '7', 0.104, 0.104, 0.105, '2018-01-24', '2999-12-31', '001', '5', 1),
(81, '2', '4', 0.0048, 0.0048, 0.0051, '2018-01-25', '2999-12-31', '001', '5', 0),
(82, '2', '1', 0.384, 0.384, 0.386, '2018-01-26', '2999-12-31', '001', '5', 0),
(83, '2', '4', 0.00476, 0.00476, 0.0051, '2018-01-26', '2999-12-31', '001', '5', 0),
(84, '2', '1', 0.00485, 0.00485, 0.0051, '0000-00-00', '2999-12-31', '001', '5', 0),
(85, '2', '4', 0.00485, 0.00485, 0.0051, '2018-01-26', '2999-12-31', '001', '5', 0),
(86, '2', '1', 0.384, 0.384, 0.386, '2018-01-27', '2999-12-31', '001', '5', 0),
(87, '2', '4', 0.00475, 0.00475, 0.0051, '2018-01-30', '2999-12-31', '001', '5', 0),
(88, '2', '1', 0.385, 0.385, 0.386, '2018-02-06', '2999-12-31', '001', '5', 0),
(89, '2', '1', 0.38, 0.38, 0.386, '2018-02-06', '2999-12-31', '001', '5', 0),
(90, '2', '1', 0.382, 0.382, 0.386, '2018-02-07', '2999-12-31', '001', '5', 0),
(91, '2', '1', 0.385, 0.385, 0.386, '2018-02-07', '2999-12-31', '001', '5', 0),
(92, '2', '1', 0.384, 0.384, 0.0386, '2018-02-11', '2999-12-31', '001', '5', 0),
(93, '2', '1', 0.384, 0.384, 0.386, '2018-02-11', '2999-12-31', '001', '5', 0),
(94, '2', '1', 0.00475, 0.00475, 0.00486, '2018-02-11', '2999-12-31', '001', '5', 0),
(95, '2', '4', 0.00475, 0.00475, 0.00486, '2018-02-11', '2999-12-31', '001', '5', 0),
(96, '2', '1', 0.00475, 0.00475, 0.0051, '2018-02-12', '2999-12-31', '001', '5', 0),
(97, '2', '4', 0.00475, 0.00475, 0.0051, '2018-02-12', '2999-12-31', '001', '5', 0),
(98, '2', '1', 0.384, 0.384, 0.386, '2018-02-14', '2999-12-31', '001', '5', 0),
(99, '2', '1', 0.385, 0.385, 0.386, '2018-02-14', '2999-12-31', '001', '5', 0),
(100, '2', '1', 0.384, 0.384, 0.386, '2018-02-15', '2999-12-31', '001', '5', 0),
(101, '2', '4', 0.0048, 0.0048, 0.0051, '2018-02-15', '2999-12-31', '001', '5', 0),
(102, '2', '1', 0.00475, 0.00475, 0.005, '2018-02-15', '2999-12-31', '001', '5', 1),
(103, '2', '4', 0.00475, 0.00475, 0.005, '2018-02-15', '2999-12-31', '001', '5', 0),
(104, '2', '4', 0.00475, 0.00475, 0.0051, '2018-02-15', '2999-12-31', '001', '5', 0),
(105, '2', '4', 0.00475, 0.00475, 0.0051, '0000-00-00', '2999-12-31', '001', '5', 1),
(106, '2', '0', 21, 121, 121, '2018-02-15', '2999-12-31', '001', '5', 1),
(107, '2', '10', 20, 20, 20, '2018-02-15', '2999-12-31', '001', '5', 0),
(108, '2', '10', 21, 21, 23, '2018-02-15', '2999-12-31', '001', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `sr_no` int(4) NOT NULL,
  `cus_code` varchar(20) NOT NULL,
  `cus_name` varchar(30) NOT NULL,
  `cus_addr` mediumtext NOT NULL,
  `cus_tel` varchar(30) NOT NULL,
  `cus_pp` varchar(30) NOT NULL,
  `nationality` char(3) NOT NULL,
  `cus_civil` varchar(30) NOT NULL,
  `cus_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `cus_blk` int(11) NOT NULL DEFAULT '0',
  `bank` int(2) NOT NULL DEFAULT '0',
  `bh_id` varchar(20) NOT NULL,
  `father_name` varchar(40) DEFAULT NULL,
  `gf_name` varchar(40) DEFAULT NULL,
  `family_name` varchar(40) DEFAULT NULL,
  `title` varchar(40) DEFAULT NULL,
  `desig` varchar(30) DEFAULT NULL,
  `cus_dob` date DEFAULT NULL,
  `pob` varchar(40) DEFAULT NULL,
  `good_q` varchar(30) DEFAULT NULL,
  `low_q` varchar(30) DEFAULT NULL,
  `nat` varchar(40) DEFAULT NULL,
  `listed_on` varchar(40) DEFAULT NULL,
  `date_amended` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`sr_no`, `cus_code`, `cus_name`, `cus_addr`, `cus_tel`, `cus_pp`, `nationality`, `cus_civil`, `cus_created`, `cus_blk`, `bank`, `bh_id`, `father_name`, `gf_name`, `family_name`, `title`, `desig`, `cus_dob`, `pob`, `good_q`, `low_q`, `nat`, `listed_on`, `date_amended`) VALUES
(59, '1', 'Gulf Overseas Exchange Col LLC', 'Oman', '111111111', '11111', '', '111111', '2017-12-29 09:09:09', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, '2', 'Gulf Overseas Exchange Col LLC', 'Oman', '24834182', '24834182', '', 'CR 1/23649/0', '2018-01-14 08:58:23', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, '3', 'MRS MAHFUZA', 'MUSCAT', '94757131', '94757131', '', '94757131', '2018-01-14 10:13:09', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, '4', 'SALAH UDDIN', 'MUSCAT', '95632565', '95632565', '', '95632565', '2018-01-14 10:16:06', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, '5', 'GOEC, IBRI BRANCH', 'IBRI', '91283251', '91283251', '', '25690847', '2018-01-14 22:38:00', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, '6', 'AUGUSTINE M GOMES', 'RUWI, MUSCAT', '99797615', '99797615', '', '62704177', '2018-01-14 23:42:54', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, '7', 'SOLIM UDDIN', 'MUSCAT', '99379758', 'AG 1112922', '', '61463584', '2018-01-15 07:31:57', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, '8', 'S M MOJIBAR RAHMAN', 'RUWI, MUSCAT', '95958978', '95958978', '', '95958978', '2018-01-15 07:53:48', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, '9', 'MOHAMMED REAZ UDDIN', 'RUWI MUSCAT', '97618773', '97618773', '', '100235334', '2018-01-15 07:57:03', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, '10', 'MOHAMMED JUMA SAID', 'MUSCAT', '99464672', '99464672', '', '1186218', '2018-01-15 23:41:36', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, '11', 'JAHANGIR', 'RUWI MUSCAT', '95694746', '95694746', '', '88335618', '2018-01-16 06:24:11', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, '12', 'RUHUL KUDDUS KHAN', 'RUWI MUSCAT', '98275928', '98275928', '', '78042686', '2018-01-16 07:33:07', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, '13', 'MOHAMMED ALI', 'RUWI MUSCAT', '95893096', '95893096', '', '95893096', '2018-01-16 09:13:03', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, '14', 'SAYFUL ISLAM', 'RUWI MUSCAT', '97861496', '97861496', '', '91491989', '2018-01-16 09:28:52', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, '15', 'MOHAMMED ABUL HASAN', 'RUWI MUSCAT', '96936462', '96936462', '', '113286641', '2018-01-16 09:30:09', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, '16', 'MD MOHIUDDIN', 'RUWI MUSCAT', '91962820', '91962820', '', '89553567', '2018-01-16 09:31:16', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, '17', 'MOHD ABDUL HASHEM', 'RUWI MUSCAT', '99899737', '99899737', '', '79297733', '2018-01-17 01:03:53', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, '18', 'MAIN UDDIN SIDDIK ', 'BARKA', '98568133', '98568133', '', '77504387', '2018-01-17 06:32:17', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, '19', 'YASSER JUMA DARWISH AL BALUSHI', 'BARKA', '96040440', '5039512', '', '5039512', '2018-01-17 08:31:16', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, '20', 'MOHD ALA UDDIN', 'MUSCAT', '92761290', '92761290', '', '92761290', '2018-01-17 09:59:14', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, '21', 'MOHAMMAD IBRAHIM', 'RUWI', '95698454', '98984919', '', '98984919', '2018-01-18 01:50:06', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, '22', 'MOHAMMED SALAMAT ULLAH', 'RUWI', '71553008', '109887501', '', '109887501', '2018-01-18 06:34:03', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, '23', 'MD ALAUDDIN', 'MUSCAT', '99123156', '99123156', '', '74215643', '2018-01-18 07:34:34', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, '24', 'GANI DELWAR', 'RUWI', '96077872', '85519394', '', '85519394', '2018-01-18 08:01:54', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, '25', 'MILLAT', 'RUWI', '91652002', '91652002', '', '91652002', '2018-01-18 08:41:50', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, '26', 'ERFAN HOSSEN', 'RUWI', '98952047', '98952047', '', '98952047', '2018-01-19 05:59:21', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, '27', 'TUTUL BIAWAS', 'RUWI', '97302967', '97302967', '', '97302967', '2018-01-19 06:21:05', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, '28', 'OMAR FARUK', 'RUWI', '95754220', '95754220', '', '95754220', '2018-01-19 07:22:00', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, '29', 'MOJIBUR RAHMAN', 'RUWI', '98362101', '98362101', '', '98362101', '2018-01-19 08:02:32', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, '30', 'SHACHU', 'RUWI', '99594575', '99594575', '', '99594575', '2018-01-19 09:22:20', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, '31', 'MONA MOHAMMED', 'RUWI', '90272724', '103296058', '', '103296058', '2018-01-19 10:26:12', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, '32', 'AJIZUL HOQUE', 'RUWI', '94046954', '97638793', '', '97638793', '2018-01-20 00:52:03', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, '33', 'MOHAQMMAD  MONIRUZZAMAN', 'RUWI', '93076996', '97674298', '', '97674298', '2018-01-20 00:53:56', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, '34', 'GULAM HOSSAIN', 'RUWI', '99609094', '99609094', '', '99609094', '2018-01-20 05:50:44', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, '35', 'PULICKAL RAVEENDRAN', 'RUWI', '24169417', '24169417', '', '24169417', '2018-01-20 07:01:50', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, '36', 'MOHAMMED POROS ALI', 'RUWI', '71763178', '71763178', '', '71763178', '2018-01-20 08:02:30', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, '37', 'NAVEED ANJUM ', 'RUWI', '97232425', '97232425', '', '84969783', '2018-01-20 08:10:43', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, '38', 'FAISAL ARSHEED', 'RUWI', '95182767', '95182767', '', '95182767', '2018-01-20 09:36:38', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, '39', 'KABIR HOSSEN', 'RUWI', '71922921', '110306194', '', '110306194', '2018-01-21 06:00:43', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, '40', 'MOHAMMAD SAHAB', 'RUWI', '94107343', '84871518', '', '84871518', '2018-01-21 06:14:02', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, '41', 'MOHAMMED ALAM', 'RUWI', '94298264', '84724979', '', '84724979', '2018-01-21 06:18:52', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, '42', 'MD.NURUL  AMIN', 'RUWI', '97328051', '92171075', '', '92171075', '2018-01-21 07:00:28', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, '43', 'GOEC, SINAW BRANCH', 'SINAW', '91283247', '25524564', '', '25524564', '2018-01-22 06:37:45', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, '44', 'MASUD', 'RUWI', '92718842', '92718842', '', '92718842', '2018-01-22 08:27:18', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, '45', 'MR. AHMED NOOR MOHAMMED', 'MUSCAT', '97772442', '97772442', '', '97772442', '2018-01-23 06:32:58', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, '46', 'IZZAT NOOR', 'RUWI', '92103182', '105785301', '', '105785301', '2018-01-23 07:00:56', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, '47', 'MOHAMMED SIRAJ ALI', 'RUWI', '98195562', '88057445', '', '88057445', '2018-01-23 09:26:36', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, '48', 'MIZANUR RAHMAN', 'RUWI', '94962594', '91785962', '', '91785962', '2018-01-23 22:16:09', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, '49', 'MD. ABU TAHER ', 'RUWI', '99343677', '99343677', '', '63092064', '2018-01-24 00:31:36', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, '50', 'DARWISH  SALEH  ALI WAHAIBI', 'RUWI', '99224118', '1619233', '', '1619233', '2018-01-24 06:32:44', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, '51', 'AFSAR KHAN', 'RUWI', '95653706', '95653706', '', '95653706', '2018-01-24 23:19:05', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, '52', 'MAJED', 'RUWI', '99065928', '99065928', '', '99065928', '2018-01-25 00:40:39', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, '53', 'ABDUL NAJID', 'RUWI', '99608204', '99608204', '', '99608204', '2018-01-25 01:13:35', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, '54', 'SUMAN  DEY', 'RUWI', '93887836', '90986151', '', '90986151', '2018-01-25 06:32:35', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, '55', 'ASHISH BARUA', 'RUWI', '94792667', '94792667', '', '94792667', '2018-01-25 08:04:41', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, '56', 'MD BABUL AHMED ', 'RUWI', '92175847', '79068249', '', '79068249', '2018-01-25 09:06:26', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, '57', 'OUSAMA ABDUL RAHMAN', 'RUWI', '25652545', '25652545', '', '25652545', '2018-01-25 23:52:04', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, '58', 'MD JANE ALAM', 'RUWI', '97001370', '97001370', '', '60578105', '2018-01-26 07:44:21', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, '59', 'AKAMOT ALI', 'RUWI', '94381372', '94381372', '', '92220909', '2018-01-26 07:49:29', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, '60', 'MOJAHED', 'RUWI', '95297654', '95297654', '', '95297654', '2018-01-26 08:49:23', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, '61', 'MOHAMMED SAIFUL ISLAM ', 'RUWI', '92672926', '92672926', '', '76983941', '2018-01-26 09:19:57', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, '62', 'REHMAN ALI', 'RUWI', '90402855', '90402855', '', '90402855', '2018-01-26 22:33:04', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, '63', 'MOHAMMED SAIFUL', 'RUWI', '94134050', '90885377', '', '90885377', '2018-01-27 05:42:26', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, '64', 'BIJU  MATHEW', 'RUWI', '98289588', '60839777', '', '60839777', '2018-01-28 00:24:26', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, '65', 'MOHAMMED  MOUSTAFA ', 'RUWI', 'A21669746', 'A21669746', '', 'A21669746', '2018-01-28 05:48:01', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, '66', 'RAJESH KHETANI', 'RUWI', '95703233', '65615017', '', '65615017', '2018-01-28 09:20:18', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, '67', 'BORHAN UDDIN', 'RUWI', '92091642', '92091642', '', '78478389', '2018-01-28 09:38:41', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, '68', 'ABDUL QAIYUM', 'RUWI', '94023179', '94023179', '', '94023179', '2018-01-28 22:53:47', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, '69', 'MD JAVED', 'RUWI', '96551564', '96551564', '', '96551564', '2018-01-30 01:50:07', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, '70', 'MOHAMMED HASAN ALI', 'RUWI', '99196305', '99196305', '', '77578695', '2018-01-30 01:52:50', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, '71', 'SHAREEF AL SAID FARID', 'RUWI', '96709480', '96709480', '', '105703567', '2018-01-30 22:34:56', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, '72', 'BADIUL ALAM', 'RUWI', '92043136', '92043136', '', '92043136', '2018-01-31 00:52:31', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, '73', 'SALMAN', 'RUWI', '94530306', '94530306', '', '94530306', '2018-01-31 00:56:24', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, '74', 'MOHAMMAD TAWHIDUL ALAM', 'RUWI, MUSCAT', '92153137', '83448964', '', '83448964', '2018-01-31 07:48:21', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, '75', 'ABDUL HANNAN', 'RUWI', '93703295', '93703295', '', '93703295', '2018-01-31 23:34:14', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, '76', 'MD EMRAN HOSSEN', 'RUWI', '95543671', '95543671', '', '95543671', '2018-02-01 07:13:24', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, '77', 'MD JOWEL UDDIN', 'RUWI', '97934426', '97934426', '', '97934426', '2018-02-01 08:15:48', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, '78', 'MOHAMMAD MOSTAFA KAMAL', 'RUIQ', '90782533', '106402294', '', '106402294', '2018-02-01 08:57:41', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, '79', 'SUMAN NANDI', 'RUWI', '98214692', '78822524', '', '78822524', '2018-02-01 09:02:52', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, '80', 'SOHEL', 'RUWI', '97316241', '97316241', '', '97316241', '2018-02-01 09:03:34', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, '81', 'SAIDUL ISLAM', 'RUWI', '96791311', '96791311', '', '96791311', '2018-02-01 23:55:25', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, '82', 'MIRZA MAQSOOD BAIG', 'RUWI', '99711441', '92405192', '', '92405192', '2018-02-02 08:29:05', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, '83', 'MOHAMMED ABDUL MOTIN', 'RUWI', '92798172', '67218459', '', '67218459', '2018-02-03 07:29:22', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, '84', 'MD HASAN', 'RUWI', '93766816', '93766816', '', '93766816', '2018-02-03 09:54:47', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, '85', 'SAZZAD HOSSAIN ', 'RUWI', '94157189', '94157189', '', '99462134', '2018-02-04 06:51:55', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, '86', 'NURUL ABSAR SIDDIQUE ', 'RUWI', '99417229', '99417229', '', '99417229', '2018-02-06 06:48:32', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, '87', 'MUHAMMAD NAEEM', 'RUWI', '98265872', '98265872', '', '98265872', '2018-02-06 07:33:24', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, '88', 'MUKESH', 'RUWI', '95915826', '95915826', '', '95915826', '2018-02-06 22:31:59', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, '89', 'FAISAL', 'RUWI', '94341219', '94341219', '', '94341219', '2018-02-07 00:36:25', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, '90', 'MOHAMMAD SAAD  SHOUKAT ALI', 'RUWI', '93514540', '63885671', '', '63885671', '2018-02-07 00:56:22', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, '91', 'MD RASHED', 'RUWI', '93516762', '93516762', '', '93516762', '2018-02-07 21:50:37', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, '92', 'MD MOIN', 'RUWI', '97446375', '97446375', '', '97446375', '2018-02-08 01:27:41', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, '93', 'SHAFIUL AZAM', 'RUWI', '99705457', '99705457', '', '99705457', '2018-02-08 08:00:41', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, '94', 'ASHRAFUL ISLAM', 'RUWI', '94276840', '94276840', '', '94276840', '2018-02-08 09:29:20', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, '95', 'VEERAMMA TALLA', 'RUWI', '91680145', '91680145', '', '91680145', '2018-02-09 06:55:32', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, '96', 'SHIHAB UDDIN', 'RUIWI', '95275435', '104337407', '', '104337407', '2018-02-09 07:16:27', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, '97', 'MD. SHAMS UDDIN', 'RUWI', '95317180', '104309919', '', '104309919', '2018-02-09 07:26:25', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, '98', 'MD SAGAR', 'RUWI', '94126139', '94126139', '', '94126139', '2018-02-09 08:40:45', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, '99', 'KANCHAN', 'RUWI', '93134385', '93134385', '', '93134385', '2018-02-09 08:45:47', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, '100', 'KAMAL HOSSAIN', 'RUWI', '98920938', '98920938', '', '98920938', '2018-02-09 09:33:21', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, '101', 'ABU TAHER', 'RUWI', '93759518', '93759518', '', '93759518', '2018-02-10 06:30:47', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, '102', 'JAVED', 'RUWI', '95815276', '95815276', '', '95815276', '2018-02-10 07:21:17', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, '103', 'ROWSHAN WAHEDI', 'RUWI', '61497778', '61497778', '', '61497778', '2018-02-10 09:48:22', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, '104', 'RAIHAN', 'RUWI', '93748206', '93748206', '', '93748206', '2018-02-10 22:50:19', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, '105', 'SATHEESH  SEKHAR  BOKKA', 'RUWI', '79187830', '110281554', '', '110281554', '2018-02-11 06:45:47', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, '106', 'BOKTO NARAYAN DAS', 'RUWI', '94567172', '94567172', '', '94567172', '2018-02-11 07:38:55', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, '107', 'DELWER HOSSEN', 'RUWI', '97920778', '97920778', '', '97920778', '2018-02-11 07:41:30', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, '108', 'MOZNU', 'RUWI', '96388207', '96388207', '', '96388207', '2018-02-11 10:15:32', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, '109', 'S M AZBAHAR UDDIN SELIM', 'RUWI', '96930023', '96930023', '', '96930023', '2018-02-11 22:59:27', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, '110', 'PROKASH', 'RUWI', '93404117', '93404117', '', '93404117', '2018-02-11 23:32:11', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, '111', 'KHALED', 'RUWI', '96557647', '96557647', '', '96557647', '2018-02-12 01:26:26', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, '112', 'MOHAMMAD MOHIN UDDIN', 'RUWI', '96525462', '1097283369', '', '1097283369', '2018-02-12 08:34:31', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, '113', 'ABU SALEH', 'RUWI', '98353608', '89710577', '', '89710577', '2018-02-12 09:25:56', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, '114', 'DINESH', 'RUWI', '95794631', '95794631', '', '95794631', '2018-02-13 07:40:27', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, '115', 'NUR UDDIN', 'RUWI', '92530479', '92530479', '', '92530479', '2018-02-13 08:50:07', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, '116', 'P M ISMAIL', 'RUWI', '99699641', '99699641', '', '99699641', '2018-02-13 23:03:11', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, '117', 'SHANKAR MAHAJAN', 'RUWI', '99310176', '99310176', '', '99310176', '2018-02-14 02:10:14', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, '118', 'MOHAMMED KAMAL', 'RUWI', '96354453', '93114844', '', '93114844', '2018-02-14 06:50:21', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, '119', 'MOHAMMED JAMAL', 'RUWI', '95766825', '68610679', '', '68610679', '2018-02-14 09:40:32', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, '120', 'NURUL AMIN', 'RUWI', '99462993', '99462993', '', '99462993', '2018-02-14 23:54:45', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, '121', 'KABIR', 'RUWI', '94979201', '94979201', '', '94979201', '2018-02-14 23:58:24', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, '122', 'NURUN NABI', 'RUWI', '99116130', '99116130', '', '99116130', '2018-02-15 07:40:35', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, '123', 'MD.MITHU MONDOL', 'RUWI', '71381650', '107619769', '', '107619769', '2018-02-15 08:54:58', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, '124', 'suresh', 'abc', '9496830364', 'HJLO65', 'PAK', 'HJLO65', '2018-02-16 15:52:59', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, '125', 'cxvxc', 'dfgdg', '565475445', 'ff5fgfd', 'BHR', 'trgrev', '2018-02-16 17:57:47', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, '126', 'fgfdgdfgdfg', 'dgdfgdfgd', '565654654654', '65654645', 'BGD', '665656', '2018-02-16 17:59:15', 0, 0, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `sr_no` int(4) NOT NULL,
  `des_id` int(4) NOT NULL,
  `des_name` varchar(30) NOT NULL,
  `bh_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`sr_no`, `des_id`, `des_name`, `bh_code`) VALUES
(1, 1, 'super user', '001'),
(3, 2, 'Branch Master', '001'),
(4, 3, 'staff', '001'),
(5, 4, 'Manager', '8'),
(6, 5, 'Staff', '8'),
(7, 6, 'manager', '2');

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE `rights` (
  `user_rts_id` int(4) NOT NULL,
  `user_rts_code` int(2) NOT NULL,
  `dsh_brd` int(2) NOT NULL DEFAULT '1',
  `b_m` int(2) NOT NULL DEFAULT '0',
  `b_m_create` int(2) NOT NULL DEFAULT '0',
  `b_m_edit` int(2) NOT NULL DEFAULT '0',
  `purchase` int(2) NOT NULL DEFAULT '1',
  `sales` int(2) NOT NULL DEFAULT '1',
  `c_m` int(2) NOT NULL DEFAULT '0',
  `c_m_create` int(2) NOT NULL DEFAULT '0',
  `c_m_edit` int(2) NOT NULL DEFAULT '0',
  `c_m_rates` int(2) NOT NULL DEFAULT '0',
  `cus_m` int(2) NOT NULL DEFAULT '1',
  `cus_m_create` int(2) NOT NULL DEFAULT '1',
  `cus_m_edit` int(2) NOT NULL DEFAULT '1',
  `cus_m_black` int(2) NOT NULL DEFAULT '1',
  `u_m` int(2) NOT NULL DEFAULT '0',
  `u_m_create` int(2) NOT NULL DEFAULT '0',
  `u_m_edit` int(2) NOT NULL DEFAULT '0',
  `u_m_des` int(2) NOT NULL DEFAULT '0',
  `u_m_rights` int(2) NOT NULL DEFAULT '0',
  `reports` int(2) NOT NULL DEFAULT '1',
  `tr_h` int(2) NOT NULL DEFAULT '1',
  `re_b` int(2) NOT NULL DEFAULT '1',
  `ledger` int(2) NOT NULL DEFAULT '1',
  `topsheet` varchar(2) NOT NULL DEFAULT '0',
  `utili` int(2) NOT NULL DEFAULT '1',
  `utili_calc` int(2) NOT NULL DEFAULT '1',
  `utili_backup` int(2) NOT NULL DEFAULT '1',
  `voucher` int(2) NOT NULL DEFAULT '0',
  `transaction` int(2) NOT NULL DEFAULT '0',
  `settings` int(2) NOT NULL DEFAULT '1',
  `set_ch_pass` int(2) NOT NULL DEFAULT '1',
  `bh_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`user_rts_id`, `user_rts_code`, `dsh_brd`, `b_m`, `b_m_create`, `b_m_edit`, `purchase`, `sales`, `c_m`, `c_m_create`, `c_m_edit`, `c_m_rates`, `cus_m`, `cus_m_create`, `cus_m_edit`, `cus_m_black`, `u_m`, `u_m_create`, `u_m_edit`, `u_m_des`, `u_m_rights`, `reports`, `tr_h`, `re_b`, `ledger`, `topsheet`, `utili`, `utili_calc`, `utili_backup`, `voucher`, `transaction`, `settings`, `set_ch_pass`, `bh_code`) VALUES
(1, 5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '1', 1, 1, 1, 1, 1, 1, 1, '001'),
(2, 19, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, '0', 1, 1, 1, 0, 0, 1, 1, '001'),
(3, 20, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, '1', 1, 1, 1, 0, 0, 1, 1, '001'),
(4, 21, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, '0', 1, 1, 1, 0, 0, 1, 1, '2'),
(5, 22, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, '0', 1, 1, 1, 0, 0, 1, 1, '001'),
(6, 23, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, '0', 1, 1, 1, 0, 0, 1, 1, '2'),
(7, 24, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, '0', 1, 1, 1, 0, 0, 1, 1, '3');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sr_no` int(40) NOT NULL,
  `tr_id` varchar(30) NOT NULL,
  `cus_id` varchar(20) NOT NULL,
  `from_cy` varchar(20) NOT NULL,
  `to_cy` varchar(20) NOT NULL,
  `frm_amt` float NOT NULL,
  `equvallent` float NOT NULL,
  `to_amt` varchar(30) NOT NULL,
  `tr_ex_rate` float NOT NULL,
  `tr_rate_sr_no` int(40) NOT NULL,
  `cmsn` float NOT NULL,
  `sale_pur` int(2) DEFAULT '1',
  `source` varchar(20) NOT NULL DEFAULT 'Salary',
  `purpose` varchar(20) NOT NULL DEFAULT 'Travelling',
  `bh_code` varchar(20) NOT NULL,
  `trans_date` date NOT NULL,
  `trans_time` varchar(10) NOT NULL,
  `us_code` varchar(20) NOT NULL,
  `round` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sr_no`, `tr_id`, `cus_id`, `from_cy`, `to_cy`, `frm_amt`, `equvallent`, `to_amt`, `tr_ex_rate`, `tr_rate_sr_no`, `cmsn`, `sale_pur`, `source`, `purpose`, `bh_code`, `trans_date`, `trans_time`, `us_code`, `round`) VALUES
(1, '1', '1', '4', '2', 487680, 2261.35, '2261.353', 0.00463696, 50, 0, 0, 'Salary', 'Travelling', '001', '2018-01-14', '07:17:pm', '5', 0),
(2, '2', '2', '7', '2', 9230, 815.969, '815.969', 0.088404, 51, 0, 0, 'Others', 'Trade', '001', '2018-01-14', '07:58:pm', '5', 0),
(3, '3', '2', '8', '2', 2694, 224.848, '224.848', 0.0834625, 52, 0, 0, 'Salary', 'Trade', '001', '2018-01-14', '08:04:pm', '5', 0),
(4, '4', '2', '1', '2', 17225, 6639.67, '6639.669', 0.385467, 55, 0, 0, 'Salary', 'Travelling', '001', '2018-01-14', '08:27:pm', '5', 0),
(5, '5', '3', '1', '2', 5000, 1925, '1925.000', 0.385, 56, 0, 0, 'Others', 'Travelling', '001', '2018-01-14', '09:13:pm', '5', 0),
(6, '6', '4', '7', '2', 130, 13.52, '13.520', 0.104, 57, 0, 0, 'Salary', 'Travelling', '001', '2018-01-14', '09:16:pm', '5', 0),
(7, '7', '5', '2', '4', 200000, 980, '980.000', 0.0049, 59, 0, 1, 'Others', 'Travelling', '001', '2018-01-15', '09:38:am', '5', 0),
(8, '8', '6', '2', '4', 8000, 40.8, '40.800', 0.0051, 60, 0, 1, 'Salary', 'Travelling', '001', '2018-01-15', '10:42:am', '5', 0),
(9, '9', '7', '2', '4', 19500, 99.45, '99.450', 0.0051, 60, 0, 1, 'Salary', 'Travelling', '001', '2018-01-15', '06:31:pm', '5', 0),
(10, '10', '8', '2', '8', 1500, 154.5, '154.500', 0.103, 61, 0, 1, 'Salary', 'Travelling', '001', '2018-01-15', '06:53:pm', '5', 0),
(11, '11', '9', '7', '2', 620, 64.48, '64.480', 0.104, 62, 0, 0, 'Salary', 'Travelling', '001', '2018-01-15', '06:57:pm', '5', 0),
(12, '12', '9', '4', '2', 2000, 9.6, '9.600', 0.0048, 63, 0, 0, 'Salary', 'Travelling', '001', '2018-01-15', '08:42:pm', '5', 0),
(13, '13', '4', '4', '2', 2000, 9.6, '9.600', 0.0048, 63, 0, 0, 'Salary', 'Travelling', '001', '2018-01-15', '08:43:pm', '5', 0),
(14, '14', '3', '1', '2', 500, 192.5, '192.500', 0.385, 64, 0, 0, 'Salary', 'Travelling', '001', '2018-01-15', '08:58:pm', '5', 0),
(15, '15', '10', '7', '2', 290, 30.16, '30.160', 0.104, 62, 0, 0, 'Salary', 'Travelling', '001', '2018-01-16', '10:41:am', '5', 0),
(16, '16', '10', '7', '2', 100, 10.4, '10.400', 0.104, 62, 0, 0, 'Salary', 'Travelling', '001', '2018-01-16', '05:24:pm', '5', 0),
(17, '17', '10', '7', '2', 235, 24.44, '24.400', 0.104, 62, 0, 0, 'Salary', 'Travelling', '001', '2018-01-16', '06:33:pm', '5', 0),
(18, '18', '10', '2', '4', 1000, 5.1, '5.100', 0.0051, 63, 0, 1, 'Salary', 'Travelling', '001', '2018-01-16', '06:46:pm', '5', 0),
(29, '19', '13', '2', '4', 2000, 10.2, '10.200', 0.0051, 63, 0, 1, 'Salary', 'Travelling', '001', '2018-01-16', '08:13:pm', '5', 0),
(30, '20', '14', '7', '2', 100, 10.4, '10.400', 0.104, 62, 0, 0, 'Salary', 'Travelling', '001', '2018-01-16', '08:28:pm', '5', 0),
(31, '21', '15', '4', '2', 1800, 8.64, '8.600', 0.0048, 63, 0, 0, 'Salary', 'Travelling', '001', '2018-01-16', '08:30:pm', '5', 0),
(32, '22', '16', '4', '2', 700, 3.36, '3.300', 0.0048, 63, 0, 0, 'Salary', 'Travelling', '001', '2018-01-16', '08:31:pm', '5', -0.06),
(33, '23', '17', '2', '4', 3000, 15.3, '15.000', 0.0051, 65, 0, 1, 'Salary', 'Travelling', '001', '2018-01-17', '12:03:pm', '5', -0.3),
(34, '24', '18', '2', '4', 10000, 51, '51.000', 0.0051, 65, 0, 1, 'Salary', 'Travelling', '001', '2018-01-17', '05:32:pm', '5', 0),
(37, '26', '19', '2', '7', 7629.77, 799.6, '799.600', 0.1048, 62, 0, 1, 'Salary', 'Travelling', '001', '2018-01-17', '07:31:pm', '19', 0),
(38, '27', '20', '2', '4', 1000, 5.1, '5.100', 0.0051, 65, 0, 1, 'Salary', 'Travelling', '001', '2018-01-17', '08:59:pm', '5', 0),
(41, '28', '21', '2', '4', 4000, 20.2, '20.200', 0.00505, 66, 0, 1, 'Salary', 'Travelling', '001', '2018-01-18', '12:58:pm', '5', 0),
(42, '29', '22', '7', '2', 1000, 104, '104.000', 0.104, 62, 0, 0, 'Salary', 'Travelling', '001', '2018-01-18', '05:34:pm', '20', 0),
(43, '30', '23', '2', '4', 5000, 25.5, '25.500', 0.0051, 67, 0, 1, 'Salary', 'Travelling', '001', '2018-01-18', '06:34:pm', '5', 0),
(44, '31', '24', '2', '4', 4000, 20.4, '20.400', 0.0051, 67, 0, 1, 'Salary', 'Travelling', '001', '2018-01-18', '07:01:pm', '20', 0),
(45, '32', '25', '4', '2', 7000, 33.25, '33.300', 0.00475, 68, 0, 0, 'Salary', 'Travelling', '001', '2018-01-18', '07:41:pm', '5', 0.05),
(46, '33', '26', '7', '2', 500, 52, '52.000', 0.104, 62, 0, 0, 'Salary', 'Travelling', '001', '2018-01-19', '04:59:pm', '5', 0),
(47, '34', '27', '7', '2', 400, 41.6, '41.600', 0.104, 62, 0, 0, 'Salary', 'Travelling', '001', '2018-01-19', '05:21:pm', '5', 0),
(48, '35', '28', '2', '4', 2000, 10.2, '10.200', 0.0051, 0, 0, 1, 'Salary', 'Travelling', '001', '2018-01-19', '06:22:pm', '5', 0),
(49, '36', '29', '2', '7', 140, 14.7, '14.700', 0.105, 62, 0, 1, 'Salary', 'Travelling', '001', '2018-01-19', '07:02:pm', '5', 0),
(50, '37', '30', '2', '4', 9800, 49.98, '50.000', 0.0051, 68, 0, 1, 'Salary', 'Travelling', '001', '2018-01-19', '08:22:pm', '5', 0),
(51, '38', '31', '2', '1', 1620, 625.32, '625.300', 0.386, 64, 0, 1, 'Salary', 'Travelling', '001', '2018-01-19', '09:26:pm', '5', 0),
(52, '39', '31', '2', '1', 3500, 1351, '1351.000', 0.386, 64, 0, 1, 'Salary', 'Travelling', '001', '2018-01-19', '09:26:pm', '5', 0),
(53, '40', '32', '2', '4', 3000, 15.3, '15.300', 0.0051, 68, 0, 1, 'Salary', 'Travelling', '001', '2018-01-20', '11:52:am', '20', 0),
(54, '41', '33', '2', '4', 4000, 20.4, '20.400', 0.0051, 68, 0, 1, 'Salary', 'Travelling', '001', '2018-01-20', '11:53:am', '20', 0),
(55, '42', '34', '2', '7', 1000, 105, '105.000', 0.105, 62, 0, 1, 'Salary', 'Travelling', '001', '2018-01-20', '04:50:pm', '5', 0),
(56, '43', '35', '2', '7', 330, 34.65, '34.700', 0.105, 62, 0, 1, 'Salary', 'Travelling', '001', '2018-01-20', '06:01:pm', '5', 0.05),
(58, '45', '3', '1', '2', 2000, 770, '770.000', 0.385, 70, 0, 0, 'Salary', 'Travelling', '001', '2018-01-20', '06:42:pm', '5', 0),
(59, '46', '36', '4', '2', 500, 2.375, '2.400', 0.00475, 68, 0, 0, 'Salary', 'Travelling', '001', '2018-01-20', '07:02:pm', '5', 0.025),
(60, '47', '37', '8', '2', 1000, 101, '101.000', 0.101, 61, 0, 0, 'Salary', 'Travelling', '001', '2018-01-20', '07:10:pm', '5', 0),
(61, '48', '38', '7', '2', 200, 20.8, '20.800', 0.104, 62, 0, 0, 'Salary', 'Travelling', '001', '2018-01-20', '08:36:pm', '5', 0),
(62, '49', '39', '2', '4', 2000, 10.2, '10.200', 0.0051, 68, 0, 1, 'Salary', 'Travelling', '001', '2018-01-21', '05:00:pm', '20', 0),
(63, '50', '40', '2', '4', 2000, 10.2, '10.200', 0.0051, 68, 0, 1, 'Salary', 'Travelling', '001', '2018-01-21', '05:14:pm', '20', 0),
(64, '51', '41', '2', '4', 2000, 10.2, '10.200', 0.0051, 68, 0, 1, 'Salary', 'Travelling', '001', '2018-01-21', '05:18:pm', '20', 0),
(65, '52', '42', '2', '4', 3000, 15.3, '15.300', 0.0051, 68, 0, 1, 'Salary', 'Travelling', '001', '2018-01-21', '06:00:pm', '20', 0),
(66, '53', '32', '7', '2', 100, 10.4, '10.400', 0.104, 62, 0, 0, 'Salary', 'Travelling', '001', '2018-01-22', '12:46:pm', '20', 0),
(67, '54', '43', '7', '2', 20000, 2090, '2090.000', 0.1045, 72, 0, 0, 'Salary', 'Travelling', '001', '2018-01-22', '05:37:pm', '5', 0),
(68, '55', '38', '7', '2', 50, 5.2, '5.200', 0.104, 74, 0, 0, 'Salary', 'Travelling', '001', '2018-01-22', '06:54:pm', '20', 0),
(69, '56', '44', '1', '2', 165, 62.7, '62.700', 0.38, 76, 0, 0, 'Salary', 'Travelling', '001', '2018-01-22', '07:27:pm', '5', 0),
(70, '57', '44', '7', '2', 50, 5.2, '5.200', 0.104, 74, 0, 0, 'Salary', 'Travelling', '001', '2018-01-22', '07:28:pm', '5', 0),
(71, '58', '45', '2', '7', 3000, 313.5, '313.500', 0.1045, 79, 0, 1, 'Salary', 'Travelling', '001', '2018-01-23', '05:32:pm', '5', 0),
(72, '59', '46', '7', '2', 865, 89.96, '89.900', 0.104, 79, 0, 0, 'Salary', 'Travelling', '001', '2018-01-23', '06:00:pm', '5', -0.06),
(73, '60', '47', '2', '4', 1000, 5.1, '5.100', 0.0051, 68, 0, 1, 'Salary', 'Travelling', '001', '2018-01-23', '08:26:pm', '20', 0),
(74, '61', '48', '4', '2', 1000, 4.75, '4.750', 0.00475, 68, 0, 0, 'Salary', 'Travelling', '001', '2018-01-24', '09:16:am', '20', 0),
(75, '62', '49', '2', '4', 4000, 20.4, '20.400', 0.0051, 68, 0, 1, 'Salary', 'Travelling', '001', '2018-01-24', '11:31:am', '5', 0),
(76, '63', '50', '2', '7', 4000, 418, '418.000', 0.1045, 79, 0, 1, 'Salary', 'Travelling', '001', '2018-01-24', '05:32:pm', '20', 0),
(77, '64', '32', '2', '4', 2000, 10.2, '10.200', 0.0051, 68, 0, 1, 'Salary', 'Travelling', '001', '2018-01-24', '07:26:pm', '20', 0),
(78, '65', '51', '7', '2', 1000, 104, '104.000', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-01-25', '10:19:am', '5', 0),
(79, '66', '52', '7', '2', 100, 10.4, '10.400', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-01-25', '11:40:am', '5', 0),
(80, '67', '53', '7', '2', 465, 48.36, '48.300', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-01-25', '12:13:pm', '5', -0.06),
(81, '68', '11', '7', '2', 100, 10.4, '10.400', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-01-25', '05:26:pm', '20', 0),
(82, '69', '54', '2', '4', 5000, 25.5, '25.500', 0.0051, 68, 0, 1, 'Salary', 'Travelling', '001', '2018-01-25', '05:32:pm', '20', 0),
(83, '70', '55', '4', '2', 500, 2.4, '2.400', 0.0048, 81, 0, 0, 'Salary', 'Travelling', '001', '2018-01-25', '07:04:pm', '5', 0),
(84, '71', '56', '2', '4', 10000, 51, '51.000', 0.0051, 81, 0, 1, 'Salary', 'Travelling', '001', '2018-01-25', '08:06:pm', '5', 0),
(86, '72', '57', '1', '2', 300, 115.2, '115.200', 0.384, 82, 0, 0, 'Salary', 'Travelling', '001', '2018-01-26', '10:53:am', '5', 0),
(87, '73', '58', '2', '1', 1000, 386, '386.000', 0.386, 82, 0, 1, 'Salary', 'Travelling', '001', '2018-01-26', '06:44:pm', '5', 0),
(88, '74', '59', '7', '2', 1000, 104, '104.000', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-01-26', '06:49:pm', '5', 0),
(89, '75', '60', '2', '7', 3000, 315, '315.000', 0.105, 80, 0, 1, 'Salary', 'Travelling', '001', '2018-01-26', '07:49:pm', '5', 0),
(91, '76', '61', '4', '2', 95000, 460.75, '460.800', 0.00485, 85, 0, 0, 'Salary', 'Travelling', '001', '2018-01-26', '08:39:pm', '5', 0.05),
(92, '77', '62', '1', '2', 100, 38.4, '38.400', 0.384, 86, 0, 0, 'Salary', 'Travelling', '001', '2018-01-27', '09:33:am', '5', 0),
(93, '78', '61', '2', '8', 485, 49.955, '49.900', 0.103, 61, 0, 1, 'Salary', 'Travelling', '001', '2018-01-27', '12:31:pm', '5', -0.055),
(94, '79', '63', '1', '2', 500, 192, '192.000', 0.384, 86, 0, 0, 'Salary', 'Travelling', '001', '2018-01-27', '04:42:pm', '20', 0),
(95, '80', '51', '8', '2', 50, 5.05, '5.050', 0.101, 61, 0, 0, 'Salary', 'Travelling', '001', '2018-01-27', '05:36:pm', '20', 0),
(96, '81', '64', '7', '2', 100, 10.4, '10.400', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-01-28', '11:24:am', '20', 0),
(97, '82', '8', '8', '2', 577, 58.277, '58.200', 0.101, 61, 0, 0, 'Salary', 'Travelling', '001', '2018-01-28', '12:03:pm', '5', -0.077),
(98, '83', '65', '1', '2', 100, 38.4, '38.400', 0.384, 86, 0, 0, 'Salary', 'Travelling', '001', '2018-01-28', '04:48:pm', '20', 0),
(99, '84', '66', '1', '2', 300, 115.2, '115.200', 0.384, 86, 0, 0, 'Salary', 'Travelling', '001', '2018-01-28', '08:20:pm', '20', 0),
(100, '85', '67', '2', '4', 2000, 10.2, '10.200', 0.0051, 85, 0, 1, 'Salary', 'Travelling', '001', '2018-01-28', '08:38:pm', '5', 0),
(101, '86', '68', '1', '2', 100, 38.4, '38.400', 0.384, 86, 0, 0, 'Salary', 'Travelling', '001', '2018-01-29', '09:53:am', '5', 0),
(102, '87', '60', '2', '7', 5000, 525, '525.000', 0.105, 80, 0, 1, 'Salary', 'Travelling', '001', '2018-01-29', '08:10:pm', '5', 0),
(103, '88', '69', '2', '4', 4000, 20.4, '20.400', 0.0051, 85, 0, 1, 'Salary', 'Travelling', '001', '2018-01-30', '12:50:pm', '5', 0),
(104, '89', '70', '4', '2', 2100, 9.975, '10.000', 0.00475, 87, 0, 0, 'Salary', 'Travelling', '001', '2018-01-30', '12:52:pm', '5', 0.025),
(105, '90', '71', '2', '1', 1200, 463.2, '463.200', 0.386, 86, 0, 1, 'Salary', 'Travelling', '001', '2018-01-31', '09:34:am', '5', 0),
(106, '91', '72', '2', '7', 300, 31.5, '31.500', 0.105, 80, 0, 1, 'Salary', 'Travelling', '001', '2018-01-31', '11:52:am', '5', 0),
(107, '92', '73', '2', '8', 1950, 200.85, '200.900', 0.103, 61, 0, 1, 'Salary', 'Travelling', '001', '2018-01-31', '11:56:am', '5', 0.05),
(108, '93', '74', '7', '2', 1000, 104, '104.000', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-01-31', '06:48:pm', '20', 0),
(109, '94', '75', '2', '4', 4000, 20.4, '20.400', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-01', '10:34:am', '5', 0),
(110, '95', '76', '4', '2', 8300, 39.425, '39.400', 0.00475, 87, 0, 0, 'Salary', 'Travelling', '001', '2018-02-01', '06:13:pm', '5', -0.025),
(111, '96', '77', '2', '4', 5000, 25.5, '25.500', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-01', '07:15:pm', '5', 0),
(112, '97', '78', '4', '2', 3000, 14.25, '14.250', 0.00475, 87, 0, 0, 'Salary', 'Travelling', '001', '2018-02-01', '07:57:pm', '20', 0),
(113, '98', '79', '4', '2', 2000, 9.5, '9.500', 0.00475, 87, 0, 0, 'Salary', 'Travelling', '001', '2018-02-01', '08:02:pm', '20', 0),
(114, '99', '80', '4', '2', 3000, 14.25, '14.200', 0.00475, 87, 0, 0, 'Salary', 'Travelling', '001', '2018-02-01', '08:03:pm', '5', -0.05),
(115, '100', '81', '2', '4', 5000, 25.5, '25.500', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-02', '10:55:am', '5', 0),
(116, '101', '75', '7', '2', 100, 10.4, '10.400', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-02-02', '04:55:pm', '5', 0),
(117, '102', '82', '2', '7', 5000, 525, '525.000', 0.105, 80, 0, 1, 'Salary', 'Travelling', '001', '2018-02-02', '07:29:pm', '20', 0),
(118, '103', '34', '2', '7', 4000, 420, '420.000', 0.105, 80, 0, 1, 'Salary', 'Travelling', '001', '2018-02-03', '09:23:am', '5', 0),
(119, '104', '60', '2', '7', 3000, 315, '315.000', 0.105, 80, 0, 1, 'Salary', 'Travelling', '001', '2018-02-03', '11:44:am', '5', 0),
(120, '105', '83', '2', '4', 10000, 51, '51.000', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-03', '06:29:pm', '20', 0),
(121, '106', '84', '7', '2', 230, 23.92, '23.900', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-02-03', '08:54:pm', '5', -0.02),
(122, '107', '85', '2', '4', 2000, 10.2, '10.200', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-04', '05:51:pm', '5', 0),
(123, '108', '53', '2', '4', 2000, 10.2, '10.200', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-04', '06:56:pm', '20', 0),
(124, '109', '68', '2', '4', 6000, 30.6, '30.600', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-04', '07:02:pm', '20', 0),
(125, '110', '53', '2', '4', 6000, 30.6, '30.600', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-04', '07:03:pm', '20', 0),
(126, '111', '44', '7', '2', 300, 31.2, '31.200', 0.1045, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-02-05', '07:53:pm', '20', 0),
(127, '112', '75', '7', '2', 100, 10.4, '10.400', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-02-06', '04:50:pm', '5', 0),
(128, '113', '59', '1', '2', 100, 38.5, '38.500', 0.385, 88, 0, 0, 'Salary', 'Travelling', '001', '2018-02-06', '04:58:pm', '5', 0),
(129, '114', '86', '2', '7', 1800, 189, '189.000', 0.105, 80, 0, 1, 'Salary', 'Travelling', '001', '2018-02-06', '05:48:pm', '5', 0),
(130, '115', '87', '1', '2', 200, 76, '76.000', 0.38, 89, 0, 0, 'Salary', 'Travelling', '001', '2018-02-06', '06:33:pm', '5', 0),
(131, '116', '53', '2', '4', 1000, 5.1, '5.100', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-06', '07:27:pm', '20', 0),
(132, '117', '88', '7', '2', 5, 0.52, '0.500', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-02-07', '09:31:am', '5', -0.02),
(133, '118', '89', '1', '2', 900, 343.8, '343.800', 0.382, 90, 0, 0, 'Salary', 'Travelling', '001', '2018-02-07', '11:36:am', '5', 0),
(134, '119', '90', '7', '2', 30, 3.12, '3.120', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-02-07', '11:56:am', '20', 0),
(135, '120', '3', '1', '2', 2000, 770, '770.000', 0.385, 91, 0, 0, 'Salary', 'Travelling', '001', '2018-02-07', '07:02:pm', '5', 0),
(136, '121', '91', '2', '4', 4000, 20.4, '20.400', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-08', '08:50:am', '5', 0),
(137, '122', '92', '7', '2', 100, 10.4, '10.400', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-02-08', '12:27:pm', '5', 0),
(138, '123', '93', '2', '4', 5000, 25.5, '25.500', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-08', '07:00:pm', '5', 0),
(139, '124', '94', '2', '4', 5000, 25.5, '25.500', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-08', '08:29:pm', '5', 0),
(140, '124', '', '2', '4', 5000, 25.5, '25.500', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-08', '08:29:pm', '5', 0),
(141, '125', '95', '7', '2', 200, 20.8, '20.800', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-02-09', '05:55:pm', '5', 0),
(142, '126', '96', '2', '4', 10000, 51, '51.000', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-09', '06:16:pm', '20', 0),
(143, '127', '97', '2', '4', 5000, 25.5, '25.500', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-09', '06:26:pm', '20', 0),
(144, '128', '98', '2', '4', 1000, 5.1, '5.100', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-09', '07:40:pm', '5', 0),
(145, '129', '99', '4', '2', 1000, 4.75, '4.700', 0.00475, 87, 0, 0, 'Salary', 'Travelling', '001', '2018-02-09', '07:45:pm', '5', -0.05),
(146, '130', '100', '7', '2', 520, 54.08, '54.000', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-02-09', '08:33:pm', '5', -0.08),
(147, '131', '53', '7', '2', 5, 0.52, '0.500', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-02-09', '08:44:pm', '5', -0.02),
(148, '132', '53', '4', '2', 9000, 42.75, '42.750', 0.00475, 87, 0, 0, 'Salary', 'Travelling', '001', '2018-02-10', '11:46:am', '20', 0),
(149, '133', '101', '2', '4', 2000, 10.2, '10.200', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-10', '05:30:pm', '5', 0),
(150, '134', '102', '2', '4', 7000, 35.7, '35.700', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-10', '06:21:pm', '5', 0),
(151, '135', '103', '1', '2', 1000, 385, '385.000', 0.385, 91, 0, 0, 'Salary', 'Travelling', '001', '2018-02-10', '08:48:pm', '20', 0),
(152, '136', '71', '2', '1', 4700, 1814.2, '1814.200', 0.386, 91, 0, 1, 'Salary', 'Travelling', '001', '2018-02-11', '09:22:am', '5', 0),
(153, '137', '104', '2', '4', 1000, 5.1, '5.100', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-11', '09:50:am', '5', 0),
(154, '138', '63', '1', '2', 200, 76.8, '76.800', 0.384, 92, 0, 0, 'Salary', 'Travelling', '001', '2018-02-11', '04:43:pm', '20', 0),
(155, '139', '105', '8', '2', 500, 50.5, '50.500', 0.101, 61, 0, 0, 'Salary', 'Travelling', '001', '2018-02-11', '05:45:pm', '20', 0),
(156, '140', '106', '2', '1', 30, 11.58, '11.600', 0.386, 93, 0, 1, 'Salary', 'Travelling', '001', '2018-02-11', '06:38:pm', '5', 0.02),
(157, '141', '107', '2', '1', 30, 11.58, '11.580', 0.386, 93, 0, 1, 'Salary', 'Travelling', '001', '2018-02-11', '06:41:pm', '5', 0),
(158, '142', '53', '2', '4', 5000, 25.5, '25.500', 0.0051, 87, 0, 1, 'Salary', 'Travelling', '001', '2018-02-11', '09:04:pm', '5', 0),
(159, '143', '32', '2', '7', 500, 52.5, '52.500', 0.105, 80, 0, 1, 'Salary', 'Travelling', '001', '2018-02-11', '09:05:pm', '5', 0),
(160, '144', '108', '2', '4', 10000, 48.6, '48.600', 0.00486, 95, 0, 1, 'Salary', 'Travelling', '001', '2018-02-11', '09:15:pm', '5', 0),
(161, '145', '109', '4', '2', 20200, 95.95, '96.000', 0.00475, 95, 0, 0, 'Salary', 'Travelling', '001', '2018-02-12', '09:59:am', '5', 0.05),
(162, '146', '110', '2', '4', 1000, 5.1, '5.100', 0.0051, 97, 0, 1, 'Salary', 'Travelling', '001', '2018-02-12', '10:32:am', '5', 0),
(163, '147', '111', '7', '2', 800, 83.2, '83.200', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-02-12', '12:26:pm', '5', 0),
(164, '148', '75', '2', '4', 5000, 25.5, '25.500', 0.0051, 97, 0, 1, 'Salary', 'Travelling', '001', '2018-02-12', '05:36:pm', '20', 0),
(165, '149', '112', '2', '4', 2000, 10.2, '10.200', 0.0051, 97, 0, 1, 'Salary', 'Travelling', '001', '2018-02-12', '07:34:pm', '20', 0),
(166, '150', '53', '2', '4', 1000, 5.1, '5.100', 0.0051, 97, 0, 1, 'Salary', 'Travelling', '001', '2018-02-12', '08:19:pm', '20', 0),
(167, '151', '113', '2', '7', 900, 94.5, '94.500', 0.105, 80, 0, 1, 'Salary', 'Travelling', '001', '2018-02-12', '08:25:pm', '20', 0),
(168, '152', '114', '2', '4', 4000, 20.4, '20.400', 0.0051, 97, 0, 1, 'Salary', 'Travelling', '001', '2018-02-13', '06:40:pm', '5', 0),
(169, '153', '115', '2', '4', 4000, 20.4, '20.400', 0.0051, 97, 0, 1, 'Salary', 'Travelling', '001', '2018-02-13', '07:50:pm', '5', 0),
(170, '154', '116', '7', '2', 1000, 104, '104.000', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-02-14', '10:03:am', '5', 0),
(171, '155', '117', '2', '1', 2000, 772, '772.000', 0.386, 98, 0, 1, 'Salary', 'Travelling', '001', '2018-02-14', '01:10:pm', '5', 0),
(172, '156', '3', '1', '2', 2500, 962.5, '962.500', 0.385, 99, 0, 0, 'Salary', 'Travelling', '001', '2018-02-14', '05:43:pm', '5', 0),
(173, '157', '118', '4', '2', 4500, 21.375, '21.375', 0.00475, 97, 0, 0, 'Salary', 'Travelling', '001', '2018-02-14', '05:50:pm', '20', 0),
(174, '158', '119', '2', '4', 6000, 30.6, '30.600', 0.0051, 97, 0, 1, 'Salary', 'Travelling', '001', '2018-02-14', '08:40:pm', '20', 0),
(175, '159', '103', '4', '2', 27000, 129.6, '129.600', 0.0048, 101, 0, 0, 'Salary', 'Travelling', '001', '2018-02-15', '09:45:am', '5', 0),
(176, '160', '120', '4', '2', 7500, 36, '36.000', 0.0048, 101, 0, 0, 'Salary', 'Travelling', '001', '2018-02-15', '10:54:am', '5', 0),
(177, '161', '121', '2', '4', 500, 2.5, '2.500', 0.005, 103, 0, 1, 'Salary', 'Travelling', '001', '2018-02-15', '10:58:am', '5', 0),
(178, '162', '122', '2', '4', 5000, 25.5, '25.500', 0.0051, 105, 0, 1, 'Salary', 'Travelling', '001', '2018-02-15', '06:40:pm', '5', 0),
(179, '163', '113', '7', '2', 900, 93.6, '93.600', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-02-15', '07:25:pm', '20', 0),
(180, '164', '123', '4', '2', 8000, 38, '38.000', 0.00475, 105, 0, 0, 'Salary', 'Travelling', '001', '2018-02-15', '07:54:pm', '20', 0),
(181, '165', '101', '7', '2', 10, 1.04, '1.000', 0.104, 80, 0, 0, 'Salary', 'Travelling', '001', '2018-02-15', '09:10:pm', '5', -0.04),
(182, '166', '79', '2', '7', 2336, 245.28, '245.280', 0.105, 80, 0, 1, 'Salary', 'Travelling', '001', '2018-02-16', '01:02:pm', '5', 0),
(183, '167', '27', '2', '8', 887, 91.361, '91.361', 0.103, 61, 0, 1, 'Salary', 'Travelling', '001', '2018-02-16', '01:09:pm', '5', 0),
(184, '168', '125', '8', '2', 535353, 54070.7, '54070.653', 0.101, 61, 0, 0, 'Salary', 'Travelling', '001', '2018-02-16', '04:27:pm', '5', 0),
(185, '169', '126', '2', '4', 54, 0.275, '0.275', 0.0051, 105, 0, 1, 'Salary', 'Travelling', '001', '2018-02-16', '04:29:pm', '5', 0),
(186, '170', '27', '4', '2', 100, 0.475, '0.475', 0.00475, 105, 0, 0, 'Salary', 'Travelling', '001', '2018-02-16', '08:58:pm', '5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sr_no` int(4) NOT NULL,
  `us_code` varchar(20) NOT NULL,
  `user_nam` varchar(35) NOT NULL,
  `us_name` varchar(30) NOT NULL,
  `us_addr` mediumtext NOT NULL,
  `us_tel` varchar(30) NOT NULL,
  `us_pp` varchar(30) NOT NULL,
  `pass_wor` varchar(35) NOT NULL,
  `bh_code` varchar(20) NOT NULL,
  `us_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `us_des` int(4) NOT NULL,
  `us_frz` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sr_no`, `us_code`, `user_nam`, `us_name`, `us_addr`, `us_tel`, `us_pp`, `pass_wor`, `bh_code`, `us_created`, `us_des`, `us_frz`) VALUES
(15, '5', 'Masud', 'Masud', 'Ruwi HO			', '9876543210', '2365LKO2', '12345', '001', '2017-11-22 11:59:26', 1, 0),
(18, '6', 'shiras', 'shiras', 'Ruwi				', '987653210', 'KSLO652', '12345', '001', '2017-12-02 02:20:25', 1, 0),
(19, '7', 'althaf', 'althaf', 'Salalah				', '659832506', 'SD8HGF', '12345', '001', '2017-12-02 02:21:38', 2, 0),
(20, '8', 'sample', 'sample', 'dsadsa', '34234534', 'dfeds345', 'fdsf', '001', '2017-12-22 23:29:17', 3, 0),
(21, '9', 'utham', 'Utham Kurup', 'Seeb Branch					', '99264507', '123456', '123456', '002', '2017-12-29 10:43:40', 1, 0),
(22, '10', 'suresh', 'SEEB BRANCH', 'P.O Box No.82,\r\nSeeb-121,\r\nSeeb Souq,\r\nSultanate of Oman', '+968-24422333', '0', '12345', '6', '2017-12-29 21:52:56', 2, 0),
(23, '11', 'raj', 'Raja', 'ker', '2233', '1122', '123', '001', '2017-12-29 23:33:02', 2, 0),
(24, '12', 'raj', 'Al Seeb', 'seeb', '2233', '0', '123', '7', '2017-12-29 23:34:51', 2, 0),
(25, '13', 'kuk', 'kuk ', 'test', '6655', '6655', '123', '7', '2017-12-29 23:37:04', 0, 0),
(26, '14', 'utham', 'utham', 'Ruwi, Sultanate of Oman					', '123654', '132654', '123456', '003', '2018-01-03 08:03:32', 1, 0),
(27, '15', 'anjali', 'anjali', 'Salalah', '92495122', '123456', '123456', '001', '2018-01-03 23:43:18', 2, 0),
(28, '16', 'arun', 'Salala Sanayya', 'Salalah', '92495122', '0', '123456', '8', '2018-01-03 23:53:02', 2, 0),
(29, '17', 'alfred', 'alfred', 'Salala', '92495122', '123456', '123456', '8', '2018-01-04 00:01:12', 5, 0),
(30, '18', 'test1', 'test1', 'aa', '77', 'aaaa', '123', '001', '2018-01-11 04:08:54', 1, 0),
(31, '19', 'H M Siraj Uddullah', 'H M Siraj Uddullah', 'Ruwi, Muscat', '91283197', '77500514', '123456', '001', '2018-01-17 07:28:06', 1, 0),
(32, '20', 'Md Istazul Islam', 'Md Istazul Islam', 'Ruwi, Muscat', '92374272', '111540383', '123456', '001', '2018-01-17 08:04:48', 2, 0),
(33, '21', 'user1', 'sheeb branch', 'sheeban addr', '69856325', '0', '12345', '2', '2018-02-17 12:43:42', 2, 0),
(34, '22', 'a1', 'a1', 'gfdgdfg', '3434624', '45345', '12345', '001', '2018-02-17 12:56:06', 1, 0),
(35, '23', 'a2', 'a2', 'dff', '4234234', '3434324', '12345', '2', '2018-02-17 13:01:58', 6, 0),
(36, '24', 'suresh', 'abcd', 'sdfgdgd', '645645645', '0', '1234', '3', '2018-02-20 11:56:12', 2, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_fc_transaction`
-- (See below for the actual view)
--
CREATE TABLE `vw_fc_transaction` (
`tr_type` int(11)
,`fc_cy` varchar(20)
,`bh_code` varchar(20)
,`trans_date` date
,`OMR_amt` varchar(30)
,`FC_Amt` double
);

-- --------------------------------------------------------

--
-- Structure for view `vw_fc_transaction`
--
DROP TABLE IF EXISTS `vw_fc_transaction`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_fc_transaction`  AS  select `transaction`.`sale_pur` AS `tr_type`,`transaction`.`to_cy` AS `fc_cy`,`transaction`.`bh_code` AS `bh_code`,`transaction`.`trans_date` AS `trans_date`,(`transaction`.`to_amt` * -(1)) AS `OMR_amt`,(`transaction`.`frm_amt` * -(1)) AS `FC_Amt` from `transaction` where (`transaction`.`sale_pur` = 1) union all select `transaction`.`sale_pur` AS `tr_type`,`transaction`.`from_cy` AS `fc_cy`,`transaction`.`bh_code` AS `bh_code`,`transaction`.`trans_date` AS `trans_date`,`transaction`.`to_amt` AS `OMR_Amt`,`transaction`.`frm_amt` AS `FC_Amt` from `transaction` where (`transaction`.`sale_pur` = 0) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `currency_rates`
--
ALTER TABLE `currency_rates`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`user_rts_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `sr_no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `sr_no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `currency_rates`
--
ALTER TABLE `currency_rates`
  MODIFY `sr_no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `sr_no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `sr_no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rights`
--
ALTER TABLE `rights`
  MODIFY `user_rts_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sr_no` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sr_no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
