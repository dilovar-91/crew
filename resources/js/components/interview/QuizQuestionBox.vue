<template>

<div class="block">
        
        <div class="block-content">
           
             <transition name="bounce">
               <div v-show="!isFinished">
                  <p class="alert alert-info font-size-sm">
                <i class="fa fa-fw fa-question mr-1"></i> {{ currentQuestion.question }}
            </p>
            <div class="list-group" >
            <button type="button" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action" 
            v-for="(answer, index) in shuffledAnswers"
            :key="index"
            :class="answerClass(index)" 
            @click.prevent="selectAnswer(index)"
            >
              {{ answer }}
              <i v-show="selectedIndex == index" class="fa fa-fw  mr-1" :class="[correctIndex == index ? 'fa-check text-success' : 'fa-question text-danger']"></i>
            </button>
          </div>
          </div>
             </transition>
             <transition name="bounce">
             <div v-show="isFinished">             
               <div class="alert alert-primary alert-dismissable" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h3 class="alert-heading font-w300 my-2">Thank you!</h3>
                                <p class="mb-0">You result of quiz saved. <a class="alert-link" href="/seamen/interviews">Go to main</a>!</p>
                            </div>
             </div>
             </transition>
        </div>
    </div>
 
</template>

<script>
import _ from 'lodash'

export default {
  props: {
    currentQuestion: Object,
    next: Function,
    increment: Function,
    total: Number
  },
  data: function() {
    return {
      selectedIndex: null,
      correctIndex: null,
      shuffledAnswers: [],
      answered: false,
      isFinished: false,
      questionNumber: 0,
      
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
  watch: {
    currentQuestion: {
      immediate: true,
      handler() {
        this.selectedIndex = null
        this.answered = false
        this.shuffleAnswers()
      }
    }
  },
  methods: {
    selectAnswer(index) {
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
    
    shuffleAnswers() {
      let answers = [...this.currentQuestion.answers, this.currentQuestion.correct]
      this.shuffledAnswers = _.shuffle(answers)
      this.correctIndex = this.shuffledAnswers.indexOf(this.currentQuestion.correct)
    },
    answerClass(index) {
      let answerClass = ''
      let iconClass = ''

      if (!this.answered && this.selectedIndex === index) {
        answerClass = 'selected'
      } else if (this.answered && this.correctIndex === index) {
        answerClass = 'list-group-item-success'
        iconClass = 'fa-check'
      } else if (this.answered &&
        this.selectedIndex === index &&
        this.correctIndex !== index
      ) {
        answerClass = 'list-group-item-danger'
        iconClass = 'fa-question'
      }

      return answerClass
    },

    saveResult(){
        let loader = this.$loading.show({
                    // Optional parameters
                    container: null,
                    canCancel: false,
                    onCancel: this.onCancel,
                    color: this.color
                  });
        axios.post('/api/seamen/interview/quizresult',{
                    user_id: this.$parent.data.invite['user_id'],
                    score : this.$parent.numCorrect,
                    invite_id: this.$parent.data.invite['id'],
                }).then(res => {
                    loader.hide()
                     this.$swal('Спасибо!', 'Ваш ответ успешно сохранен!', 'success');
                }).catch(err => {
                    loader.hide()
                    this.$swal('Ошибка', 'При сохранении вашего ответа что-то пошло не так', 'error');  
                });
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
</style>
