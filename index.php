<?php //header("Location: stub.php");
?>
<html>
<head>
    <title>Home</title>
    <?PHP
    require('head.php');
    ?>
    <script src="./js/assignment.js"></script>
</head>

<body>
    <?PHP
    require('header.php');
    require('./php/db_functions.php');
    $assignment = assignmentMessage();
    ?>
    <main id="main">
        <h2>Your Assignment</h2>
        <p id='assignment'>
            <?php echo $assignment;?>
        </p>
        <a href='form.php'>Click here to access the form.</a>
        <h2>Calendar</h2>
        <div id='calendar'>
            <div id="calendar-header"><h3>November 2022</h3></div>
            <div id="calendar-body">
                <div class="weekday">sun</div>
                <div class="weekday">mon</div>
                <div class="weekday">tue</div>
                <div class="weekday">wed</div>
                <div class="weekday">thu</div>
                <div class="weekday">fri</div>
                <div class="weekday">sat</div>
                <div class="day other-month">1</div>
                <div class="day other-month">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day">1</div>
                <div class="day other-month">1</div>
                <div class="day other-month">1</div>
                <div class="day other-month">1</div>
            </div>
        </div>
    </main>
    <?PHP
    require('footer.php');
    ?>
</body>
</html>