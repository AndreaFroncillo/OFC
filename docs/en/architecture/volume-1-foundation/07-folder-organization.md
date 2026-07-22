---
Title: Folder Organization

Document ID: V1-07

Volume: I — Foundation

Version: 3.0.0

Status: Stable

Language: EN

Audience: Developers

Last Updated: July 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Folder Organization

## Purpose

This chapter defines the directory organization adopted by Olimpia Club House.

A consistent folder structure is essential for maintaining readability, scalability and long-term maintainability.

Every new module should follow the conventions described in this chapter.

The objective is to ensure that every developer immediately knows where a specific responsibility belongs.

---

# Philosophy

Folders represent responsibilities rather than technologies.

Each directory groups files that share the same purpose within the application.

The structure is designed to minimize ambiguity and simplify navigation.

Whenever a new file is created, its location should be determined by its responsibility rather than convenience.

---

# Project Structure

The repository is organized into clearly separated areas.

```text
app/
bootstrap/
config/
database/
docs/
lang/
public/
resources/
routes/
storage/
tests/
vendor/
```

Each top-level directory has a well-defined responsibility.

---

# The app Directory

The `app` directory contains the application's source code.

Its internal organization reflects the logical architecture of the platform.

Examples include:

```text
app/
├── Http/
├── Models/
├── Providers/
├── Services/
└── Support/
```

As the project evolves, additional directories may be introduced when justified by architectural requirements.

---

# Http Layer

The HTTP layer groups every component responsible for handling incoming requests.

Typical directories include:

```text
Http/
├── Controllers/
├── Middleware/
└── Requests/
```

Responsibilities:

- Controllers coordinate execution.
- Middleware handle cross-cutting concerns.
- Form Requests validate incoming data.

Business logic does not belong here.

---

# Models

The `Models` directory represents the application's business entities.

Each model should remain focused on representing its domain concept.

Models should avoid becoming containers for unrelated business logic.

---

# Services

The `Services` directory contains business workflows.

Examples include:

- Dashboard services;
- Password generation;
- Revenue calculations;
- Future booking services;
- Subscription services.

Whenever business logic becomes reusable or exceeds the responsibility of a controller, it should be extracted into a dedicated Service.

---

# Support

The `Support` directory contains reusable infrastructure that does not belong to a specific business domain.

Examples include:

```text
Support/
├── Generators/
├── Helpers/
└── Utilities/
```

The PasswordGenerator introduced during the Users Management milestone is an example of this approach.

Future reusable utilities should follow the same convention.

---

# Configuration

Application configuration belongs inside the `config` directory.

Examples include:

- application settings;
- management configuration;
- service configuration;
- future feature toggles.

Configuration values should never be hardcoded inside business logic.

---

# Resources

Frontend resources are organized by responsibility.

Examples include:

```text
resources/
├── css/
├── js/
└── views/
```

Each area evolves independently while following shared conventions.

---

# Blade Components

Reusable interface elements belong inside:

```text
resources/views/components/
```

Components are grouped by responsibility.

Example structure:

```text
components/
├── alerts/
├── badges/
├── buttons/
├── cards/
├── dashboard/
├── forms/
└── tables/
```

Whenever a UI element becomes reusable, it should evolve into a Blade Component.

---

# CSS Organization

Stylesheets are organized by feature rather than by page.

Examples include:

```text
css/
├── forms.css
├── management.css
├── dashboard-topbar.css
├── phone-input.css
├── utilities.css
└── variables.css
```

Each stylesheet has a clearly defined responsibility.

---

# JavaScript Organization

JavaScript follows the same modular philosophy.

Example:

```text
js/
└── forms/
    ├── phone-input.js
    └── prevent-double-submit.js
```

Each module contains a single behavior.

Modules should remain small, reusable and independent.

---

# Documentation

Project documentation is maintained separately from source code.

The documentation resides inside:

```text
docs/
```

Its organization reflects the architectural structure of the project.

Documentation evolves together with the software.

---

# Future Evolution

As the platform grows, new directories may be introduced.

However, new folders should only be created when they improve clarity and maintainability.

The objective is to keep the project structure predictable and easy to navigate.

---

## Architecture Notes

Folder organization should reflect responsibilities rather than implementation details.

Developers should avoid introducing directories that duplicate existing responsibilities or create unnecessary complexity.

---

## Key Takeaways

- Every directory has a clearly defined responsibility.
- Business logic belongs inside Services.
- Reusable utilities belong inside Support.
- Blade Components are grouped by responsibility.
- CSS and JavaScript follow the same modular philosophy.

---

## Related Chapters

### Previous

- Layered Architecture

### Next

- Development Principles

---

## Revision History

| Version | Date | Description |
|----------|------|-------------|
| 3.0.0 | July 2026 | Initial version |