<template>
    <div class="chat-logs" id="clog">
       <span  v-for="message in messages">
      <div  :class="message.user_id == 1 ? 'chat-msg  user' : 'chat-msg  self' " style="" >          
                  
        <div class="cm-msg-text">
          <small><strong>{{message.user.name}}</strong></small><br>
          <p>{{message.message}}</p>
        </div>
    </div>
</span>
</div>
</template>

<script>
  export default {
    props: ['messages']
  };
</script>