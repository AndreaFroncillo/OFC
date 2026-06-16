# Olimpia Club House - Architettura del Progetto

## Stato attuale

Il progetto è strutturato come gestionale per palestra con separazione tra:

* sito pubblico
* area dashboard
* area admin
* area trainer
* area customer

---

## Ruoli principali

Sono presenti tre ruoli principali:

* admin
* trainer
* customer

Ogni utente appartiene ad un ruolo tramite:

* users.role_id

Metodi helper disponibili:

* isAdmin()
* isTrainer()
* isCustomer()

---

## Dashboard

È presente un unico DashboardController che reindirizza l'utente alla dashboard corretta in base al ruolo.

Le viste sono separate:

* resources/views/dashboard/admin/admin.blade.php
* resources/views/dashboard/trainer/trainer.blade.php
* resources/views/dashboard/customer/customer.blade.php

---

## Layout

È presente un layout unico:

* resources/views/components/layout.blade.php

Il layout supporta la modalità dashboard tramite la prop:

* dashboard

Quando dashboard è true, viene caricata la sidebar corrispondente al ruolo autenticato.

Props principali:

* dashboard
* fullHeight
* hideSubscription

---

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
* apertura persistente tramite toggle
* dropdown interni
* supporto mobile
* overlay mobile
* chiusura tramite click esterno
* chiusura tramite ESC
* lingua in dropdown
* profilo utente in footer sidebar
* delay hover per evitare aperture involontarie

---

## Responsive Mobile Navigation

La sidebar supporta la navigazione mobile.

Funzionalità:

* sidebar nascosta di default
* apertura tramite pulsante mobile
* overlay di chiusura
* click esterno per chiusura
* supporto responsive fino a 991px

---

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

---

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

---

## Dashboard Admin

È stata avviata la nuova Dashboard Admin.

### Header Dashboard

Comprende:

* saluto personalizzato
* descrizione dashboard
* collegamento rapido al sito pubblico

---

### Stats Cards

Widget statistico iniziale composto da:

* utenti totali
* clienti attivi
* trainer
* lezioni programmate
* prenotazioni
* incassi mensili

Attualmente i dati sono statici e fungeranno da placeholder fino all'integrazione con il database.

File:

* resources/views/dashboard/admin/widgets/stats-cards.blade.php

---

### Quick Actions

Widget dedicato alle azioni rapide amministrative.

File:

* resources/views/dashboard/admin/widgets/quick-actions.blade.php

Obiettivi:

* accesso rapido alle principali sezioni gestionali
* riduzione del numero di click
* centralizzazione delle operazioni più frequenti

Attualmente i collegamenti fungono da placeholder fino all'implementazione delle relative pagine.

---

### Latest Users

Widget dedicato agli ultimi utenti iscritti.

File:

* resources/views/dashboard/admin/widgets/latest-users.blade.php

Obiettivi:

* monitoraggio rapido dei nuovi iscritti
* controllo dello stato assicurativo
* controllo dello stato abbonamento
* individuazione immediata delle criticità

Logica prevista:

#### Assicurazione

* Verde → scadenza superiore a 60 giorni
* Giallo → scadenza entro 60 giorni
* Rosso → assicurazione assente o scaduta

#### Abbonamento

* Verde → attivo
* Giallo → vicino alla scadenza
* Rosso → assente, scaduto o cancellato

L'assicurazione rappresenta il controllo prioritario.

---

## Lesson Recurrence Architecture

Per supportare la programmazione ricorrente delle lezioni è stata introdotta una nuova architettura.

### LessonTemplate

La tabella:

* lesson_templates

rappresenta le regole ricorrenti delle lezioni.

Esempio:

* Pilates
* Ogni venerdì
* 19:30 - 20:30

Contiene:

* trainer
* giorno della settimana
* orario
* prezzo
* capienza
* regole di prenotazione

Model:

* App\Models\Lesson\LessonTemplate

---

### Lesson

La tabella:

* lessons

continua a rappresentare la singola lezione reale presente nel calendario.

Ogni lezione può essere:

* modificata
* annullata
* spostata

senza alterare il template di origine.

Model:

* App\Models\Lesson\Lesson

---

### Relazioni

LessonTemplate

↓

Lesson

↓

Booking

---

### Generazione Automatica Lezioni

È stato introdotto il comando:

```bash
php artisan gym:generate-lessons
```

Opzioni:

```bash
php artisan gym:generate-lessons --weeks=8
```

Funzionalità:

* genera lezioni future partendo dai template attivi
* evita duplicazioni
* aggiorna lezioni già esistenti
* ignora lezioni già passate
* supporta generazione multi-settimana

---

### Scheduler

La generazione automatica è gestita tramite Laravel Scheduler.

Configurazione attuale:

* ogni lunedì alle 02:00

Obiettivo:

* mantenere sempre disponibili le settimane future prenotabili

---

### Seeder

#### LessonTemplateSeeder

Nuovo seeder responsabile della generazione delle regole ricorrenti.

Genera:

* lesson_templates

#### LessonSeeder

Mantenuto come Legacy Seeder.

Motivazione:

* riferimento storico
* supporto alla migrazione dell'architettura

Non viene più richiamato dal DatabaseSeeder.

---

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

---

## Convenzioni Git

Ogni milestone viene salvata tramite commit semantici.

Tipologie utilizzate:

* feat:
* fix:
* refactor:
* docs:

Documentazione e codice devono rimanere sincronizzati ad ogni milestone significativa.

---

## Milestones

* refactor: build dashboard architecture and role-based sidebar navigation
* feat: add admin dashboard widgets and mobile sidebar support
* feat: implement admin dashboard widgets and recurring lesson architecture

---

## Roadmap Immediata

Dashboard Admin:

* Next Lessons Widget
* KPI reali da database
* grafici dashboard
* gestione utenti iscritti
* gestione rinnovi
* gestione assicurazioni

Successivamente:

* Dashboard Trainer
* Dashboard Customer
* Sistema prenotazioni avanzato
* Pagamenti
* Abbonamenti
* Gestione ingressi