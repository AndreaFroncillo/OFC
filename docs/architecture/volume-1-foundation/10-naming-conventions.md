---
Title: Naming Conventions

Document ID: V1-10

Volume: I — Foundation

Version: 3.0.0

Status: Stable

Language: EN

Audience: Developers

Last Updated: July 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Naming Conventions

## Purpose

This chapter defines the naming conventions adopted throughout Olimpia Club House.

Consistent naming improves readability, simplifies navigation and reduces ambiguity across the entire project.

Developers should be able to understand the purpose of a file, class or method simply by reading its name.

These conventions apply to every new feature introduced into the platform.

---

# General Principles

Names should describe responsibilities rather than implementation details.

Whenever possible, names should be:

- descriptive;
- concise;
- consistent;
- technology-independent.

Abbreviations should be avoided unless universally recognized.

---

# Classes

Classes should use **PascalCase**.

Examples:

```text
User
Role
Permission
PasswordGenerator
AdminDashboardService
StoreUserRequest
CheckPermission
```

Class names should always describe what the class represents or does.

---

# Controllers

Controllers should end with the `Controller` suffix.

Examples:

```text
UserController
DashboardController
LessonController
SubscriptionController
```

Controllers coordinate requests and should not contain business logic.

---

# Form Requests

Validation classes should clearly express their purpose.

Examples:

```text
StoreUserRequest
UpdateUserRequest
StoreLessonRequest
UpdateSubscriptionRequest
```

The class name should indicate both the action and the resource.

---

# Services

Services should end with the `Service` suffix whenever they represent business workflows.

Examples:

```text
AdminDashboardService
RevenueService
BookingService
NotificationService
```

Small reusable utilities may omit the suffix when a more expressive name exists.

Example:

```text
PasswordGenerator
```

---

# Models

Models represent business entities.

Examples:

```text
User
Lesson
Booking
Subscription
Payment
Insurance
```

Model names should always be singular.

---

# Blade Components

Blade Components should be grouped by responsibility.

Examples:

```text
x-buttons.button

x-forms.input

x-forms.select

x-forms.phone

x-dashboard.card
```

Component names should remain short, expressive and reusable.

---

# CSS

Stylesheets should be organized by feature.

Examples:

```text
forms.css

management.css

phone-input.css

dashboard-topbar.css

utilities.css
```

Avoid page-specific names whenever possible.

---

# JavaScript

JavaScript modules should describe a single behaviour.

Examples:

```text
phone-input.js

prevent-double-submit.js

dashboard-sidebar.js

dashboard-topbar.js
```

Each file should implement one responsibility.

---

# Routes

Routes should use meaningful names following Laravel conventions.

Examples:

```text
users.index

users.create

users.store

users.show

users.edit

users.update

users.destroy
```

Nested resources should preserve readability.

---

# Database

Migration names should clearly describe their purpose.

Examples:

```text
create_permissions_table

create_permission_role_table

add_profile_fields_to_users_table

make_email_nullable_on_users_table
```

Table names should remain plural.

Model names should remain singular.

---

# Configuration

Configuration files should describe the subsystem they configure.

Examples:

```text
management.php

services.php

auth.php
```

Configuration keys should remain descriptive and grouped logically.

---

# Variables

Variables should communicate intent.

Good examples:

```php
$user

$validated

$password

$passwordGenerator

$totalRevenue

$subscription
```

Avoid generic names such as:

```php
$data

$temp

$value

$item
```

---

# Methods

Methods should begin with a verb whenever they perform an action.

Examples:

```php
generate()

hash()

calculateRevenue()

activateSubscription()

hasPermission()

canAccessGym()
```

Boolean methods should naturally read as questions.

Examples:

```php
isActive()

hasPermission()

canBookLesson()
```

---

# Translation Keys

Translation keys should be grouped by context.

Examples:

```text
auth.created

auth.updated

general.save

general.cancel

status.active

status.inactive
```

Avoid duplicate or ambiguous keys.

---

# Documentation

Documentation files should follow a predictable naming scheme.

Examples:

```text
01-project-vision.md

02-project-philosophy.md

03-project-goals.md

04-high-level-architecture.md
```

Each chapter should include a unique Document ID.

---

# Future Evolution

As the project grows, new naming conventions may be introduced when required.

Existing conventions should remain stable to preserve consistency across the codebase.

Breaking naming conventions should be considered only when there is a clear architectural benefit.

---

## Architecture Notes

Naming is considered part of the project's architecture.

Well-defined conventions improve communication, reduce ambiguity and simplify long-term maintenance.

Consistency is more valuable than personal preference.

---

## Key Takeaways

- Use descriptive names.
- Follow consistent naming conventions.
- Prefer singular model names and plural table names.
- Organize components by responsibility.
- Keep naming predictable across the entire project.
- Treat naming as part of the architecture.

---

## Related Chapters

### Previous

- Coding Standards

### Next

- Volume II — Backend

---

## Revision History

| Version | Date | Description |
|----------|------|-------------|
| 3.0.0 | July 2026 | Initial version |