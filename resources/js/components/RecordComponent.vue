<template>
    <div>
       
                    <div class="card-header">{{ timer.interval ?  `Запись ${formatedTime}` : 'Начать запись' }}</div>

                    <div class="card-body">
                       <div class="block" v-show="!result">
    <video ref="video" controls autoplay playsinline style="width: 40%;"></video>
    123
    </div>
    <div class="block" v-show="result">
      <h4 class="title is-4">Результат</h4>
      <video controls :src="blobUrl" playsinline style="width: 40%;"></video>
    </div>
    <div class="field">
        <button class="button is-danger" @click="stop" v-if="recorder && recorder.getState() === 'recording'">
          Пауза
        </button>
        <button class="button is-primary" @click="captureCamera" v-else>
          Запись
        </button>
    </div>
                    </div>
                </div>
       
</template>

<script>
import RecordRTC  from "recordrtc";
export default {
  name: 'WebRtc',
  props: {
    msg: String
  },
  data() {
    return {
      recorder: null,
      result: null,
      blobUrl: null,
      timer: {
        interval: null,
        value: 0
      }
    }
  },
 
  methods: {


  captureCamera(camera) {
        var video = this.$refs.video
        video.muted = true;
        video.volume = 0;
        video.srcObject = camera;

        this.recorder = RecordRTC(camera, {
            type: 'video'
        });

        recorder.startRecording();

        // release camera on stopRecording
        recorder.camera = camera;

        //document.getElementById('btn-stop-recording').disabled = false;
    },
    stop(){
       //this.disabled = true;
    this.recorder.stopRecording(stopRecordingCallback);
    }

  },
  mounted(){
    navigator.mediaDevices.getUserMedia({ audio: true, video: true }).then(function(camera) {
        var video = this.$refs.video
        video.src = video.srcObject = null;
        video.muted = false;
        video.volume = 1;
        video.src = URL.createObjectURL(recorder.getBlob());
        
        this.recorder.camera.stop();
        this.recorder.destroy();
        this.recorder = null;
    }).catch(function(error) {
        alert('Unable to capture your camera. Please check console logs.');
        console.error(error);
    });
  } 
    
  
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
video{
  
  margin: 0 auto;
  width: 640px;
  height: 480px;
  box-shadow: 0 4px 8px 2px #999;
}
</style>
