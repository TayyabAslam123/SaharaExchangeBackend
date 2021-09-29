require('./bootstrap');

Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
Vue.component('chat-form', require('./components/ChatForm.vue').default);
Vue.component('example',require('./components/ExampleComponent.vue').default);
const app = new Vue({
    el: '.chat_screen',

    data: {
        messages: []
    },
    created() {
        this.fetchMessages();

        Echo.private('chat')
          .listen('MessageSent', (e) => {
            this.messages.push({
              message: e.message.message,
              user: e.user
            });
          });
          // scrollSmoothToBottom("clog");
    },

    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
                scrollSmoothToBottom("clog");
            });
            
        },

        addMessage(message) {
            this.messages.push(message);

            axios.post('/messages', message).then(response => {
              // console.log(response.data);
              scrollSmoothToBottom("clog");
            });
        }
    }
});


