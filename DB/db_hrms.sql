-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2018 at 04:00 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.0.31-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `fax` varchar(191) DEFAULT NULL,
  `website` varchar(191) DEFAULT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'BDT',
  `logo` varchar(191) DEFAULT NULL,
  `thumb` varchar(191) DEFAULT NULL,
  `logo_path` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_settings`
--

INSERT INTO `company_settings` (`id`, `name`, `address`, `phone`, `email`, `fax`, `website`, `currency`, `logo`, `thumb`, `logo_path`, `created_at`, `updated_at`) VALUES
(1, 'DataCraft Ltd.', 'Adabor-13', '01775385704', 'joabyer.pro@gmail.com', '#04A99C', 'facebook.com', '&#x9f3;', '1537856215_datacraft (1).gif', 'thumb_1537856215_datacraft (1).gif', 'public/assets/company/', NULL, '2018-09-25 00:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `value`) VALUES
('ADP', 'Andorran Peseta'),
('AED', 'United Arab Emirates Dirham'),
('AFA', 'Afghan Afghani (1927–2002)'),
('AFN', 'Afghan Afghani'),
('ALK', 'Albanian Lek (1946–1965)'),
('ALL', 'Albanian Lek'),
('AMD', 'Armenian Dram'),
('ANG', 'Netherlands Antillean Guilder'),
('AOA', 'Angolan Kwanza'),
('AOK', 'Angolan Kwanza (1977–1991)'),
('AON', 'Angolan New Kwanza (1990–2000)'),
('AOR', 'Angolan Readjusted Kwanza (1995–1999)'),
('ARA', 'Argentine Austral'),
('ARL', 'Argentine Peso Ley (1970–1983)'),
('ARM', 'Argentine Peso (1881–1970)'),
('ARP', 'Argentine Peso (1983–1985)'),
('ARS', 'Argentine Peso'),
('ATS', 'Austrian Schilling'),
('AUD', 'Australian Dollar'),
('AWG', 'Aruban Florin'),
('AZM', 'Azerbaijani Manat (1993–2006)'),
('AZN', 'Azerbaijani Manat'),
('BAD', 'Bosnia-Herzegovina Dinar (1992–1994)'),
('BAM', 'Bosnia-Herzegovina Convertible Mark'),
('BAN', 'Bosnia-Herzegovina New Dinar (1994–1997)'),
('BBD', 'Barbadian Dollar'),
('BDT', 'Bangladeshi Taka'),
('BEC', 'Belgian Franc (convertible)'),
('BEF', 'Belgian Franc'),
('BEL', 'Belgian Franc (financial)'),
('BGL', 'Bulgarian Hard Lev'),
('BGM', 'Bulgarian Sociacurrency Lev'),
('BGN', 'Bulgarian Lev'),
('BGO', 'Bulgarian Lev (1879–1952)'),
('BHD', 'Bahraini Dinar'),
('BIF', 'Burundian Franc'),
('BMD', 'Bermudan Dollar'),
('BND', 'Brunei Dollar'),
('BOB', 'Bolivian Boliviano'),
('BOL', 'Bolivian Boliviano (1863–1963)'),
('BOP', 'Bolivian Peso'),
('BOV', 'Bolivian Mvdol'),
('BRB', 'Brazilian New Cruzeiro (1967–1986)'),
('BRC', 'Brazilian Cruzado (1986–1989)'),
('BRE', 'Brazilian Cruzeiro (1990–1993)'),
('BRL', 'Brazilian Real'),
('BRN', 'Brazilian New Cruzado (1989–1990)'),
('BRR', 'Brazilian Cruzeiro (1993–1994)'),
('BRZ', 'Brazilian Cruzeiro (1942–1967)'),
('BSD', 'Bahamian Dollar'),
('BTN', 'Bhutanese Ngultrum'),
('BUK', 'Burmese Kyat'),
('BWP', 'Botswanan Pula'),
('BYB', 'Belarusian Ruble (1994–1999)'),
('BYN', 'Belarusian Ruble'),
('BYR', 'Belarusian Ruble (2000–2016)'),
('BZD', 'Belize Dollar'),
('CAD', 'Canadian Dollar'),
('CDF', 'Congolese Franc'),
('CHE', 'WIR Euro'),
('CHF', 'Swiss Franc'),
('CHW', 'WIR Franc'),
('CLE', 'Chilean Escudo'),
('CLF', 'Chilean Unit of Account (UF)'),
('CLP', 'Chilean Peso'),
('CNX', 'Chinese People’s Bank Dollar'),
('CNY', 'Chinese Yuan'),
('COP', 'Colombian Peso'),
('COU', 'Colombian Real Value Unit'),
('CRC', 'Costa Rican Colón'),
('CSD', 'Serbian Dinar (2002–2006)'),
('CSK', 'Czechoslovak Hard Koruna'),
('CUC', 'Cuban Convertible Peso'),
('CUP', 'Cuban Peso'),
('CVE', 'Cape Verdean Escudo'),
('CYP', 'Cypriot Pound'),
('CZK', 'Czech Koruna'),
('DDM', 'East German Mark'),
('DEM', 'German Mark'),
('DJF', 'Djiboutian Franc'),
('DKK', 'Danish Krone'),
('DOP', 'Dominican Peso'),
('DZD', 'Algerian Dinar'),
('ECS', 'Ecuadorian Sucre'),
('ECV', 'Ecuadorian Unit of Constant Value'),
('EEK', 'Estonian Kroon'),
('EGP', 'Egyptian Pound'),
('ERN', 'Eritrean Nakfa'),
('ESA', 'Spanish Peseta (A account)'),
('ESB', 'Spanish Peseta (convertible account)'),
('ESP', 'Spanish Peseta'),
('ETB', 'Ethiopian Birr'),
('EUR', 'Euro'),
('FIM', 'Finnish Markka'),
('FJD', 'Fijian Dollar'),
('FKP', 'Falkland Islands Pound'),
('FRF', 'French Franc'),
('GBP', 'British Pound'),
('GEK', 'Georgian Kupon Larit'),
('GEL', 'Georgian Lari'),
('GHC', 'Ghanaian Cedi (1979–2007)'),
('GHS', 'Ghanaian Cedi'),
('GIP', 'Gibraltar Pound'),
('GMD', 'Gambian Dalasi'),
('GNF', 'Guinean Franc'),
('GNS', 'Guinean Syli'),
('GQE', 'Equatorial Guinean Ekwele'),
('GRD', 'Greek Drachma'),
('GTQ', 'Guatemalan Quetzal'),
('GWE', 'Portuguese Guinea Escudo'),
('GWP', 'Guinea-Bissau Peso'),
('GYD', 'Guyanaese Dollar'),
('HKD', 'Hong Kong Dollar'),
('HNL', 'Honduran Lempira'),
('HRD', 'Croatian Dinar'),
('HRK', 'Croatian Kuna'),
('HTG', 'Haitian Gourde'),
('HUF', 'Hungarian Forint'),
('IDR', 'Indonesian Rupiah'),
('IEP', 'Irish Pound'),
('ILP', 'Israeli Pound'),
('ILR', 'Israeli Shekel (1980–1985)'),
('ILS', 'Israeli New Shekel'),
('INR', 'Indian Rupee'),
('IQD', 'Iraqi Dinar'),
('IRR', 'Iranian Rial'),
('ISJ', 'Icelandic Króna (1918–1981)'),
('ISK', 'Icelandic Króna'),
('ITL', 'Italian Lira'),
('JMD', 'Jamaican Dollar'),
('JOD', 'Jordanian Dinar'),
('JPY', 'Japanese Yen'),
('KES', 'Kenyan Shilling'),
('KGS', 'Kyrgystani Som'),
('KHR', 'Cambodian Riel'),
('KMF', 'Comorian Franc'),
('KPW', 'North Korean Won'),
('KRH', 'South Korean Hwan (1953–1962)'),
('KRO', 'South Korean Won (1945–1953)'),
('KRW', 'South Korean Won'),
('KWD', 'Kuwaiti Dinar'),
('KYD', 'Cayman Islands Dollar'),
('KZT', 'Kazakhstani Tenge'),
('LAK', 'Laotian Kip'),
('LBP', 'Lebanese Pound'),
('LKR', 'Sri Lankan Rupee'),
('LRD', 'Liberian Dollar'),
('LSL', 'Lesotho Loti'),
('LTL', 'Lithuanian Litas'),
('LTT', 'Lithuanian Talonas'),
('LUC', 'Luxembourgian Convertible Franc'),
('LUF', 'Luxembourgian Franc'),
('LUL', 'Luxembourg Financial Franc'),
('LVL', 'Latvian Lats'),
('LVR', 'Latvian Ruble'),
('LYD', 'Libyan Dinar'),
('MAD', 'Moroccan Dirham'),
('MAF', 'Moroccan Franc'),
('MCF', 'Monegasque Franc'),
('MDC', 'Moldovan Cupon'),
('MDL', 'Moldovan Leu'),
('MGA', 'Malagasy Ariary'),
('MGF', 'Malagasy Franc'),
('MKD', 'Macedonian Denar'),
('MKN', 'Macedonian Denar (1992–1993)'),
('MLF', 'Malian Franc'),
('MMK', 'Myanmar Kyat'),
('MNT', 'Mongolian Tugrik'),
('MOP', 'Macanese Pataca'),
('MRO', 'Mauritanian Ouguiya'),
('MTL', 'Maltese Lira'),
('MTP', 'Maltese Pound'),
('MUR', 'Mauritian Rupee'),
('MVP', 'Maldivian Rupee (1947–1981)'),
('MVR', 'Maldivian Rufiyaa'),
('MWK', 'Malawian Kwacha'),
('MXN', 'Mexican Peso'),
('MXP', 'Mexican Silver Peso (1861–1992)'),
('MXV', 'Mexican Investment Unit'),
('MYR', 'Malaysian Ringgit'),
('MZE', 'Mozambican Escudo'),
('MZM', 'Mozambican Metical (1980–2006)'),
('MZN', 'Mozambican Metical'),
('NAD', 'Namibian Dollar'),
('NGN', 'Nigerian Naira'),
('NIC', 'Nicaraguan Córdoba (1988–1991)'),
('NIO', 'Nicaraguan Córdoba'),
('NLG', 'Dutch Guilder'),
('NOK', 'Norwegian Krone'),
('NPR', 'Nepalese Rupee'),
('NZD', 'New Zealand Dollar'),
('OMR', 'Omani Rial'),
('PAB', 'Panamanian Balboa'),
('PEI', 'Peruvian Inti'),
('PEN', 'Peruvian Sol'),
('PES', 'Peruvian Sol (1863–1965)'),
('PGK', 'Papua New Guinean Kina'),
('PHP', 'Philippine Peso'),
('PKR', 'Pakistani Rupee'),
('PLN', 'Polish Zloty'),
('PLZ', 'Polish Zloty (1950–1995)'),
('PTE', 'Portuguese Escudo'),
('PYG', 'Paraguayan Guarani'),
('QAR', 'Qatari Rial'),
('RHD', 'Rhodesian Dollar'),
('ROL', 'Romanian Leu (1952–2006)'),
('RON', 'Romanian Leu'),
('RSD', 'Serbian Dinar'),
('RUB', 'Russian Ruble'),
('RUR', 'Russian Ruble (1991–1998)'),
('RWF', 'Rwandan Franc'),
('SAR', 'Saudi Riyal'),
('SBD', 'Solomon Islands Dollar'),
('SCR', 'Seychellois Rupee'),
('SDD', 'Sudanese Dinar (1992–2007)'),
('SDG', 'Sudanese Pound'),
('SDP', 'Sudanese Pound (1957–1998)'),
('SEK', 'Swedish Krona'),
('SGD', 'Singapore Dollar'),
('SHP', 'St. Helena Pound'),
('SIT', 'Slovenian Tolar'),
('SKK', 'Slovak Koruna'),
('SLL', 'Sierra Leonean Leone'),
('SOS', 'Somali Shilling'),
('SRD', 'Surinamese Dollar'),
('SRG', 'Surinamese Guilder'),
('SSP', 'South Sudanese Pound'),
('STD', 'São Tomé & Príncipe Dobra'),
('SUR', 'Soviet Rouble'),
('SVC', 'Salvadoran Colón'),
('SYP', 'Syrian Pound'),
('SZL', 'Swazi Lilangeni'),
('THB', 'Thai Baht'),
('TJR', 'Tajikistani Ruble'),
('TJS', 'Tajikistani Somoni'),
('TMM', 'Turkmenistani Manat (1993–2009)'),
('TMT', 'Turkmenistani Manat'),
('TND', 'Tunisian Dinar'),
('TOP', 'Tongan Paʻanga'),
('TPE', 'Timorese Escudo'),
('TRL', 'Turkish Lira (1922–2005)'),
('TRY', 'Turkish Lira'),
('TTD', 'Trinidad & Tobago Dollar'),
('TWD', 'New Taiwan Dollar'),
('TZS', 'Tanzanian Shilling'),
('UAH', 'Ukrainian Hryvnia'),
('UAK', 'Ukrainian Karbovanets'),
('UGS', 'Ugandan Shilling (1966–1987)'),
('UGX', 'Ugandan Shilling'),
('USD', 'US Dollar'),
('USN', 'US Dollar (Next day)'),
('USS', 'US Dollar (Same day)'),
('UYI', 'Uruguayan Peso (Indexed Units)'),
('UYP', 'Uruguayan Peso (1975–1993)'),
('UYU', 'Uruguayan Peso'),
('UZS', 'Uzbekistani Som'),
('VEB', 'Venezuelan Bolívar (1871–2008)'),
('VEF', 'Venezuelan Bolívar'),
('VND', 'Vietnamese Dong'),
('VNN', 'Vietnamese Dong (1978–1985)'),
('VUV', 'Vanuatu Vatu'),
('WST', 'Samoan Tala'),
('XAF', 'Central African CFA Franc'),
('XCD', 'East Caribbean Dollar'),
('XEU', 'European Currency Unit'),
('XFO', 'French Gold Franc'),
('XFU', 'French UIC-Franc'),
('XOF', 'West African CFA Franc'),
('XPF', 'CFP Franc'),
('XRE', 'RINET Funds'),
('YDD', 'Yemeni Dinar'),
('YER', 'Yemeni Rial'),
('YUD', 'Yugoslavian Hard Dinar (1966–1990)'),
('YUM', 'Yugoslavian New Dinar (1994–2002)'),
('YUN', 'Yugoslavian Convertible Dinar (1990–1992)'),
('YUR', 'Yugoslavian Reformed Dinar (1992–1993)'),
('ZAL', 'South African Rand (financial)'),
('ZAR', 'South African Rand'),
('ZMK', 'Zambian Kwacha (1968–2012)'),
('ZMW', 'Zambian Kwacha'),
('ZRN', 'Zairean New Zaire (1993–1998)'),
('ZRZ', 'Zairean Zaire (1971–1993)'),
('ZWD', 'Zimbabwean Dollar (1980–2008)'),
('ZWL', 'Zimbabwean Dollar (2009)'),
('ZWR', 'Zimbabwean Dollar (2008)');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Developement', NULL, '2018-09-04 04:47:20', '2018-09-04 04:47:20'),
(2, 'Human Resource Management', NULL, '2018-09-15 23:30:35', '2018-09-15 23:30:35'),
(3, 'Marketing', NULL, '2018-09-15 23:30:46', '2018-09-15 23:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `rank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `rank`, `department_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'Senior Java', NULL, '2018-09-04 04:47:30', '2018-09-04 04:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `first_name`, `last_name`, `dob`, `gender`, `marital_status`, `father_name`, `nationality`, `nid`, `photo`, `photo_path`, `status`, `created_at`, `updated_at`) VALUES
(4, 6, 'Jobayer', 'Mojumder', '1994-07-08', 'Male', 'Un-Married', 'Helal Uddin', 'Bangladesh', '19947520703000030', '1536661860_13333018_1184484674948481_8985713310296494186_n.jpg', 'public/assets/employee/', 1, '2018-09-10 00:39:06', '2018-09-11 04:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_bank_infos`
--

CREATE TABLE `employee_bank_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_bank_infos`
--

INSERT INTO `employee_bank_infos` (`id`, `user_id`, `emp_id`, `bank_name`, `branch_name`, `account_name`, `account_number`, `created_at`, `updated_at`) VALUES
(4, 6, 4, 'CIty Bank', 'Dhanmondi', 'Jobayer Hossen Mojumder', '987654321', '2018-09-10 00:39:06', '2018-09-10 00:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `employee_contact_infos`
--

CREATE TABLE `employee_contact_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_contact_infos`
--

INSERT INTO `employee_contact_infos` (`id`, `user_id`, `emp_id`, `present_address`, `city`, `country`, `mobile`, `phone`, `created_at`, `updated_at`) VALUES
(4, 6, 4, 'Adabor-13', 'Noakhali', 'Chittagong', '01775385704', '01775385704', '2018-09-10 00:39:07', '2018-09-10 00:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `employee_documents`
--

CREATE TABLE `employee_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `appointment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_documents`
--

INSERT INTO `employee_documents` (`id`, `user_id`, `emp_id`, `appointment`, `cv`, `nid`, `created_at`, `updated_at`) VALUES
(4, 6, 4, '1536563386_11951898_1023537877709829_3774660125857935078_n.jpg', '1536563386_13320539_1184484674948481_8985713310296494186_o.jpg', '1536563386_16299767_1402521006478179_360885980094480421_o.jpg', '2018-09-10 00:39:07', '2018-09-10 01:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `employee_official_infos`
--

CREATE TABLE `employee_official_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_id` int(10) UNSIGNED NOT NULL,
  `joining_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_official_infos`
--

INSERT INTO `employee_official_infos` (`id`, `user_id`, `emp_id`, `employee_id`, `email`, `designation_id`, `joining_date`, `created_at`, `updated_at`) VALUES
(4, 6, 4, 'emp-s-j-1', 'jobayer2671@diu.edu.bd', 1, '2018-09-01', '2018-09-10 00:39:06', '2018-09-10 00:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `employee_payroll`
--

CREATE TABLE `employee_payroll` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `basic_salary` double NOT NULL,
  `house_rent_allowance` double DEFAULT NULL,
  `medical_allowance` double DEFAULT NULL,
  `special_allowance` double DEFAULT NULL,
  `fuel_allowance` double DEFAULT NULL,
  `phone_bill_allowance` double DEFAULT NULL,
  `other_allowance` double DEFAULT NULL,
  `tax_deduction` double DEFAULT NULL,
  `provident_fund` double DEFAULT NULL,
  `other_deduction` double DEFAULT NULL,
  `total_allowance` double NOT NULL,
  `total_deduction` double NOT NULL,
  `gross_salary` double NOT NULL,
  `net_salary` double NOT NULL,
  `employment_type` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_payroll`
--

INSERT INTO `employee_payroll` (`id`, `emp_id`, `basic_salary`, `house_rent_allowance`, `medical_allowance`, `special_allowance`, `fuel_allowance`, `phone_bill_allowance`, `other_allowance`, `tax_deduction`, `provident_fund`, `other_deduction`, `total_allowance`, `total_deduction`, `gross_salary`, `net_salary`, `employment_type`, `created_at`, `updated_at`) VALUES
(1, 4, 30000, 1000, 500, 0, 0, 500, 0, 1200, 500, 0, 2000, 1700, 32000, 30300, 1, '2018-09-16 23:17:36', '2018-09-16 23:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `details` text,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `publish` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `details`, `start_datetime`, `end_datetime`, `publish`, `created_at`, `updated_at`) VALUES
(3, 'Developement', NULL, '2018-09-18 17:00:00', '2018-09-22 20:15:00', 1, '2018-09-19 05:14:47', '2018-09-19 05:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `comments` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `emp_id`, `title`, `amount`, `date`, `comments`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 'International Division', 100, '2018-09-20', 'first expense', 1, '2018-09-25 01:18:15', '2018-09-25 01:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `publish` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `name`, `start_date`, `end_date`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Asura', '2018-09-20 00:00:00', '2018-09-21 23:59:00', 1, '2018-09-19 05:02:00', '2018-09-19 05:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `leave_category`
--

CREATE TABLE `leave_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `days` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_category`
--

INSERT INTO `leave_category` (`id`, `name`, `days`, `created_at`, `updated_at`) VALUES
(1, 'Sick Leave', 15, '2018-09-17 23:32:47', '2018-09-17 23:35:35'),
(3, 'Casual Leave', 15, '2018-09-17 23:41:03', '2018-09-17 23:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_30_072058_create_departments_table', 1),
(4, '2018_08_30_072235_create_designations_table', 1),
(5, '2018_09_03_104237_create_employees_table', 1),
(6, '2018_09_03_114521_create_employee_bank_infos_table', 1),
(7, '2018_09_03_114734_create_employee_conatct_infos_table', 1),
(8, '2018_09_03_114931_create_employee_official_infos_table', 1),
(9, '2018_09_04_061734_create_employee_documents_table', 1),
(13, '2018_09_11_045745_create_payroll_table', 2),
(18, '2018_09_14_161436_create_table_notice', 3),
(23, '2018_09_17_051907_create_table_payment_type', 4),
(24, '2018_09_17_054602_create_table_salary_payment', 4),
(25, '2018_09_18_051401_create_table_leave_category', 5),
(27, '2018_09_18_055112_create_table_settings', 6),
(29, '2018_09_18_092622_create_table_working_days', 7),
(31, '2018_09_19_055033_create_table_events_table', 8),
(33, '2018_09_19_093212_create_table_holidays', 9),
(34, '2018_09_25_062016_create_table_expense', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `short_details` text,
  `details` text NOT NULL,
  `publish` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `short_details`, `details`, `publish`, `created_at`, `updated_at`) VALUES
(2, 'AMTOB Iftar with Journalists 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum 2</p>', 1, '2018-09-16 00:17:42', '2018-09-17 04:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cash', NULL, NULL),
(2, 'Cheque', NULL, NULL),
(3, 'Bank Account', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary_payments`
--

CREATE TABLE `salary_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `basic_salary` double NOT NULL,
  `house_rent_allowance` double DEFAULT NULL,
  `medical_allowance` double DEFAULT NULL,
  `special_allowance` double DEFAULT NULL,
  `fuel_allowance` double DEFAULT NULL,
  `phone_bill_allowance` double DEFAULT NULL,
  `other_allowance` double DEFAULT NULL,
  `tax_deduction` double DEFAULT NULL,
  `provident_fund` double DEFAULT NULL,
  `other_deduction` double DEFAULT NULL,
  `total_allowance` double NOT NULL,
  `total_deduction` double NOT NULL,
  `gross_salary` double NOT NULL,
  `net_salary` double NOT NULL,
  `bonus` double NOT NULL,
  `fine_deduction` double NOT NULL,
  `total_payable` double NOT NULL,
  `payment_amount` double NOT NULL,
  `payment_due` double NOT NULL,
  `payment_type` int(10) UNSIGNED NOT NULL,
  `payment_for_month` varchar(191) NOT NULL,
  `comments` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary_payments`
--

INSERT INTO `salary_payments` (`id`, `emp_id`, `basic_salary`, `house_rent_allowance`, `medical_allowance`, `special_allowance`, `fuel_allowance`, `phone_bill_allowance`, `other_allowance`, `tax_deduction`, `provident_fund`, `other_deduction`, `total_allowance`, `total_deduction`, `gross_salary`, `net_salary`, `bonus`, `fine_deduction`, `total_payable`, `payment_amount`, `payment_due`, `payment_type`, `payment_for_month`, `comments`, `created_at`, `updated_at`) VALUES
(3, 4, 30000, 1000, 500, 0, 0, 500, 0, 1200, 500, 0, 2000, 1700, 32000, 30300, 0, 0, 30300, 30300, 0, 3, '2018-11', NULL, '2018-09-17 04:38:50', '2018-09-25 03:18:29'),
(4, 4, 30000, 1000, 500, 0, 0, 500, 0, 1200, 500, 0, 2000, 1700, 32000, 30300, 1000, 500, 30800, 30000, 800, 2, '2018-02', NULL, '2018-09-25 03:17:07', '2018-09-25 03:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `group`, `image`, `thumb`, `image_path`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jobayer Mojumder', 'jobayer.pro@gmail.com', '$2y$10$RTQMNQyD2GDaNW7WSK4tZeXh.WYBsbkU430HKYxITDOMNAuLuLCCS', 1, '1536557273_MMD-103005.jpg', 'thumb_1536557273_MMD-103005.jpg', 'public/assets/user/', 1, 'zK4b8MO26EvgWIIWbiojDzIif0JYhHDpZsgdRduGwKDVMXSrSzeFYAlnlPrd', '2018-09-04 04:43:57', '2018-09-04 04:43:57'),
(6, 'Jobayer Mojumder', 'jobayer2671@diu.edu.bd', '$2y$10$HLS7edBaEiiLU69NBCr6I.qYWpTco44jFsiiQDWBCUKO2tyYSt.ju', 3, '1536661860_13333018_1184484674948481_8985713310296494186_n.jpg', 'thumb_1536661860_13333018_1184484674948481_8985713310296494186_n.jpg', 'public/assets/employee/', 1, NULL, '2018-09-10 00:39:06', '2018-09-11 04:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `working_days`
--

CREATE TABLE `working_days` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` varchar(191) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `working_days`
--

INSERT INTO `working_days` (`id`, `day`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Saturday', 0, '2018-09-17 18:00:00', '2018-09-18 04:00:43'),
(2, 'Sunday', 1, '2018-09-17 18:00:00', '2018-09-18 04:03:39'),
(3, 'Monday', 1, '2018-09-17 18:00:00', '2018-09-18 04:03:39'),
(4, 'Tuesday', 1, '2018-09-17 18:00:00', '2018-09-18 04:03:39'),
(5, 'Wednesday', 1, '2018-09-17 18:00:00', '2018-09-18 04:03:39'),
(6, 'Thursday', 1, '2018-09-17 18:00:00', '2018-09-17 18:00:00'),
(7, 'Friday', 0, '2018-09-17 18:00:00', '2018-09-18 04:00:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designations_department_id_foreign` (`department_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `employee_bank_infos`
--
ALTER TABLE `employee_bank_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_bank_infos_user_id_foreign` (`user_id`),
  ADD KEY `employee_bank_infos_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `employee_contact_infos`
--
ALTER TABLE `employee_contact_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_contact_infos_user_id_foreign` (`user_id`),
  ADD KEY `employee_contact_infos_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `employee_documents`
--
ALTER TABLE `employee_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_documents_user_id_foreign` (`user_id`),
  ADD KEY `employee_documents_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `employee_official_infos`
--
ALTER TABLE `employee_official_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_official_infos_email_unique` (`email`),
  ADD KEY `employee_official_infos_designation_id_foreign` (`designation_id`),
  ADD KEY `employee_official_infos_user_id_foreign` (`user_id`),
  ADD KEY `employee_official_infos_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `employee_payroll`
--
ALTER TABLE `employee_payroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_payroll_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_category`
--
ALTER TABLE `leave_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_payments`
--
ALTER TABLE `salary_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_payments_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `working_days`
--
ALTER TABLE `working_days`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee_bank_infos`
--
ALTER TABLE `employee_bank_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee_contact_infos`
--
ALTER TABLE `employee_contact_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee_documents`
--
ALTER TABLE `employee_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee_official_infos`
--
ALTER TABLE `employee_official_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee_payroll`
--
ALTER TABLE `employee_payroll`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `leave_category`
--
ALTER TABLE `leave_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salary_payments`
--
ALTER TABLE `salary_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `working_days`
--
ALTER TABLE `working_days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `designations`
--
ALTER TABLE `designations`
  ADD CONSTRAINT `designations_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_bank_infos`
--
ALTER TABLE `employee_bank_infos`
  ADD CONSTRAINT `employee_bank_infos_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_bank_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_contact_infos`
--
ALTER TABLE `employee_contact_infos`
  ADD CONSTRAINT `employee_contact_infos_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_contact_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_documents`
--
ALTER TABLE `employee_documents`
  ADD CONSTRAINT `employee_documents_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_official_infos`
--
ALTER TABLE `employee_official_infos`
  ADD CONSTRAINT `employee_official_infos_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`),
  ADD CONSTRAINT `employee_official_infos_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_official_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_payroll`
--
ALTER TABLE `employee_payroll`
  ADD CONSTRAINT `employee_payroll_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `salary_payments`
--
ALTER TABLE `salary_payments`
  ADD CONSTRAINT `salary_payments_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
