<template>
<div>
    <video id="myVideo" class="video-js vjs-default-skin" playsinline></video>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Comment</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="comment"></textarea>
  </div>
    <button v-show="save" class="btn btn-primary" @click="recordSend"  >Сохранить</button>
</div>    
</template>

<script>
    import 'video.js/dist/video-js.css'
    import 'videojs-record/dist/css/videojs.record.css'

    import 'webrtc-adapter'
    import RecordRTC from 'recordrtc'

    import videojs from 'video.js'
    // eslint-disable-next-line
    import Record from 'videojs-record/dist/videojs.record.js'

    export default {
        props: {
            question_id: Number,
            user_id: Number,
            question_id: Number,
            time: Number,
        },
        data() {
            return {
                player: '',
                save: false,
                comment: '',
                options: {
                    controls: true,
                    autoplay: false,
                    fluid: false,
                    loop: false,
                    width: 320,
                    height: 240,
                    controlBar: {
                        volumePanel: false
                    },
                    plugins: {
                        // configure videojs-record plugin
                        record: {
                            audio: true,
                            video: true,
                            debug: true,
                            maxLength: this.time
                        }
                    }
                }
            };
        },
       
        mounted() {
            /* eslint-disable no-console */
            this.player = videojs('#myVideo', this.options, () => {
                // print version information at startup
                var msg = 'Using video.js ' + videojs.VERSION +
                    ' with videojs-record ' + videojs.getPluginVersion('record') +
                    ' and recordrtc ' + RecordRTC.version;
                videojs.log(msg);
            });

            // device is ready
            this.player.on('deviceReady', () => {
                console.log('device is ready!');
            });

            // user clicked the record button and started recording
            this.player.on('startRecord', () => {
                //this.player.record().getDevice();
                console.log('started recording!');
            });

            // user completed recording and stream is available
            this.player.on('finishRecord', () => {
                // the blob object contains the recorded data that
                // can be downloaded by the user, stored on server etc.
                //this.player.record().stopDevice();
                this.save = true;
                console.log('finished recording: ', this.player.recordedData);
            });

            // error handling
            this.player.on('error', (element, error) => {
                console.warn(error);
            });

            this.player.on('deviceError', () => {
                console.error('device error:', this.player.deviceErrorCode);
            });
        },
        methods: {
            recordSend(){
                this.loading = true;
                let formData = new FormData();
                let blobSend = this.player.recordedData;
                console.log(blobSend);
                formData.append('blob',blobSend);
                formData.append('question_id',this.question_id);
                formData.append('user_id',this.user_id);
                formData.append('comment',this.comment);

                axios.post('/interview/videosend',formData ,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(res => {
                    this.loading = false;
                }).catch(err => {
                    this.loadingFiles = false;
                    alert('Reload pages.');
                });
            }
        },

        beforeDestroy() { 
            if (this.player) {
                this.player.dispose();
            }
        }
    }
</script>
<style lang="scss" scoped>
/* change player background color */
#myVideo {
  background-color: #95DDF5;
}
</style>