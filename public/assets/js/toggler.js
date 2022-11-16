let  app = Vue.createApp({
    data:function(){
        return{
     isVisible:false      
        }

    },
    methods: {
        toggle(){
            this.isVisible= !this.isVisible
        }
    }

})


app.mount('#app')