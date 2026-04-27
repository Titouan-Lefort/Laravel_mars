<style>
    .mars-nav {
        background: #1a1a2e;
        border-bottom: 2px solid #b24a2a;
        position: sticky;
        top: 0;
        z-index: 100;
        font-family: "Segoe UI", "Trebuchet MS", sans-serif;
    }
    .mars-nav-inner {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 56px;
    }
    .mars-nav-brand {
        color: #e8d5c4;
        font-size: 1.1rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-decoration: none;
        text-transform: uppercase;
    }
    .mars-nav-brand span {
        color: #b24a2a;
    }
    .mars-nav-links {
        display: flex;
        gap: 4px;
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .mars-nav-links a {
        color: #c8b8a8;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        padding: 6px 14px;
        border-radius: 6px;
        transition: background 0.15s, color 0.15s;
    }
    .mars-nav-links a:hover,
    .mars-nav-links a.active {
        background: #b24a2a;
        color: #fff;
    }
</style>

<nav class="mars-nav">
    <div class="mars-nav-inner">
        <a href="{{ route('registre.index') }}" class="mars-nav-brand">
            Mars<span>Base</span>
        </a>
        <ul class="mars-nav-links">
            <li>
                <a href="{{ route('registre.index') }}"
                   class="{{ request()->routeIs('registre.*') ? 'active' : '' }}">
                    Registre
                </a>
            </li>
            <li>
                <a href="{{ route('biomes.index') }}"
                   class="{{ request()->routeIs('biomes.*') ? 'active' : '' }}">
                    Biomes
                </a>
            </li>
        </ul>
    </div>
</nav>
