const msgerForm = get(".msger-inputarea");
const msgerInput = get(".msger-input");
const msgerChat = get(".msger-chat");
const chatWith=get(".chatWith");
const typing= get(".typing");
const chatStatus= get(".chatStatus");
const chatId= window.location.pathname.slice(6);

// const BOT_MSGS = ["I am tommy bot and I love Daniela Soledad Hernandez <3"];


// Icons made by Freepik from www.flaticon.com
const BOT_IMG = "https://cdn-icons-png.flaticon.com/512/10321/10321668.png";
const PERSON_IMG = "https://cdn-icons-png.flaticon.com/512/10473/10473102.png";
const BOT_NAME = "TOMMY BOT";
const PERSON_NAME = "Sajad";
var authUser;

window.onload= ()=>{
    axios.get('/auth/user').then(res=>{
        authUser=res.data.authUser;
    }).then(res=>{
        setUpChat();
    });
}

msgerForm.addEventListener("submit", event => {
    event.preventDefault();

    const msgText = msgerInput.value;
    if (!msgText) return;

    /* All sent code here */
    axios.post('/message/sent',{
        message:msgText,
        chat_id: 1, // TODO: make this id dynamic
    }).then(res=>{
        let data = res.data;
        appendMessage(
            data.user.name,
            PERSON_IMG,
            'right',
            data.content,
            formatDate(new Date(data.created_at))
        );
        console.log(res);
    }).catch(error=>{
        console.log('an errror was ocurred');
        console.log(error);
    });
    msgerInput.value = "";
//   appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
//   botResponse();

});

function appendMessages(messages){
    let side='left';
    messages.forEach(message=>{
        side=(message.user.id==authUser.id)?'right':'left';
        appendMessage(
            message.user.name,
            PERSON_IMG,side,
            message.content,
            formatDate(new Date(message.created_at))
        );
    })
}

function appendMessage(name, img, side, text, date) {
  //   Simple solution for small apps
  const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${date}</div>
        </div>

        <div class="msg-text">${text}</div>
      </div>
    </div>
  `;

  msgerChat.insertAdjacentHTML("beforeend", msgHTML);
  scrollToBottom();
}



// function botResponse() {
//   const r = random(0, BOT_MSGS.length - 1);
//   const msgText = BOT_MSGS[r];
//   const delay = msgText.split(" ").length * 100;

//   setTimeout(() => {
//     appendMessage(BOT_NAME, BOT_IMG, "left", msgText);
//   }, delay);
// }


function setUpChat(){
    console.log('setupChat');
    axios.get(`/chat/${chatId}/get_users`)
    .then((res)=>{
        let results= res.data.users.filter(user => user.id != authUser.id);
        if(results.length >0){
            chatWith.innerHTML=results[0].name;
        }
    })
    .then((res)=>{
        axios.get(`/chat/${chatId}/get_messages`).then(res=>{
            console.log(res);
            appendMessages(res.data.messages);
        });
    });
    // Echo
    Echo.join(`chat.${chatId}`)
    .listen('MessageSent',(e) => {
        console.log(e);
        appendMessage(
            e.message.user.name,
            PERSON_IMG,
            'left',
            e.message.content,
            formatDate(new Date(e.message.created_at))
        );
    })
    .here(users=>{
        console.log(users);
        let result= users.filter(user => user.id != authUser.id);
        if(result.length>0){
            chatStatus.className='chatStatus online';
        }
    })
    .joining(user=>{
        console.log('user joining');
        if(user.id!=authUser.id){
            chatStatus.className='chatStatus online';
        }
    })
    .leaving(user=>{
        console.log('user leaving');
        if(user.id != authUser.id){
            chatStatus.className='chatStatus offline';
        }
    });
}


// Utils
function get(selector, root = document) {
  return root.querySelector(selector);
}

function formatDate(date) {
    const d = date.getDay();
    const m = date.getMonth() + 1;
    const y = date.getFullYear();
    const h = "0" + date.getHours();
    const min = "0" + date.getMinutes();

    return `${d}/${m}/${y} ${h.slice(-2)}:${min.slice(-2)}`;
}

function scrollToBottom(){
    msgerChat.scrollTop=msgerChat.scrollHeight;
}
// function random(min, max) {
//   return Math.floor(Math.random() * (max - min) + min);
// }
