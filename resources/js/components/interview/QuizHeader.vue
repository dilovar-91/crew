<template>
<div class="content">
    <div class="row">
        <div class="col-6 col-lg-3">
            <a class="block block-link-shadow text-center" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-h2 text-dark" >{{numCorrect}}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="font-w600 font-size-sm text-muted mb-0">
                        Correct Answers
                    </p>
                </div>
            </a>
        </div>
        
        
        <div class="col-6 col-lg-3">
            <a class="block block-link-shadow text-center" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-h2 text-dark">{{total}}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="font-w600 font-size-sm text-muted mb-0">
                        Total Questions
                    </p>
                </div>
            </a>
        </div>
        
    </div>
    
</div>
  
</template>

<script>
export default {
  props: [
    'numCorrect',
    'total'
  ]
}
</script>
