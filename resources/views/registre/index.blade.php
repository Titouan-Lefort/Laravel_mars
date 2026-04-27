<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre Mars</title>
    <style>
        :root {
            --bg: #f6f4ef;
            --panel: #ffffff;
            --text: #1f1d1a;
            --muted: #6e675f;
            --line: #ded8cf;
            --accent: #b24a2a;
            --accent-2: #2e7d6b;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Segoe UI", "Trebuchet MS", sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at 10% 10%, #fff7dd 0%, rgba(255, 247, 221, 0) 35%),
                radial-gradient(circle at 90% 0%, #ffd9cc 0%, rgba(255, 217, 204, 0) 30%),
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
            background: #f0ebe2;
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
            color: #5d554d;
        }

        tbody tr:hover {
            background: #fff8ef;
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
            background: #ffe7dc;
            color: #a34224;
            border-color: #f0c4b4;
        }

        .rh-minus {
            background: #dff5ef;
            color: #1a6c58;
            border-color: #b6dfd2;
        }

        .level {
            font-weight: 700;
            color: #3f3a34;
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
<div class="container">
    <h1 class="title">Registre des Personnes</h1>
    <p class="subtitle">Vue globale du registre avec les informations de biome, facteur Rh et niveau d'accreditation.</p>

    <section class="stats">
        <article class="card">
            <h3>Total personnes</h3>
            <p>{{ $stats['total_registres'] }}</p>
        </article>
        <article class="card">
            <h3>Biomes references</h3>
            <p class="alt2">{{ $stats['total_biomes'] }}</p>
        </article>
        <article class="card">
            <h3>Rh+</h3>
            <p class="alt">{{ $stats['rh_plus'] }}</p>
        </article>
        <article class="card">
            <h3>Rh-</h3>
            <p class="alt2">{{ $stats['rh_minus'] }}</p>
        </article>
        <article class="card">
            <h3>Niveau moyen</h3>
            <p>{{ $stats['avg_accreditation'] }}</p>
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
                        <th>Groupe sanguin</th>
                        <th>Niveau d'accreditation</th>
                        <th>Date d'ajout</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($registres as $registre)
                        <tr>
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
