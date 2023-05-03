# E-commerce Admin System

## Introduction

The E-commerce Admin System is a web-based solution that provides a backstage management system for e-commerce businesses. The system offers an easy-to-use interface to manage products, categories, orders, coupons, addresses, and users. The user interface (UI) is developed using HTML and CSS, and the Bootstrap framework, while the backend is built using PHP and SQL for the database.

## Development

The E-commerce Admin System was developed using the following technologies:

- PHP (XAMPP)
- MySQL
- Bootstrap

## Features

The E-commerce Admin System offers the following features:

- User authentication (login/logout)
- View order information
- View/add/edit/delete category information
- View/add/edit/delete product information
- View/add/edit/delete coupon information
- View/add/edit/delete address information
- View/add/edit/delete user information

## User Guide

To use the E-commerce Admin System, follow the steps below:

1. Clone this repository:

   ```bash
   git clone git@github.com:E-commerce-Admin/E-commerce-Admin-System.git
   ```

2. Create a database named `admin_system` using the admin_system.sql statement

3. If you are using XAMPP, move the `pages` folder to `htdocs` under the XAMPP folder

4. Open http://localhost/pages/dashboard.php in your browser

## User Authorization

The E-commerce Admin System provides the following user permissions:

1. Admin: Can view all tables (username: John, password: password1)
2. Super Admin: Can add, edit, and delete all tables (username: Jane, password: password2)
3. Customer: Does not have admin system permissions (username: customer1, password: 123456)

## UI Design

Demo video for admin available at [here](https://github.com/E-commerce-Admin/E-commerce-Admin-System/blob/master/demo_admin.mp4).

Demo video for super admin available at [here](https://github.com/E-commerce-Admin/E-commerce-Admin-System/blob/master/demo_super_admin.mp4).

## Project Structure



```
E-commerce-Admin-System
├─ .gitignore
├─ README.md
├─ admin_system.sql
├─ demo_admin.mp4
├─ demo_super_admin.mp4
└─ pages
   ├─ address.php
   ├─ category.php
   ├─ connect_db.php
   ├─ coupon.php
   ├─ dashboard.php
   ├─ delete_address.php
   ├─ delete_category.php
   ├─ delete_coupon.php
   ├─ delete_product.php
   ├─ delete_user.php
   ├─ login.php
   ├─ logout.php
   ├─ order.php
   ├─ process_add_address.php
   ├─ process_add_category.php
   ├─ process_add_coupon.php
   ├─ process_add_product.php
   ├─ process_add_user.php
   ├─ process_login.php
   ├─ process_update_address.php
   ├─ process_update_category.php
   ├─ process_update_coupon.php
   ├─ process_update_product.php
   ├─ process_update_user.php
   ├─ product.php
   ├─ update_address.php
   ├─ update_category.php
   ├─ update_coupon.php
   ├─ update_product.php
   ├─ update_user.php
   ├─ user.php
   ├─ assets
   │  ├─ category_photo
   │  │  ├─ clothing.jpeg
   │  │  ├─ default.png
   │  │  ├─ electronics.jpeg
   │  │  └─ food.jpeg
   │  ├─ css
   │  │  ├─ nucleo-icons.css
   │  │  ├─ nucleo-svg.css
   │  │  └─ soft-ui-dashboard.css
   │  ├─ fonts
   │  │  ├─ nucleo-icons.eot
   │  │  ├─ nucleo-icons.svg
   │  │  ├─ nucleo-icons.ttf
   │  │  ├─ nucleo-icons.woff
   │  │  ├─ nucleo-icons.woff2
   │  │  ├─ nucleo.eot
   │  │  ├─ nucleo.ttf
   │  │  ├─ nucleo.woff
   │  │  └─ nucleo.woff2
   │  ├─ img
   │  │  ├─ apple-icon.png
   │  │  ├─ curved-images
   │  │  │  ├─ curved0.jpg
   │  │  │  ├─ curved1.jpg
   │  │  │  ├─ curved14.jpg
   │  │  │  ├─ curved6.jpg
   │  │  │  ├─ curved8.jpg
   │  │  │  └─ white-curved.jpeg
   │  │  ├─ favicon.png
   │  │  ├─ marie.jpg
   │  │  ├─ profile.png
   │  │  ├─ team-1.jpg
   │  │  ├─ team-2.jpg
   │  │  ├─ team-3.jpg
   │  │  └─ team-4.jpg
   │  ├─ js
   │  │  ├─ core
   │  │  │  ├─ bootstrap.min.js
   │  │  │  └─ popper.min.js
   │  │  ├─ plugins
   │  │  │  ├─ Chart.extension.js
   │  │  │  ├─ bootstrap-notify.js
   │  │  │  ├─ chartjs.min.js
   │  │  │  ├─ choices.min.js
   │  │  │  ├─ fullcalendar.min.js
   │  │  │  ├─ perfect-scrollbar.min.js
   │  │  │  └─ smooth-scrollbar.min.js
   │  │  ├─ soft-ui-dashboard.js
   │  │  ├─ soft-ui-dashboard.js.map
   │  │  └─ soft-ui-dashboard.min.js
   │  └─ product_photo
   │     ├─ banana.jpeg
   │     ├─ earpods.jpeg
   │     ├─ headphones.jpeg
   │     ├─ jeans.jpeg
   │     ├─ laptop.jpeg
   │     ├─ lays.jpeg
   │     ├─ pizza.jpeg
   │     ├─ smartphone.jpeg
   └─    └─ tshirt.jpeg

```