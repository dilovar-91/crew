<template>
   <div class="videoRec text-xs-center">
    <input type="hidden" ref="video_h" name="video" v-model="videoModel" />
    <video ref="video" class="video" :poster="poster" controls></video>
    <div class="video-controllers"></div>
      <v-btn @click="startRecording('video1')"><v-icon>play_arrow</v-icon></v-btn>
      <v-btn @click="stopRecording('video1')"><v-icon>pause</v-icon></v-btn>
      <v-btn @click="download('video1')"><v-icon>get_app</v-icon></v-btn>
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
       videoModel:""
    }
  },
  computed: {
    
  },
  methods: {
    successCallback(stream) {
            var options = {
            mimeType: 'video/webm\;codecs=vp9', // or video/webm\;codecs=h264 or video/webm\;codecs=vp9
            audioBitsPerSecond: 128000,
            videoBitsPerSecond: 128000,
            timeSlice:2000,
            bitsPerSecond: 128000 // if this line is provided, skip above two
            };
            this.stream = stream;
            this.recordRTC = RecordRTC(stream, options);
            this.recordRTC.startRecording();
            let video = this.$refs.video;
            video.src = window.URL.createObjectURL(stream);
            //this.toggleControls();
        },
        errorCallback() {
            //handle error here
        },
        processVideo(audioVideoWebMURL) {
            let video = this.$refs.video;
            let recordRTC = this.recordRTC;
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
                let recordRTC = this.recordRTC;
                recordRTC.stopRecording(this.processVideo.bind(this));
                let stream = this.stream;
                stream.getAudioTracks().forEach(track => track.stop());
                stream.getVideoTracks().forEach(track => track.stop());
                
            },
            download(video="video") {
                this.recordRTC.save('video.webm');
            }
     
  },
  mounted() {
     let video = this.$refs.video;
       video.muted = false;
       video.controls = true;
       video.autoplay = false;

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
video{  
  margin: 0 auto;
  width: 100%;
  box-shadow: 0 4px 8px 2px #999;
}
</style>
