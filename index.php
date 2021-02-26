<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Simple AI Chat Bot Demo with Web Speech API">
        <meta name="author" content="Tomomi Imura  @girlie_mac">

        <title>Simple AI Demo with Web Speech API</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">

    </head>

    <body>
        <section>
            <h1>Simple AI Bot</h1>
            <h2>with Web Speech API</h2>

            <button type="button" onclick="runSpeechRecognition()"><i class="fa fa-microphone"></i></button>
            <span id="action"></span>
            <div>
                <p>You said: <em class="output">...</em></p>
                <p>Bot replied: <em class="output-bot">...</em></p>
            </div>
        </section>
    </body>
    <script>
        /* JS comes here */
        function runSpeechRecognition() {
            // get output div reference
            var output = document.getElementById("output");
            // get action element reference
            var action = document.getElementById("action");
            // new speech recognition object
            var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
            var recognition = new SpeechRecognition();

            // This runs when the speech recognition service starts
            recognition.onstart = function() {
                action.innerHTML = "<small>listening, please speak...</small>";
            };

            recognition.onspeechend = function() {
                action.innerHTML = "<small>stopped listening, hope you are done...</small>";
                recognition.stop();
            };

            // This runs when the speech recognition service returns result
            recognition.onresult = function(event) {
                var transcript = event.results[0][0].transcript;
                var confidence = event.results[0][0].confidence;
                output.innerHTML = "<b>Text:</b> " + transcript + "<br/> <b>Confidence:</b> " + confidence*100+"%";
                output.classList.remove("hide");

            };

            // start recognition
            recognition.start();
        }
    </script>
</html>
