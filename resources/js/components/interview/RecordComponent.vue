<template>
<div class="vld-parent" >
<RecordAnswer
v-if="total"
                                    :currentQuestion="questions[index]"
                                    :next="next"
                                    :increment="increment"
                                    :total="total"
                                    :user_id="15"  
                                    />
  
   
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

    import RecordAnswer from './RecordAnswer.vue'

    export default {
        props: {
            
            questions: {
                type: Array,
                required: true
            },
            user_id: {
                type: Number,
                required: true
            },
            
        },
        components: {
            RecordAnswer
        },
        data() {
            return {
              total: this.questions.length,
              index: 0,
            };
        },

        methods: {
            next() {
                this.index++
            },
            increment(isCorrect) {
            if (isCorrect) {
                this.numCorrect++
            }
                this.numAnswered++
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