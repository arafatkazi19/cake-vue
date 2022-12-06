<div id="app">
    <router-link class="btn btn-primary my-3"  to="/">Home</router-link>
    <router-link class="btn btn-primary my-3"  to="/about">About</router-link>

</div>

<script>
    const Home = { template: '<div>Home Page</div>' }
    const About = { template: '<div>About Page</div>' }


    const routes = [
        { path: '/', },
        { path: '/about',  }
    ]

    const router = VueRouter.createRouter({

        history: createWebHistory(),
        routes, // short for `routes: routes`
    })

    // 5. Create and mount the root instance.
    const app = Vue.createApp({})

    app.use(router)

    app.mount('#app')
</script>
