<aside class="page__secondary text-is-right" :class="{'js-is-closed':isClosed}">
    <a href="#" class="navigation__button" @click="toggleHide">
        <span class="navigation__button-bars fa fa-bars" :class="{'js-is-closed':isClosed}"></span>
        <span class="navigation__button-indicator fa fa-caret-left" :class="{'js-is-closed': !!isClosed}"></span>
        <span class="navigation__button-indicator--closed fa fa-caret-right" :class="{'js-is-closed':isClosed}"></span>
    </a>
    <nav class="navigation__main" :class="{'js-is-closed':isClosed}">
        <ul class="navigation__list">
            <li class="navigation__item"><a href="">Home</a></li>
        </ul>
    </nav>
</aside>
