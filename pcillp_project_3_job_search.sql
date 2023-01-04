-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 30, 2022 at 07:28 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcillp_project_3_job_search`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_users`
--

DROP TABLE IF EXISTS `api_users`;
CREATE TABLE IF NOT EXISTS `api_users` (
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `datecreated` datetime NOT NULL,
  PRIMARY KEY (`username`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This is api user data';

--
-- Dumping data for table `api_users`
--

INSERT INTO `api_users` (`username`, `password_hash`, `password`, `datecreated`) VALUES
('gopal', '827ccb0eea8a706c4c34a16891f84e7b', '12345', '2022-12-08 10:40:10'),
('pcillp_app_user', '827ccb0eea8a706c4c34a16891f84e7b', '12345', '2022-12-08 10:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `appln_screen_lvl_1`
--

DROP TABLE IF EXISTS `appln_screen_lvl_1`;
CREATE TABLE IF NOT EXISTS `appln_screen_lvl_1` (
  `Appln_ID` int(11) NOT NULL,
  `Status_website` smallint(1) DEFAULT NULL,
  `Status_Email` smallint(1) DEFAULT NULL,
  `Status_mobile` smallint(1) DEFAULT NULL,
  `Status_Level1` smallint(1) DEFAULT NULL,
  `Emp_ID_Level1` varchar(5) DEFAULT NULL,
  `DTTM_Level1` datetime DEFAULT NULL,
  `Status_Level2` smallint(1) DEFAULT NULL,
  `Emp_ID_Level2` varchar(5) DEFAULT NULL,
  `DTTM_Level2` datetime DEFAULT NULL,
  PRIMARY KEY (`Appln_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This is level1 verification data';

--
-- Dumping data for table `appln_screen_lvl_1`
--

INSERT INTO `appln_screen_lvl_1` (`Appln_ID`, `Status_website`, `Status_Email`, `Status_mobile`, `Status_Level1`, `Emp_ID_Level1`, `DTTM_Level1`, `Status_Level2`, `Emp_ID_Level2`, `DTTM_Level2`) VALUES
(1001, 0, 0, 0, 0, '1001', '2022-12-29 11:50:13', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cntry`
--

DROP TABLE IF EXISTS `cntry`;
CREATE TABLE IF NOT EXISTS `cntry` (
  `Cntry_Name` varchar(30) NOT NULL,
  `Cntry_Phone_Code` smallint(3) DEFAULT NULL,
  `Cntry_Mobile_length` smallint(2) DEFAULT NULL,
  `Cntry_Landline_length` smallint(2) DEFAULT NULL,
  `Cntry_Currency_Code` varchar(5) DEFAULT NULL,
  `Cntry_Currency_Symbol` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`Cntry_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Ref table';

--
-- Dumping data for table `cntry`
--

INSERT INTO `cntry` (`Cntry_Name`, `Cntry_Phone_Code`, `Cntry_Mobile_length`, `Cntry_Landline_length`, `Cntry_Currency_Code`, `Cntry_Currency_Symbol`) VALUES
('CANADA', 1, 10, 6, 'CAD', '$'),
('GERMANY', 49, 10, 10, 'ERO', '€'),
('INDIA', 91, 10, 8, 'INR', '₹'),
('SHRILANKA', 94, 10, 8, 'SLR', '€'),
('SINGAPORE', 65, 8, 8, 'SGD', '$'),
('USA', 1, 10, 10, 'USD', '$');

-- --------------------------------------------------------

--
-- Table structure for table `emp_role_map`
--

DROP TABLE IF EXISTS `emp_role_map`;
CREATE TABLE IF NOT EXISTS `emp_role_map` (
  `Org_ID` int(8) NOT NULL,
  `Role_ID` int(3) NOT NULL,
  `Emp_ID` int(8) NOT NULL,
  `datecreated` date DEFAULT NULL,
  PRIMARY KEY (`Emp_ID`,`Org_ID`,`Role_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='hold the relation empolyee and roles';

--
-- Dumping data for table `emp_role_map`
--

INSERT INTO `emp_role_map` (`Org_ID`, `Role_ID`, `Emp_ID`, `datecreated`) VALUES
(500, 101, 1001, '2022-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `functionality`
--

DROP TABLE IF EXISTS `functionality`;
CREATE TABLE IF NOT EXISTS `functionality` (
  `Func_ID` int(3) NOT NULL AUTO_INCREMENT,
  `Func_Descr` varchar(25) DEFAULT NULL,
  `Func_status` int(1) NOT NULL DEFAULT '1',
  `datecreated` date DEFAULT NULL,
  PRIMARY KEY (`Func_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COMMENT='this deifines what dunction provided by our system';

--
-- Dumping data for table `functionality`
--

INSERT INTO `functionality` (`Func_ID`, `Func_Descr`, `Func_status`, `datecreated`) VALUES
(101, 'View Applicant List', 1, '2022-12-27'),
(102, 'Edit Applicant', 1, '2022-12-27'),
(103, 'View Applicant', 1, '2022-12-27'),
(104, 'Assign Emp to Applicant', 1, '2022-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `func_role_map`
--

DROP TABLE IF EXISTS `func_role_map`;
CREATE TABLE IF NOT EXISTS `func_role_map` (
  `Org_ID` int(3) NOT NULL,
  `Role_ID` int(3) NOT NULL,
  `Func_ID` int(3) NOT NULL,
  `datecreated` date NOT NULL,
  PRIMARY KEY (`Org_ID`,`Role_ID`,`Func_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='hold the relation functionlity and roles';

--
-- Dumping data for table `func_role_map`
--

INSERT INTO `func_role_map` (`Org_ID`, `Role_ID`, `Func_ID`, `datecreated`) VALUES
(500, 101, 101, '2022-12-29'),
(500, 101, 102, '2022-12-29'),
(500, 101, 103, '2022-12-29'),
(500, 101, 104, '2022-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `glb_cntr`
--

DROP TABLE IF EXISTS `glb_cntr`;
CREATE TABLE IF NOT EXISTS `glb_cntr` (
  `Org_ID` int(8) DEFAULT NULL,
  `Appln_ID` bigint(12) DEFAULT NULL,
  `Person_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This globle counter for all entity ids';

--
-- Dumping data for table `glb_cntr`
--

INSERT INTO `glb_cntr` (`Org_ID`, `Appln_ID`, `Person_ID`) VALUES
(1000, 1000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `init_appln`
--

DROP TABLE IF EXISTS `init_appln`;
CREATE TABLE IF NOT EXISTS `init_appln` (
  `Org_Website_URL` varchar(50) NOT NULL,
  `Appln_Email_ID` varchar(40) NOT NULL,
  `Appln_Phone_Code` smallint(3) NOT NULL,
  `Appln_Mobile_No` bigint(10) NOT NULL,
  `Date` date NOT NULL,
  `Appln_ID` int(10) DEFAULT NULL,
  `F_Name` varchar(20) DEFAULT NULL,
  `L_Name` varchar(20) DEFAULT NULL,
  `Org_Name` varchar(50) DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `IP_Address` varchar(15) DEFAULT NULL,
  `Appln_status` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`Org_Website_URL`,`Appln_Email_ID`,`Appln_Phone_Code`,`Appln_Mobile_No`,`Date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This is initial level verification data';

--
-- Dumping data for table `init_appln`
--

INSERT INTO `init_appln` (`Org_Website_URL`, `Appln_Email_ID`, `Appln_Phone_Code`, `Appln_Mobile_No`, `Date`, `Appln_ID`, `F_Name`, `L_Name`, `Org_Name`, `Time`, `IP_Address`, `Appln_status`) VALUES
('www.goodmove.cloud', 'akash@lokhandecorp.com', 91, 8956231245, '2022-12-29', 1002, 'Akash', 'Lokhande', 'Lokhande Corporation Ltd', '838:59:59', '::1', 0),
('www.google.com', 'gopal@goodmove.cloud', 91, 8975434736, '2022-12-29', 1001, 'Gopal', 'Mankar', 'Goodmove System Pvt', '838:59:59', '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `org`
--

DROP TABLE IF EXISTS `org`;
CREATE TABLE IF NOT EXISTS `org` (
  `Org_ID` int(8) NOT NULL,
  `Org_Name` varchar(100) DEFAULT NULL,
  `Org_Status` varchar(1) DEFAULT NULL,
  `datecreated` date DEFAULT NULL,
  PRIMARY KEY (`Org_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='manages organizations data';

--
-- Dumping data for table `org`
--

INSERT INTO `org` (`Org_ID`, `Org_Name`, `Org_Status`, `datecreated`) VALUES
(500, 'Perpetul Code InfoSystems LLP', '1', '2022-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `org_emp`
--

DROP TABLE IF EXISTS `org_emp`;
CREATE TABLE IF NOT EXISTS `org_emp` (
  `Org_ID` int(8) NOT NULL,
  `Emp_ID` int(8) NOT NULL,
  `Emp_Name` varchar(50) DEFAULT NULL,
  `Emp_Status` varchar(50) DEFAULT NULL,
  `datecreated` date DEFAULT NULL,
  PRIMARY KEY (`Org_ID`,`Emp_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='manages the employee of organizations';

--
-- Dumping data for table `org_emp`
--

INSERT INTO `org_emp` (`Org_ID`, `Emp_ID`, `Emp_Name`, `Emp_Status`, `datecreated`) VALUES
(500, 1001, 'Tanuj Khadse', '1', '2022-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `org_role`
--

DROP TABLE IF EXISTS `org_role`;
CREATE TABLE IF NOT EXISTS `org_role` (
  `Org_ID` int(8) NOT NULL,
  `Role_ID` int(3) NOT NULL,
  `Role_Descr` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `Is_Default` varchar(1) DEFAULT NULL,
  `datecreated` date DEFAULT NULL,
  PRIMARY KEY (`Org_ID`,`Role_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='manages the roles of organizations';

--
-- Dumping data for table `org_role`
--

INSERT INTO `org_role` (`Org_ID`, `Role_ID`, `Role_Descr`, `Is_Default`, `datecreated`) VALUES
(500, 101, 'Level_1', 'Y', '2022-12-29'),
(500, 102, 'Level_2', 'Y', '2022-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Org_ID` int(8) DEFAULT NULL,
  `User_ID` bigint(12) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `password_hash` varchar(50) DEFAULT NULL,
  `datecreated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='manages the all users of system';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Org_ID`, `User_ID`, `username`, `password`, `password_hash`, `datecreated`) VALUES
(500, 1001, 'tanuj@goodmove.cloud', '12345', '827ccb0eea8a706c4c34a16891f84e7b', '2022-12-29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
