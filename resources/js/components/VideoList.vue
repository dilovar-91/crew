<template>
  <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">My answers</h3>
                
            </div>
            <div class="block-content block-content-full">
    <div class="row">
        
        <div class="col-xl-12 ">
            <div class="block">
                <div class="block-content">
                    <div class="row items-push">
                                <div class="col-md-7">
                                    <div class="block">
                <div class="block-content block-content-full bg-black ribbon ribbon-bookmark ribbon-primary">
                    <div class="ribbon-box">
                        <i class="fa fa-check mr-1"></i> {{question}}
                    </div>
                    <div class="text-center">
                        <video ref="videoPlayer" class="video-js"></video>
                    </div>
                </div>
            </div>
                                        
                                </div>
                                <div class="col-md-4">
                                    
                                    <ul class="nav nav-pills flex-column ">
                                    <li class="nav-item mb-1" v-for="(item, index) of videos" :key="index">
                                        <a :class="[activeVideo === index ? 'active': '']" class="nav-link d-flex justify-content-between align-items-center" @click="playMe(item, index)">
                                         <i :class="[(activeVideo === index && player.paused() !== true) ? 'fa fa-fw fa-pause mr-1' : 'fa fa-fw fa-play mr-1',]" ></i>   {{item.question.question}} <span class="badge badge-pill badge-secondary ml-1"> {{item.question.time / 60}} min</span>
                                        </a>
                                    </li>
                                    
                                    
                                </ul>
                                </div>
                        </div>
                        
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
  
</template>
<script>
import 'video.js/dist/video-js.css'
import videojs from 'video.js'
export default {
    props: {
        feedback_id: Number
    },
	data() {
		return {
            options: {
				autoplay: true,
				controls: true,
				
            },
          
          player: null,
          activeVideo: 0,
          videos: {}, 
          question: ''   
                
		};
    },

    mounted(){
        
        axios.get(`/api/seamen/answers/`+this.feedback_id).then(({ data }) => {
            if (data) {
            //this.sources = data;
            this.videos = data
            } else {
            console.log('error loading!!')
            }
        });

        this.player = videojs(this.$refs.videoPlayer, this.options, function onPlayerReady() {
            console.log('onPlayerReady', this);
        })
    }, 
    methods: {
        playMe(item, index){
            this.player.src('/storage/'+item.answer);
            this.question = item.question.question
            this.activeVideo = index            
        }
    },
    beforeDestroy() {
        if (this.player) {
            this.player.dispose()
        }
    }
};
</script>
<style lang="scss" scoped>
.video-js {
    position: relative !important;
    width: 100% !important;
    height: 264px !important;
}
</style>