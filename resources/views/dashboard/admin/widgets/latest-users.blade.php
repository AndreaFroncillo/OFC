<div class="dashboard-widget dashboard-latest-users-widget">
    <div class="dashboard-widget-header">
        <div>
            <p class="dashboard-kicker mb-1">Iscritti</p>
            <h2 class="dashboard-widget-title">Membri recenti</h2>
        </div>
        <i class="fas fa-user-clock dashboard-widget-header-icon"></i>
    </div>

    <div class="dashboard-list">
        <div class="dashboard-list-item dashboard-member-item">
            {{-- TODO: rendere la riga cliccabile verso admin.customers.show --}}
            <div class="dashboard-avatar">MR</div>

            <div class="dashboard-list-content">
                <h4>Mario Rossi</h4>
                <p>Cliente</p>

                <div class="dashboard-member-meta">
                    <span>Piano: <strong>Open Annuale</strong></span>
                    <span>Assicurazione: <strong>Sanitaria Base</strong></span>
                </div>

                <div class="dashboard-member-badges">
                    <span class="dashboard-badge dashboard-badge-success">
                        Piano: scade tra 124 giorni
                    </span>
                    <span class="dashboard-badge dashboard-badge-success">
                        Assicurazione: scade tra 124 giorni
                    </span>
                </div>
            </div>
        </div>

        <div class="dashboard-list-item dashboard-member-item">
            <div class="dashboard-avatar">GB</div>

            <div class="dashboard-list-content">
                <h4>Giulia Bianchi</h4>
                <p>Cliente</p>

                <div class="dashboard-member-meta">
                    <span>Piano: <strong>Basic Trimestrale</strong></span>
                    <span>Assicurazione: <strong>Sanitaria Base</strong></span>
                </div>

                <div class="dashboard-member-badges">
                    <span class="dashboard-badge dashboard-badge-warning">
                        Piano: attenzione
                    </span>
                    <span class="dashboard-badge dashboard-badge-warning">
                        Assicurazione: scade tra 42 giorni
                    </span>
                </div>
            </div>
        </div>

        <div class="dashboard-list-item dashboard-member-item">
            <div class="dashboard-avatar">AF</div>

            <div class="dashboard-list-content">
                <h4>Andrea Ferri</h4>
                <p>Cliente</p>

                <div class="dashboard-member-meta">
                    <span>Piano: <strong>N/D</strong></span>
                    <span>Assicurazione: <strong>Sanitaria Base</strong></span>
                </div>

                <div class="dashboard-member-badges">
                    <span class="dashboard-badge dashboard-badge-danger">
                        Piano: non attivo
                    </span>
                    <span class="dashboard-badge dashboard-badge-success">
                        Assicurazione: scade tra 180 giorni
                    </span>
                </div>
            </div>
        </div>

        <div class="dashboard-list-item dashboard-member-item">
            <div class="dashboard-avatar">LV</div>

            <div class="dashboard-list-content">
                <h4>Luca Verdi</h4>
                <p>Cliente</p>

                <div class="dashboard-member-meta">
                    <span>Piano: <strong>Open Annuale</strong></span>
                    <span>Assicurazione: <strong>N/D</strong></span>
                </div>

                <div class="dashboard-member-badges">
                    <span class="dashboard-badge dashboard-badge-danger">
                        Piano: non valido
                    </span>
                    <span class="dashboard-badge dashboard-badge-danger">
                        Assicurazione: scaduta o mancante
                    </span>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="dashboard-widget-link">
        Gestisci iscritti
        <i class="fas fa-arrow-right"></i>
    </a>
</div>