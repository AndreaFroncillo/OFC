# Olimpia Club House - Architettura del Progetto

## 1. Project Overview

Olimpia Club House è una piattaforma gestionale per palestre e centri sportivi sviluppata con Laravel.

L'obiettivo del progetto è costruire un ecosistema completo per la gestione di:

- utenti
- ruoli
- trainer
- clienti
- lezioni
- prenotazioni
- abbonamenti
- assicurazioni sportive
- pagamenti di iscrizione
- servizi aggiuntivi
- ingressi singoli
- pacchetti ingressi
- dashboard gestionali
- KPI amministrativi
- revenue analytics

L'architettura è progettata per essere modulare, estendibile e mantenibile nel tempo.

---

## 2. Application Areas

L'applicazione è suddivisa in aree distinte:

- sito pubblico
- dashboard
- area amministrativa
- area trainer
- area customer

Questa separazione permette di mantenere indipendenti:

- navigazione pubblica
- business logic
- autorizzazioni
- interfacce dedicate ai ruoli
- dashboard operative

---

## 3. Role Architecture

Il sistema supporta tre ruoli principali:

- admin
- trainer
- customer

Ogni utente appartiene ad un ruolo tramite:

```text
users.role_id
```

Helper disponibili sul model User:

```php
$user->isAdmin();
$user->isTrainer();
$user->isCustomer();
```

Questi helper permettono al sistema di instradare l'utente verso la dashboard corretta e di mostrare interfacce coerenti con il ruolo autenticato.

---

## 4. Domain Architecture

Il dominio applicativo è composto da più entità principali.

### User

Rappresenta l'utente registrato nel sistema.

Può essere:

- amministratore
- trainer
- cliente

È collegato a:

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

Rappresenta il ruolo applicativo dell'utente.

Ruoli principali:

- admin
- trainer
- customer

Il ruolo viene utilizzato per:

- routing dashboard
- visualizzazione sidebar
- autorizzazioni future
- personalizzazione interfaccia

---

### Trainer

Rappresenta il professionista che tiene lezioni o servizi.

È collegato a:

- User
- Lesson
- LessonTemplate
- ServiceBooking

---

### LessonTemplate

Rappresenta la regola ricorrente di una lezione.

Esempio:

```text
Pilates
ogni venerdì
19:30 - 20:30
```

Contiene:

- trainer
- giorno della settimana
- orario
- prezzo
- capienza
- prenotabilità
- stato attivo

---

### Lesson

Rappresenta una lezione reale presente nel calendario.

Può essere:

- modificata
- annullata
- spostata
- completata

senza modificare il template ricorrente da cui deriva.

---

### Booking

Rappresenta una prenotazione ad una lezione.

Può essere:

- pending
- confirmed
- cancelled
- completed

Può essere collegata ad un abbonamento oppure essere pagata singolarmente.

---

### SubscriptionPlan

Rappresenta un piano di abbonamento acquistabile.

Contiene le regole commerciali del piano.

---

### Subscription

Rappresenta un abbonamento acquistato da un utente.

Può essere:

- pending
- active
- cancelled
- expired

È collegato a:

- User
- SubscriptionPlan
- Booking

---

### InsurancePolicy

Rappresenta l'assicurazione sportiva dell'utente.

Può essere:

- pending
- active
- expired
- cancelled

È fondamentale per stabilire se un cliente può accedere a determinate attività.

---

### RegistrationPayment

Rappresenta il pagamento dell'iscrizione.

È collegato all'attivazione dell'utente.

---

### Service

Rappresenta un servizio extra della palestra.

Esempi:

- personal training
- nutrizione
- massaggi
- riabilitazione
- analisi composizione corporea

---

### ServiceBooking

Rappresenta una prenotazione ad un servizio.

Gestisce:

- data
- orario
- trainer opzionale
- prezzo
- stato prenotazione
- stato pagamento

---

### EntryPackage

Rappresenta un pacchetto ingressi.

Esempio:

```text
10 ingressi
100 euro
```

Tiene traccia di:

- ingressi totali
- ingressi residui
- validità
- pagamento
- stato attivo

---

## 5. Dashboard Routing

La navigazione dashboard è centralizzata in:

```php
App\Http\Controllers\Dashboard\DashboardController
```

Il controller determina il ruolo dell'utente autenticato e carica la dashboard corrispondente.

Dashboard disponibili:

```text
resources/views/dashboard/admin/admin.blade.php
resources/views/dashboard/trainer/trainer.blade.php
resources/views/dashboard/customer/customer.blade.php
```

Il controller è stato mantenuto volutamente leggero.

La logica operativa della dashboard è stata spostata nel Service Layer.

---

## 6. Dashboard Service Layer

Per evitare controller troppo complessi è stato introdotto un Service Layer dedicato.

Servizio attuale:

```php
App\Services\Dashboard\AdminDashboardService
```

Responsabilità:

- recupero KPI
- aggregazione dati
- revenue analytics
- calcolo trend
- recupero prossime lezioni
- trasformazione dati per Blade
- preparazione widget
- formattazione valori

Obiettivi:

- controller leggeri
- separazione responsabilità
- migliore manutenibilità
- futura testabilità
- riduzione logica nelle Blade

---

## 7. Dashboard Data Mapping Layer

Le Blade non ricevono model grezzi.

Il flusso dati è:

```text
Model
↓
Dashboard Service
↓
Mapping
↓
Array Blade-ready
↓
View
```

Il mapping gestisce:

- formattazione date
- formattazione orari
- localizzazione
- badge dinamici
- progress bar
- occupazione lezioni
- dati trainer
- trend KPI
- valori formattati

Le view restano focalizzate sulla presentazione.

---

## 8. Layout Architecture

Layout principale:

```text
resources/views/components/layout.blade.php
```

Props supportate:

```text
dashboard
fullHeight
hideSubscription
```

Quando `dashboard` è true viene caricata la sidebar relativa al ruolo autenticato.

---

## 9. Sidebar Architecture

File principali:

```text
resources/css/dashboard-sidebar.css
resources/js/dashboard-sidebar.js
```

Funzionalità:

- apertura persistente
- apertura hover desktop
- chiusura forzata
- dropdown interni
- overlay mobile
- responsive navigation
- chiusura tramite ESC
- chiusura su resize
- selettore lingua

La sidebar è dedicata principalmente alla navigazione.

Il profilo utente è stato spostato nella topbar per mantenere la sidebar più pulita.

---

## 10. Dashboard Topbar Architecture

La dashboard admin utilizza una topbar dedicata.

File principali:

```text
resources/css/dashboard-topbar.css
resources/js/dashboard-topbar.js
```

La topbar è integrata in:

```text
resources/views/dashboard/admin/admin.blade.php
```

Funzionalità:

- saluto utente
- avatar
- nome utente
- ruolo corrente
- accesso rapido al sito pubblico
- pulsante notifiche placeholder
- menu profilo
- responsive layout

---

### Profile Menu

Il menu profilo è click-based.

Supporta:

- apertura tramite click
- chiusura tramite click esterno
- chiusura tramite ESC
- aggiornamento `aria-expanded`
- compatibilità desktop/mobile

La logica è separata in:

```text
resources/js/dashboard-topbar.js
```

---

### Notifications Placeholder

La topbar include un pulsante notifiche.

Il badge rosso non viene mostrato staticamente.

Sarà visualizzato solo quando esisteranno notifiche non lette.

Funzionalità future:

- notifiche non lette
- segna come letto
- archiviazione
- cancellazione
- collegamento ad eventi amministrativi

---

## 11. Widget Architecture

Ogni dashboard dispone di una struttura modulare.

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

Obiettivo:

aggiungere widget senza modificare il layout principale.

---

## 12. Admin Dashboard

La Dashboard Admin è il centro operativo della piattaforma.

Struttura attuale:

```text
Topbar
↓
Stats Cards
↓
Dashboard Widgets
```

---

### Stats Cards

Widget KPI principale.

Metriche attuali:

- utenti registrati
- clienti attivi
- trainer
- lezioni programmate
- prenotazioni giornaliere
- incasso mensile

Le statistiche vengono recuperate dal database tramite:

```php
App\Services\Dashboard\AdminDashboardService
```

Ogni card supporta:

- icona
- valore
- descrizione
- trend
- classe dinamica
- link futuro
- responsive layout

---

### Users KPI

Mostra il totale degli utenti registrati.

Include:

- customer attivi
- customer inattivi
- utenti registrati senza abbonamento

Esclude:

- admin
- trainer

La logica non dipende dall'id del ruolo, ma dallo slug del ruolo.

---

### Active Members KPI

Mostra i clienti attivi.

Requisiti:

- ruolo customer
- status active

---

### Trainers KPI

Mostra il numero totale di trainer.

---

### Scheduled Lessons KPI

Mostra il numero di lezioni future programmate.

Include:

- lezioni scheduled
- lezioni future

Esclude:

- lezioni passate
- lezioni cancellate

---

### Daily Bookings KPI

Mostra le prenotazioni create oggi.

Supporta:

- confronto con ieri
- trend percentuale
- trend positivo
- trend neutro
- trend negativo
- gestione divisione per zero

---

### Monthly Revenue KPI

Mostra gli incassi del mese corrente.

Include:

- RegistrationPayment
- Subscription
- Booking pagate singolarmente
- ServiceBooking paid
- EntryPackage paid
- InsurancePolicy standalone

Esclude:

- assicurazioni incluse nelle iscrizioni
- assicurazioni incluse negli abbonamenti

per evitare doppi conteggi.

Supporta:

- confronto con mese precedente
- trend percentuale
- mesi senza dati
- valori negativi

---

## 13. Quick Actions Widget

Widget per azioni rapide amministrative.

Obiettivi:

- ridurre click
- velocizzare workflow admin
- centralizzare le operazioni frequenti

---

## 14. Latest Users Widget

Widget dedicato agli ultimi iscritti.

Mostra:

- nome
- stato assicurazione
- stato abbonamento
- stato generale

Logica assicurazione:

- verde: oltre 60 giorni
- giallo: entro 60 giorni
- rosso: assente o scaduta

Logica abbonamento:

- verde: attivo
- giallo: in scadenza
- rosso: assente, scaduto o cancellato

---

## 15. Next Lessons Widget

File:

```text
resources/views/dashboard/admin/widgets/next-lessons.blade.php
```

Mostra:

- data
- orario
- trainer
- prenotazioni
- stato occupazione

Funzionalità:

- prossime 5 lezioni
- esclusione lezioni già iniziate
- ordinamento cronologico
- eager loading trainer
- eager loading bookings
- badge dinamici
- progress bar
- localizzazione

Stati:

- Disponibile
- Quasi piena
- Completa

---

## 16. KPI Engine

I KPI sono generati nel Service Layer.

Responsabilità:

- query aggregate
- calcolo trend
- formattazione valori
- classi CSS dinamiche
- struttura dati per Blade

Metodi principali:

- recupero utenti
- recupero clienti attivi
- recupero trainer
- recupero lezioni future
- recupero prenotazioni giornaliere
- recupero revenue mensile
- calcolo trend

---

## 17. Revenue Engine

Il sistema revenue aggrega più sorgenti economiche.

### Revenue Sources

- RegistrationPayment
- Subscription
- Booking
- ServiceBooking
- EntryPackage
- InsurancePolicy standalone

### Payment Source

Campo:

```text
insurance_policies.payment_source
```

Valori:

```text
standalone
registration
subscription
entry_package
booking
service_booking
```

Scopo:

distinguere l'origine economica dell'assicurazione.

---

### Double Counting Prevention

Le assicurazioni incluse in iscrizioni o abbonamenti non vengono sommate come incasso separato.

Solo `standalone` viene conteggiato separatamente.

Questo evita duplicazioni contabili.

---

## 18. Lesson Recurrence Architecture

La programmazione ricorrente delle lezioni è basata su template.

```text
LessonTemplate
↓
Lesson
↓
Booking
```

---

### LessonTemplate

Tabella:

```text
lesson_templates
```

Rappresenta la regola ricorrente.

Contiene:

- trainer
- giorno settimana
- orario
- prezzo
- capienza
- prenotabilità
- stato attivo

---

### Lesson

Tabella:

```text
lessons
```

Rappresenta una singola occorrenza reale.

Può essere modificata senza alterare il template.

---

## 19. Automatic Lesson Generation

Comando:

```bash
php artisan gym:generate-lessons
```

Opzioni:

```bash
php artisan gym:generate-lessons --weeks=8
```

Funzionalità:

- generazione multi-settimana
- prevenzione duplicati
- aggiornamento lezioni esistenti
- esclusione lezioni passate

---

## 20. Scheduler

Laravel Scheduler esegue:

```bash
php artisan gym:generate-lessons
```

Configurazione:

```text
ogni lunedì alle 02:00
```

Obiettivo:

mantenere sempre disponibili lezioni future prenotabili.

---

## 21. Timezone Management

Configurazione:

```env
APP_TIMEZONE=Europe/Rome
```

Nel config:

```php
'timezone' => env('APP_TIMEZONE', 'UTC')
```

Motivazione:

la logica della palestra dipende dal fuso orario locale.

Coinvolge:

- lezioni
- prenotazioni
- abbonamenti
- assicurazioni
- scheduler
- KPI giornalieri

---

## 22. Localization

Lingue supportate:

- Italiano
- Inglese

File principali:

```text
lang/it/lesson.php
lang/en/lesson.php
lang/it/kpi.php
lang/en/kpi.php
```

Supportano:

- KPI
- widget dashboard
- badge lezioni
- stati occupazione
- trend
- etichette statistiche

---

## 23. CSS Architecture

File principali:

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

Obiettivi:

- separazione responsabilità
- riduzione regressioni
- manutenzione semplificata
- CSS modulare
- scalabilità futura

---

## 24. JavaScript Architecture

File dashboard:

```text
resources/js/dashboard-sidebar.js
resources/js/dashboard-topbar.js
```

### dashboard-sidebar.js

Gestisce:

- sidebar desktop
- sidebar mobile
- hover expand
- pinned mode
- overlay
- dropdown
- ESC close
- resize handling

### dashboard-topbar.js

Gestisce:

- menu profilo
- apertura click
- chiusura click esterno
- ESC close
- aria-expanded

---

## 25. Development Conventions

Commit semantici:

```text
feat:
fix:
refactor:
docs:
```

Principi:

- controller leggeri
- service layer per logica business
- blade presentation-only
- CSS modulare
- JS per componente
- documentazione sincronizzata al codice

---

## 26. Completed Milestones

### Milestone 1

Dashboard architecture e sidebar role-based.

### Milestone 2

Admin dashboard widgets e mobile sidebar support.

### Milestone 3

Recurring lesson architecture.

### Milestone 4 — Admin Dashboard Completion

Completato:

- AdminDashboardService
- KPI reali
- Revenue Engine
- Revenue Trend
- Payment Source Architecture
- Next Lessons Widget
- Stats Cards dinamiche
- Dashboard Topbar
- Profile dropdown
- CSS modularization
- JS modularization
- Responsive dashboard

---

## 27. Roadmap

### Milestone 5 — Dashboard Insights & Monitoring

- attività recenti
- scadenze assicurazioni
- scadenze abbonamenti
- notifiche dashboard
- alert amministrativi
- revenue chart
- bookings chart

### Milestone 6 — Trainer Dashboard

- KPI trainer
- lezioni assegnate
- prenotazioni ricevute
- disponibilità
- calendario trainer

### Milestone 7 — Customer Dashboard

- stato abbonamento
- stato assicurazione
- prenotazioni future
- storico attività
- pacchetti ingressi

### Milestone 8 — Payments

- pagamenti online
- checkout
- gateway provider
- ricevute
- gestione rinnovi

### Milestone 9 — Notifications

- notifiche reali
- notifiche lette/non lette
- archiviazione
- cancellazione
- centro notifiche

### Milestone 10 — UI System Evolution

- dark mode
- design tokens
- refactor variabili CSS
- componenti condivisi
- responsive polish
