import './bootstrap';

//import Alpine from 'alpinejs';

//window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
    Alpine.store('darkMode', {
        init() {
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
                this.on = true
              } else {
                document.documentElement.classList.remove('dark')
                this.on = false
              }
        },

        on: false,

        toggle() {
            this.on = ! this.on
            this.on ? document.documentElement.classList.add('dark'):document.documentElement.classList.remove('dark')
            this.on ? localStorage.theme = 'dark':localStorage.theme = ''
        }
    })
})

Alpine.magic('clipboard', () => {
    return subject => navigator.clipboard.writeText(subject)
})

//Alpine.start();
