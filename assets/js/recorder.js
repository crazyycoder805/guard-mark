// collect DOMs
const display = document.querySelector('.display');
const controllerWrapper = document.querySelector('.controllers');

const State = ['Initial', 'Record', 'Download'];
let stateIndex = 0;
let mediaRecorder, chunks = [], audioURL = '';

// mediaRecorder setup for audio
if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {

  navigator.mediaDevices.getUserMedia({ audio: true })
    .then((stream) => {
      mediaRecorder = new MediaRecorder(stream);

      mediaRecorder.ondataavailable = (e) => {
        chunks.push(e.data);
      };

      mediaRecorder.onstop = () => {
        const blob = new Blob(chunks, { type: 'audio/wav' }); // Set WAV format
        chunks = [];

        // Create a temporary URL for immediate playback
        audioURL = URL.createObjectURL(blob);
        console.log(audioURL);
        document.querySelector('audio').src = audioURL;

        // Download link creation and click simulation
        const downloadLink = document.createElement('a');
        downloadLink.href = audioURL;
        downloadLink.download = 'recording.wav';
        const downloadEvent = new MouseEvent('click', {
          bubbles: true,
          cancelable: true,
          view: window
        });
        downloadLink.dispatchEvent(downloadEvent);

        // Optional: Remove temporary URL after download
        // window.URL.revokeObjectURL(audioURL);
      };
    })
    .catch((error) => {
      console.error('Error:', error);
    });
} else {
  stateIndex = '';
  application(stateIndex);
}

const clearDisplay = () => {
  display.textContent = '';
};

const clearControls = () => {
  controllerWrapper.textContent = '';
};

const record = () => {
  stateIndex = 1;
  mediaRecorder.start();
  application(stateIndex);
};

const stopRecording = () => {
  stateIndex = 2;
  mediaRecorder.stop();
  application(stateIndex);
};

const addButton = (id, funString, text) => {
  const btn = document.createElement('button');
  btn.id = id;
  btn.type = 'button';
  btn.textContent = text;
  btn.addEventListener('click', eval(funString));
  controllerWrapper.append(btn);
};

const addMessage = (text) => {
  const msg = document.createElement('p');
  msg.textContent = text;
  display.append(msg);
};

const addAudio = () => {
  const audio = document.createElement('audio');
  audio.controls = true;
  audio.src = audioURL;
  display.append(audio);
};

const application = (index) => {
  switch (State[index]) {
    case 'Initial':
      clearDisplay();
      clearControls();

      addButton('record', 'record', 'Start Recording');
      break;

    case 'Record':
      clearDisplay();
      clearControls();

      addMessage('Recording...');
      addButton('stop', 'stopRecording', 'Stop Recording');
      break;

    case 'Download':
      clearControls();
      clearDisplay();

      addAudio();
      addButton('record', 'record', 'Record Again');
      break;

    default:
      clearControls();
      clearDisplay();

      addMessage('Your browser does not support mediaDevices');
      break;
  }
};

application(stateIndex);