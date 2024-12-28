# PowerTrade - Enterprise Trade Management System

PowerTrade is a comprehensive enterprise resource planning (ERP) system designed specifically for wholesale and distribution businesses. It provides end-to-end management of trade operations, from sales and inventory to logistics and financial tracking.

## Key Features

- **Sales & Order Management**
  - Order processing with multi-currency support
  - Invoice generation and management
  - Sales returns processing
  - Commission calculation
  - Multiple payment methods (Cash, Credit, Cheque)

- **Inventory Management**
  - Product catalog management
  - Stock tracking
  - Transfer management
  - Loading/unloading operations
  - Free issues tracking

- **Client & Agent Management**
  - Client database
  - Agent management with commission tracking
  - Multiple bank account support
  - Credit tracking

- **Logistics**
  - Driver management
  - Vehicle tracking
  - Route planning
  - Expense tracking

- **Financial Management**
  - Multi-currency support
  - Payment processing
  - Expense management
  - Commission tracking
  - Credit management

## System Requirements

- PHP >= 8.1
- MySQL/MariaDB >= 10.3
- Laravel Framework
- Web Server (Apache/Nginx)

## Installation

1. Clone the repository
2. Install dependencies:
   ```bash
   composer install
   ```
3. Copy `.env.example` to `.env` and configure your environment
4. Generate application key:
   ```bash
   php artisan key:generate
   ```
5. Run database migrations:
   ```bash
   php artisan migrate
   ```

## Security

PowerTrade includes:
- Role-based access control
- User authentication
- Activity logging
- Secure payment processing

## License

This software is proprietary and confidential. Unauthorized copying, transferring, or reproduction of the contents of this software, via any medium is strictly prohibited.

See the [LICENSE.md](LICENSE.md) file for details.

## Documentation

For detailed documentation, please refer to [DOCUMENTATION.md](DOCUMENTATION.md).

## Support

For support inquiries, please contact support@powertrade.com

## Collaboration

We welcome collaboration opportunities to take this project forward! If you're interested in:
- Contributing to the development
- Implementing new features
- Customizing for specific business needs
- Commercial partnerships

Please reach out to us at hello@sridarsri.com

## Copyright

Copyright 2024-2030 SridarSri.com. All rights reserved.
