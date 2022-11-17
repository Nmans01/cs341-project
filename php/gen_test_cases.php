<?php

function genTestCases() {
    $pdo = connect_to_db();

    // PART 1: generate fake users
    $testUsers = array(
        //    username, password,                                               first name, last name,  admin status
        array('admin',  password_hash('ILPhysicalSecurity',PASSWORD_DEFAULT),   'admin',    'admin',    1),
        array('user1',  password_hash('bestPassword',PASSWORD_DEFAULT),         'Joe',      'Mama',     0),
        array('user2',  password_hash('worstpassword123',PASSWORD_DEFAULT),     'Joe',      'Biden',    0),
        array('user3',  password_hash('testtesttest',PASSWORD_DEFAULT),         'Elon',     'Musk',       0),
    );

    foreach ($testUsers as $user) {
        $stmt = $pdo->prepare(
            "INSERT INTO siteUser (
            username,
            passwordHash,
            name_first,
            name_last,
            isAdmin
        ) VALUES (
            ?,?,?,?,?
        )");
        $stmt->execute($user); 
    }

    // PART 2: generate fake assignments
    $testAssignments = array(
        //    assignmentDate "Y-m-d", user_userID, roomGroup_roomGroupID
        array("2022-11-15",'user1',1),
        array("2022-11-15",'user2',1),
        array("2022-11-15",'user3',1)
    );

    foreach ($testAssignments as $assignment) {
        $stmt = $pdo->prepare(
        "INSERT INTO assignment (
            assignmentDate, 
            siteUser_userID, 
            roomGroup_roomGroupID
        ) VALUES (
            ?,
            (SELECT userID FROM siteUser WHERE username=?),
            ?
        )");
        $stmt->execute($assignment); 
    }
}
?>