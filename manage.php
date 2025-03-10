<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/w3.css">
    <link rel="stylesheet" type="text/css" href="./css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./index.css">
    <title>Document</title>
</head>
<body>
    <?php require("./navigation.php"); ?>
    <div class="w3-auto">
        
        <div class="w3-row-padding w3-stretch">
            <div class="w3-col l4">
                <div class="w3-white w3-round-large w3-padding">
                    <h3>Courses</h3>
                    <hr>
                    <a href="add_course.php" class="w3-button w3-purple w3-round">Add Course</a>
                    <button class="w3-button w3-purple w3-round">Manage Course</button>
                </div>
                
            </div>
            <div class="w3-col l4">
                <div class="w3-white w3-round-large w3-padding">
                    <h3>Units</h3>
                    <hr>
                    <a href="add_unit.php"class="w3-button w3-purple w3-round">Add Unit</a>
                    <button class="w3-button w3-purple w3-round">Manage Unit</button>
                </div>
            </div>
            <div class="w3-col l4">
                <div class="w3-white w3-round-large w3-padding">
                    <h3><i class="fa fa-bell w3-text-purple">&nbsp;</i>Reminder
                    </h3>
                    <hr>
                    <a href="reminder.php" class="w3-button w3-purple w3-round">Create</a>
                    <button class="w3-button w3-purple w3-round">Manage Reminder</button>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>