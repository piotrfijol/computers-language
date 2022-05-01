
<?php

/** @var yii\web\View $this */


$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.3/vue.js', ['position' => $this::POS_HEAD]);
$this->registerCssFile('/css/test.css', ['position' => $this::POS_HEAD]);

?>


<div class="box">
    <div class="box__content">
        <main id="app">
            <div style="z-index: 999" class="instructions" ref="instruction">
                <p class="instructions__title">Zanim przystapisz do testu</p>
                <p class="instructions__content">
                    Test nie jest ograniczony czasowo. Masz dowolną ilość czasu. Między pytaniami możesz przełączać się używając
                    przycisków 'Poprzednie' oraz 'Następne'. Zadaniem tego testu jest zweryfikowanie twojej wiedzy oraz odblokowanie
                    następnego rozdziału jeżeli takowy istnieje. Aby test został zaliczony należy znać odpowiedź na każde z pytań. 
                    <br>
                    Powodzenia!
                </p>
                <div class="btn" v-on:click="closeInstruction">Zacznij</div>
            </div>
            <div class="test" v-if="state === 'test'">
                <div class="question">{{ `${currentQuestion + 1}/${numberOfQuestions} ${questions[currentQuestion].question}` }}</div>
                <div @click="selectAnswer" v-for="(item, key) in questions[currentQuestion].answers" v-show="item" class="answer" :key="key" :data-answer="key">
                    {{ key + '. ' + item}} 
                </div>
                <div class="buttons">
                    <button class="btn" :class="{'disabled': this.currentQuestion <= 0}" @click="previousQuestion">&lt; Poprzednie</button>
                    <button class="btn" v-show="currentQuestion < numberOfQuestions - 1" @click="nextQuestion">Następne &gt;</button>
                    <button class="btn" v-show="currentQuestion === numberOfQuestions - 1" @click="validateAnswers">Zakończ</button>
                </div>
            </div>
            <div class="results" v-show="state === 'result'">
                    <p class="result-status" ref="resultStatus"></p>
                    <p class="result-comment" ref="resultComment" ></p>
                    <br>
                    <p>Twój wynik:</p>
                    <p ref="testScore" class="result-score"></p>

                    <a href="<?= dirname(Yii::$app->request->url) . '/' ?>">
                        <button class="btn">Powrót do lekcji</button>
                    </a>
            </div>
        </main>
    </div>
</div>



<script>

    <?php
        $arr = [
            'test_id' => $questions[0]['test_id'],
            'questions' => []
        ];

        foreach($questions as $question) {
            $arr['questions'][] = [
                    'id' => $question['id'],
                    'question' => $question['question'],
                    'answers' => [
                        'a' => $question['answer_a'],
                        'b' => $question['answer_b'],
                        'c' => $question['answer_c'],
                        'd' => $question['answer_d'],
                    ]
                ];
        }
    ?>

    const questionData = <?= json_encode($arr) ?>;
</script>

<script>
    
    Vue.config.productionTip = false;
    let app = new Vue({
        el: '#app',
        data() {
            return {
                answers: [],
                testId: questionData['test_id'],
                currentQuestion: 0,
                numberOfQuestions: questionData.questions.length,
                questions: questionData.questions,
                state: 'tutorial',
            };
        },
        methods: {
            closeInstruction() {
                this.$refs.instruction.style.display = "none";
                this.state = 'test';
            },
            previousQuestion() {
                if(this.currentQuestion > 0)
                    this.currentQuestion--
            },
            nextQuestion() {
                this.currentQuestion++;
            },
            selectAnswer(ev) {
                this.unselectAnswer();
                let questionID = this.questions[this.currentQuestion].id;
                this.answers[questionID] = ev.target.dataset.answer;
                ev.target.classList.add('selected');
            },
            unselectAnswer() {
                let selectedBefore = document.querySelector('.answer.selected');
                if(selectedBefore)
                    selectedBefore.classList.remove('selected');
            },
            async validateAnswers() {
                
                let response = await this.getResponse();

                if(response) {
                        this.state = "result";
                }

                if(response.correctAnswers === this.numberOfQuestions) {
                    this.$refs.resultStatus.textContent = "Zaliczono";
                    this.$refs.resultComment.textContent = "Gratulacje! Przyswoiłeś/aś materiał w 100%!";
                } else {
                    this.$refs.resultStatus.textContent = "Niezaliczono";
                    this.$refs.resultComment.textContent = "Nie poddawaj się, powtórz materiał i spróbuj ponownie.";
                }  

                this.$refs.testScore.textContent = `${response.correctAnswers}/${this.numberOfQuestions}`;
            },
            getResponse() {
                let answersObj = [];

                for(let key in this.answers) {
                    answersObj.push({
                        "question_id": key,
                        "answer": this.answers[key]
                    })
                }

                let body = {
                    'test_id': this.testId,
                    answers: answersObj
                }

                const response = fetch("./test/validate-answers", {
                    'headers': {
                        'Content-Type': 'application/json'
                    },
                    method: 'POST',
                    body: JSON.stringify(body)
                }).then(data => data.json())
                .catch(err => console.error("Error occured while validating answers.", err));

                return response;
            }
        },
        watch: {
            currentQuestion() {
                this.unselectAnswer();
                let answer = this.answers[this.questions[this.currentQuestion].id];
                if(answer) {
                    document.querySelector(`.answer[data-answer="${answer}"]`).classList.add('selected');
                }
        }
    }
});
</script>