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

class Errors {
   
    constructor() {
        this.errors = {};
    }

    has(field) {
        // if this.error contains a "field" property
        return this.errors.hasOwnProperty(field);
    }

    get(field) {
        if (this.errors[field]) {
           return this.errors[field][0];
        }
    }

    record(errors) {
        this.errors = errors;
    }

    clear(field) {
        if ( field ) {  
            delete this.errors[field];
            return;
        }

        this.errors = {};
    }

    
}

class Form {

    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    data() {

        let data = Object.assign({}, this);

        delete data.originalData;
        delete data.errors;

        return data;
    }

    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }
    }

    submit( requestType, url ) {


         axios[requestType](url, this.data() )
                    .then(
                        this.onSucess.bind(this) // bind this variable to the current instance
                    )
                    .catch( 
                        this.onFail.bind(this) // 
                    );
    }

    onSucess ( response ) {
        // console.log('success => ' + response.data.message);
        alert(response.data.message);
        this.errors.clear();
        this.reset();
    }

    onFail( error ) { 
         
        // console.log('onFail => ' + error);
        // console.log('repsonse error => ' + error.response.data.errors.name);
        this.errors.record( error.response.data.errors );

        // console.log(this.errors);
                
    }
}

new Vue({
    el: '#app-form',
    data: {
        form: new Form({
            name: '',
            description: '',
        }),
        // name: '',
        // description: '',
        // errors: new Errors, // class Errors
    },
    // mounted() {
    //     axios.get('/skills')
    //     .then(response => this.skills = response.data);
    // },
    methods: {
        onSubmit() {

            
            // axios.post('/projects', this.$data )
            // .then( this.onSucess )
            // .catch( error => {
            //     this.form.errors.record( error.response.data.errors );

            //     // console.log(this.form.errors);
            // });


            this.form.submit('post', '/projects');
            //     name: this.name,
            //     description: this.description,
            // });
        },
        
        // onSucess(response) {
        //     alert(response.data.message);

        //     // this.name = '';
        //     // this.description = '';

        //     form.reset();
        // }
    }
})
