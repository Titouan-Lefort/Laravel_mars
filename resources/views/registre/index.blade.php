<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre Mars</title>
    <style>
        :root {
            --bg: #0f1218;
            --panel: #171c24;
            --panel-soft: #1f2631;
            --line: #2b3442;
            --text: #f1f3f6;
            --muted: #9aa6ba;
            --accent: #ff5f6d;
            --accent-2: #4ad3a3;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Segoe UI", "Trebuchet MS", sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at 15% 10%, rgba(74, 211, 163, 0.16), transparent 30%),
                radial-gradient(circle at 90% 0, rgba(255, 95, 109, 0.14), transparent 35%),
                var(--bg);
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 16px 24px;
        }

        .title {
            margin: 0 0 6px;
            font-size: clamp(1.6rem, 3vw, 2.3rem);
            letter-spacing: 0.02em;
        }

        .subtitle {
            margin: 0 0 22px;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 12px;
            margin-bottom: 18px;
        }

        .card {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 14px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.04);
        }

        .card h3 {
            margin: 0;
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .card p {
            margin: 8px 0 0;
            font-size: 1.45rem;
            font-weight: 700;
        }

        .card p.alt { color: var(--accent); }
        .card p.alt2 { color: var(--accent-2); }

        .table-wrap {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 22px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 760px;
        }

        thead {
            background: var(--panel-soft);
        }

        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid var(--line);
            font-size: 0.92rem;
        }

        th {
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--muted);
        }

        tbody tr:hover {
            background: var(--panel-soft);
        }

        .row-link {
            cursor: pointer;
        }

        .row-link:focus-within {
            outline: 2px solid var(--accent);
            outline-offset: -2px;
        }

        .open-link {
            color: var(--accent);
            font-weight: 700;
            text-decoration: none;
        }

        .open-link:hover {
            text-decoration: underline;
        }

        .badge {
            display: inline-block;
            border-radius: 999px;
            padding: 4px 10px;
            font-size: 0.78rem;
            font-weight: 700;
            border: 1px solid transparent;
        }

        .rh-plus {
            background: rgba(255, 95, 109, 0.1);
            color: #ff5f6d;
            border-color: rgba(255, 95, 109, 0.3);
        }

        .rh-minus {
            background: rgba(74, 211, 163, 0.1);
            color: #4ad3a3;
            border-color: rgba(74, 211, 163, 0.3);
        }

        .level {
            font-weight: 700;
            color: var(--text);
        }

        .empty {
            padding: 22px;
            color: var(--muted);
        }

        .table-scroll {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    @include('layouts.navigation')

<div class="container">
    <h1 class="title">Registre des Personnes</h1>
    <p class="subtitle">Vue globale du registre avec les informations de biome, facteur Rh et niveau d'accreditation.</p>

    <section class="stats">
        <article class="card">
            <h3>Total personnes</h3>
            <p class="alt2">{{ $stats['total_registres'] }}</p>
        </article>
        <article class="card">
            <h3>Biomes references</h3>
            <p class="alt">{{ $stats['total_biomes'] }}</p>
        </article>
        <article class="card">
            <h3>Rh+</h3>
            <p class="alt" style="color: var(--accent);">{{ $stats['rh_plus'] }}</p>
        </article>
        <article class="card">
            <h3>Rh-</h3>
            <p class="alt2" style="color: var(--accent-2);">{{ $stats['rh_minus'] }}</p>
        </article>
        <article class="card">
            <h3>Niveau moyen</h3>
            <p class="alt2">{{ $stats['avg_accreditation'] }}</p>
        </article>
    </section>

    <section class="table-wrap">
        @if ($registres->isEmpty())
            <p class="empty">Aucune personne dans le registre pour le moment.</p>
        @else
            <div class="table-scroll">
                <table>
                    <thead>
                    <tr>
                        <th>ID personne</th>
                        <th>Biome</th>
                        <th>Description biome</th>
                        <th>Surface</th>
                        <th>Facteur Rh</th>
                        <th>Niveau d'accreditation</th>
                        <th>Date d'ajout</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($registres as $registre)
                        <tr class="row-link" onclick="window.location='{{ route('registre.show', $registre) }}'">
                            <td>{{ $registre->id }}</td>
                            <td>{{ $registre->biome?->name ?? 'N/A' }}</td>
                            <td>{{ $registre->biome?->description ?? 'Aucune description' }}</td>
                            <td>{{ $registre->biome?->surface_type ?? 'N/A' }}</td>
                            <td>
                                <span class="badge {{ $registre->rh_factor === 'Rh+' ? 'rh-plus' : 'rh-minus' }}">
                                    {{ $registre->rh_factor }}
                                </span>
                            </td>
                            <td class="level">{{ $registre->accreditation_level }}/5</td>
                            <td>{{ optional($registre->created_at)->format('d/m/Y H:i') }}</td>
                            <td>
                                <a class="open-link" href="{{ route('registre.show', $registre) }}" onclick="event.stopPropagation();">
                                    Ouvrir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</div>
</body>
</html>
