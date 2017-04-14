<template>
    <aside class="page__secondary" :class="{'js-is-closed':isClosed}">
        <a href="#" class="navigation__button" @click="toggleHide">
            <span class="navigation__button-bars fa fa-bars" :class="{'js-is-closed':isClosed}"></span>
            <span class="navigation__button-indicator fa fa-caret-left" :class="{'js-is-closed': !!isClosed}"></span>
            <span class="navigation__button-indicator--closed fa fa-caret-right" :class="{'js-is-closed':isClosed}"></span>
        </a>
        <nav class="navigation__main" :class="{'js-is-closed':isClosed}">
            <slot></slot>
        </nav>
    </aside>
</template>

<script>

    export default {
        data() {
            return {
                isClosed: false
            }
        },
        beforeMount() {
            window.addEventListener('resize', this.handleResize);

            if (document.body.offsetWidth <= 768) {
                this.toggleHide();
            }
        },
        methods: {
            toggleHide() {
                return this.isClosed = (this.isClosed) ? false : true;
            },

            handleResize(event) {
                if (document.body.clientWidth <= 768) {
                    return this.isClosed = true;
                }
            }
        }
    }
</script>