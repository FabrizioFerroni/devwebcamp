<header class="dashboard__header">
    <div class="dashboard__header-grid">
        <a href="/">
            <h1 class="dashboard__logo">
                &#60;DevWebCamp />
            </h1>
        </a>

        <nav class="dashboard__nav">
            <!-- Hola: <span><?php echo $nombre; ?></span> -->
            <!-- <form method="post" action="/cerrarsesion" class="dashboard__form">
                <input type="submit" value="Cerrar Sesión" class="dashboard__submit--logout">
            </form> -->

            <div class="dropdown">
                <input type="checkbox" id="dropdown">

                <label class="dropdown__face" for="dropdown">
                    <div class="dropdown__text">
                        Hola: <span><?php echo $nombre; ?></span>
                    </div>

                    <div class="dropdown__arrow"></div>
                </label>

                <ul class="dropdown__items">
                    <form method="post" action="/cerrarsesion" class="dashboard__form">
                        <input type="submit" value="Cerrar Sesión" class="dashboard__submit--logout">
                    </form>
                </ul>
            </div>

            <svg>
                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                    <feColorMatrix in="blur" type="matrix" values="0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 0 0" result="goo" />
                    <feBlend in="SourceGraphic" in2="goo" />
                </filter>
            </svg>
        </nav>
    </div>
</header>