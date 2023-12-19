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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<section class="workspace">
    <div class="container">


        @foreach($questions as $question)

            <div class="question_block" id="question{{$question->id}}">
                <form class="question_form" >

                <input type="hidden" name="question_id" value="{{$question->id}}">
                <div class="question_block_title">{{$question->question}}</div>

                @if($question->QuestionAnswers)
                    <div class="question_block_answers">
                    @foreach($question->QuestionAnswers as $answer)

                        <div class="question_block_answer">
                            <label>
                                <input type="checkbox" value="{{$answer->id}}" name="answers[]">
                                <span>{{$answer->answer}}</span>
                            </label>
                        </div>

                    @endforeach
                    </div>
                @endif

                <button class="ui_button form_send">Ответить</button>

                <div class="question_block_result">

                </div>
                </form>
                <div class="qusetion_learned">
                    <form class="qusetion_learned_form">
                        <input type="hidden" name="question_id" value="{{$question->id}}">
                        <button class="qusetion_learned_button">Вопрос изучен</button>
                    </form>
                </div>

            </div>

        @endforeach


    </div>
</section>

<script>


    //Вопрос выучен
    $(".qusetion_learned_form").on( "submit", function( event ) {

        event.preventDefault();

        var form = $(this);
        var actionUrl = "/quiz/question-learned";

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data)
            {


                var result = jQuery.parseJSON(data);

                console.log(result);

                if(result.status == "success"){
                    $("#question"+result.qid).fadeOut();
                }

            }
        });


    });


    //Проверка ответа
    $(".question_form").on( "submit", function( event ) {

        event.preventDefault();

        var form = $(this);
        var actionUrl = "/quiz/checkAnswer";

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data)
            {

                var result = jQuery.parseJSON(data);

                if(result.status == "success"){
                    form.find(".question_block_result").html(result.message);
                }
                else{
                    form.find(".question_block_result").html(result.message + " " + result.correct_answer);
                }

            }
        });


    });




</script>


</body>
</html>
