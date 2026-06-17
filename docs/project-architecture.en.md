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

Supported roles:

* admin
* trainer
* customer

Users belong to a role through:

* users.role_id

Helper methods:

* isAdmin()
* isTrainer()
* isCustomer()

---

## Dashboard

A single DashboardController handles dashboard routing.

Views:

* resources/views/dashboard/admin/admin.blade.php
* resources/views/dashboard/trainer/trainer.blade.php
* resources/views/dashboard/customer/customer.blade.php

---

## Dashboard Service Layer

A dedicated dashboard service layer has been introduced.

Current services:

* App\Services\Dashboard\AdminDashboardService

Responsibilities:

* dashboard data retrieval
* widget data preparation
* model transformation
* dashboard business logic centralization

Goals:

* lightweight controllers
* maintainability
* scalability

---

## Dashboard Data Mapping Layer

Dashboard data is prepared using Collection Mapping.

Flow:

Lesson Model

↓

Dashboard Mapping

↓

Blade-ready Array

Responsibilities:

* date formatting
* time formatting
* percentage calculations
* dynamic badges
* trainer information
* lesson occupancy data

Views receive only presentation-ready data.

---

## Layout

Shared layout:

* resources/views/components/layout.blade.php

Props:

* dashboard
* fullHeight
* hideSubscription

---

## Sidebar

Dedicated sidebars for:

* Admin
* Trainer
* Customer

Features:

* toggle open/close
* hover expansion
* persistent mode
* dropdown menus
* mobile support
* overlay
* ESC close
* language selector
* user profile section

---

## Widget Architecture

### Admin

* components
* widgets
* partials

### Trainer

* components
* widgets
* partials

### Customer

* components
* widgets
* partials

---

## Admin Dashboard

### Dashboard Header

Includes:

* personalized greeting
* dashboard description
* public website shortcut

---

### Stats Cards

Initial KPI widget.

Includes:

* users
* active customers
* trainers
* lessons
* bookings
* revenue

Currently uses placeholder data.

---

### Quick Actions

Administrative quick actions widget.

Goals:

* reduce navigation time
* centralize common operations

---

### Latest Users

Widget displaying recent members.

Displays:

* name
* insurance
* subscription
* overall status

Insurance logic:

* Green → more than 60 days
* Yellow → expires within 60 days
* Red → missing or expired

Subscription logic:

* Green → active
* Yellow → close to expiration
* Red → missing, expired or cancelled

Insurance status always has priority.

---

### Next Lessons

New widget displaying upcoming scheduled lessons.

File:

* resources/views/dashboard/admin/widgets/next-lessons.blade.php

Displays:

* lesson date
* lesson time
* trainer
* bookings
* occupancy status

Features:

* automatic retrieval of next 5 lessons
* excludes already started lessons
* chronological ordering
* eager loading of trainer and bookings
* dynamic badges
* occupancy progress bar
* localization support

Statuses:

* Available
* Almost Full
* Full

---

## Lesson Recurrence Architecture

### LessonTemplate

Table:

* lesson_templates

Represents recurring lesson rules.

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

Can be:

* edited
* moved
* cancelled

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

### Automatic Generation

Command:

```bash
php artisan gym:generate-lessons
```

Supports:

```bash
php artisan gym:generate-lessons --weeks=8
```

Features:

* multi-week generation
* duplicate prevention
* existing lesson updates
* past lesson exclusion

---

### Scheduler

Laravel Scheduler automatically executes:

```bash
php artisan gym:generate-lessons
```

Current configuration:

* every Monday at 02:00

---

## Timezone Management

The project uses:

```env
APP_TIMEZONE=Europe/Rome
```

Configuration:

```php
'timezone' => env('APP_TIMEZONE', 'UTC')
```

Reason:

All gym business logic depends on local time:

* future lessons
* past lessons
* bookings
* insurance policies
* subscriptions
* scheduler

---

## Localization

Dedicated lesson language files introduced:

* lang/it/lesson.php
* lang/en/lesson.php

Supports:

* lesson badges
* occupancy states
* booking labels
* widget labels

---

## CSS Architecture

Main modules:

* variables.css
* utilities.css
* navbar.css
* public.css
* forms.css
* footer.css
* dashboard-sidebar.css
* dashboard-widgets.css

---

## Git Conventions

Supported prefixes:

* feat:
* fix:
* refactor:
* docs:

---

## Milestones

* refactor: build dashboard architecture and role-based sidebar navigation
* feat: add admin dashboard widgets and mobile sidebar support
* feat: implement admin dashboard widgets and recurring lesson architecture
* feat: add next lessons widget and admin dashboard service

---

## Immediate Roadmap

Admin Dashboard:

* real database KPIs
* dashboard charts
* recent activities
* insurance expirations
* subscription expirations
* member management

Future modules:

* Trainer Dashboard
* Customer Dashboard
* management content localization
* advanced bookings
* payments
* entry management
