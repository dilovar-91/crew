<template>
  <div id="quiz">
      <Header
      :numCorrect="numCorrect"
      :total="total"
    />
    
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <QuestionBox
            v-if="total"
            :currentQuestion="data.quizzes[index]"
            :next="next"
            :increment="increment"
            :total="total"
            
          />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Header from './QuizHeader.vue'
import QuestionBox from './QuizQuestionBox.vue'
export default {
  props: {
        interview_id: Number,
        user_id: Number
    },
  components: {
    Header,
    QuestionBox
  },
  data() {
    return {
      data: [],
      index: 0,
      numCorrect: 0,
      numAnswered: 0,
      total: 0
      
    }
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
  },
  created() {    
    axios.get(`/api/seamen/quizzes/`+this.interview_id).then(({ data }) => {
            if (data) {
            //this.sources = data;
            this.data = data
            this.total = this.data.quizzes.length || null
            } else {
            console.log('error loading!!')
            }
        });   
  }
}
</script>
<style scoped>
#quiz {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>