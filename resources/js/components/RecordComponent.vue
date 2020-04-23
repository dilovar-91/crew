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
        <button class="button is-primary" @click="record" v-else>
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
  computed: {
    
  },
  methods: {
    _fillzero(value) { 
      return value < 9 ? '0' + value: value;
    },
    record() {
      this.recorder = RecordRTC(camera, {
            type: 'video'
        });
      this.recorder.startRecording()
      this.result = null;
      this.blobUrl && URL.revokeObjectURL(this.blobUrl);
      this.blobUrl = null;
      
      this.timer.interval = setInterval(() => ++this.timer.value, 1000)
      this.formatedTime()
    },
    stop() {
      this.recorder.stopRecording(() => {
        this.result = this.recorder.getBlob();
        this.blobUrl = window.URL.createObjectURL(this.result);
        clearInterval(this.timer.interval)
        this.timer.value = 0;
        this.timer.interval = null;

        video.muted = false;
        video.volume = 1;
        this.recorder.camera.stop();
        this.recorder.destroy();
        this.recorder = null;
      })
    },
    formatedTime() {
      let hour = Math.floor(this.timer.value /3600);
      let minute = Math.floor((this.timer.value - hour*3600)/60);
      let seconds = this.timer.value - (hour*3600 + minute*60);
      return [hour, minute, seconds].map(this._fillzero).join(':');
    
    }

  },
  mounted() {

    
    let self = this;
    let video = self.$refs.video;
    
    navigator.mediaDevices.getUserMedia({
        video: true,
        //audio: true
    }).then(async function(camera) {
        self.recorder = RecordRTC(camera, { audio: true, video: true });
        video.srcObject = camera;
        video.muted = true;
        video.volume = 0;
        video.play()
    }).catch(function(error) {
  console.log('getUserMedia error: ', error);
})
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
