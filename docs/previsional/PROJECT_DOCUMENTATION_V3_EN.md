# Olimpia Club House - Project Architecture (Version 3)

> Questa versione evolve integralmente la documentazione precedente
> mantenendone la filosofia architetturale e aggiornandola con tutte le
> funzionalità sviluppate fino all'attuale milestone.

## Novità della Version 3

Questa versione introduce e documenta:

-   CRUD foundation per la gestione utenti (Admin).
-   Architettura Role + Permission con middleware dedicato.
-   Area Management.
-   Request Validation dedicate.
-   PasswordGenerator centralizzato.
-   Configurazione `management.php`.
-   Evoluzione del modello User.
-   Nuovi campi anagrafici.
-   Email opzionale per utenti creati dall'amministratore.
-   Componenti Blade riutilizzabili (`x-forms.phone`).
-   Infrastruttura JavaScript modulare (`phone-input`,
    `prevent-double-submit`).
-   Prime fondamenta del Design System.
-   Decisioni architetturali documentate.

------------------------------------------------------------------------

# 1. Project Vision

Olimpia Club House è progettato come piattaforma gestionale modulare per
palestre e centri sportivi.

L'obiettivo non è soltanto implementare funzionalità, ma costruire un
ecosistema facilmente estendibile mediante: - Domain Driven
Organization - Service Layer - Component Based UI - Modular CSS -
Modular JavaScript - Blade Components - Request Validation - Permission
Layer

------------------------------------------------------------------------

# 2. Architectural Evolution

L'architettura rimane organizzata in:

-   Public Area
-   Dashboard
-   Management
-   Trainer Area
-   Customer Area

La nuova **Management Area** costituisce il pannello operativo
dell'amministratore.

------------------------------------------------------------------------

# 3. Users Management

È stata introdotta la prima CRUD amministrativa.

Attualmente comprende:

-   Index
-   Show
-   Create

L'architettura è già predisposta per:

-   Edit
-   Delete
-   Restore (future)
-   Soft Deletes (future)

------------------------------------------------------------------------

# 4. User Domain Evolution

Il modello User è stato esteso con:

-   codice fiscale
-   data nascita
-   genere
-   nazione
-   provincia
-   città
-   CAP
-   indirizzo
-   numero civico
-   telefono internazionale
-   obiettivo
-   stato
-   ruolo

Sono stati aggiunti helper dedicati:

-   hasPermission()
-   hasAnyPermission()
-   hasAllPermissions()
-   canBookLesson()
-   canAccessGym()
-   hasActiveSubscription()
-   hasActiveInsurance()

------------------------------------------------------------------------

# 5. Permission Architecture

L'autorizzazione non dipende più esclusivamente dal ruolo.

È stata introdotta una struttura:

Role ↓ Permissions ↓ Middleware ↓ Route

Questo permette autorizzazioni granulari e facilmente estendibili.

------------------------------------------------------------------------

# 6. Validation Layer

Ogni CRUD utilizza FormRequest dedicate.

Prima implementazione:

StoreUserRequest

Responsabilità:

-   normalizzazione input
-   validazione
-   sanitizzazione
-   preparazione dati

Le normalizzazioni vengono eseguite tramite prepareForValidation().

------------------------------------------------------------------------

# 7. Password Architecture

È stato introdotto PasswordGenerator.

Responsabilità:

-   generazione password casuali
-   password di default configurabile
-   hashing centralizzato

Configurazione:

config/management.php

------------------------------------------------------------------------

# 8. Form Components

Primo componente condiviso:

x-forms.phone

Obiettivi:

-   riuso
-   separazione logica/presentazione
-   compatibilità dashboard e sito pubblico

------------------------------------------------------------------------

# 9. JavaScript Modules

Nuova organizzazione:

resources/js/forms/

Moduli:

-   phone-input.js
-   prevent-double-submit.js

Ogni comportamento è isolato in un modulo dedicato.

------------------------------------------------------------------------

# 10. CSS Evolution

Sono stati aggiunti stylesheet dedicati:

-   management.css
-   breadcrumb.css
-   phone-input.css

L'obiettivo è la separazione per responsabilità.

------------------------------------------------------------------------

# 11. Design System (Introduzione)

Il progetto evolve verso un Design System proprietario.

Componenti previsti:

buttons/ forms/ cards/ badges/ tables/ alerts/ modals/

Le varianti saranno gestite tramite proprietà (`variant`) anziché
componenti duplicati.

------------------------------------------------------------------------

# 12. Architecture Decisions

Decisioni adottate:

-   Controller estremamente leggeri.
-   Business Logic nei Service.
-   Validazione nelle FormRequest.
-   Componenti Blade riutilizzabili.
-   JavaScript modulare.
-   CSS modulare.
-   Password centralizzate.
-   Middleware dedicati ai permessi.
-   Design System progressivo.

------------------------------------------------------------------------

# 13. Updated Roadmap

## Milestone 5 (in corso)

-   completamento CRUD Users
-   componenti Blade condivisi
-   Design System
-   refactoring CSS/JS
-   upload avatar
-   gestione obiettivi dinamici

## Milestone 6

Trainer CRUD

## Milestone 7

Customer Dashboard

## Milestone 8

Payments

## Milestone 9

Notifications

## Milestone 10

UI & Design System completo

------------------------------------------------------------------------

Questa Version 3 sostituisce integralmente la precedente e costituisce
il nuovo riferimento architetturale del progetto.
