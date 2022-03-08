-- Database: `currencyxchange` --
-- Table `branch` --
CREATE TABLE `branch` (
  `sr_no` int(4) NOT NULL AUTO_INCREMENT,
  `bh_code` varchar(20) NOT NULL,
  `bh_name` varchar(40) NOT NULL,
  `bh_adrs` mediumtext NOT NULL,
  `bh_tel` varchar(30) NOT NULL,
  `bh_contact` varchar(40) NOT NULL,
  `bh_frz` int(2) NOT NULL DEFAULT '0',
  `bh_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `branch` (`sr_no`, `bh_code`, `bh_name`, `bh_adrs`, `bh_tel`, `bh_contact`, `bh_frz`, `bh_created`) VALUES
(1, '001', 'RUWI MAIN BRANCH', 'P.O Box No.3931,\r\nPost Code-112,\r\nRuwi High Street,\r\nSultanate of Oman', '+968-24834182', 'Manager', 0, '2017-11-29 04:53:10'),
(2, '002', 'SEEB BRANCH', 'P.O Box No.82,\r\nSeeb-121,\r\nSeeb Souq,\r\nSultanate of Oman', '+968-24422333', 'Manager', 0, '2017-11-29 05:12:28'),
(3, '003', 'SALALALH BRANCH', 'P.O Box No.2319 Salalah-211,\r\nSultanate of Oman', '+968-23290894', 'Manager', 0, '2017-11-29 05:15:33'),
(4, '004', 'JALAN BANI BU ALI BRANCH', 'P.O Box No.432,\r\nJalan Bani Bu Ali,\r\nPost Code-416,\r\nSultanate of Oman', '+968-25554232', 'Manager', 0, '2017-11-29 05:19:31'),
(5, '005', 'SOHAR BRANCH', 'Way-3802,\r\nBuilding No.263,\r\nArea: Hamber Sohar,\r\nSultanate of Oman', '+968-26844627', 'Manager', 0, '2017-11-29 05:26:46');

-- Table `currency` --
CREATE TABLE `currency` (
  `sr_no` int(4) NOT NULL AUTO_INCREMENT,
  `cy_code` varchar(20) NOT NULL,
  `cy_nname` varchar(20) NOT NULL,
  `cy_name` varchar(30) NOT NULL,
  `cy_country` text NOT NULL,
  `cy_frz` int(2) NOT NULL DEFAULT '0',
  `bh_code` varchar(20) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `currency` (`sr_no`, `cy_code`, `cy_nname`, `cy_name`, `cy_country`, `cy_frz`, `bh_code`) VALUES
(11, '1', 'US Dollar', 'USD', 'US', 0, '001'),
(12, '2', 'Oman Riyal', 'OMR', 'Oman', 0, '001'),
(13, '3', 'Indian Ruppee', 'INR', 'IN', 0, '001');

-- Table `currency_rates` --
CREATE TABLE `currency_rates` (
  `sr_no` int(4) NOT NULL AUTO_INCREMENT,
  `frm_cy` varchar(30) NOT NULL,
  `to_cy` varchar(30) NOT NULL,
  `cy_rate` float NOT NULL,
  `actual_rate` float NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `bh_code` varchar(30) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO `currency_rates` (`sr_no`, `frm_cy`, `to_cy`, `cy_rate`, `actual_rate`, `from_date`, `to_date`, `bh_code`, `active`) VALUES
(12, '2', '1', '2.6', '0', '2017-12-02', '2999-12-31', '001', 1),
(13, '1', '2', '0.38', '0', '2017-12-02', '2999-12-31', '001', 1),
(14, '1', '2', '0.32', '0.39', '2017-12-05', '2999-12-31', '001', 1),
(15, '2', '3', '171', '172', '2017-12-05', '2999-12-31', '001', 1),
(16, '1', '2', '1.5', '1.2', '2017-12-05', '2999-12-31', '001', 1),
(17, '1', '3', '64.2', '64.39', '2017-12-05', '2999-12-31', '001', 1),
(18, '3', '2', '29.9', '29', '2017-12-06', '2999-12-31', '001', 1);

-- Table `customer` --
CREATE TABLE `customer` (
  `sr_no` int(4) NOT NULL AUTO_INCREMENT,
  `cus_code` varchar(20) NOT NULL,
  `cus_name` varchar(30) NOT NULL,
  `cus_addr` mediumtext NOT NULL,
  `cus_tel` varchar(30) NOT NULL,
  `cus_pp` varchar(30) NOT NULL,
  `cus_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `cus_blk` int(11) NOT NULL DEFAULT '0',
  `bank` int(2) NOT NULL DEFAULT '0',
  `bh_id` varchar(20) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

INSERT INTO `customer` (`sr_no`, `cus_code`, `cus_name`, `cus_addr`, `cus_tel`, `cus_pp`, `cus_created`, `cus_blk`, `bank`, `bh_id`) VALUES
(34, '1', 'Jinesh', 'Ruwi', '36145790', 'J543210', '2017-12-02 03:08:49', 0, 0, '001'),
(35, '2', 'Bank Muscat', 'Ruwi', '3338765', 'J654321', '2017-12-02 03:12:41', 0, 1, '001'),
(36, '3', 'Midhilesh Krishnan', ' Ruwi', '92495122', '75866513', '2017-12-03 02:03:54', 0, 0, '001'),
(37, '4', 'sijo george oommen', 'adadasdasd', '123456', '5216', '2017-12-03 22:18:57', 0, 0, '001'),
(38, '5', 'suresh kannan', 'aaaaa', '365269', 'ASD555', '2017-12-03 22:58:54', 0, 0, '001'),
(39, '6', 'uk', 'c b', '99264507', '787877', '2017-12-05 07:40:37', 0, 0, '001'),
(40, '7', 'MASUD', 'GOEC RUWI', '91283198', '88273534', '2017-12-05 10:00:26', 0, 0, '001');

-- Table `designation` --
CREATE TABLE `designation` (
  `sr_no` int(4) NOT NULL AUTO_INCREMENT,
  `des_id` int(4) NOT NULL,
  `des_name` varchar(30) NOT NULL,
  `bh_code` varchar(20) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `designation` (`sr_no`, `des_id`, `des_name`, `bh_code`) VALUES
(1, 1, 'super user', '001'),
(3, 2, 'Branch Master', '001'),
(4, 3, 'staff', '001');

-- Table `rights` --
CREATE TABLE `rights` (
  `user_rts_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_cat_id` int(2) NOT NULL,
  `dsh_brd` int(2) NOT NULL,
  `b_m` int(2) NOT NULL,
  `b_m_create` int(2) NOT NULL,
  `b_m_edit` int(2) NOT NULL,
  `purchase` int(2) NOT NULL,
  `c_m` int(2) NOT NULL,
  `c_m_create` int(2) NOT NULL,
  `c_m_edit` int(2) NOT NULL,
  `c_m_rates` int(2) NOT NULL,
  `cus_m` int(2) NOT NULL,
  `cus_m_create` int(2) NOT NULL,
  `cus_m_edit` int(2) NOT NULL,
  `cus_m_black` int(2) NOT NULL,
  `u_m` int(2) NOT NULL,
  `u_m_create` int(2) NOT NULL,
  `u_m_edit` int(2) NOT NULL,
  `u_m_des` int(2) NOT NULL,
  `reports` int(2) NOT NULL,
  `utili` int(2) NOT NULL,
  `utili_calc` int(2) NOT NULL,
  `utili_backup` int(2) NOT NULL,
  `settings` int(2) NOT NULL,
  `set_ch_pass` int(2) NOT NULL,
  `bh_code` varchar(20) NOT NULL,
  PRIMARY KEY (`user_rts_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table `transaction` --
CREATE TABLE `transaction` (
  `sr_no` int(40) NOT NULL AUTO_INCREMENT,
  `tr_id` varchar(30) NOT NULL,
  `cus_id` varchar(20) NOT NULL,
  `from_cy` varchar(20) NOT NULL,
  `to_cy` varchar(20) NOT NULL,
  `frm_amt` float NOT NULL,
  `to_amt` float NOT NULL,
  `f_t_rate` float NOT NULL,
  `a_rate` float NOT NULL,
  `bh_code` varchar(20) NOT NULL,
  `trans_date` date NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

INSERT INTO `transaction` (`sr_no`, `tr_id`, `cus_id`, `from_cy`, `to_cy`, `frm_amt`, `to_amt`, `f_t_rate`, `a_rate`, `bh_code`, `trans_date`) VALUES
(18, '1', '1', '1', '2', '100', '38', '0.38', '0', '001', '2017-12-02'),
(21, '2', '', '2', '1', '50', '130', '27', '0', '001', '2017-12-03'),
(22, '3', '', '1', '2', '100', '38', '0.38', '0', '001', '2017-12-04'),
(23, '4', '4', '1', '2', '1000', '380', '0.38', '0', '001', '2017-12-04'),
(24, '5', '4', '1', '2', '200', '76', '0.38', '0', '001', '2017-12-04'),
(25, '6', '5', '2', '1', '3000', '7800', '2.6', '0', '001', '2017-12-04'),
(26, '7', '4', '1', '2', '1000', '380', '0.38', '0', '001', '2017-12-05'),
(27, '8', '1', '1', '2', '5000', '1900', '0.38', '0', '001', '2017-12-05'),
(28, '9', '4', '1', '2', '2000', '760', '0.38', '0', '001', '2017-12-05'),
(29, '10', '1', '1', '2', '623', '236.74', '0.38', '0', '001', '2017-12-05'),
(30, '11', '4', '1', '2', '12313', '4678.94', '0.38', '0', '001', '2017-12-05'),
(31, '12', '3', '2', '1', '100', '260', '2.6', '0', '001', '2017-12-05'),
(32, '13', '1', '1', '2', '50', '16', '0.32', '0.39', '001', '2017-12-05'),
(33, '13', '1', '1', '2', '100', '32', '0.32', '0.39', '001', '2017-12-05'),
(34, '14', '1', '1', '2', '300', '96', '0.32', '0.39', '001', '2017-12-05'),
(35, '15', '1', '1', '2', '1000', '320', '0.32', '0.39', '001', '2017-12-05'),
(36, '15', '1', '1', '2', '300', '96', '0.32', '0.39', '001', '2017-12-05'),
(37, '16', '1', '1', '2', '300', '96', '0.32', '0.39', '001', '2017-12-05'),
(38, '17', '1', '1', '2', '1500', '480', '2', '0.39', '001', '2017-12-05'),
(39, '18', '2', '2', '1', '200.7', '521.82', '2.6', '0', '001', '2017-12-05'),
(40, '19', '1', '2', '1', '300.2', '780.52', '2.6', '0', '001', '2017-12-05'),
(41, '20', '1', '2', '1', '2454.45', '6381.58', '2.6', '0', '001', '2017-12-05'),
(42, '21', '3', '2', '1', '233.125', '606.125', '2.6', '0', '001', '2017-12-05'),
(43, '22', '1', '1', '3', '40', '2568', '64.2', '64.39', '001', '2017-12-05'),
(44, '22', '1', '1', '2', '200.5', '300.75', '1.5', '1.2', '001', '2017-12-05'),
(45, '23', '1', '1', '3', '70', '4494', '64.2', '64.39', '001', '2017-12-05'),
(46, '24', '1', '1', '2', '500', '750', '1.5', '1.2', '001', '2017-12-05'),
(47, '23', '1', '1', '2', '500', '750', '1.5', '1.2', '001', '2017-12-05'),
(48, '24', '1', '1', '2', '500', '750', '1.5', '1.2', '001', '2017-12-05'),
(49, '25', '1', '1', '2', '400', '600', '1.5', '1.2', '001', '2017-12-05'),
(50, '26', '2', '1', '2', '100.22', '150.33', '1.5', '1.2', '001', '2017-12-05'),
(51, '27', '2', '1', '2', '122.77', '184.155', '1.5', '1.2', '001', '2017-12-05'),
(52, '28', '6', '2', '3', '1000', '171000', '171', '172', '001', '2017-12-05'),
(53, '29', '3', '2', '1', '100', '2.6', '2.6', '0', '001', '2017-12-05'),
(54, '30', '3', '2', '1', '1000', '2600', '2.6', '0', '001', '2017-12-05'),
(55, '31', '3', '2', '3', '2500', '427500', '171', '172', '001', '2017-12-05'),
(56, '32', '3', '2', '1', '1200', '3120', '2.6', '0', '001', '2017-12-05'),
(57, '33', '3', '2', '1', '1500', '3900', '2.6', '0', '001', '2017-12-05'),
(58, '34', '7', '1', '2', '1500', '2250', '1.5', '1.2', '001', '2017-12-05'),
(59, '35', '1', '1', '2', '1000', '1500', '1.5', '1.2', '001', '2017-12-06'),
(60, '36', '1', '1', '3', '1500', '96300', '64.2', '64.39', '001', '2017-12-06'),
(61, '37', '4', '1', '2', '12313', '18469.5', '1.5', '1.2', '001', '2017-12-06'),
(62, '38', '2', '2', '1', '223000', '579800', '2.6', '0', '001', '2017-12-06'),
(63, '39', '7', '2', '1', '22222', '57777.2', '2.6', '0', '001', '2017-12-06'),
(64, '40', '3', '1', '2', '1322', '1983', '1.5', '1.2', '001', '2017-12-06'),
(65, '41', '4', '1', '3', '230', '14766', '64.2', '64.39', '001', '2017-12-06'),
(66, '42', '2', '1', '3', '320', '20544', '64.2', '64.39', '001', '2017-12-06'),
(67, '43', '2', '2', '1', '36', '93.6', '2.6', '0', '001', '2017-12-06'),
(68, '44', '2', '2', '1', '20000', '52000', '2.6', '0', '001', '2017-12-06'),
(69, '45', '1', '2', '1', '3652', '9495.2', '2.6', '0', '001', '2017-12-06'),
(70, '46', '1', '1', '2', '1200', '1800', '1.5', '1.2', '001', '2017-12-06'),
(71, '47', '4', '1', '2', '3000', '4500', '1.5', '1.2', '001', '2017-12-06'),
(72, '48', '3', '2', '1', '300', '780', '2.6', '0', '001', '2017-12-06'),
(73, '49', '5', '2', '3', '2000', '342000', '171', '172', '001', '2017-12-06'),
(74, '50', '5', '2', '1', '5000', '13000', '2.6', '0', '001', '2017-12-06'),
(75, '51', '2', '3', '2', '6000', '179400', '29.9', '29', '001', '2017-12-06'),
(76, '52', '3', '2', '1', '1500', '3900', '2.6', '0', '001', '2017-12-06'),
(77, '53', '1', '1', '2', '3213', '4819.5', '1.5', '1.2', '001', '2017-12-06'),
(78, '54', '6', '1', '2', '300', '450', '1.5', '1.2', '001', '2017-12-06'),
(79, '55', '3', '2', '1', '1500', '3900', '2.6', '0', '001', '2017-12-06'),
(80, '56', '1', '1', '2', '2000', '3000', '1.5', '1.2', '001', '2017-12-06'),
(81, '57', '2', '2', '1', '30', '90', '3', '0', '001', '2017-12-07');

-- Table `users` --
CREATE TABLE `users` (
  `sr_no` int(4) NOT NULL AUTO_INCREMENT,
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
  `us_frz` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`sr_no`, `us_code`, `user_nam`, `us_name`, `us_addr`, `us_tel`, `us_pp`, `pass_wor`, `bh_code`, `us_created`, `us_des`, `us_frz`) VALUES
(15, '5', 'Masud', 'Masud', 'test user address', '9876543210', '2365LKO2', '12345', '001', '2017-11-22 11:59:26', 1, 0),
(18, '6', 'shiras', 'shiras', 'qqq', '987653210', 'KSLO652', '12345', '001', '2017-12-02 02:20:25', 2, 0),
(19, '7', 'althaf', 'althaf', 'aaaa', '659832506', 'SD8HGF', '12345', '001', '2017-12-02 02:21:38', 3, 0);

