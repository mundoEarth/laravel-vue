<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
          
        </style>
    </head>
    <body>
        <div id="app">

            <ul>
                <li v-for="skill in skills">@{{ skill }}</li>
            </ul>

            <ul>
                <li v-for="skill in skills" v-text="skill"></li>
            </ul>

          <!--   <router-view></router-view>
            <hr>
            <router-link to="/">Home</router-link>
            <router-link to="/about">About</router-link> -->
        </div>
       
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/vue@2.1.3/dist/vue.js"></script>
        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
