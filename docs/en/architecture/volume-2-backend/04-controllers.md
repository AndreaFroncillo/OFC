---
Title: Controllers

Document ID: V2-04

Volume: II — Backend

Version: 1.0.0

Status: Draft

Language: EN

Audience: Developers

Last Updated: July 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Controllers

## Introduction

Controllers serve as the primary entry point of the Application Layer.

Their primary responsibility is to coordinate the execution of an application request by delegating validation, business logic and response generation to the appropriate architectural layers.

Controllers orchestrate application flow without implementing business rules.

---

## Architectural Position

Controllers belong to the **Application Layer**.

Their responsibility is to coordinate the execution of a request by delegating validation, business logic and response generation to the appropriate architectural layers.

Controllers act as orchestrators and should remain independent from business rules.

---

## Responsibilities

The primary responsibilities of Controllers include:

- receiving requests from the Routing Layer;
- coordinating request execution;
- invoking business services;
- selecting the appropriate response;
- returning the final HTTP response.

Controllers should remain focused on orchestration.

Controllers coordinate application flow without becoming responsible for business behavior.

---

## Design Principles

### Single Responsibility

Each controller should represent a coherent application resource or functional area.

Responsibilities should remain focused and predictable.

---

### Orchestration

Controllers coordinate execution.

Business rules, persistence and validation belong to dedicated architectural layers.

---

### Thin Controllers

Controllers should remain lightweight.

Complex processing should always be delegated to the appropriate services.

---

### Consistency

Controllers should follow consistent organizational and naming conventions.

Predictable controller structures improve readability and simplify maintenance.

---

## Request Coordination

Controllers receive requests that have already been routed by the Routing Layer.

Depending on the operation, they may:

- invoke request validation;
- call one or more business services;
- prepare the appropriate response.

Controllers coordinate these operations without implementing their underlying responsibilities.

---

## Interaction with Other Layers

Controllers collaborate with multiple architectural layers.

```text
Routing
    │
    ▼
Controllers
    │
    ├──► Form Requests
    │
    ├──► Services
    │
    └──► Views / Responses
```

Controllers serve as the coordination point between incoming requests and the execution of application behavior.

---

## Architectural Boundaries

Controllers should never:

- implement business rules;
- perform complex validation;
- manipulate persistence directly;
- execute database queries;
- contain reusable business workflows.

Whenever logic becomes reusable, business-oriented or domain-specific, it belongs in the Business Layer.

---

## Evolution

As the application grows, controllers should remain stable.

New functionality should be implemented by extending the Business Layer rather than increasing controller complexity.

Maintaining lightweight controllers preserves the overall clarity of the backend architecture.

---

## Closing Statement

Controllers coordinate the execution of application requests while preserving the separation of responsibilities between architectural layers.

By remaining focused on orchestration, controllers contribute to a backend architecture that is predictable, maintainable, reduces coupling and remains easy to evolve.

---

## Key Takeaways

- Controllers coordinate request execution.
- Controllers do not contain business logic.
- Business operations are delegated to Services.
- Controllers remain lightweight and focused.
- Clear orchestration improves maintainability.

---

## Related Chapters

### Previous

- Routing

### Next

- Form Requests

---

## Revision History

| Version | Date | Description |
|----------|------|-------------|
| 1.0.0 | July 2026 | Initial version |