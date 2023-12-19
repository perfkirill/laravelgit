<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/reset.css'])
    @vite(['resources/css/style.css'])
</head>
<body>
<section class="workspace">
    <div class="container">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        <div class="quiz_add_form">
            <form action="" method="POST">
                @csrf

                <div class="quiz_add_form_section">
                    <div class="quiz_add_form_title">Вопрос</div>
                    <label>
                        <span class="quiz_add_form_input_title">Введите вопрос</span>
                        <input type="text" name="question" value="" placeholder="Введите вопрос">

                    </label>
                    <br><br>
                    <label>
                        <span class="quiz_add_form_input_title">Множественные ответы</span>
                        <input type="checkbox" name="checkboxs" value="1">
                    </label>
                </div>

                <div class="quiz_add_form_section">
                    <div class="quiz_add_form_title">Ответы на вопрос</div>
                    <div class="quiz_add_form_answers">
                        <div class="quiz_add_form_answer">
                            <div class="quiz_add_form_answer_title">Ответ 1</div>
                            <div class="quiz_add_form_answer_labels">
                                <label>
                                    <span class="quiz_add_form_input_title">Введите ответ</span>
                                    <input type="text" name="answer1" value="" placeholder="Введите ответ">

                                </label>
                                <label>
                                    <span class="quiz_add_form_input_title">Ответ верный</span>
                                    <input type="checkbox" name="correct_answer1" value="1">
                                </label>
                            </div>
                        </div>

                        <div class="quiz_add_form_answer">
                            <div class="quiz_add_form_answer_title">Ответ 2</div>
                            <div class="quiz_add_form_answer_labels">
                                <label>
                                    <span class="quiz_add_form_input_title">Введите ответ</span>
                                    <input type="text" name="answer2" value="" placeholder="Введите ответ">

                                </label>
                                <label>
                                    <span class="quiz_add_form_input_title">Ответ верный</span>
                                    <input type="checkbox" name="correct_answer2" value="1">
                                </label>
                            </div>
                        </div>

                        <div class="quiz_add_form_answer">
                            <div class="quiz_add_form_answer_title">Ответ 3</div>
                            <div class="quiz_add_form_answer_labels">
                                <label>
                                    <span class="quiz_add_form_input_title">Введите ответ</span>
                                    <input type="text" name="answer3" value="" placeholder="Введите ответ">

                                </label>
                                <label>
                                    <span class="quiz_add_form_input_title">Ответ верный</span>
                                    <input type="checkbox" name="correct_answer3" value="1">
                                </label>
                            </div>
                        </div>

                        <div class="quiz_add_form_answer">
                            <div class="quiz_add_form_answer_title">Ответ 4</div>
                            <div class="quiz_add_form_answer_labels">
                                <label>
                                    <span class="quiz_add_form_input_title">Введите ответ</span>
                                    <input type="text" name="answer4" value="" placeholder="Введите ответ">

                                </label>
                                <label>
                                    <span class="quiz_add_form_input_title">Ответ верный</span>
                                    <input type="checkbox" name="correct_answer4" value="1">
                                </label>
                            </div>
                        </div>

                        <div class="quiz_add_form_answer">
                            <div class="quiz_add_form_answer_title">Ответ 5</div>
                            <div class="quiz_add_form_answer_labels">
                                <label>
                                    <span class="quiz_add_form_input_title">Введите ответ</span>
                                    <input type="text" name="answer5" value="" placeholder="Введите ответ">

                                </label>
                                <label>
                                    <span class="quiz_add_form_input_title">Ответ верный</span>
                                    <input type="checkbox" name="correct_answer5" value="1">
                                </label>
                            </div>
                        </div>

                        <div class="quiz_add_form_answer">
                            <div class="quiz_add_form_answer_title">Ответ 6</div>
                            <div class="quiz_add_form_answer_labels">
                                <label>
                                    <span class="quiz_add_form_input_title">Введите ответ</span>
                                    <input type="text" name="answer6" value="" placeholder="Введите ответ">

                                </label>
                                <label>
                                    <span class="quiz_add_form_input_title">Ответ верный</span>
                                    <input type="checkbox" name="correct_answer6" value="1">
                                </label>
                            </div>
                        </div>


                    </div>
                </div>

                <button class="ui_button">Создать</button>

            </form>
        </div>
    </div>
</section>
</body>
</html>
