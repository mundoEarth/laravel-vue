<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
        <!-- Styles -->
        <style type="text/css">
            body { padding-top: 40px; }
            .control { margin-bottom: 20px; }
        </style>
    </head>
    <body>
        <div id="app-form" class="container">           
            <form method="POST" action="/projects" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)"> <!-- .prevent is to prevent the action of the form -->
                <div class="control">
                    <label for="name">Project Name: </label>
                    <input type="text" id="name" name="name" class="input" v-model="form.name" />
                    <!-- <input type="text" id="name" name="name" class="input" v-model="name" @keydown="errors.clear('name')"/> -->

                    <span class="help is-danger"  v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                </div>

                <div class="control">
                    <label for="description">Description: </label>
                    <input type="text" id="description" name="description" class="input" v-model="form.description"/>

                    <span class="help is-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
                </div>

                <div class="control">
                    <button type="submit" class="button is-primary">Submit</button>
                </div>
            </form>           
        </div>
       
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/vue@2.1.3/dist/vue.js"></script>
        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
