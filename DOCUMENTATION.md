# PowerTrade Documentation

## Table of Contents

1. [System Overview](#system-overview)
2. [Core Modules](#core-modules)
3. [Technical Architecture](#technical-architecture)
4. [Database Schema](#database-schema)
5. [User Roles & Permissions](#user-roles--permissions)

## System Overview

PowerTrade is a trade management system built on the Laravel PHP framework, designed for wholesale and distribution businesses to manage their operations, sales, and logistics.

## Core Modules

### 1. User Management
- User authentication and authorization
- Role-based access control through privileges table
- Activity logging for unauthorized access
- User session management

### 2. Sales & Order Management
- Order Processing
  - Multi-currency support (LKR, SDR)
  - Commission calculation and tracking
  - Order status tracking
  - Credit and cash payment handling
- Invoice Generation
  - Invoice numbering system
  - Multiple payment methods (cash, credit, cheque)
  - Previous credit tracking
  - Discount management
- Sales Returns
  - Return processing with tracking
  - Credit management

### 3. Inventory Management
- Product Management
  - Product catalog
  - Stock tracking
- Stock Operations
  - Loading and unloading operations
  - Transfer between locations
  - Free issues tracking

### 4. Client & Agent Management
- Client Management
  - Contact information and codes
  - Credit tracking
  - Address and notes
- Agent Management
  - Commission percentage tracking
  - Multiple bank accounts (up to 4)
  - Credit amount tracking

### 5. Logistics Management
- Vehicle (Lorry) Management
  - Vehicle registration
  - Expense tracking
- Route Management
  - Route planning
  - Route codes
- Driver Management
  - Driver information
  - Payment tracking
  - Sales-linked payments

### 6. Financial Management
- Payment Processing
  - Cash transactions
  - Credit management
  - Cheque processing with settlement tracking
- Expense Tracking
  - Running expenses
  - Lorry expenses
  - Employee payments
  - Driver payments
- Financial Tracking
  - Commission calculations
  - Credit tracking
  - Payment settlements

## Technical Architecture

### Technology Stack
- Backend: Laravel PHP Framework (PHP 8.1)
- Database: MariaDB 10.3
- Frontend: Laravel Blade Templates

### System Components
- MVC Architecture
- Authentication system
- Database migrations

## Database Schema

### Core Tables
- users
- privileges
- products
- orders
- invoices
- clients
- agents
- lorry (vehicles)
- drivers
- routes

### Transaction Tables
- sales
- sales_returns
- cheques
- employee_payments
- driver_payments
- lorry_expenses
- loading
- unloading
- transfers

### Configuration Tables
- entity_short_codes (for automatic code generation)
- increment_helper (for sequential numbering)
- system

## User Roles & Permissions

### Permission Areas (from privileges table)
- Dashboard access
- Purchasing
- Manufacturing
- Route management
- Product management
- Sales management
- Client management
- Agent management
- Financial management

### Security Features
- Authentication required for all operations
- Role-based access control
- Unauthorized access logging
- Session management
