<template>
    
    <div class="chat-input">      
      <form>
        <input type="text" id="chat-input" placeholder="Send a message..."  v-model="newMessage" @keyup.enter="sendMessage">
      <button type="submit" class="chat-submit" id="chat-submit" @click="sendMessage"><i class="material-icons">send</i></button>
      </form>      
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                if (!this.newMessage)
                {
                    return;
                }
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });
                scrollSmoothToBottom("clog");

                this.newMessage = ''
            }
        }    
    }
</script>