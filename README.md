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

2. Create a database using the admin_system.sql statement

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
├─ admin_system.sql
├─ esql.sql
└─ pages
   ├─ address.php
   ├─ assets
   │  ├─ category_photo
   │  │  ├─ clothing.jpeg
   │  │  ├─ default.png
   │  │  ├─ electronics.jpeg
   │  │  └─ food.jpeg
   │  ├─ css
   │  │  ├─ nucleo-icons.css
   │  │  ├─ nucleo-svg.css
   │  │  ├─ soft-ui-dashboard.css
   │  │  ├─ soft-ui-dashboard.css.map
   │  │  └─ soft-ui-dashboard.min.css
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
   │  │  ├─ bruce-mars.jpg
   │  │  ├─ curved-images
   │  │  │  ├─ curved0.jpg
   │  │  │  ├─ curved1.jpg
   │  │  │  ├─ curved14.jpg
   │  │  │  ├─ curved6.jpg
   │  │  │  ├─ curved8.jpg
   │  │  │  └─ white-curved.jpeg
   │  │  ├─ down-arrow-dark.svg
   │  │  ├─ down-arrow.svg
   │  │  ├─ favicon.png
   │  │  ├─ home-decor-1.jpg
   │  │  ├─ home-decor-2.jpg
   │  │  ├─ home-decor-3.jpg
   │  │  ├─ illustrations
   │  │  │  └─ rocket-white.png
   │  │  ├─ ivana-square.jpg
   │  │  ├─ ivancik.jpg
   │  │  ├─ kal-visuals-square.jpg
   │  │  ├─ logo-ct.png
   │  │  ├─ logos
   │  │  │  ├─ mastercard.png
   │  │  │  └─ visa.png
   │  │  ├─ marie.jpg
   │  │  ├─ profile.png
   │  │  ├─ shapes
   │  │  │  └─ waves-white.svg
   │  │  ├─ small-logos
   │  │  │  ├─ icon-sun-cloud.png
   │  │  │  ├─ logo-atlassian.svg
   │  │  │  ├─ logo-invision.svg
   │  │  │  ├─ logo-jira.svg
   │  │  │  ├─ logo-slack.svg
   │  │  │  ├─ logo-spotify.svg
   │  │  │  ├─ logo-webdev.svg
   │  │  │  └─ logo-xd.svg
   │  │  ├─ team-1.jpg
   │  │  ├─ team-2.jpg
   │  │  ├─ team-3.jpg
   │  │  ├─ team-4.jpg
   │  │  └─ vr-bg.jpg
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
   │  ├─ product_photo
   │  │  ├─ banana.jpeg
   │  │  ├─ earpods.jpeg
   │  │  ├─ headphones.jpeg
   │  │  ├─ jeans.jpeg
   │  │  ├─ laptop.jpeg
   │  │  ├─ lays.jpeg
   │  │  ├─ pizza.jpeg
   │  │  ├─ smartphone.jpeg
   │  │  └─ tshirt.jpeg
   │  └─ scss
   │     ├─ soft-ui-dashboard
   │     │  ├─ _accordion.scss
   │     │  ├─ _alert.scss
   │     │  ├─ _avatars.scss
   │     │  ├─ _backgrounds.scss
   │     │  ├─ _badge.scss
   │     │  ├─ _breadcrumbs.scss
   │     │  ├─ _buttons.scss
   │     │  ├─ _cards-extend.scss
   │     │  ├─ _cards.scss
   │     │  ├─ _components.scss
   │     │  ├─ _dropdown-extend.scss
   │     │  ├─ _dropdown.scss
   │     │  ├─ _dropup.scss
   │     │  ├─ _fixed-plugin.scss
   │     │  ├─ _floating-elements.scss
   │     │  ├─ _footer.scss
   │     │  ├─ _forms.scss
   │     │  ├─ _gradients.scss
   │     │  ├─ _header.scss
   │     │  ├─ _info-areas.scss
   │     │  ├─ _list-check.scss
   │     │  ├─ _misc-extend.scss
   │     │  ├─ _misc.scss
   │     │  ├─ _nav.scss
   │     │  ├─ _navbar-vertical-extend.scss
   │     │  ├─ _navbar-vertical.scss
   │     │  ├─ _navbar.scss
   │     │  ├─ _pagination.scss
   │     │  ├─ _popovers.scss
   │     │  ├─ _progress.scss
   │     │  ├─ _rtl-extend.scss
   │     │  ├─ _rtl.scss
   │     │  ├─ _social-buttons.scss
   │     │  ├─ _tables.scss
   │     │  ├─ _tilt.scss
   │     │  ├─ _timeline.scss
   │     │  ├─ _tooltips.scss
   │     │  ├─ _typography.scss
   │     │  ├─ _utilities-extend.scss
   │     │  ├─ _utilities.scss
   │     │  ├─ _variables.scss
   │     │  ├─ badges
   │     │  │  ├─ _badge-circle.scss
   │     │  │  ├─ _badge-dot.scss
   │     │  │  ├─ _badge-floating.scss
   │     │  │  └─ _badge.scss
   │     │  ├─ bootstrap
   │     │  │  ├─ _accordion.scss
   │     │  │  ├─ _alert.scss
   │     │  │  ├─ _badge.scss
   │     │  │  ├─ _breadcrumb.scss
   │     │  │  ├─ _button-group.scss
   │     │  │  ├─ _buttons.scss
   │     │  │  ├─ _card.scss
   │     │  │  ├─ _carousel.scss
   │     │  │  ├─ _close.scss
   │     │  │  ├─ _containers.scss
   │     │  │  ├─ _dropdown.scss
   │     │  │  ├─ _forms.scss
   │     │  │  ├─ _functions.scss
   │     │  │  ├─ _grid.scss
   │     │  │  ├─ _helpers.scss
   │     │  │  ├─ _images.scss
   │     │  │  ├─ _list-group.scss
   │     │  │  ├─ _mixins.scss
   │     │  │  ├─ _modal.scss
   │     │  │  ├─ _nav.scss
   │     │  │  ├─ _navbar.scss
   │     │  │  ├─ _offcanvas.scss
   │     │  │  ├─ _pagination.scss
   │     │  │  ├─ _popover.scss
   │     │  │  ├─ _progress.scss
   │     │  │  ├─ _reboot.scss
   │     │  │  ├─ _root.scss
   │     │  │  ├─ _spinners.scss
   │     │  │  ├─ _tables.scss
   │     │  │  ├─ _toasts.scss
   │     │  │  ├─ _tooltip.scss
   │     │  │  ├─ _transitions.scss
   │     │  │  ├─ _type.scss
   │     │  │  ├─ _utilities.scss
   │     │  │  ├─ _variables.scss
   │     │  │  ├─ bootstrap-grid.scss
   │     │  │  ├─ bootstrap-reboot.scss
   │     │  │  ├─ bootstrap-utilities.scss
   │     │  │  ├─ bootstrap.scss
   │     │  │  ├─ forms
   │     │  │  │  ├─ _floating-labels.scss
   │     │  │  │  ├─ _form-check.scss
   │     │  │  │  ├─ _form-control.scss
   │     │  │  │  ├─ _form-range.scss
   │     │  │  │  ├─ _form-select.scss
   │     │  │  │  ├─ _form-text.scss
   │     │  │  │  ├─ _input-group.scss
   │     │  │  │  ├─ _labels.scss
   │     │  │  │  └─ _validation.scss
   │     │  │  ├─ helpers
   │     │  │  │  ├─ _clearfix.scss
   │     │  │  │  ├─ _colored-links.scss
   │     │  │  │  ├─ _position.scss
   │     │  │  │  ├─ _ratio.scss
   │     │  │  │  ├─ _stretched-link.scss
   │     │  │  │  ├─ _text-truncation.scss
   │     │  │  │  └─ _visually-hidden.scss
   │     │  │  ├─ mixins
   │     │  │  │  ├─ _alert.scss
   │     │  │  │  ├─ _border-radius.scss
   │     │  │  │  ├─ _box-shadow.scss
   │     │  │  │  ├─ _breakpoints.scss
   │     │  │  │  ├─ _buttons.scss
   │     │  │  │  ├─ _caret.scss
   │     │  │  │  ├─ _clearfix.scss
   │     │  │  │  ├─ _color-scheme.scss
   │     │  │  │  ├─ _container.scss
   │     │  │  │  ├─ _deprecate.scss
   │     │  │  │  ├─ _forms.scss
   │     │  │  │  ├─ _gradients.scss
   │     │  │  │  ├─ _grid.scss
   │     │  │  │  ├─ _image.scss
   │     │  │  │  ├─ _list-group.scss
   │     │  │  │  ├─ _lists.scss
   │     │  │  │  ├─ _pagination.scss
   │     │  │  │  ├─ _reset-text.scss
   │     │  │  │  ├─ _resize.scss
   │     │  │  │  ├─ _table-variants.scss
   │     │  │  │  ├─ _text-truncate.scss
   │     │  │  │  ├─ _transition.scss
   │     │  │  │  ├─ _utilities.scss
   │     │  │  │  └─ _visually-hidden.scss
   │     │  │  ├─ utilities
   │     │  │  │  └─ _api.scss
   │     │  │  └─ vendor
   │     │  │     └─ _rfs.scss
   │     │  ├─ cards
   │     │  │  ├─ card-background.scss
   │     │  │  ├─ card-blog.scss
   │     │  │  ├─ card-horizontal.scss
   │     │  │  ├─ card-pricing.scss
   │     │  │  └─ card-profile.scss
   │     │  ├─ custom
   │     │  │  ├─ _styles.scss
   │     │  │  └─ _variables.scss
   │     │  ├─ forms
   │     │  │  ├─ _form-check.scss
   │     │  │  ├─ _form-select.scss
   │     │  │  ├─ _form-switch.scss
   │     │  │  ├─ _forms.scss
   │     │  │  ├─ _input-group.scss
   │     │  │  ├─ _inputs.scss
   │     │  │  └─ _labels.scss
   │     │  ├─ mixins
   │     │  │  ├─ _badge.scss
   │     │  │  ├─ _colored-shadows.scss
   │     │  │  ├─ _hover.scss
   │     │  │  ├─ _social-buttons.scss
   │     │  │  └─ mixins.scss
   │     │  ├─ plugins
   │     │  │  ├─ free
   │     │  │  │  ├─ _flatpickr.scss
   │     │  │  │  ├─ _nouislider.scss
   │     │  │  │  ├─ _perfect-scrollbar.scss
   │     │  │  │  ├─ _prism.scss
   │     │  │  │  └─ plugins.scss
   │     │  │  └─ pro
   │     │  │     ├─ _carousel-slick.scss
   │     │  │     ├─ _choices.scss
   │     │  │     ├─ _datatable-extend.scss
   │     │  │     ├─ _datatable.scss
   │     │  │     ├─ _dragula.scss
   │     │  │     ├─ _dropzone.scss
   │     │  │     ├─ _fullcalendar-extend.scss
   │     │  │     ├─ _fullcalendar.scss
   │     │  │     ├─ _glidejs.scss
   │     │  │     ├─ _highlight.scss
   │     │  │     ├─ _kanban.scss
   │     │  │     ├─ _leaflet.scss
   │     │  │     ├─ _list-check.scss
   │     │  │     ├─ _photoswipe.scss
   │     │  │     ├─ _quill.scss
   │     │  │     ├─ _rating-widget.scss
   │     │  │     ├─ _sweetalert2-extend.scss
   │     │  │     ├─ _sweetalert2.scss
   │     │  │     ├─ multi-step.scss
   │     │  │     └─ plugins-extend.scss
   │     │  ├─ theme-pro.scss
   │     │  ├─ theme.scss
   │     │  └─ variables
   │     │     ├─ _animations.scss
   │     │     ├─ _avatars.scss
   │     │     ├─ _badge.scss
   │     │     ├─ _breadcrumb.scss
   │     │     ├─ _cards-extend.scss
   │     │     ├─ _cards.scss
   │     │     ├─ _choices.scss
   │     │     ├─ _dropdowns.scss
   │     │     ├─ _fixed-plugin.scss
   │     │     ├─ _form-switch.scss
   │     │     ├─ _full-calendar.scss
   │     │     ├─ _header.scss
   │     │     ├─ _info-areas.scss
   │     │     ├─ _misc-extend.scss
   │     │     ├─ _misc.scss
   │     │     ├─ _navbar-vertical.scss
   │     │     ├─ _navbar.scss
   │     │     ├─ _pagination.scss
   │     │     ├─ _rtl.scss
   │     │     ├─ _social-buttons.scss
   │     │     ├─ _table.scss
   │     │     ├─ _timeline.scss
   │     │     ├─ _utilities-extend.scss
   │     │     ├─ _utilities.scss
   │     │     └─ _virtual-reality.scss
   │     └─ soft-ui-dashboard.scss
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
   └─ user.php

```