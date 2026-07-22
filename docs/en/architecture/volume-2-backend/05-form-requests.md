---
Title: Form Requests

Document ID: V2-05

Volume: II — Backend

Version: 1.0.0

Status: Draft

Language: EN

Audience: Developers

Last Updated: July 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Form Requests

## Introduction

Form Requests belong to the Application Layer and encapsulate request validation and authorization before business logic is executed.

By separating input validation from controllers and business services, Form Requests contribute to a cleaner architecture where each component focuses on a single responsibility.

Their purpose is to ensure that only valid and authorized requests reach the Business Layer.

---

## Architectural Position

Form Requests belong to the **Application Layer**.

They act as the validation boundary between incoming HTTP requests and the execution of business logic.

Their responsibility is to verify that a request is authorized and structurally valid before it enters the Business Layer.

---

## Responsibilities

The primary responsibilities of Form Requests include:

- validating incoming data;
- authorizing requests;
- defining validation rules;
- preparing validated input for the Application Layer;
- preventing invalid requests from reaching business services.

Form Requests should focus exclusively on request validation and authorization.

Form Requests establish a clear validation boundary before application execution continues.

---

## Design Principles

### Separation of Responsibilities

Validation and authorization remain independent from controllers and business services.

Each concern is handled by the component best suited to perform it.

---

### Reusability

Validation rules should be reusable and organized according to the application's functional requirements.

Duplicating validation logic across controllers should be avoided.

---

### Consistency

Validation should follow consistent conventions throughout the application.

Similar operations should apply similar validation strategies.

---

### Simplicity

Form Requests should contain only logic related to request validation and authorization.

Additional processing belongs to other architectural layers.

---

## Validation

Validation ensures that incoming data satisfies the structural requirements of the application.

Typical validation responsibilities include:

- required fields;
- data formats;
- value constraints;
- field relationships;
- input normalization.

Validation should describe the expected structure and integrity of the request rather than enforcing business rules.

---

## Authorization

Authorization determines whether the current request is allowed to proceed.

Authorization decisions performed by Form Requests should remain limited to request-level permissions.

Complex authorization decisions driven by business rules belong to the Business Layer.

---

## Interaction with Other Layers

The execution flow involving Form Requests is straightforward.

```text
Routing
      │
      ▼
Controller
      │
      ▼
Form Request
      │
      ▼
Service
```

Controllers delegate validation and authorization to Form Requests before invoking business services.

---

## Architectural Boundaries

Form Requests should never:

- implement business rules;
- execute business workflows;
- access persistence directly;
- perform database operations unrelated to validation;
- generate responses.

Their responsibility ends once validated data is passed to the Application Layer.

---

## Evolution

As the application evolves, new validation requirements should be incorporated into dedicated Form Requests rather than increasing controller complexity.

Keeping validation centralized preserves consistency across the backend.

Existing validation conventions should be preferred over introducing inconsistent validation strategies.

---

## Closing Statement

Form Requests establish a clear validation boundary within the Application Layer.

By isolating validation and authorization from business logic, they contribute to a backend architecture that remains modular, predictable, loosely coupled and easy to maintain.

---

## Key Takeaways

- Form Requests validate incoming data.
- Authorization is performed before business execution.
- Validation remains independent from business logic.
- Controllers delegate validation to Form Requests.
- Clear validation boundaries improve maintainability.

---

## Related Chapters

### Previous

- Controllers

### Next

- Services

---

## Revision History

| Version | Date | Description |
|----------|------|-------------|
| 1.0.0 | July 2026 | Initial version |