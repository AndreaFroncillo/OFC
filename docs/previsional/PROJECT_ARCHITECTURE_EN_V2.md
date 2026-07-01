# Olimpia Club House - Project Architecture

## 1. Project Overview

Olimpia Club House is a Laravel-based management platform for gyms and fitness centers.

The goal of the project is to build a complete ecosystem for managing:

- users
- roles
- trainers
- customers
- lessons
- bookings
- subscriptions
- sports insurance policies
- registration payments
- additional services
- single entries
- entry packages
- management dashboards
- administrative KPIs
- revenue analytics

The architecture is designed to be modular, extensible, and maintainable over time.

---

## 2. Application Areas

The application is divided into distinct areas:

- public website
- dashboard
- admin area
- trainer area
- customer area

This separation keeps independent:

- public navigation
- business logic
- permissions
- role-based interfaces
- operational dashboards

---

## 3. Role Architecture

The system currently supports three main roles:

- admin
- trainer
- customer

Each user belongs to a role through:

```text
users.role_id
```

Available User helpers:

```php
$user->isAdmin();
$user->isTrainer();
$user->isCustomer();
```

These helpers allow the system to route users to the correct dashboard and display role-specific interfaces.

---

## 4. Domain Architecture

The application domain is composed of several main entities.

### User

Represents a registered user.

Can be:

- administrator
- trainer
- customer

Connected to:

- Role
- Trainer
- Booking
- Subscription
- InsurancePolicy
- RegistrationPayment
- EntryPackage
- ServiceBooking

---

### Role

Represents the application role.

Main roles:

- admin
- trainer
- customer

Used for:

- dashboard routing
- sidebar rendering
- future permissions
- interface personalization

---

### Trainer

Represents the professional who teaches lessons or provides services.

Connected to:

- User
- Lesson
- LessonTemplate
- ServiceBooking

---

### LessonTemplate

Represents a recurring lesson rule.

Example:

```text
Pilates
every Friday
19:30 - 20:30
```

Contains:

- trainer
- weekday
- time
- price
- capacity
- booking rules
- active status

---

### Lesson

Represents an actual calendar lesson.

Can be:

- edited
- cancelled
- moved
- completed

without changing the recurring template.

---

### Booking

Represents a lesson booking.

Can be:

- pending
- confirmed
- cancelled
- completed

It can be linked to a subscription or paid individually.

---

### SubscriptionPlan

Represents a purchasable subscription plan.

Contains commercial rules for the plan.

---

### Subscription

Represents a subscription purchased by a user.

Can be:

- pending
- active
- cancelled
- expired

Connected to:

- User
- SubscriptionPlan
- Booking

---

### InsurancePolicy

Represents the user's sports insurance.

Can be:

- pending
- active
- expired
- cancelled

It is essential for determining whether a customer can access specific activities.

---

### RegistrationPayment

Represents the registration payment.

Connected to user activation.

---

### Service

Represents an extra gym service.

Examples:

- personal training
- nutrition
- massage
- rehabilitation
- body composition analysis

---

### ServiceBooking

Represents a service booking.

Manages:

- date
- time
- optional trainer
- price
- booking status
- payment status

---

### EntryPackage

Represents an entry package.

Example:

```text
10 entries
100 euros
```

Tracks:

- total entries
- remaining entries
- validity
- payment
- active status

---

## 5. Dashboard Routing

Dashboard navigation is centralized in:

```php
App\Http\Controllers\Dashboard\DashboardController
```

The controller detects the authenticated user's role and loads the corresponding dashboard.

Available dashboards:

```text
resources/views/dashboard/admin/admin.blade.php
resources/views/dashboard/trainer/trainer.blade.php
resources/views/dashboard/customer/customer.blade.php
```

The controller is intentionally lightweight.

Dashboard business logic has been moved to the Service Layer.

---

## 6. Dashboard Service Layer

A dedicated Service Layer has been introduced to prevent overly complex controllers.

Current service:

```php
App\Services\Dashboard\AdminDashboardService
```

Responsibilities:

- KPI retrieval
- data aggregation
- revenue analytics
- trend calculation
- upcoming lessons retrieval
- Blade-ready data transformation
- widget preparation
- value formatting

Goals:

- lightweight controllers
- separation of concerns
- better maintainability
- future testability
- less logic inside Blade views

---

## 7. Dashboard Data Mapping Layer

Blade views do not receive raw models.

Data flow:

```text
Model
↓
Dashboard Service
↓
Mapping
↓
Blade-ready Array
↓
View
```

Mapping handles:

- date formatting
- time formatting
- localization
- dynamic badges
- progress bars
- lesson occupancy
- trainer data
- KPI trends
- formatted values

Views remain presentation-focused.

---

## 8. Layout Architecture

Main layout:

```text
resources/views/components/layout.blade.php
```

Supported props:

```text
dashboard
fullHeight
hideSubscription
```

When `dashboard` is true, the sidebar for the authenticated role is loaded.

---

## 9. Sidebar Architecture

Main files:

```text
resources/css/dashboard-sidebar.css
resources/js/dashboard-sidebar.js
```

Features:

- persistent opening
- desktop hover expansion
- forced closing
- internal dropdowns
- mobile overlay
- responsive navigation
- ESC close
- resize close
- language selector

The sidebar is focused on navigation.

The user profile has been moved to the topbar to keep the sidebar cleaner.

---

## 10. Dashboard Topbar Architecture

The admin dashboard uses a dedicated topbar.

Main files:

```text
resources/css/dashboard-topbar.css
resources/js/dashboard-topbar.js
```

Integrated in:

```text
resources/views/dashboard/admin/admin.blade.php
```

Features:

- user greeting
- avatar
- user name
- current role
- quick public website access
- notification placeholder
- profile menu
- responsive layout

---

### Profile Menu

The profile menu is click-based.

Supports:

- click opening
- outside click closing
- ESC closing
- `aria-expanded` updates
- desktop/mobile compatibility

Logic is separated in:

```text
resources/js/dashboard-topbar.js
```

---

### Notifications Placeholder

The topbar includes a notifications button.

The red badge is not shown statically.

It will only be displayed when unread notifications exist.

Future features:

- unread notifications
- mark as read
- archive
- delete
- links to administrative events

---

## 11. Widget Architecture

Each dashboard has a modular structure.

### Admin

```text
components
widgets
partials
```

### Trainer

```text
components
widgets
partials
```

### Customer

```text
components
widgets
partials
```

Goal:

add widgets without changing the main layout.

---

## 12. Admin Dashboard

The Admin Dashboard is the operational center of the platform.

Current structure:

```text
Topbar
↓
Stats Cards
↓
Dashboard Widgets
```

---

### Stats Cards

Main KPI widget.

Current metrics:

- registered users
- active customers
- trainers
- scheduled lessons
- daily bookings
- monthly revenue

Statistics are retrieved from the database through:

```php
App\Services\Dashboard\AdminDashboardService
```

Each card supports:

- icon
- value
- description
- trend
- dynamic class
- future link
- responsive layout

---

### Users KPI

Displays the total registered users.

Includes:

- active customers
- inactive customers
- registered users without subscription

Excludes:

- admins
- trainers

The logic depends on role slug, not role id.

---

### Active Members KPI

Displays active customers.

Requirements:

- customer role
- active status

---

### Trainers KPI

Displays total trainers.

---

### Scheduled Lessons KPI

Displays future scheduled lessons.

Includes:

- scheduled lessons
- future lessons

Excludes:

- past lessons
- cancelled lessons

---

### Daily Bookings KPI

Displays bookings created today.

Supports:

- comparison with yesterday
- percentage trend
- positive trend
- neutral trend
- negative trend
- division by zero handling

---

### Monthly Revenue KPI

Displays current month revenue.

Includes:

- RegistrationPayment
- Subscription
- individually paid Booking
- paid ServiceBooking
- paid EntryPackage
- standalone InsurancePolicy

Excludes:

- insurance included in registrations
- insurance included in subscriptions

to prevent double counting.

Supports:

- comparison with previous month
- percentage trend
- zero-value months
- negative values

---

## 13. Quick Actions Widget

Widget for administrative shortcuts.

Goals:

- reduce clicks
- speed up admin workflows
- centralize frequent operations

---

## 14. Latest Users Widget

Widget for recently registered members.

Displays:

- name
- insurance status
- subscription status
- overall status

Insurance logic:

- green: more than 60 days
- yellow: within 60 days
- red: missing or expired

Subscription logic:

- green: active
- yellow: expiring soon
- red: missing, expired, or cancelled

---

## 15. Next Lessons Widget

File:

```text
resources/views/dashboard/admin/widgets/next-lessons.blade.php
```

Displays:

- date
- time
- trainer
- bookings
- occupancy status

Features:

- next 5 lessons
- excludes already started lessons
- chronological ordering
- trainer eager loading
- bookings eager loading
- dynamic badges
- progress bar
- localization

Statuses:

- Available
- Almost full
- Full

---

## 16. KPI Engine

KPIs are generated in the Service Layer.

Responsibilities:

- aggregate queries
- trend calculation
- value formatting
- dynamic CSS classes
- Blade-ready data structure

Main operations:

- users retrieval
- active customers retrieval
- trainers retrieval
- future lessons retrieval
- daily bookings retrieval
- monthly revenue retrieval
- trend calculation

---

## 17. Revenue Engine

The revenue system aggregates multiple financial sources.

### Revenue Sources

- RegistrationPayment
- Subscription
- Booking
- ServiceBooking
- EntryPackage
- standalone InsurancePolicy

### Payment Source

Field:

```text
insurance_policies.payment_source
```

Values:

```text
standalone
registration
subscription
entry_package
booking
service_booking
```

Purpose:

distinguish the economic origin of the insurance policy.

---

### Double Counting Prevention

Insurance included in registrations or subscriptions is not summed as a separate revenue source.

Only `standalone` is counted separately.

This prevents accounting duplication.

---

## 18. Lesson Recurrence Architecture

Recurring lessons are template-based.

```text
LessonTemplate
↓
Lesson
↓
Booking
```

---

### LessonTemplate

Table:

```text
lesson_templates
```

Represents the recurring rule.

Contains:

- trainer
- weekday
- time
- price
- capacity
- booking rules
- active status

---

### Lesson

Table:

```text
lessons
```

Represents a real lesson occurrence.

Can be edited without changing the template.

---

## 19. Automatic Lesson Generation

Command:

```bash
php artisan gym:generate-lessons
```

Options:

```bash
php artisan gym:generate-lessons --weeks=8
```

Features:

- multi-week generation
- duplicate prevention
- existing lesson updates
- past lesson exclusion

---

## 20. Scheduler

Laravel Scheduler executes:

```bash
php artisan gym:generate-lessons
```

Configuration:

```text
every Monday at 02:00
```

Goal:

always keep future bookable lessons available.

---

## 21. Timezone Management

Configuration:

```env
APP_TIMEZONE=Europe/Rome
```

In config:

```php
'timezone' => env('APP_TIMEZONE', 'UTC')
```

Reason:

gym business logic depends on local timezone.

Impacts:

- lessons
- bookings
- subscriptions
- insurance policies
- scheduler
- daily KPIs

---

## 22. Localization

Supported languages:

- Italian
- English

Main files:

```text
lang/it/lesson.php
lang/en/lesson.php
lang/it/kpi.php
lang/en/kpi.php
```

Supports:

- KPIs
- dashboard widgets
- lesson badges
- occupancy statuses
- trends
- statistic labels

---

## 23. CSS Architecture

Main files:

```text
variables.css
utilities.css

navbar.css
public.css
forms.css
footer.css

dashboard-sidebar.css
dashboard-topbar.css
dashboard-widgets.css
```

Goals:

- separation of responsibilities
- reduced regressions
- easier maintenance
- modular CSS
- future scalability

---

## 24. JavaScript Architecture

Dashboard files:

```text
resources/js/dashboard-sidebar.js
resources/js/dashboard-topbar.js
```

### dashboard-sidebar.js

Manages:

- desktop sidebar
- mobile sidebar
- hover expansion
- pinned mode
- overlay
- dropdowns
- ESC close
- resize handling

### dashboard-topbar.js

Manages:

- profile menu
- click opening
- outside click closing
- ESC closing
- aria-expanded

---

## 25. Development Conventions

Semantic commits:

```text
feat:
fix:
refactor:
docs:
```

Principles:

- lightweight controllers
- service layer for business logic
- presentation-only Blade views
- modular CSS
- component-based JS
- documentation synchronized with code

---

## 26. Completed Milestones

### Milestone 1

Dashboard architecture and role-based sidebar.

### Milestone 2

Admin dashboard widgets and mobile sidebar support.

### Milestone 3

Recurring lesson architecture.

### Milestone 4 — Admin Dashboard Completion

Completed:

- AdminDashboardService
- real KPIs
- Revenue Engine
- Revenue Trend
- Payment Source Architecture
- Next Lessons Widget
- dynamic Stats Cards
- Dashboard Topbar
- Profile dropdown
- CSS modularization
- JS modularization
- responsive dashboard

---

## 27. Roadmap

### Milestone 5 — Dashboard Insights & Monitoring

- recent activities
- insurance expirations
- subscription expirations
- dashboard notifications
- administrative alerts
- revenue chart
- bookings chart

### Milestone 6 — Trainer Dashboard

- trainer KPIs
- assigned lessons
- received bookings
- availability
- trainer calendar

### Milestone 7 — Customer Dashboard

- subscription status
- insurance status
- future bookings
- activity history
- entry packages

### Milestone 8 — Payments

- online payments
- checkout
- payment provider
- receipts
- renewal management

### Milestone 9 — Notifications

- real notifications
- read/unread notifications
- archive
- delete
- notification center

### Milestone 10 — UI System Evolution

- dark mode
- design tokens
- CSS variables refactor
- shared components
- responsive polish
