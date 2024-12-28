-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2024 at 01:52 PM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sridarsr_powertrade_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `full_name` varchar(80) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0,
  `address` text DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `bank_acc_1` varchar(45) DEFAULT NULL,
  `bank_acc_2` varchar(45) DEFAULT NULL,
  `bank_acc_3` varchar(45) DEFAULT NULL,
  `bank_acc_4` varchar(45) DEFAULT NULL,
  `cmn_pcnt` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

CREATE TABLE `cheque` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `invoice_id` int(11) NOT NULL,
  `cheque_value` double NOT NULL DEFAULT 0,
  `cheque_date` datetime DEFAULT NULL,
  `cheque_bank` varchar(50) DEFAULT NULL,
  `cheque_no` varchar(30) NOT NULL,
  `is_settled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0,
  `address` text DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_recieve`
--

CREATE TABLE `credit_recieve` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `credit` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0,
  `address` text DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_payment`
--

CREATE TABLE `driver_payment` (
  `id` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `code` varchar(25) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `sales_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `employee_payment`
--

CREATE TABLE `employee_payment` (
  `id` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `code` varchar(25) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `entity_short_codes`
--

CREATE TABLE `entity_short_codes` (
  `id` int(11) NOT NULL,
  `agent` varchar(4) DEFAULT NULL,
  `client` varchar(4) DEFAULT NULL,
  `order` varchar(4) DEFAULT NULL,
  `settlement` varchar(4) DEFAULT NULL,
  `giving` varchar(4) DEFAULT NULL,
  `receiving` varchar(4) DEFAULT NULL,
  `transfer` varchar(4) DEFAULT NULL,
  `sales_expense` varchar(4) DEFAULT NULL,
  `product` varchar(10) NOT NULL,
  `employee` varchar(4) NOT NULL DEFAULT 'EMP',
  `route` varchar(4) NOT NULL,
  `outlet` varchar(3) NOT NULL DEFAULT 'OLT',
  `lorry` varchar(3) NOT NULL DEFAULT 'lor',
  `driver` varchar(3) NOT NULL DEFAULT 'dvr',
  `sales` varchar(3) NOT NULL DEFAULT 'sls',
  `loading` varchar(3) NOT NULL DEFAULT 'LNG',
  `unloading` varchar(3) NOT NULL DEFAULT 'UNG',
  `invoice` varchar(3) NOT NULL DEFAULT 'INV',
  `sales_return` varchar(3) NOT NULL DEFAULT 'SRN',
  `employee_payment` varchar(3) NOT NULL DEFAULT 'EPT',
  `driver_payment` varchar(3) NOT NULL DEFAULT 'DPT',
  `running_expense` varchar(3) NOT NULL DEFAULT 'RXS',
  `lorry_expense` varchar(3) NOT NULL DEFAULT 'LXP'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giving`
--

CREATE TABLE `giving` (
  `id` int(11) NOT NULL,
  `lkr` double DEFAULT NULL,
  `sdr` double DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `agent_bank_acc` varchar(45) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `code` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `pha` double DEFAULT NULL,
  `pcapital` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `increment_helper`
--

CREATE TABLE `increment_helper` (
  `id` int(11) NOT NULL,
  `agent` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `client` int(11) DEFAULT NULL,
  `settlement` int(11) DEFAULT NULL,
  `giving` int(11) DEFAULT NULL,
  `receiving` int(11) DEFAULT NULL,
  `transfer` int(11) DEFAULT NULL,
  `sales_expense` int(11) DEFAULT NULL,
  `product` int(11) NOT NULL DEFAULT 1,
  `employee` int(11) NOT NULL DEFAULT 0,
  `route` int(11) NOT NULL DEFAULT 0,
  `outlet` int(11) NOT NULL DEFAULT 0,
  `lorry` int(11) NOT NULL DEFAULT 0,
  `driver` int(11) NOT NULL DEFAULT 0,
  `sales` int(11) NOT NULL DEFAULT 0,
  `loading` int(11) NOT NULL DEFAULT 0,
  `unloading` int(11) NOT NULL DEFAULT 0,
  `invoice` int(11) NOT NULL DEFAULT 0,
  `sales_return` int(11) NOT NULL DEFAULT 0,
  `employee_payment` int(11) NOT NULL,
  `driver_payment` int(11) NOT NULL,
  `running_expense` int(11) NOT NULL,
  `lorry_expense` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `invoice_no` int(20) NOT NULL,
  `note` text NOT NULL,
  `cash` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `sales_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `previous_credit` double NOT NULL DEFAULT 0,
  `previous_cheque` double NOT NULL DEFAULT 0,
  `total_payable` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL DEFAULT 0,
  `cheque_no` varchar(30) DEFAULT NULL,
  `cheque_value` double NOT NULL DEFAULT 0,
  `cheque_date` datetime NOT NULL DEFAULT current_timestamp(),
  `cheque_bank` varchar(40) NOT NULL,
  `is_settled` tinyint(1) NOT NULL DEFAULT 0,
  `is_outlet_deleted` tinyint(1) DEFAULT 0,
  `is_sales_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_products`
--

CREATE TABLE `invoice_products` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `free_issue` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loader`
--

CREATE TABLE `loader` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `loading_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loading`
--

CREATE TABLE `loading` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `incharge_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lorry`
--

CREATE TABLE `lorry` (
  `id` int(11) NOT NULL,
  `code` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lorry_expense`
--

CREATE TABLE `lorry_expense` (
  `id` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `code` varchar(25) DEFAULT NULL,
  `lorry_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `from_currency` varchar(5) DEFAULT NULL,
  `currency_rate` double DEFAULT NULL,
  `to_currency` varchar(5) DEFAULT NULL,
  `from_currency_amount` double DEFAULT NULL,
  `to_currency_amount` double DEFAULT NULL,
  `commission_pcnt` double DEFAULT NULL,
  `comission_amount` double DEFAULT NULL,
  `commision_amount_currency` varchar(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `is_paid_to_agent` tinyint(1) DEFAULT 0,
  `agent_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_bank_acc` varchar(80) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `settlement_id` int(11) DEFAULT NULL,
  `is_credit` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0,
  `address` text DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `route_id` int(11) NOT NULL,
  `credit` double NOT NULL DEFAULT 0,
  `cheque` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outlet_import`
--

CREATE TABLE `outlet_import` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `credit` double NOT NULL DEFAULT 0,
  `cheque` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outlet_test`
--

CREATE TABLE `outlet_test` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0,
  `address` text DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `route_id` int(11) NOT NULL,
  `credit` double NOT NULL DEFAULT 0,
  `cheque` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `dashboard` tinyint(4) DEFAULT 1,
  `purchasing` tinyint(4) DEFAULT 0,
  `manufacturing` tinyint(4) DEFAULT 0,
  `stock` tinyint(4) DEFAULT 1,
  `sales` tinyint(4) DEFAULT 1,
  `system` tinyint(4) DEFAULT 0,
  `product` tinyint(4) DEFAULT 1,
  `view_product` tinyint(4) DEFAULT 1,
  `edit_product` tinyint(4) DEFAULT 0,
  `delete_product` tinyint(4) DEFAULT 0,
  `add_stocks_many` tinyint(4) DEFAULT 1,
  `add_stocks_one` tinyint(4) DEFAULT 1,
  `remove_stocks_many` tinyint(4) DEFAULT 1,
  `remove_stocks_one` tinyint(4) DEFAULT 1,
  `stock_report` tinyint(4) DEFAULT 1,
  `loading` tinyint(4) DEFAULT 1,
  `view_loading` tinyint(4) DEFAULT 1,
  `edit_loading` tinyint(4) DEFAULT 1,
  `delete_loading` tinyint(4) DEFAULT 0,
  `invoice` tinyint(4) DEFAULT 1,
  `edit_invoice` tinyint(4) DEFAULT 0,
  `view_invoice` tinyint(4) DEFAULT 1,
  `delete_invoice` tinyint(4) DEFAULT 0,
  `new_invoice` tinyint(4) DEFAULT 1,
  `unloading` tinyint(4) DEFAULT 1,
  `view_unloading` tinyint(4) DEFAULT 1,
  `edit_unloading` tinyint(4) DEFAULT 1,
  `delete_unloading` tinyint(4) DEFAULT 0,
  `new_unloading` tinyint(4) DEFAULT 1,
  `return_product` tinyint(4) DEFAULT 1,
  `edit_return` tinyint(4) DEFAULT 0,
  `view_return` tinyint(4) DEFAULT 1,
  `delete_return` tinyint(4) DEFAULT 0,
  `new_return` tinyint(4) DEFAULT 1,
  `sales_expense` tinyint(4) DEFAULT 1,
  `edit_expense` tinyint(4) DEFAULT 1,
  `delete_expense` tinyint(4) DEFAULT 0,
  `view_expense` tinyint(4) DEFAULT 1,
  `new_expense` tinyint(4) DEFAULT 1,
  `credit_sales_report` tinyint(4) DEFAULT 0,
  `sales_report` tinyint(4) DEFAULT 0,
  `route` tinyint(4) DEFAULT 0,
  `new_route` tinyint(4) DEFAULT 0,
  `view_route` tinyint(4) DEFAULT 0,
  `edit_route` tinyint(4) DEFAULT 0,
  `delete_route` tinyint(4) DEFAULT 0,
  `lorry` tinyint(4) DEFAULT 0,
  `new_lorry` tinyint(4) DEFAULT 0,
  `view_lorry` tinyint(4) DEFAULT 0,
  `edit_lorry` tinyint(4) DEFAULT 0,
  `delete_lorry` tinyint(4) DEFAULT 0,
  `employee` tinyint(4) DEFAULT 0,
  `new_employee` tinyint(4) DEFAULT 0,
  `view_employee` tinyint(4) DEFAULT 0,
  `edit_employee` tinyint(4) DEFAULT 0,
  `delete_employee` tinyint(4) DEFAULT 0,
  `driver` tinyint(4) DEFAULT 0,
  `new_driver` tinyint(4) DEFAULT 0,
  `view_driver` tinyint(4) DEFAULT 0,
  `edit_driver` tinyint(4) DEFAULT 0,
  `delete_driver` tinyint(4) DEFAULT 0,
  `setup` tinyint(4) DEFAULT 0,
  `privileges` tinyint(4) DEFAULT 0,
  `log` tinyint(4) DEFAULT 0,
  `search_invoice` tinyint(4) DEFAULT 0,
  `search_outlet` tinyint(4) DEFAULT 0,
  `new_product` tinyint(4) DEFAULT 0,
  `new_loading` tinyint(4) DEFAULT 0,
  `reports` tinyint(4) DEFAULT 0,
  `outlet` tinyint(4) DEFAULT 0,
  `new_outlet` tinyint(4) DEFAULT 0,
  `view_outlet` tinyint(4) DEFAULT 0,
  `edit_outlet` tinyint(4) DEFAULT 0,
  `delete_outlet` tinyint(4) DEFAULT 0,
  `saless` tinyint(4) DEFAULT 0,
  `new_sales` tinyint(4) DEFAULT 0,
  `view_sales` tinyint(4) DEFAULT 0,
  `edit_sales` tinyint(4) DEFAULT 0,
  `delete_sales` tinyint(4) DEFAULT 0,
  `edit_site` tinyint(4) DEFAULT 0,
  `delete_site` tinyint(4) DEFAULT 0,
  `settings` tinyint(4) DEFAULT 0,
  `employee_id` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `download_log` tinyint(4) DEFAULT 0,
  `delete_log` tinyint(4) DEFAULT 0,
  `advance` tinyint(4) DEFAULT 0,
  `new_sales_return` tinyint(4) DEFAULT 0,
  `view_sales_return` tinyint(4) DEFAULT 0,
  `edit_sales_return` tinyint(4) DEFAULT 0,
  `delete_sales_return` tinyint(4) DEFAULT 0,
  `running_expense` tinyint(1) NOT NULL DEFAULT 0,
  `employee_payment` tinyint(1) NOT NULL DEFAULT 0,
  `driver_payment` tinyint(1) NOT NULL DEFAULT 0,
  `lorry_expense` tinyint(1) NOT NULL DEFAULT 0,
  `new_lorry_expense` tinyint(1) NOT NULL DEFAULT 0,
  `view_lorry_expense` tinyint(1) DEFAULT 0,
  `edit_lorry_expense` tinyint(1) NOT NULL DEFAULT 0,
  `delete_lorry_expense` tinyint(1) NOT NULL DEFAULT 0,
  `new_driver_payment` tinyint(1) NOT NULL DEFAULT 0,
  `view_driver_payment` tinyint(1) NOT NULL DEFAULT 0,
  `edit_driver_payment` tinyint(1) NOT NULL DEFAULT 0,
  `delete_driver_payment` tinyint(1) NOT NULL DEFAULT 0,
  `new_employee_payment` tinyint(1) NOT NULL DEFAULT 0,
  `view_employee_payment` tinyint(1) NOT NULL DEFAULT 0,
  `edit_employee_payment` tinyint(1) NOT NULL DEFAULT 0,
  `delete_employee_payment` tinyint(1) NOT NULL DEFAULT 0,
  `new_running_expense` tinyint(1) NOT NULL DEFAULT 0,
  `view_running_expense` tinyint(1) NOT NULL DEFAULT 0,
  `edit_running_expense` tinyint(1) NOT NULL DEFAULT 0,
  `delete_running_expense` tinyint(1) NOT NULL DEFAULT 0,
  `payments` tinyint(1) NOT NULL DEFAULT 0,
  `tour` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='	';

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0,
  `code` varchar(10) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `minimum_cost_price` double DEFAULT 0,
  `maximum_selling_price` double DEFAULT 0,
  `qty` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receiving`
--

CREATE TABLE `receiving` (
  `id` int(11) NOT NULL,
  `lkr` double DEFAULT NULL,
  `sdr` double DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `currency` varchar(5) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `code` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `kooli` double DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `pcapital` double DEFAULT NULL,
  `currency_amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `code` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `running_expense`
--

CREATE TABLE `running_expense` (
  `id` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `code` varchar(25) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `saleman`
--

CREATE TABLE `saleman` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0,
  `address` text DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `code` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `lorry_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `salesman_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `sales_expense`
--

CREATE TABLE `sales_expense` (
  `id` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `code` varchar(25) DEFAULT NULL,
  `sales_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `sales_products`
--

CREATE TABLE `sales_products` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cost_price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_return`
--

CREATE TABLE `sales_return` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `invoice_no` int(20) NOT NULL,
  `note` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `sales_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `previous_credit` double NOT NULL DEFAULT 0,
  `total_payable` double NOT NULL DEFAULT 0,
  `is_resellable` tinyint(1) NOT NULL DEFAULT 1,
  `is_sold` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `sales_return_products`
--

CREATE TABLE `sales_return_products` (
  `id` int(11) NOT NULL,
  `sales_return_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `is_resellable` tinyint(1) NOT NULL DEFAULT 0,
  `is_sold` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `payload` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settlement`
--

CREATE TABLE `settlement` (
  `id` int(11) NOT NULL,
  `lkr` double DEFAULT NULL,
  `sdr` double DEFAULT NULL,
  `cmn` double DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `agent_bank_acc` varchar(45) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `code` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `ismailed` tinyint(1) DEFAULT 0,
  `maileddate` datetime DEFAULT NULL,
  `pha` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` int(11) NOT NULL,
  `lkr_to_sd` double DEFAULT NULL,
  `agent_commision_pcnt` double DEFAULT NULL,
  `sd_to_lkr` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `capital` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `code` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `lkr` double DEFAULT NULL,
  `sdr` double DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `from_agent_id` int(11) DEFAULT NULL,
  `code` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `from_agnt_pha` double DEFAULT NULL,
  `to_agent_pha` double DEFAULT NULL,
  `to_agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unloader`
--

CREATE TABLE `unloader` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unloading_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unloading`
--

CREATE TABLE `unloading` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `incharge_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `full_name` varchar(80) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `confirmation_code` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` text DEFAULT NULL,
  `email_verification` tinyint(4) DEFAULT NULL,
  `can_login` tinyint(4) DEFAULT 0,
  `reason` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0,
  `code` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `last_seen_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`);

--
-- Indexes for table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`);

--
-- Indexes for table `credit_recieve`
--
ALTER TABLE `credit_recieve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`);

--
-- Indexes for table `driver_payment`
--
ALTER TABLE `driver_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_payment`
--
ALTER TABLE `employee_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entity_short_codes`
--
ALTER TABLE `entity_short_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giving`
--
ALTER TABLE `giving`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_settlement_agent1_idx` (`agent_id`);

--
-- Indexes for table `increment_helper`
--
ALTER TABLE `increment_helper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loader`
--
ALTER TABLE `loader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loading`
--
ALTER TABLE `loading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lorry`
--
ALTER TABLE `lorry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lorry_expense`
--
ALTER TABLE `lorry_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_agent_idx` (`agent_id`),
  ADD KEY `fk_order_client1_idx` (`client_id`),
  ADD KEY `fk_order_settlement1_idx` (`settlement_id`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`);

--
-- Indexes for table `outlet_import`
--
ALTER TABLE `outlet_import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlet_test`
--
ALTER TABLE `outlet_test`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `receiving`
--
ALTER TABLE `receiving`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_settlement_agent1_idx` (`agent_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `running_expense`
--
ALTER TABLE `running_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saleman`
--
ALTER TABLE `saleman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_expense`
--
ALTER TABLE `sales_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_products`
--
ALTER TABLE `sales_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_return`
--
ALTER TABLE `sales_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_return_products`
--
ALTER TABLE `sales_return_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `settlement`
--
ALTER TABLE `settlement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_settlement_agent1_idx` (`agent_id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_settlement_agent1_idx` (`from_agent_id`),
  ADD KEY `fk_transfer_agent1_idx` (`to_agent_id`);

--
-- Indexes for table `unloader`
--
ALTER TABLE `unloader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unloading`
--
ALTER TABLE `unloading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_recieve`
--
ALTER TABLE `credit_recieve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `driver_payment`
--
ALTER TABLE `driver_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_payment`
--
ALTER TABLE `employee_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `entity_short_codes`
--
ALTER TABLE `entity_short_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `giving`
--
ALTER TABLE `giving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `increment_helper`
--
ALTER TABLE `increment_helper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `invoice_products`
--
ALTER TABLE `invoice_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2713;

--
-- AUTO_INCREMENT for table `loader`
--
ALTER TABLE `loader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500;

--
-- AUTO_INCREMENT for table `loading`
--
ALTER TABLE `loading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lorry`
--
ALTER TABLE `lorry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lorry_expense`
--
ALTER TABLE `lorry_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=575;

--
-- AUTO_INCREMENT for table `outlet_import`
--
ALTER TABLE `outlet_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `outlet_test`
--
ALTER TABLE `outlet_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `receiving`
--
ALTER TABLE `receiving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `running_expense`
--
ALTER TABLE `running_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `saleman`
--
ALTER TABLE `saleman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sales_expense`
--
ALTER TABLE `sales_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales_products`
--
ALTER TABLE `sales_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;

--
-- AUTO_INCREMENT for table `sales_return`
--
ALTER TABLE `sales_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales_return_products`
--
ALTER TABLE `sales_return_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=911;

--
-- AUTO_INCREMENT for table `settlement`
--
ALTER TABLE `settlement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unloader`
--
ALTER TABLE `unloader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `unloading`
--
ALTER TABLE `unloading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `giving`
--
ALTER TABLE `giving`
  ADD CONSTRAINT `fk_settlement_agent10` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_agent` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_client1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_settlement1` FOREIGN KEY (`settlement_id`) REFERENCES `settlement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `receiving`
--
ALTER TABLE `receiving`
  ADD CONSTRAINT `fk_settlement_agent100` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `settlement`
--
ALTER TABLE `settlement`
  ADD CONSTRAINT `fk_settlement_agent1` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `fk_settlement_agent101` FOREIGN KEY (`from_agent_id`) REFERENCES `agent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transfer_agent1` FOREIGN KEY (`to_agent_id`) REFERENCES `agent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
