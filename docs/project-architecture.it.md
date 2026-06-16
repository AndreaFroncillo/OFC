# Olimpia Club House - Architettura del Progetto

## Stato attuale

Il progetto è strutturato come gestionale per palestra con separazione tra:

* sito pubblico
* area dashboard
* area admin
* area trainer
* area customer

## Ruoli principali

* admin
* trainer
* customer

## Dashboard

È presente un unico DashboardController che reindirizza l'utente alla dashboard corretta in base al ruolo.

Le viste sono separate:

* resources/views/dashboard/admin/admin.blade.php
* resources/views/dashboard/trainer/trainer.blade.php
* resources/views/dashboard/customer/customer.blade.php

## Layout

È presente un layout unico:

* resources/views/components/layout.blade.php

Il layout supporta la modalità dashboard tramite la prop:

* dashboard

Quando dashboard è true, viene caricata la sidebar corrispondente al ruolo autenticato.

## Sidebar

Sono state create sidebar role-based:

* Admin Sidebar
* Trainer Sidebar
* Customer Sidebar

Le sidebar utilizzano:

* resources/js/dashboard-sidebar.js
* resources/css/dashboard-sidebar.css

Funzionalità:

* apertura/chiusura tramite pulsante
* apertura temporanea su hover
* dropdown interni
* supporto mobile
* overlay mobile
* lingua in dropdown
* profilo utente in footer sidebar
* delay hover per evitare aperture involontarie

## Widget Architecture

Per le dashboard è stata introdotta una struttura dedicata.

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

## Namespace Blade

Registrati tramite:

* app/Providers/AppServiceProvider.php

Namespace disponibili:

* admin
* trainer
* customer

per:

* Components
* Widgets
* Partials

## Dashboard Admin

È stata avviata la nuova Dashboard Admin.

### Header Dashboard

Comprende:

* saluto personalizzato
* descrizione dashboard
* collegamento rapido al sito pubblico

### Stats Cards

Widget statistico iniziale composto da:

* utenti totali
* clienti attivi
* trainer
* lezioni programmate
* prenotazioni
* incassi mensili

Attualmente i dati sono statici e fungeranno da placeholder fino all'integrazione con il database.

## CSS

Il CSS è stato modularizzato.

File attualmente presenti:

* variables.css
* utilities.css
* navbar.css
* public.css
* forms.css
* footer.css
* dashboard-sidebar.css
* dashboard-widgets.css

Il file style.css viene mantenuto temporaneamente come riferimento durante la migrazione.

## Responsive Mobile Navigation

La sidebar supporta la navigazione mobile.

Funzionalità:

* sidebar nascosta di default
* apertura tramite pulsante mobile
* overlay di chiusura
* chiusura tramite click esterno
* supporto responsive fino a 991px

## Milestones

* refactor: build dashboard architecture and role-based sidebar navigation
* feat: add admin dashboard widgets and mobile sidebar support

## Convenzioni Git

Ogni milestone viene salvata tramite commit semantici.

Tipologie utilizzate:

* feat:
* fix:
* refactor:
* docs:

Documentazione e codice devono rimanere sincronizzati ad ogni milestone significativa.
