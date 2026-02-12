<nav class="bg-sky-600 text-white" data-menu-root>
  <div class="container mx-auto px-4 flex items-center justify-between">

    {{-- Logo --}}
    <a href="{{ url('/') }}" class="py-4 px-2 font-bold">
      JML workspace
    </a>

    {{-- Mobile button --}}
    <button
      type="button"
      class="md:hidden mobile-menu-button px-3 py-2 rounded hover:bg-sky-800"
      aria-label="Toggle menu"
    >
      ☰
    </button>

    {{-- Menu --}}
    <ul class="navigation-menu md:flex md:flex-row flex-col gap-1 md:block">

      <li>
        <a href="{{ url('/welcome') }}" class="menu-link">Accueil</a>
      </li>

      {{-- Niveau 1 --}}
      <li class="relative">
        <button
          type="button"
          class="menu-toggle"
          data-menu-toggle="vie-pratique"
          aria-expanded="false"
        >
          Vie pratique ▾
        </button>

        {{-- Niveau 2 --}}
        <ul class="submenu hidden" data-menu="vie-pratique">
          <li><a href="{{ url('/cookings') }}" class="menu-link">Recettes</a></li>
          <li><a href="{{ url('/ingredients') }}" class="menu-link">Ingrédients</a></li>

          {{-- Niveau 3 --}}
          <li class="relative">
            <button
              type="button"
              class="menu-toggle submenu-toggle"
              data-menu-toggle="vie-pratique-tools"
              aria-expanded="false"
            >
              Outils ▸
            </button>

            <ul class="submenu hidden submenu-right" data-menu="vie-pratique-tools">
              <li><a href="{{ url('/notes') }}" class="menu-link">Notes</a></li>
            </ul>
          </li>
        </ul>
      </li>

      <li class="relative">
        <button
          type="button"
          class="menu-toggle"
          data-menu-toggle="intellectuelle"
          aria-expanded="false"
        >
          Vie intellectuelle ▾
        </button>

        <ul class="submenu hidden" data-menu="intellectuelle">
          <li><a href="{{ url('/thoughts') }}" class="menu-link">Pensées</a></li>
          <li><a href="{{ url('/daybooks') }}" class="menu-link">Journal</a></li>
        </ul>
      </li>

    </ul>
  </div>
</nav>
