# Olimpia Club House - Project Architecture

## Stato attuale

Il progetto è strutturato come gestionale per palestra con separazione tra:

- sito pubblico
- area dashboard
- area admin
- area trainer
- area customer

## Ruoli principali

- admin
- trainer
- customer

## Dashboard

È presente un unico DashboardController che reindirizza l'utente alla dashboard corretta in base al ruolo.

Le viste sono separate:

- resources/views/dashboard/admin/admin.blade.php
- resources/views/dashboard/trainer/trainer.blade.php
- resources/views/dashboard/customer/customer.blade.php

## Layout

È presente un layout unico:

- resources/views/components/layout.blade.php

Il layout supporta la modalità dashboard tramite la prop:

- dashboard

Quando dashboard è true, viene caricata la sidebar corrispondente al ruolo autenticato.

## Sidebar

Sono state create sidebar role-based:

- Admin Sidebar
- Trainer Sidebar
- Customer Sidebar

Le sidebar usano:

- resources/js/dashboard-sidebar.js
- resources/css/dashboard-sidebar.css

Funzionalità:

- apertura/chiusura con freccia
- apertura temporanea su hover
- dropdown interni
- supporto mobile
- lingua in dropdown
- profilo utente in footer sidebar

## CSS

Il CSS è stato modularizzato:

- variables.css
- utilities.css
- navbar.css
- public.css
- forms.css
- footer.css
- dashboard-sidebar.css
- dashboard-widgets.css

Il vecchio style.css è mantenuto come backup temporaneo.

## Ultimo commit significativo

refactor: build dashboard architecture and role-based sidebar navigation