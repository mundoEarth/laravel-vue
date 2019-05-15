/* 
new Vue({
    el: '#app',
    data: {
        skills: []
    },
    mounted() {
        axios.get('/skills')
        .then(response => this.skills = response.data);
    }
})
*/ 


new Vue({
    el: '#app-form',
    data: {
        name: '',
        description: '',
    },
    mounted() {
        axios.get('/skills')
        .then(response => this.skills = response.data);
    },
    methods: {

    }
})
