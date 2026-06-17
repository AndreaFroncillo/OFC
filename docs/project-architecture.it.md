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

## Dashboard Service Layer

Per evitare l'accumulo di logica all'interno del DashboardController è stato introdotto un livello dedicato ai servizi dashboard.

Servizi attualmente presenti:

* App\Services\Dashboard\AdminDashboardService

Responsabilità:

* recupero dati dashboard
* preparazione dati per i widget
* trasformazione dei model in dati pronti per la view
* centralizzazione della logica dashboard

Obiettivo:

* mantenere i controller leggeri
* migliorare la manutenibilità
* favorire la crescita futura della dashboard

---

## Dashboard Data Mapping Layer

La preparazione dei dati destinati ai widget viene effettuata tramite Collection Mapping.

Esempio:

Lesson Model

↓

Dashboard Mapping

↓

Array pronto per Blade

Il mapping si occupa di:

* formattazione date
* formattazione orari
* calcolo percentuali
* badge dinamici
* informazioni trainer
* occupazione lezioni

Le Blade ricevono esclusivamente dati già pronti alla visualizzazione.

---

## Layout

È presente un layout unico:

* resources/views/components/layout.blade.php

Props principali:

* dashboard
* fullHeight
* hideSubscription

Quando dashboard è true viene caricata automaticamente la sidebar del ruolo autenticato.

---

## Sidebar

Sono presenti sidebar dedicate per:

* Admin
* Trainer
* Customer

Funzionalità:

* apertura/chiusura
* apertura hover
* apertura persistente
* dropdown
* supporto mobile
* overlay
* chiusura tramite ESC
* selettore lingua
* profilo utente

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

## Dashboard Admin

### Header Dashboard

Comprende:

* saluto personalizzato
* descrizione dashboard
* collegamento rapido al sito pubblico

---

### Stats Cards

Widget KPI iniziale.

Comprende:

* utenti
* clienti attivi
* trainer
* lezioni
* prenotazioni
* incassi

Attualmente utilizza dati placeholder.

---

### Quick Actions

Widget per le operazioni rapide amministrative.

Obiettivi:

* ridurre il numero di click
* centralizzare le operazioni più frequenti

---

### Latest Users

Widget dedicato agli ultimi iscritti.

Informazioni mostrate:

* nome
* assicurazione
* abbonamento
* stato generale

Logica assicurazione:

* Verde → oltre 60 giorni
* Giallo → entro 60 giorni
* Rosso → assente o scaduta

Logica abbonamento:

* Verde → attivo
* Giallo → in scadenza
* Rosso → assente, scaduto o cancellato

L'assicurazione rappresenta sempre il controllo prioritario.

---

### Next Lessons

Nuovo widget dedicato alle prossime lezioni programmate.

File:

* resources/views/dashboard/admin/widgets/next-lessons.blade.php

Dati visualizzati:

* data lezione
* orario
* trainer
* prenotazioni
* stato occupazione

Funzionalità:

* recupero automatico delle prossime 5 lezioni
* esclusione delle lezioni già iniziate
* ordinamento cronologico
* caricamento relazioni trainer e prenotazioni
* badge dinamici
* barra occupazione posti
* supporto localizzazione

Stati:

* Disponibile
* Quasi piena
* Completa

---

## Lesson Recurrence Architecture

### LessonTemplate

Tabella:

* lesson_templates

Rappresenta le regole ricorrenti delle lezioni.

Contiene:

* trainer
* giorno settimana
* orario
* prezzo
* capienza
* prenotabilità

Model:

* App\Models\Lesson\LessonTemplate

---

### Lesson

Tabella:

* lessons

Rappresenta la singola lezione reale.

Può essere:

* modificata
* spostata
* annullata

senza alterare il template.

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

### Generazione Automatica

Comando:

```bash
php artisan gym:generate-lessons
```

Supporta:

```bash
php artisan gym:generate-lessons --weeks=8
```

Funzionalità:

* generazione multi-settimana
* aggiornamento lezioni esistenti
* prevenzione duplicati
* esclusione lezioni passate

---

### Scheduler

Laravel Scheduler esegue automaticamente:

```bash
php artisan gym:generate-lessons
```

Configurazione attuale:

* ogni lunedì alle 02:00

---

## Timezone Management

Il progetto utilizza:

```env
APP_TIMEZONE=Europe/Rome
```

Configurazione:

```php
'timezone' => env('APP_TIMEZONE', 'UTC')
```

Motivazione:

Tutta la logica della palestra dipende dal fuso orario locale:

* lezioni future
* lezioni passate
* prenotazioni
* assicurazioni
* abbonamenti
* scheduler

---

## Localizzazione

Sono stati introdotti file lingua dedicati ai widget lezioni:

* lang/it/lesson.php
* lang/en/lesson.php

Supportano:

* badge lezioni
* stati occupazione
* prenotazioni
* etichette widget

---

## CSS

Moduli principali:

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

Tipologie utilizzate:

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

## Roadmap Immediata

Dashboard Admin:

* KPI reali da database
* grafici dashboard
* attività recenti
* scadenze assicurazioni
* scadenze abbonamenti
* gestione utenti

Successivamente:

* Dashboard Trainer
* Dashboard Customer
* traduzione contenuti gestionali
* prenotazioni avanzate
* pagamenti
* gestione ingressi
