<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CaboDrivers | Chat</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/chat.css">
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
    <section class="msger">
        <header class="msger-header">
          <div class="msger-header-title">
            <i class="fas fa-comment-alt"></i>
            <span class="chatWith"></span>
            <span class="typing" style="display: none"> esta escribiendo</span>
          </div>
          <div class="msger-header-options">
            <span class="chatStatus offline"><i class="fas fa-globe"></i></span>
          </div>
        </header>

        <main class="msger-chat">

          {{-- <div class="msg left-msg">
            <div
             class="msg-img"
             style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"
            ></div>

            <div class="msg-bubble">
              <div class="msg-info">
                <div class="msg-info-name">BOT</div>
                <div class="msg-info-time">12:45</div>
              </div>

              <div class="msg-text">
                Hi, welcome to SimpleChat! Go ahead and send me a message. 😄
              </div>
            </div>
          </div>

          <div class="msg right-msg">
            <div
             class="msg-img"
             style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"
            ></div>

            <div class="msg-bubble">
              <div class="msg-info">
                <div class="msg-info-name">Sajad</div>
                <div class="msg-info-time">12:46</div>
              </div>

              <div class="msg-text">
                You can change your name in JS section!
              </div>
            </div>
          </div> --}}

        </main>

        <form class="msger-inputarea">
          <input type="text" class="msger-input" oninput="sendTypingEvent()" placeholder="Enter your message...">
          <button type="submit" class="msger-send-btn">Send</button>
          <input type="hidden" name="chatId" value="{{$chat->id}}">
        </form>
      </section>

      <script src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="/js/chat.js"></script>
</body>
</html>
