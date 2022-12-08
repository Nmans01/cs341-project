<?php //header("Location: stub.php");
?>
<html>

<head>
    <title>Home</title>
    <?PHP
    require('head.php');
    ?>
    <script src="./js/message.js"></script>
</head>

<body>
    <?PHP
    require('header.php');
    //require('./php/db_functions.php');
    //$assignment = assignmentMessage();
    //assignmentMessage();
    ?>
    <main id="main">
        <h2>Home</h2>
        <h3>Today's Assignment</h3>
        <div id='assignment'>
            <p id='message'>
                <?php //echo $assignment; ?>
            </p>
            <a href='form.php'><div id="access-btn">Click here to access the form.</div></a>
        </div>
        <!-- <h3>Calendar</h3>
        <div id='calendar'>
            <div id="calendar-header">
                <h4>November 2022</h4>
            </div>
            <div id="calendar-body">
                <div class="weekday">sun</div>
                <div class="weekday">mon</div>
                <div class="weekday">tue</div>
                <div class="weekday">wed</div>
                <div class="weekday">thu</div>
                <div class="weekday">fri</div>
                <div class="weekday">sat</div>
                <div class="day other-month"></div>
                <div class="day other-month"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day other-month"></div>
                <div class="day other-month"></div>
                <div class="day other-month"></div>
            </div>
        </div> -->
    </main>
    <?PHP
    require('footer.php');
    ?>
</body>

</html>