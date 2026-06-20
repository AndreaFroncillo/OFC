# Olimpia Club House - Architettura del Progetto

## Panoramica

Olimpia Club House è una piattaforma gestionale per palestre e centri sportivi sviluppata con Laravel.

L'obiettivo del progetto è fornire un ecosistema completo per la gestione di:

* utenti
* trainer
* lezioni
* prenotazioni
* abbonamenti
* assicurazioni sportive
* servizi aggiuntivi
* ingressi singoli
* pacchetti ingressi
* dashboard gestionali

L'architettura è progettata per essere modulare, estendibile e facilmente manutenibile.

---

# Struttura dell'Applicazione

L'applicazione è suddivisa in cinque aree principali:

* sito pubblico
* dashboard
* area amministrativa
* area trainer
* area customer

Questa separazione permette di mantenere indipendenti:

* navigazione pubblica
* logiche gestionali
* autorizzazioni
* interfacce dedicate ai diversi ruoli

---

# Ruoli

Attualmente il sistema supporta tre ruoli principali:

* admin
* trainer
* customer

Ogni utente appartiene ad un ruolo tramite:

```text
users.role_id
```

Helper disponibili:

```php
$user->isAdmin();

$user->isTrainer();

$user->isCustomer();
```

---

# Dashboard Routing

La navigazione dashboard è centralizzata nel controller:

```php
App\Http\Controllers\Dashboard\DashboardController
```

Il controller determina automaticamente il ruolo dell'utente autenticato e carica la dashboard corretta.

Dashboard disponibili:

```text
resources/views/dashboard/admin/admin.blade.php

resources/views/dashboard/trainer/trainer.blade.php

resources/views/dashboard/customer/customer.blade.php
```

---

# Dashboard Architecture

Per evitare controller troppo complessi è stato introdotto un Service Layer dedicato.

Attualmente è presente:

```php
App\Services\Dashboard\AdminDashboardService
```

Responsabilità:

* recupero dati dashboard
* generazione KPI
* revenue analytics
* recupero lezioni future
* trasformazione dati
* preparazione widget
* calcolo trend

Obiettivi:

* controller leggeri
* separazione delle responsabilità
* manutenzione semplificata
* futura copertura tramite test

---

# Dashboard Data Mapping Layer

Le Blade non ricevono direttamente i model.

La trasformazione avviene tramite Collection Mapping.

Flusso:

```text
Model
↓
Dashboard Service
↓
Mapping
↓
Array Blade Ready
↓
View
```

Il mapping gestisce:

* formattazione date
* formattazione orari
* localizzazione
* badge dinamici
* progress bar
* occupazione lezioni
* dati trainer
* trend KPI

Le view ricevono esclusivamente dati pronti per la presentazione.

---

# Layout

Layout principale:

```text
resources/views/components/layout.blade.php
```

Props supportate:

```php
dashboard
fullHeight
hideSubscription
```

Quando:

```php
dashboard = true
```

viene caricata automaticamente la sidebar associata al ruolo autenticato.

---

# Sidebar

Sono presenti sidebar dedicate per:

* Admin
* Trainer
* Customer

Funzionalità:

* apertura/chiusura
* hover expand
* apertura persistente
* dropdown interni
* overlay mobile
* responsive navigation
* chiusura tramite ESC
* click esterno
* selettore lingua
* profilo utente

File principali:

```text
resources/css/dashboard-sidebar.css

resources/js/dashboard-sidebar.js
```

---

# Widget Architecture

Ogni dashboard utilizza una struttura dedicata.

## Admin

```text
components
widgets
partials
```

## Trainer

```text
components
widgets
partials
```

## Customer

```text
components
widgets
partials
```

Obiettivo:

permettere l'aggiunta di nuovi widget senza modificare il layout principale.

---

# Dashboard Admin

La Dashboard Admin rappresenta il centro operativo principale della piattaforma.

---

## Dashboard Header

Comprende:

* saluto personalizzato
* descrizione dashboard
* collegamento rapido al sito pubblico

---

## Stats Cards

Widget KPI principale.

Attualmente visualizza:

* utenti registrati
* clienti attivi
* trainer
* lezioni programmate
* prenotazioni giornaliere
* incasso mensile

Le statistiche vengono recuperate in tempo reale dal database.

---

### Utenti

Mostra il numero totale di utenti registrati.

Comprende:

* customer attivi
* customer inattivi
* utenti registrati

Esclude:

* amministratori
* trainer

---

### Clienti Attivi

Mostra il numero di clienti attivi.

Requisiti:

* ruolo customer
* stato attivo

---

### Trainer

Mostra il numero totale dei trainer presenti nel sistema.

---

### Lezioni Programmate

Mostra il numero totale delle lezioni future.

Include:

* lezioni schedulate
* lezioni prenotabili

Esclude:

* lezioni concluse
* lezioni cancellate

---

### Prenotazioni Giornaliere

Mostra il numero di prenotazioni effettuate nella giornata corrente.

Supporta:

* confronto con il giorno precedente
* variazione percentuale
* trend positivo
* trend neutro
* trend negativo

---

### Incasso Mensile

Mostra il fatturato generato nel mese corrente.

Comprende:

* iscrizioni
* abbonamenti
* lezioni singole
* servizi
* pacchetti ingressi
* assicurazioni acquistate separatamente

Esclude:

* assicurazioni già incluse nelle iscrizioni
* assicurazioni già incluse negli abbonamenti

per evitare doppi conteggi.

Supporta:

* confronto con il mese precedente
* trend percentuale
* gestione mesi senza ricavi

---

## Quick Actions

Widget dedicato alle operazioni rapide.

Obiettivi:

* ridurre il numero di click
* velocizzare il lavoro amministrativo
* centralizzare le operazioni frequenti

---

## Latest Users

Widget dedicato agli ultimi iscritti.

Informazioni mostrate:

* nome
* stato assicurazione
* stato abbonamento
* stato generale

Logica assicurazione:

* Verde → oltre 60 giorni
* Giallo → entro 60 giorni
* Rosso → assente o scaduta

Logica abbonamento:

* Verde → attivo
* Giallo → in scadenza
* Rosso → assente, scaduto o cancellato

L'assicurazione rappresenta il controllo prioritario.

---

## Next Lessons

Widget dedicato alle prossime lezioni.

File:

```text
resources/views/dashboard/admin/widgets/next-lessons.blade.php
```

Visualizza:

* data
* orario
* trainer
* prenotazioni
* occupazione

Funzionalità:

* recupero automatico delle prossime 5 lezioni
* esclusione lezioni già iniziate
* ordinamento cronologico
* eager loading trainer
* eager loading prenotazioni
* badge dinamici
* progress bar occupazione
* supporto localizzazione

Stati:

* Disponibile
* Quasi piena
* Completa

---

# KPI Architecture

I KPI amministrativi vengono generati tramite:

```php
App\Services\Dashboard\AdminDashboardService
```

Responsabilità:

* aggregazione dati
* statistiche dashboard
* trend giornalieri
* trend mensili
* revenue analytics
* recupero lezioni
* preparazione widget

Le Blade non contengono logica business.

Tutta la logica è centralizzata nel Service Layer.

---

# Revenue Architecture

Per consentire KPI economici affidabili è stato introdotto un sistema di tracciamento dell'origine dei pagamenti assicurativi.

Campo:

```text
insurance_policies.payment_source
```

Valori supportati:

```text
standalone
registration
subscription
```

---

## Obiettivo

Distinguere:

* assicurazioni acquistate separatamente
* assicurazioni incluse nell'iscrizione
* assicurazioni incluse negli abbonamenti

---

## Benefici

Permette di:

* evitare doppie contabilizzazioni
* generare KPI affidabili
* costruire statistiche economiche corrette
* supportare future integrazioni con gateway di pagamento

---

# Lesson Recurrence Architecture

Per supportare la programmazione ricorrente è stata introdotta una struttura basata su Template.

---

## LessonTemplate

Tabella:

```text
lesson_templates
```

Rappresenta la regola ricorrente.

Contiene:

* trainer
* giorno settimana
* orario
* prezzo
* capienza
* prenotabilità

Model:

```php
App\Models\Lesson\LessonTemplate
```

---

## Lesson

Tabella:

```text
lessons
```

Rappresenta la singola lezione reale.

Può essere:

* modificata
* spostata
* annullata

senza modificare il template originale.

Model:

```php
App\Models\Lesson\Lesson
```

---

## Relazioni

```text
LessonTemplate
↓
Lesson
↓
Booking
```

---

# Generazione Automatica Lezioni

Comando:

```bash
php artisan gym:generate-lessons
```

Opzioni:

```bash
php artisan gym:generate-lessons --weeks=8
```

Funzionalità:

* generazione multi-settimana
* aggiornamento lezioni esistenti
* prevenzione duplicati
* esclusione lezioni passate

---

# Scheduler

Laravel Scheduler esegue automaticamente:

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

# Timezone Management

Configurazione:

```env
APP_TIMEZONE=Europe/Rome
```

```php
'timezone' => env('APP_TIMEZONE', 'UTC')
```

Motivazione:

l'intera logica della palestra dipende dal fuso orario locale.

Coinvolge:

* lezioni
* prenotazioni
* assicurazioni
* abbonamenti
* scheduler
* KPI giornalieri

---

# Localizzazione

Lingue attualmente supportate:

* Italiano
* Inglese

File dedicati:

```text
lang/it/lesson.php
lang/en/lesson.php

lang/it/kpi.php
lang/en/kpi.php
```

Supportano:

* widget dashboard
* KPI
* badge lezioni
* occupazione lezioni
* trend dashboard
* etichette statistiche

---

# CSS Architecture

Moduli attualmente presenti:

```text
variables.css
utilities.css
navbar.css
public.css
forms.css
footer.css
dashboard-sidebar.css
dashboard-widgets.css
```

Obiettivo:

mantenere separata la logica stilistica delle varie aree dell'applicazione.

---

# Git Convention

Tipologie di commit utilizzate:

```text
feat:
fix:
refactor:
docs:
```

Documentazione e codice devono rimanere sincronizzati ad ogni milestone significativa.

---

# Milestones Completate

```text
refactor: build dashboard architecture and role-based sidebar navigation

feat: add admin dashboard widgets and mobile sidebar support

feat: implement admin dashboard widgets and recurring lesson architecture

feat: add next lessons widget and admin dashboard service

feat: implement admin dashboard KPIs and revenue analytics
```

---

# Roadmap

## Dashboard Admin

* grafici KPI
* revenue chart
* bookings chart
* attività recenti
* scadenze assicurazioni
* scadenze abbonamenti
* topbar dashboard
* saluti dinamici

---

## Dashboard Trainer

* KPI trainer
* lezioni assegnate
* prenotazioni
* disponibilità

---

## Dashboard Customer

* abbonamenti
* assicurazione
* prenotazioni
* storico attività

---

## Evoluzioni Future

* sistema pagamenti completo
* rinnovi automatici
* gestione ingressi
* notifiche
* analytics avanzate
* contenuti gestionali multilingua