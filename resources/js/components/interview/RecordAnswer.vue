<template>
<div class="row ml-1 mr-1">
 <div class="col-sm-4">
      <video id="myVideo" class="video-js vjs-default-skin" playsinline></video>    
  </div>
  <div class="col-sm-8">
  <div class="block block-rounded block-themed">
   
                                <div class="block-header bg-modern-light">
                                    <h3 class="block-title">Вопрос</h3>
                                    
                                </div>
                                <div class="block-content">
                                    <p class="font-weight-bold">{{ currentQuestion.question }}</p>
             
            <button v-show="isRecorded" class="btn btn-primary" @click="recordSend">Следующий вопрос</button>
                                </div>
    
             <div v-show="isFinished">             
               <div class="alert alert-primary alert-dismissable" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h3 class="alert-heading font-w300 my-2">Thank you!</h3>
                                <p class="mb-0">You result of quiz saved. <a class="alert-link" href="/seamen/interviews">Go to main</a>!</p>
                            </div>
             </div>
            
  </div>
  </div>
</div> 
</template>

<script>
    import _ from 'lodash'
    import 'video.js/dist/video-js.css'
    import 'videojs-record/dist/css/videojs.record.css'

    import 'webrtc-adapter'
    import RecordRTC from 'recordrtc'

    import videojs from 'video.js'
    // eslint-disable-next-line
    import Record from 'videojs-record/dist/videojs.record.js'
export default {
  props: {
    currentQuestion: Object,
    next: Function,
    increment: Function,
    total: Number,
    
            user_id: {
                type: Number,
                required: true
            },            
            
        },
  data: function() {
    return {
      selectedIndex: null,
      correctIndex: null,
      shuffledAnswers: [],
      answered: false,
      isFinished: false,
      isRecorded: false,
      questionNumber: 0,

      


      fullPage: true,
                color: '#5c80d1',

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
      
    }
  },
  computed: {
    answers() {
      // this function is no longer used in finished code
      // it is replaced by the watch function below and the
      // shuffleAnswers method
      let answers = [...this.currentQuestion.answers]
      answers.push(this.currentQuestion.correct)
      return answers
    }
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
                this.isRecorded = true;
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
    saveAnswer(index) {
      this.selectedIndex = index
      let isCorrect = false
      

      if (this.selectedIndex === this.correctIndex) {
        isCorrect = true
      }
      this.answered = true

      this.increment(isCorrect)
      this.questionNumber++
      if (this.questionNumber < this.total) {
          setTimeout(() => {
          this.next()                   
        }, 500);
      }
      else {
        this.isFinished = true
        this.saveResult()
      }
      
      
    },

    recordSend(){
                let loader = this.$loading.show({
                  // Optional parameters
                  container: null,
                  canCancel: false,
                  onCancel: this.onCancel,
                  color: this.color
                });
                let formData = new FormData();
                let blobSend = this.player.recordedData;
                console.log(blobSend);
                formData.append('blob',blobSend);
                formData.append('question_id',this.currentQuestion.id);
                formData.append('user_id',this.user_id);
                formData.append('comment',this.comment);

                axios.post('/seamen/interview/videosend',formData ,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(res => {
                    loader.hide()
                     this.$swal('Спасибо!', 'Ваш ответ успешно сохранен!', 'success');

                     this.increment(isCorrect)
                      this.questionNumber++
                      if (this.questionNumber < this.total) {
                          setTimeout(() => {
                          this.next()                   
                        }, 500);
                      }
                      else {
                        this.isFinished = true
                        this.saveResult()
                      }
                }).catch(err => {
                    loader.hide()
                    this.$swal('Ошибка', 'При сохранении вашего ответа что-то пошло не так', 'error');  
                });
            },    
    
       
  },
        beforeDestroy() { 
            if (this.player) {
                this.player.dispose();
            }
        }
}
</script>

<style scoped>
.list-group {
  margin-bottom: 15px;
}

.list-group-item:hover {
  background: #EEE;
  cursor: pointer;
}

.btn {
  margin: 0 5px;
}

.selected {
  background-color: lightblue;
}

.bounce-enter-active {
  animation: bounce-in .5s;
}
.bounce-leave-active {
  animation: bounce-in .5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
  }
}

#myVideo {
  background-color: #95DDF5;
}
</style>
