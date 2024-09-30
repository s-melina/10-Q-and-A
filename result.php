
<?php $questions = [
        0 => [
            'question' => 'It’s quite easy .I …… you',
            'options' => ['am showing', 'will show', 'show', 'showed'],
            'answer' => 'will show',
        ],
        1 => [
            'question' => 'Those clouds are very black, aren’t they? I think it……',
            'options' => ['is going to rain', 'rained', 'rains', 'was raining'],
            'answer' => 'is going to rain',
        ],
        2 => [
            'question' => 'Men and … ,between the ages of 25 and 54 have the most stressful ……. .',
            'options' => ['woman/lives', 'woman/life', 'women/life', 'women/live'],
            'answer' => 'women/live',
        ],
        3 => [
            'question' => '+ …… me a favor sam? - sure.',
            'options' => ['will you do', 'did you do', 'Are you going to do', 'Do you do'],
            'answer' => 'will you do',
        ],
        4 => [
            'question' => 'I will do my best to make sure that such mistake do not happen in ….',
            'options' => ['schedule', 'information', 'future ', 'expression'],
            'answer' => 'future',
        ],
        5 => [
            'question' => 'If you ……. Your time well, you can spend less time doing unnecessary things and do the work faster.',
            'options' => ['take', 'plan', 'put', 'go'],
            'answer' => 'plan',
        ],
        6 => [
            'question' => 'I can’t understand why they’re such good friends, They have hardly anything in  …….',
            'options' => ['attention', 'common' , 'information', 'nature'],
            'answer' => 'common',
        ],
        7 => [
            'question' => 'The house did not suffer much damage because the firefighters quickly …… the fire.',
            'options' => ['kept on' , 'took off', 'put out', 'made up'],
            'answer' => 'put out',
        ],
        8 => [
            'question' => 'Many scientists believe that global warming is the result of … actions.',
            'options' => ['human', 'increasing', 'natural', 'endangered'],
            'answer' => 'human',
        ],
        9 => [
            'question' => 'Tom’s speech was so …………… That several people in the audience fell asleep.',
            'options' => ['amazing', 'interesting', 'boring', 'amusing'],
            'answer' => 'boring',
        ],
    ];
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" ">
</head>
<body>

<div class="container">
    <h1>Result</h1>
    <form action="result.php" method="post">
        <?php $n = 1;  ?>
        <?php foreach ($questions as $qkey => $question): ?>
            <div class="card mb-2">
                <div class="card-body">
                    <h3><?php echo $n; $n++; ?>)<?php echo $question['question']; ?></h3>


                    <?php if(isset($_POST['options_'.$qkey])): ?>
                        <?php if($question['answer'] == $_POST['options_'.$qkey]): ?>
                            <div class="alert alert-success" role="alert">
                                Right!
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger" role="alert">
                                Wrong!
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="alert alert-warning" role="alert">
                            No Answer selected.
                        </div>
                    <?php endif; ?>

                    <?php foreach ($question['options'] as $key => $option): ?>

                        <?php if(isset($_POST['options_'.$qkey])): ?>
                            <?php
                            if($question['answer'] == $_POST['options_'.$qkey] && $question['answer'] == $key){
                                $goodAnswer = " bg-success-subtle";
                            } else {
                                $goodAnswer = "";
                            } ?>
                        <?php endif ?>

                        <div class="form-check <?php echo $goodAnswer;?>">
                            <input class="form-check-input" value="<?php echo $key; ?>" type="radio" name="options_<?php echo $qkey; ?>" id="options_<?php echo $qkey; ?>_<?php echo $key; ?>">
                            <label class="form-check-label" for="options_<?php echo $qkey; ?>_<?php echo $key; ?>">
                                <?php echo $option; ?>
                            </label>
                        </div>

                        <?php $goodAnswer = ""; endforeach; ?>
                </div>
            </div>
            <?php $goodAnswer = ""; endforeach; ?>
        <button type="submit" class="btn btn-success w-100">Submit</button>
    </form>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

