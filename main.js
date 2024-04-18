document.addEventListener('alpine:init', () => {
    Alpine.data('getstatuses', () => ({
        greeting: 'getstatuses app ',
        addingFilmMode: this.userid > 0,

        title: ''
    }))
})