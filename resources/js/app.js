
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

myapp = new Vue({
    el: '#app',
    data: {
        msg: '',
        messageArray: [],
    },
    methods: {
        sendMsg: function () {
            console.log("sendMsg");
            var self = this;
            if (this.msg) {
                axios.post('chat',{
                    message: this.msg,
                }).then(function (response) {
                    if (response.data.result == 'ok') {
                        self.pushMsg(self.msg);
                        self.msg = '';
                    }
                }).catch(function (error) {
                    console.log(error);
                });
            }else{
                alert('type something...');
            }
        },
        pushMsg: function (msg) {
            console.log("pushMsg");
            this.messageArray.push({
                self: msg,
            });
        },
        listenMsg: function (msg) {
            console.log("listenMsg");
            this.messageArray.push({
                other: msg,
            });
        }
    }
});