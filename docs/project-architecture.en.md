# Olimpia Club House - Project Architecture

## Current Status

The project is structured as a gym management platform with a clear separation between:

* public website
* dashboard area
* admin area
* trainer area
* customer area

---

## Main Roles

The platform currently supports:

* admin
* trainer
* customer

Each user belongs to a role through:

* users.role_id

Available helper methods:

* isAdmin()
* isTrainer()
* isCustomer()

---

## Dashboard

A single DashboardController handles dashboard routing.

Authenticated users are automatically redirected to the correct dashboard based on their role.

Views:

* resources/views/dashboard/admin/admin.blade.php
* resources/views/dashboard/trainer/trainer.blade.php
* resources/views/dashboard/customer/customer.blade.php

---

## Layout

A shared layout is used:

* resources/views/components/layout.blade.php

Dashboard mode is enabled through:

* dashboard

Main props:

* dashboard
* fullHeight
* hideSubscription

---

## Sidebar

Role-based sidebars have been implemented:

* Admin Sidebar
* Trainer Sidebar
* Customer Sidebar

Files:

* resources/js/dashboard-sidebar.js
* resources/css/dashboard-sidebar.css

Features:

* open/close toggle
* hover expansion
* persistent expansion
* nested dropdowns
* mobile support
* mobile overlay
* outside click close
* ESC close
* language selector
* user profile section
* hover delay protection

---

## Responsive Mobile Navigation

The sidebar fully supports mobile devices.

Features:

* hidden by default
* mobile toggle button
* overlay close support
* click outside to close
* responsive support up to 991px

---

## Widget Architecture

Dedicated widget structure introduced.

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

---

## Blade Namespaces

Registered through:

* app/Providers/AppServiceProvider.php

Namespaces:

* admin
* trainer
* customer

for:

* Components
* Widgets
* Partials

---

## Admin Dashboard

The new Admin Dashboard has been initialized.

### Dashboard Header

Includes:

* personalized greeting
* dashboard description
* quick access to public website

---

### Stats Cards

Initial KPI widget containing:

* total users
* active customers
* trainers
* scheduled lessons
* bookings
* monthly revenue

Currently populated with placeholder data.

File:

* resources/views/dashboard/admin/widgets/stats-cards.blade.php

---

### Quick Actions

Administrative quick actions widget.

File:

* resources/views/dashboard/admin/widgets/quick-actions.blade.php

Purpose:

* fast access to management areas
* reduced navigation time
* centralized access to common actions

Currently uses placeholder links.

---

### Latest Users

Widget showing recently registered members.

File:

* resources/views/dashboard/admin/widgets/latest-users.blade.php

Purpose:

* monitor new members
* monitor insurance status
* monitor subscription status
* quickly identify critical situations

Insurance status:

* Green → expires in more than 60 days
* Yellow → expires within 60 days
* Red → expired or missing

Subscription status:

* Green → active
* Yellow → close to expiration
* Red → missing, expired or cancelled

Insurance status has higher priority.

---

## Lesson Recurrence Architecture

A recurring lesson architecture has been introduced.

### LessonTemplate

Table:

* lesson_templates

Represents recurring lesson rules.

Example:

* Pilates
* Every Friday
* 19:30 - 20:30

Contains:

* trainer
* weekday
* schedule
* pricing
* capacity
* booking rules

Model:

* App\Models\Lesson\LessonTemplate

---

### Lesson

Table:

* lessons

Represents real calendar occurrences.

Individual lessons may be:

* edited
* cancelled
* moved

without affecting the original template.

Model:

* App\Models\Lesson\Lesson

---

### Relationships

LessonTemplate

↓

Lesson

↓

Booking

---

### Automatic Lesson Generation

Command:

```bash
php artisan gym:generate-lessons
```

Options:

```bash
php artisan gym:generate-lessons --weeks=8
```

Features:

* generates future lessons from active templates
* prevents duplicates
* updates existing lessons
* ignores past lessons
* supports multi-week generation

---

### Scheduler

Automatic generation is handled through Laravel Scheduler.

Current configuration:

* every Monday at 02:00

Goal:

* always keep future lessons available for booking

---

### Seeders

#### LessonTemplateSeeder

Primary recurring lesson seeder.

Creates:

* lesson_templates

#### LessonSeeder

Maintained as a Legacy Seeder.

Purpose:

* historical reference
* migration support

No longer executed by DatabaseSeeder.

---

## CSS Architecture

CSS has been modularized.

Current modules:

* variables.css
* utilities.css
* navbar.css
* public.css
* forms.css
* footer.css
* dashboard-sidebar.css
* dashboard-widgets.css

The legacy style.css file is temporarily retained as migration reference.

---

## Git Conventions

Every milestone is stored using semantic commits.

Supported prefixes:

* feat:
* fix:
* refactor:
* docs:

Documentation and source code must remain synchronized after each significant milestone.

---

## Milestones

* refactor: build dashboard architecture and role-based sidebar navigation
* feat: add admin dashboard widgets and mobile sidebar support
* feat: implement admin dashboard widgets and recurring lesson architecture

---

## Immediate Roadmap

Admin Dashboard:

* Next Lessons Widget
* Real database KPIs
* Dashboard charts
* Member management
* Renewal management
* Insurance management

Future modules:

* Trainer Dashboard
* Customer Dashboard
* Advanced bookings
* Payments
* Subscriptions
* Entry management
