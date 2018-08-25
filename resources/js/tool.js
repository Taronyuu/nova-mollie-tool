Nova.booting((Vue, router) => {
    Vue.config.devtools = true;
    router.addRoutes([
        {
            name: 'nova-mollie-tool',
            path: '/nova-mollie-tool',
            component: require('./components/Tool'),
        },
    ])
})
