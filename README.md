# Canuto Barber Application

## Overview
Canuto Barber is a web application for managing a barber shop. It supports two main user roles: Barbers and Customers. The application allows barbers to manage clients, appointments, and reviews, while customers can register, login, schedule appointments, and view their own bookings.

## Features

### Barber Features
- Login and logout functionality.
- Dashboard showing the barber's own appointments.
- Manage all appointments (view, edit, delete).
- Manage client information (add, edit, delete).
- Manage reviews from customers.
- View appointment statuses and payment methods.

### Customer Features
- Customer registration and login.
- Schedule new appointments with barbers.
- View their own scheduled appointments.
- Cancel or modify appointments (if implemented).
- View available services and payment methods.

## How to Run the Application
1. Set up a local web server with PHP and MySQL (e.g., XAMPP).
2. Import the database schema and tables as per the provided SQL scripts.
3. Place the application files in the web server's root directory.
4. Configure database connection in `conexao.php`.
5. Access the application via browser:
   - Barber login: `http://localhost/canutobarber/login.php`
   - Customer registration: `http://localhost/canutobarber/cliente_cadastro.php`
   - Customer login: `http://localhost/canutobarber/cliente_login.php`

## User Roles and Navigation

### Barber
- Login at `login.php`.
- Access dashboard at `dashboard.php` to see personal appointments.
- Manage all appointments at `agendamentos.php`.
- Manage clients at `index.php`.
- Manage reviews at `avaliacoes.php`.
- Logout via the "Sair" button.

### Customer
- Register at `cliente_cadastro.php`.
- Login at `cliente_login.php`.
- Schedule appointments at `cliente_agendamento.php`.
- View own appointments at `cliente_agendamentos.php`.
- Logout via the logout link (if implemented).

## Key Pages Description

- **login.php**: Barber login page.
- **dashboard.php**: Barber dashboard showing personal appointments.
- **agendamentos.php**: Barber appointment management.
- **index.php**: Client management for barbers.
- **editar.php**: Edit client details.
- **avaliacoes.php**: Barber review management.
- **cliente_cadastro.php**: Customer registration.
- **cliente_login.php**: Customer login.
- **cliente_agendamento.php**: Customer appointment scheduling.
- **cliente_agendamentos.php**: Customer appointment list.
- **logout.php**: Session logout for barbers.

## Testing
- Test login and session management for both barbers and customers.
- Test appointment creation, editing, and deletion.
- Test client and review management.
- Test customer registration and login flows.
- Test viewing appointments from both barber and customer perspectives.

## Notes
- Passwords are stored in plain text (for demonstration purposes only). For production, use hashed passwords.
- The application uses Bootstrap 5 for styling.
- Ensure the database is properly configured and running.

## For Video Presentation
- Demonstrate login flows for barber and customer.
- Show barber dashboard and appointment management.
- Show customer registration, login, and scheduling.
- Highlight session management and logout.
- Showcase client and review management features.

---

Thank you for using Canuto Barber!
