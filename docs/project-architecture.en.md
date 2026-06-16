# Olimpia Club House - Project Architecture

## Current Status

The project is structured as a gym management platform with a clear separation between:

* public website
* dashboard area
* admin area
* trainer area
* customer area

## Main Roles

* admin
* trainer
* customer

## Dashboard

A single DashboardController is responsible for redirecting authenticated users to the correct dashboard based on their role.

Separate views are available:

* resources/views/dashboard/admin/admin.blade.php
* resources/views/dashboard/trainer/trainer.blade.php
* resources/views/dashboard/customer/customer.blade.php

## Layout

A single shared layout is used:

* resources/views/components/layout.blade.php

The layout supports dashboard mode through the:

* dashboard

property.

When dashboard is set to true, the corresponding role-based sidebar is automatically loaded.

## Sidebar

Role-based sidebars have been implemented:

* Admin Sidebar
* Trainer Sidebar
* Customer Sidebar

The sidebar system uses:

* resources/js/dashboard-sidebar.js
* resources/css/dashboard-sidebar.css

Features:

* open/close button
* hover expansion
* internal dropdown menus
* mobile support
* mobile overlay
* language selector dropdown
* user profile footer section
* hover delay to avoid accidental triggers

## Widget Architecture

A dedicated dashboard widget structure has been introduced.

### Admin

* resources/views/dashboard/admin/components
* resources/views/dashboard/admin/widgets
* resources/views/dashboard/admin/partials

### Trainer

* resources/views/dashboard/trainer/components
* resources/views/dashboard/trainer/widgets
* resources/views/dashboard/trainer/partials

### Customer

* resources/views/dashboard/customer/components
* resources/views/dashboard/customer/widgets
* resources/views/dashboard/customer/partials

## Blade Namespaces

Registered through:

* app/Providers/AppServiceProvider.php

Available namespaces:

* admin
* trainer
* customer

for:

* Components
* Widgets
* Partials

## Admin Dashboard

The new Admin Dashboard has been initialized.

### Dashboard Header

Includes:

* personalized greeting
* dashboard description
* quick access to the public website

### Stats Cards

Initial statistics widget containing:

* total users
* active customers
* trainers
* scheduled lessons
* bookings
* monthly revenue

Data is currently static and acts as a placeholder until database integration is completed.

## CSS Architecture

CSS has been modularized.

Current files:

* variables.css
* utilities.css
* navbar.css
* public.css
* forms.css
* footer.css
* dashboard-sidebar.css
* dashboard-widgets.css

The legacy style.css file is temporarily maintained as a migration reference.

## Responsive Mobile Navigation

The sidebar supports mobile navigation.

Features:

* hidden by default
* mobile toggle button
* overlay close support
* click outside to close
* responsive support up to 991px

## Milestones

* refactor: build dashboard architecture and role-based sidebar navigation
* feat: add admin dashboard widgets and mobile sidebar support

## Git Conventions

Each milestone is stored using semantic commits.

Supported prefixes:

* feat:
* fix:
* refactor:
* docs:

Documentation and source code should remain synchronized after every significant milestone.
