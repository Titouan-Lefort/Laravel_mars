<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biomes - MarsBase</title>
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
            padding-bottom: 40px;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 16px;
        }

        header {
            margin-bottom: 30px;
        }

        h1 {
            font-size: 2.2rem;
            margin: 0 0 10px 0;
            font-weight: 800;
            letter-spacing: 0.02em;
        }

        p.sub {
            color: var(--muted);
            margin: 0;
            font-size: 1.05rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.4);
            border-color: var(--panel-soft);
        }

        .card h2 {
            margin: 0 0 10px 0;
            font-size: 1.3rem;
            color: var(--accent-2);
        }

        .card p.desc {
            color: var(--muted);
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            font-size: 0.85rem;
            background: #11151c;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid var(--line);
        }

        .stat-item {
            display: flex;
            flex-direction: column;
        }

        .stat-label {
            color: var(--muted);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 4px;
        }

        .stat-val {
            font-weight: 700;
            color: var(--text);
        }
    </style>
</head>
<body>

@include('layouts.navigation')

<div class="container">
    <header>
        <h1>Biomes Martiens</h1>
        <p class="sub">Exploration et donnees atmospheriques des secteurs references.</p>
    </header>

    <div class="grid">
        @foreach($biomes as $biome)
        <article class="card">
            <h2>{{ $biome->name }}</h2>
            <p class="desc">{{ $biome->description }}</p>
            <div class="stats">
                <div class="stat-item">
                    <span class="stat-label">Temp (Min/Max)</span>
                    <span class="stat-val">{{ $biome->temperature_min }}°C / {{ $biome->temperature_max }}°C</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label">Surface</span>
                    <span class="stat-val" style="text-transform: capitalize;">{{ $biome->surface_type }}</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label">Pression</span>
                    <span class="stat-val">{{ $biome->atmospheric_pressure }} kPa</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label">Radiation</span>
                    <span class="stat-val" style="color: var(--accent);">{{ $biome->radiation_level }} Sv/h</span>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</div>

</body>
</html>
