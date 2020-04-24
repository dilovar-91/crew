<template>
   <div class="videoRec text-xs-center">
    <input type="hidden" ref="video_h" name="video" v-model="videoModel" />
    <video ref="video" class="video" :poster="poster" controls></video>
    <div class="block" v-show="result">
      <h4 class="title is-4">Результат</h4>
      <video controls :src="blobUrl" playsinline style="width: 40%;"></video>
    </div>
    <div class="video-controllers"></div>
      <button class="btn btn-primary" @click="startRecording('video1')">Запись</button>
      <button class="btn btn-primary" @click="stopRecording('video1')">Пауза</button>
      <button class="btn btn-primary" @click="download('video1')">Скачать</button>
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
       poster: "/images/video-camera.png",
       videoModel:"",
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
    successCallback(stream) {
            var options = {
            mimeType: 'video/webm\;codecs=h264', // or video/webm\;codecs=h264 or video/webm\;codecs=vp9
            audioBitsPerSecond: 128000,
            videoBitsPerSecond: 128000,
            timeSlice:2000,
            bitsPerSecond: 128000 // if this line is provided, skip above two
            };
            this.stream = stream;
            this.recorder = RecordRTC(stream, options);
            this.recorder.startRecording();
            let video = this.$refs.video;
            video.src = window.URL.createObjectURL(stream);
            //this.toggleControls();
        },
        errorCallback() {
            //handle error here
        },
        processVideo(audioVideoWebMURL) {
            let video = this.$refs.video;
            //let recordRTC = this.recordRTC;
            video.src = audioVideoWebMURL;
            //this.toggleControls();
            var recordedBlob = recordRTC.getBlob();
            recordRTC.getDataURL(function (dataURL) { });
        },
        startRecording(video="video") {
            this.poster="";
            let mediaConstraints = {
            video: {
                mandatory: {
                minWidth: 700,
                minHeight: 720
                }
            }, audio: true
            };
            navigator.mediaDevices
            .getUserMedia(mediaConstraints)
            .then(this.successCallback.bind(this), this.errorCallback.bind(this));
            },
            stopRecording(video="video") {
                this.poster="";
                
             
               

        recorder.stopRecording(() => {
        this.result = this.recorder.getBlob();
        this.blobUrl = window.URL.createObjectURL(this.result);
        //clearInterval(this.timer.interval)
        //this.timer.value = 0;
        //this.timer.interval = null;
        this.processVideo()
        this.recorder.destroy();
        console.log(this.recorder)
        this.recorder = null;

         let stream = this.stream;
                stream.getAudioTracks().forEach(track => track.stop());
                stream.getVideoTracks().forEach(track => track.stop());
        
      })
                
            },
            download(video="video") {
                this.recorder.save('video.webm');
            }
     
  },
  mounted() {
     let video = this.$refs.video;
       video.muted = false;
       video.controls = true;
       video.autoplay = false;

       navigator.mediaDevices.getUserMedia({
        video: true,
        audio: true
    }).then(async function(stream) {
        //self.recorder = RecordRTC(stream, { mimeType: "video/webm;codecs=h264", video: { width: 640, height: 480 }, bitsPerSecond: 128000 });
        self.recorder = RecordRTC(stream, {
            type: 'video'
        });
        video.srcObject = stream;
        video.volume = 0;
        video.play()
    })

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.video {
  box-shadow: 1px 6px 10px 2px rgba(35, 35, 35, 0.62);
  height: 400px;
  max-height: 800px;
  object-fit: none;
}
</style>
