# Olimpia Club House - Project Architecture

## Overview

Olimpia Club House is a gym and fitness center management platform built with Laravel.

The goal of the project is to provide a complete ecosystem for managing:

* users
* trainers
* lessons
* bookings
* subscriptions
* sports insurance policies
* additional services
* single entries
* entry packages
* management dashboards

The architecture is designed to be modular, scalable, and maintainable.

---

# Application Structure

The application is divided into five main areas:

* public website
* dashboard
* admin area
* trainer area
* customer area

This separation allows independent management of:

* public navigation
* business logic
* permissions
* role-specific interfaces

---

# Roles

The system currently supports three main roles:

* admin
* trainer
* customer

Each user belongs to a role through:

```text
users.role_id
```

Available helpers:

```php
$user->isAdmin();

$user->isTrainer();

$user->isCustomer();
```

---

# Dashboard Routing

Dashboard navigation is centralized inside:

```php
App\Http\Controllers\Dashboard\DashboardController
```

The controller automatically determines the authenticated user's role and loads the correct dashboard.

Available dashboards:

```text
resources/views/dashboard/admin/admin.blade.php

resources/views/dashboard/trainer/trainer.blade.php

resources/views/dashboard/customer/customer.blade.php
```

---

# Dashboard Architecture

To prevent controllers from becoming overloaded, a dedicated Service Layer has been introduced.

Currently available:

```php
App\Services\Dashboard\AdminDashboardService
```

Responsibilities:

* dashboard data retrieval
* KPI generation
* revenue analytics
* upcoming lessons retrieval
* data transformation
* widget preparation
* trend calculations

Goals:

* lightweight controllers
* separation of concerns
* easier maintenance
* future test coverage

---

# Dashboard Data Mapping Layer

Views never receive raw models directly.

Data transformation is performed through Collection Mapping.

Flow:

```text
Model
↓
Dashboard Service
↓
Mapping
↓
Blade Ready Array
↓
View
```

The mapping layer handles:

* date formatting
* time formatting
* localization
* dynamic badges
* progress bars
* lesson occupancy
* trainer information
* KPI trends

Views receive only presentation-ready data.

---

# Layout

Main layout:

```text
resources/views/components/layout.blade.php
```

Supported props:

```php
dashboard
fullHeight
hideSubscription
```

When:

```php
dashboard = true
```

the sidebar corresponding to the authenticated user's role is automatically loaded.

---

# Sidebar

Dedicated sidebars exist for:

* Admin
* Trainer
* Customer

Features:

* open/close toggle
* hover expansion
* persistent expansion
* nested dropdowns
* mobile overlay
* responsive navigation
* ESC close
* outside click close
* language selector
* user profile section

Main files:

```text
resources/css/dashboard-sidebar.css

resources/js/dashboard-sidebar.js
```

---

# Widget Architecture

Each dashboard uses a dedicated widget structure.

## Admin

```text
components
widgets
partials
```

## Trainer

```text
components
widgets
partials
```

## Customer

```text
components
widgets
partials
```

Goal:

Allow new widgets to be added without modifying the main dashboard layout.

---

# Admin Dashboard

The Admin Dashboard is the main operational hub of the platform.

---

## Dashboard Header

Includes:

* personalized greeting
* dashboard description
* public website shortcut

---

## Stats Cards

Main KPI widget.

Currently displays:

* registered users
* active members
* trainers
* scheduled lessons
* daily bookings
* monthly revenue

All statistics are retrieved in real time from the database.

---

### Users

Displays the total number of registered users.

Includes:

* active customers
* inactive customers
* registered users

Excludes:

* administrators
* trainers

---

### Active Members

Displays the number of active customers.

Requirements:

* customer role
* active status

---

### Trainers

Displays the total number of trainers in the system.

---

### Scheduled Lessons

Displays the total number of future scheduled lessons.

Includes:

* scheduled lessons
* bookable lessons

Excludes:

* completed lessons
* cancelled lessons

---

### Daily Bookings

Displays the number of bookings created during the current day.

Supports:

* comparison with the previous day
* percentage variation
* positive trend
* neutral trend
* negative trend

---

### Monthly Revenue

Displays the revenue generated during the current month.

Includes:

* registrations
* subscriptions
* single lesson bookings
* service bookings
* entry packages
* standalone insurance purchases

Excludes:

* insurance already included in registrations
* insurance already included in subscriptions

to avoid double counting.

Supports:

* comparison with the previous month
* percentage trend
* zero-revenue month handling

---

## Quick Actions

Widget dedicated to administrative shortcuts.

Goals:

* reduce navigation time
* speed up administrative workflows
* centralize common actions

---

## Latest Users

Widget displaying recently registered members.

Displays:

* name
* insurance status
* subscription status
* overall status

Insurance logic:

* Green → more than 60 days remaining
* Yellow → expires within 60 days
* Red → missing or expired

Subscription logic:

* Green → active
* Yellow → close to expiration
* Red → missing, expired, or cancelled

Insurance status always has priority.

---

## Next Lessons

Widget displaying upcoming lessons.

File:

```text
resources/views/dashboard/admin/widgets/next-lessons.blade.php
```

Displays:

* date
* time
* trainer
* bookings
* occupancy

Features:

* automatic retrieval of the next 5 lessons
* exclusion of already started lessons
* chronological ordering
* trainer eager loading
* booking eager loading
* dynamic badges
* occupancy progress bar
* localization support

Statuses:

* Available
* Almost Full
* Full

---

# KPI Architecture

Administrative KPIs are generated through:

```php
App\Services\Dashboard\AdminDashboardService
```

Responsibilities:

* data aggregation
* dashboard statistics
* daily trends
* monthly trends
* revenue analytics
* lesson retrieval
* widget preparation

Views contain no business logic.

All business rules are centralized inside the Service Layer.

---

# Revenue Architecture

To support reliable financial KPIs, insurance payment source tracking has been introduced.

Field:

```text
insurance_policies.payment_source
```

Supported values:

```text
standalone
registration
subscription
```

---

## Goal

Differentiate between:

* standalone insurance purchases
* insurance included in registrations
* insurance included in subscriptions

---

## Benefits

Allows:

* preventing double counting
* generating accurate KPIs
* building reliable revenue analytics
* supporting future payment gateway integrations

---

# Lesson Recurrence Architecture

To support recurring lesson scheduling, a Template-based architecture has been introduced.

---

## LessonTemplate

Table:

```text
lesson_templates
```

Represents the recurring lesson rule.

Contains:

* trainer
* weekday
* schedule
* pricing
* capacity
* booking rules

Model:

```php
App\Models\Lesson\LessonTemplate
```

---

## Lesson

Table:

```text
lessons
```

Represents the actual lesson occurrence.

Can be:

* edited
* moved
* cancelled

without affecting the original template.

Model:

```php
App\Models\Lesson\Lesson
```

---

## Relationships

```text
LessonTemplate
↓
Lesson
↓
Booking
```

---

# Automatic Lesson Generation

Command:

```bash
php artisan gym:generate-lessons
```

Options:

```bash
php artisan gym:generate-lessons --weeks=8
```

Features:

* multi-week generation
* existing lesson updates
* duplicate prevention
* past lesson exclusion

---

# Scheduler

Laravel Scheduler automatically executes:

```bash
php artisan gym:generate-lessons
```

Configuration:

```text
Every Monday at 02:00
```

Goal:

Always keep future bookable lessons available.

---

# Timezone Management

Configuration:

```env
APP_TIMEZONE=Europe/Rome
```

```php
'timezone' => env('APP_TIMEZONE', 'UTC')
```

Reason:

The entire gym business logic depends on local time.

Impacts:

* lessons
* bookings
* insurance policies
* subscriptions
* scheduler
* daily KPIs

---

# Localization

Currently supported languages:

* Italian
* English

Dedicated files:

```text
lang/it/lesson.php
lang/en/lesson.php

lang/it/kpi.php
lang/en/kpi.php
```

Supports:

* dashboard widgets
* KPIs
* lesson badges
* lesson occupancy
* dashboard trends
* statistical labels

---

# CSS Architecture

Current modules:

```text
variables.css
utilities.css
navbar.css
public.css
forms.css
footer.css
dashboard-sidebar.css
dashboard-widgets.css
```

Goal:

Keep visual responsibilities separated across application areas.

---

# Git Convention

Supported commit types:

```text
feat:
fix:
refactor:
docs:
```

Documentation and source code must remain synchronized after every significant milestone.

---

# Completed Milestones

```text
refactor: build dashboard architecture and role-based sidebar navigation

feat: add admin dashboard widgets and mobile sidebar support

feat: implement admin dashboard widgets and recurring lesson architecture

feat: add next lessons widget and admin dashboard service

feat: implement admin dashboard KPIs and revenue analytics
```

---

# Roadmap

## Admin Dashboard

* KPI charts
* revenue chart
* bookings chart
* recent activities
* insurance expirations
* subscription expirations
* dashboard topbar
* dynamic greetings

---

## Trainer Dashboard

* trainer KPIs
* assigned lessons
* bookings
* availability management

---

## Customer Dashboard

* subscriptions
* insurance status
* bookings
* activity history

---

## Future Evolutions

* complete payment system
* automatic renewals
* entry management
* notifications
* advanced analytics
* multilingual management content