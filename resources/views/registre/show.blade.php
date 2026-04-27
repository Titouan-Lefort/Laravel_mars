<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Personne #{{ $registre->id }}</title>
    <style>
        :root {
            --bg: #0f1218;
            --panel: #171c24;
            --panel-soft: #1f2631;
            --line: #2b3442;
            --text: #f1f3f6;
            --muted: #9aa6ba;
            --accent: #4ad3a3;
            --warn: #f5a623;
            --pulse: #ff5f6d;
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
            max-width: 1180px;
            margin: 28px auto;
            padding: 0 16px 24px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 16px;
        }

        .back {
            color: var(--text);
            text-decoration: none;
            padding: 8px 12px;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #11161f;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .back:hover { border-color: #3f4b5f; }

        .title {
            margin: 0;
            font-size: clamp(1.35rem, 2.4vw, 2rem);
            letter-spacing: 0.02em;
        }

        .sub {
            margin-top: 4px;
            color: var(--muted);
            font-size: 0.94rem;
        }

        .layout {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        @media (min-width: 980px) {
            .layout {
                grid-template-columns: 1fr 1.1fr;
            }
        }

        .panel {
            background: linear-gradient(180deg, var(--panel), #141922);
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.28);
        }

        .section-title {
            margin: 0 0 12px;
            font-size: 0.9rem;
            text-transform: uppercase;
            color: var(--muted);
            letter-spacing: 0.08em;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 10px;
        }

        .cell {
            background: var(--panel-soft);
            border: 1px solid #324053;
            border-radius: 10px;
            padding: 10px;
        }

        .cell .k {
            font-size: 0.75rem;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .cell .v {
            margin-top: 6px;
            font-size: 1.05rem;
            font-weight: 700;
        }

        .live-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            margin-top: 12px;
        }

        .sensor {
            background: #111722;
            border: 1px solid #2f3d52;
            border-radius: 10px;
            padding: 12px;
        }

        .sensor h4 {
            margin: 0;
            font-size: 0.76rem;
            color: var(--muted);
            letter-spacing: 0.07em;
            text-transform: uppercase;
        }

        .sensor p {
            margin: 8px 0 0;
            font-size: 1.35rem;
            font-weight: 700;
        }

        .sensor .ok { color: var(--accent); }
        .sensor .warn { color: var(--warn); }
        .sensor .pulse { color: var(--pulse); }

        .ecg {
            margin-top: 12px;
            border-radius: 10px;
            border: 1px solid #2f3d52;
            background: #0d131d;
            height: 90px;
            position: relative;
            overflow: hidden;
        }

        .ecg svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .ecg path {
            stroke: #39d9a6;
            stroke-width: 2;
            fill: none;
            stroke-linejoin: round;
            stroke-linecap: round;
            filter: drop-shadow(0 0 5px rgba(57, 217, 166, 0.5));
        }

        .note {
            margin-top: 10px;
            font-size: 0.86rem;
            color: var(--muted);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="topbar">
        <a class="back" href="{{ route('registre.index') }}">Retour au tableau</a>
    </div>

    <h1 class="title">Personne #{{ $registre->id }} - Monitoring EVA Martien</h1>
    <p class="sub">Affichage detaille des donnees du registre et des capteurs embarques simules en direct sur Mars.</p>

    <section class="layout">
        <article class="panel">
            <h2 class="section-title">Identite et Accreditation</h2>
            <div class="grid">
                <div class="cell">
                    <div class="k">ID Personne</div>
                    <div class="v">{{ $registre->id }}</div>
                </div>
                <div class="cell">
                    <div class="k">ID Biome (FK)</div>
                    <div class="v">{{ $registre->biome_id }}</div>
                </div>
                <div class="cell">
                    <div class="k">Facteur Rh</div>
                    <div class="v">{{ $registre->rh_factor }}</div>
                </div>
                <div class="cell">
                    <div class="k">Niveau d'accreditation</div>
                    <div class="v">{{ $registre->accreditation_level }}/5</div>
                </div>
                <div class="cell">
                    <div class="k">Date d'ajout</div>
                    <div class="v">{{ optional($registre->created_at)->format('d/m/Y H:i') }}</div>
                </div>
            </div>

            <h2 class="section-title" style="margin-top:16px;">Biome Associe</h2>
            <div class="grid">
                <div class="cell">
                    <div class="k">Biome</div>
                    <div class="v">{{ $registre->biome?->name ?? 'N/A' }}</div>
                </div>
                <div class="cell">
                    <div class="k">Type de surface</div>
                    <div class="v">{{ $registre->biome?->surface_type ?? 'N/A' }}</div>
                </div>
                <div class="cell">
                    <div class="k">Temperature</div>
                    <div class="v">{{ $registre->biome?->temperature_min ?? 'N/A' }} a {{ $registre->biome?->temperature_max ?? 'N/A' }} C</div>
                </div>
                <div class="cell">
                    <div class="k">Radiation</div>
                    <div class="v">{{ $registre->biome?->radiation_level ?? 'N/A' }} mSv/jour</div>
                </div>
                <div class="cell">
                    <div class="k">Humidite</div>
                    <div class="v">{{ $registre->biome?->humidity ?? 'N/A' }} %</div>
                </div>
                <div class="cell">
                    <div class="k">Pression atmospherique</div>
                    <div class="v">{{ $registre->biome?->atmospheric_pressure ?? 'N/A' }} hPa</div>
                </div>
            </div>
        </article>

        <article class="panel">
            <h2 class="section-title">Capteurs de Combinaison (Simules)</h2>
            <div class="live-grid">
                <div class="sensor">
                    <h4>Vitesse de deplacement</h4>
                    <p class="ok"><span id="speedKmh">7.2</span> km/h</p>
                </div>
                <div class="sensor">
                    <h4>Position X</h4>
                    <p class="ok"><span id="posX">0.0</span> m</p>
                </div>
                <div class="sensor">
                    <h4>Position Y</h4>
                    <p class="ok"><span id="posY">0.0</span> m</p>
                </div>
                <div class="sensor">
                    <h4>Cap / orientation</h4>
                    <p class="ok"><span id="heading">0</span> deg</p>
                </div>
                <div class="sensor">
                    <h4>Pression externe Mars</h4>
                    <p class="warn"><span id="externalPressure">0.60</span> kPa</p>
                </div>
                <div class="sensor">
                    <h4>Frequence cardiaque</h4>
                    <p class="pulse"><span id="heartRate">78</span> bpm</p>
                </div>
                <div class="sensor">
                    <h4>Saturation O2</h4>
                    <p class="ok"><span id="spo2">98</span> %</p>
                </div>
                <div class="sensor">
                    <h4>Respiration</h4>
                    <p class="ok"><span id="respiration">16</span> /min</p>
                </div>
                <div class="sensor">
                    <h4>Temperature combi</h4>
                    <p class="warn"><span id="suitTemp">36.8</span> C</p>
                </div>
                <div class="sensor">
                    <h4>Pression interne</h4>
                    <p class="ok"><span id="internalPressure">34.5</span> kPa</p>
                </div>
                <div class="sensor">
                    <h4>CO2 interne</h4>
                    <p class="warn"><span id="co2">0.42</span> %</p>
                </div>
                <div class="sensor">
                    <h4>Reserve O2 combinaison</h4>
                    <p class="ok"><span id="o2Reserve">99.4</span> %</p>
                </div>
                <div class="sensor">
                    <h4>Batterie combinaison</h4>
                    <p class="ok"><span id="battery">99.7</span> %</p>
                </div>
                <div class="sensor">
                    <h4>Etat global</h4>
                    <p class="warn"><span id="status">Nominal</span></p>
                </div>
            </div>

            <div class="ecg" aria-label="Trace cardiaque simulee">
                <svg viewBox="0 0 600 90" preserveAspectRatio="none">
                    <path id="ecgPath" d="M0,45 L20,45 L30,44 L40,45 L50,45 L60,45 L70,44 L80,45 L90,46 L100,45"></path>
                </svg>
            </div>

            <p class="note">Simulation locale complete: les capteurs sont fictifs, mais les variations restent coherentes avec vitesse, deplacement, biome et effort.</p>
        </article>
    </section>
</div>

<script>
    const biome = {
        temperatureMin: Number(@json($registre->biome?->temperature_min ?? -70)),
        temperatureMax: Number(@json($registre->biome?->temperature_max ?? -10)),
        humidity: Number(@json($registre->biome?->humidity ?? 15)),
        radiation: Number(@json($registre->biome?->radiation_level ?? 0.2)),
        pressure: Number(@json($registre->biome?->atmospheric_pressure ?? 6.0)),
        surfaceType: @json($registre->biome?->surface_type ?? 'rocky'),
    };

    const mars = {
        gravity: 3.71,
        earthGravity: 9.81,
        baselineExternalPressureKPa: 0.60,
    };

    const surfaceFactor = {
        rocky: 0.9,
        sandy: 0.72,
        icy: 0.78,
        volcanic: 0.66,
    };

    const state = {
        speedKmh: 7.2,
        targetSpeedKmh: 7.8,
        posX: 0,
        posY: 0,
        heading: 0,
        externalPressure: 0.60,
        heartRate: 78,
        spo2: 98,
        respiration: 16,
        suitTemp: 36.8,
        internalPressure: 34.5,
        co2: 0.42,
        o2Reserve: 99.4,
        battery: 99.7,
        status: 'Nominal',
    };

    const clamp = (value, min, max) => Math.min(max, Math.max(min, value));
    const drift = (value, delta) => value + (Math.random() * 2 - 1) * delta;
    const lerp = (from, to, ratio) => from + (to - from) * ratio;

    function computeEffort() {
        const surface = surfaceFactor[biome.surfaceType] ?? 0.84;
        const gravityRatio = mars.gravity / mars.earthGravity;
        const ambient = (biome.temperatureMin + biome.temperatureMax) / 2;
        const thermalPenalty = Math.max(0, Math.abs(ambient - 18) / 40);
        const radiationPenalty = clamp(biome.radiation / 0.6, 0, 1.2);

        return clamp(
            (state.speedKmh / (9 * surface)) * (0.75 + gravityRatio * 0.55) + thermalPenalty * 0.35 + radiationPenalty * 0.25,
            0,
            2.4
        );
    }

    function updateMovement() {
        const surface = surfaceFactor[biome.surfaceType] ?? 0.84;
        const maxSpeed = 12 * surface;

        state.targetSpeedKmh = clamp(drift(state.targetSpeedKmh, 0.9), 1.2, maxSpeed);
        state.speedKmh = clamp(lerp(state.speedKmh, state.targetSpeedKmh, 0.24), 0.6, maxSpeed);

        const headingDrift = state.speedKmh < 2.5 ? 10 : 4;
        state.heading = (state.heading + drift(0, headingDrift) + 360) % 360;

        const metersPerTick = state.speedKmh / 3.6;
        const headingRad = (state.heading * Math.PI) / 180;
        state.posX += Math.cos(headingRad) * metersPerTick;
        state.posY += Math.sin(headingRad) * metersPerTick;
    }

    function updateSensors() {
        updateMovement();

        const effort = computeEffort();
        const ambient = (biome.temperatureMin + biome.temperatureMax) / 2;

        const targetHeartRate = 64 + effort * 38 + (100 - state.o2Reserve) * 0.11;
        const targetResp = 11 + effort * 8;
        const targetSpo2 = 99 - effort * 2.8 - Math.max(0, biome.radiation - 0.2) * 2.0;
        const targetSuitTemp = 36.6 + Math.max(0, 18 - ambient) * 0.015 + effort * 0.22;
        const externalPressureKPa = clamp((biome.pressure / 10) + drift(0, 0.03), 0.35, 1.20);
        const targetPressure = 34.2 + effort * 0.35;
        const targetCo2 = 0.32 + effort * 0.22 + (100 - state.o2Reserve) * 0.004;

        state.heartRate = Math.round(clamp(lerp(state.heartRate, targetHeartRate, 0.35), 54, 168));
        state.respiration = Math.round(clamp(lerp(state.respiration, targetResp, 0.32), 8, 34));
        state.spo2 = Math.round(clamp(lerp(state.spo2, targetSpo2, 0.28), 86, 100));
        state.suitTemp = clamp(lerp(state.suitTemp, targetSuitTemp, 0.2), 34.0, 40.2);
        state.externalPressure = clamp(lerp(state.externalPressure, externalPressureKPa, 0.32), 0.35, 1.20);
        state.internalPressure = clamp(lerp(state.internalPressure, targetPressure, 0.25), 31.0, 38.0);
        state.co2 = clamp(lerp(state.co2, targetCo2, 0.24), 0.22, 1.65);

        state.o2Reserve = clamp(state.o2Reserve - (0.006 + effort * 0.01), 0, 100);
        state.battery = clamp(state.battery - (0.004 + (state.speedKmh / 12) * 0.006), 0, 100);

        if (state.spo2 < 92 || state.heartRate > 145 || state.co2 > 1.2 || state.o2Reserve < 20) {
            state.status = 'Alerte';
        } else if (state.spo2 < 95 || state.heartRate > 120 || state.co2 > 0.9 || state.o2Reserve < 35) {
            state.status = 'Surveillance';
        } else {
            state.status = 'Nominal';
        }

        document.getElementById('speedKmh').textContent = state.speedKmh.toFixed(1);
        document.getElementById('posX').textContent = state.posX.toFixed(1);
        document.getElementById('posY').textContent = state.posY.toFixed(1);
        document.getElementById('heading').textContent = Math.round(state.heading);
        document.getElementById('externalPressure').textContent = state.externalPressure.toFixed(2);
        document.getElementById('heartRate').textContent = state.heartRate;
        document.getElementById('spo2').textContent = state.spo2;
        document.getElementById('respiration').textContent = state.respiration;
        document.getElementById('suitTemp').textContent = state.suitTemp.toFixed(1);
        document.getElementById('internalPressure').textContent = state.internalPressure.toFixed(1);
        document.getElementById('co2').textContent = state.co2.toFixed(2);
        document.getElementById('o2Reserve').textContent = state.o2Reserve.toFixed(1);
        document.getElementById('battery').textContent = state.battery.toFixed(1);
        document.getElementById('status').textContent = state.status;

        updateECG(state.heartRate);
    }

    function updateECG(hr) {
        const points = [];
        const step = 12;
        let x = 0;

        while (x <= 600) {
            points.push([x, 45]);

            const pulseEvery = Math.round(900 / hr);
            if (x % (step * pulseEvery) === 0) {
                points.push([x + 3, 44]);
                points.push([x + 6, 20]);
                points.push([x + 9, 70]);
                points.push([x + 12, 45]);
            }

            x += step;
        }

        const d = points.map((point, i) => `${i === 0 ? 'M' : 'L'}${point[0]},${point[1]}`).join(' ');
        document.getElementById('ecgPath').setAttribute('d', d);
    }

    updateSensors();
    setInterval(updateSensors, 1000);
</script>
</body>
</html>
