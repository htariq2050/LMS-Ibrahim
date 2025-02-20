
@extends('admin.layouts.app')

@section('title', 'Edit Quiz')

@section('dashboardcontent')

<div class="mdk-drawer-layout__content page">
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Left Column: Quiz List -->
            <div class="col-md-4">
                <div class="list-group">
                    @if(isset($quiz))
                    <a href="#" class="list-group-item quiz-item" data-quiz-id="{{ $quiz->id }}">
                        <span class="media align-items-center">
                            <span class="media-left mr-2">
                                <span class="btn btn-light btn-sm">1</span>
                            </span>
                            <span class="media-body">
                                {{ $quiz->questions->first()->question_text ?? 'No Questions Available' }}
                            </span>
                        </span>
                    </a>
                @else
                    @foreach ($quizzes as $quiz)
                        <a href="#" class="list-group-item quiz-item" data-quiz-id="{{ $quiz->id }}">
                            <span class="media align-items-center">
                                <span class="media-left mr-2">
                                    <span class="btn btn-light btn-sm">{{ $loop->iteration }}</span>
                                </span>
                                <span class="media-body">
                                    {{ $quiz->questions->first()->question_text ?? 'No Questions Available' }}
                                </span>
                            </span>
                        </a>
                    @endforeach
                @endif
                
                </div>
            </div>
    
           <!-- Right Column: Dynamic Quiz Answers -->
            <div class="col-md-8">
                <div class="card" id="quiz-card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <h4 class="m-0 text-primary mr-2"><strong id="quiz-title">#</strong></h4>
                            </div>
                            <div class="media-body">
                                <h4 class="card-title m-0">
                                    <span id="quiz-name">Quiz Answer</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="quiz-answers">
                        <div class="form-group" id="questions-wrapper">
                            <p class="text-muted">Select a quiz to see questions and answers.</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-light">Skip</a>
                        <button type="button" class="btn btn-success float-right" id="submit-quiz">Submit <i class="material-icons btn__icon--right">arrow_forward</i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
   document.addEventListener("DOMContentLoaded", function () {
    let currentQuizIndex = 0;
    let quizItems = document.querySelectorAll(".quiz-item");
    let answeredQuizzes = new Set();

    function disableQuizzes() {
        quizItems.forEach((quiz, index) => {
            quiz.classList.toggle("disabled", index > currentQuizIndex);
        });
    }

    function attachQuizClickEvents() {
        quizItems.forEach((quiz, index) => {
            quiz.addEventListener("click", function (event) {
                event.preventDefault();

                if (index > currentQuizIndex) {
                    alert("Please complete the current quiz before proceeding.");
                    return;
                }

                let quizId = this.getAttribute("data-quiz-id");

                fetch(`/quiz/${quizId}/questions`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data || !data.questions) {
                            document.getElementById("quiz-answers").innerHTML = "<p class='text-muted'>No questions available for this quiz.</p>";
                            return;
                        }

                        document.getElementById("quiz-title").textContent = `Quiz #${quizId}`;
                        document.getElementById("quiz-name").textContent = data.quiz_title;

                        let quizAnswers = document.getElementById("quiz-answers");
                        quizAnswers.innerHTML = "";

                        data.questions.forEach((question, qIndex) => {
                            let questionDiv = document.createElement("div");
                            questionDiv.classList.add("mb-3");
                            questionDiv.innerHTML = `<h5 class="text-primary">${qIndex + 1}. ${question.question_text}</h5>`;

                            let answerList = document.createElement("ul");
                            answerList.classList.add("list-group");

                            question.answers.forEach((answer) => {
                                let answerItem = document.createElement("li");
                                answerItem.classList.add("list-group-item", "d-flex", "align-items-center");

                                let radioInput = document.createElement("input");
                                radioInput.type = "radio";
                                radioInput.name = `question_${question.id}`;
                                radioInput.value = answer.id;
                                radioInput.classList.add("mr-2");

                                answerItem.appendChild(radioInput);
                                answerItem.appendChild(document.createTextNode(` ${answer.answer_text}`));
                                answerList.appendChild(answerItem);
                            });

                            questionDiv.appendChild(answerList);
                            quizAnswers.appendChild(questionDiv);
                        });

                        document.getElementById("submit-quiz").disabled = false;

                        document.getElementById("submit-quiz").onclick = function () {
                            answeredQuizzes.add(index);
                            if (answeredQuizzes.has(currentQuizIndex)) {
                                currentQuizIndex++; // Move to next quiz
                            }
                            disableQuizzes();

                            // Auto-click next quiz
                            if (currentQuizIndex < quizItems.length) {
                                quizItems[currentQuizIndex].click();
                            }
                        };
                    })
                    .catch(error => console.error("Error fetching quiz data:", error));
            });
        });
    }

    disableQuizzes();
    attachQuizClickEvents();
});


</script>


@endsection



