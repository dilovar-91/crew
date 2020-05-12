<template>
<div class="vld-parent" >
    
    <video ref="videoPlayer" class="video-js vjs-default-skin" playsinline></video>
   
</div>    
</template>

<script>
    import 'video.js/dist/video-js.css'
    import videojs from 'video.js'
    export default {
    name: "VideoPlayer",
    props: {
        options: {
            type: Object,
            default() {
                return {};
            }
        }
    },
    data() {
        return {
            player: null
        }
    },
    mounted() {
        this.player = videojs(this.$refs.videoPlayer, this.options, function onPlayerReady() {
            console.log('onPlayerReady', this);
        })
    },
    beforeDestroy() {
        if (this.player) {
            this.player.dispose()
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