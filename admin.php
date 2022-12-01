<?php 
//header("Location: stub.php"); 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <?PHP
            require('head.php');
        ?>
        <link rel="stylesheet" href="./css/admin.css">
        <script src="./js/user.js"></script>
    </head>
    <body>
        <?PHP
            require('header.php');
            echo password_hash('password',PASSWORD_DEFAULT);
        ?>
        <main id="main">
            <h2>Admin</h2>
            <section>
                <h3>Edit Users</h3>
                <div class='adminRow'>
                    <input type='text' placeholder="Search for a user..." id='userSearch'>
                    <div>
                        <button id='addUser'>Add User</button>
                        <button id='removeUser'>Remove User</button>
                    </div>
                </div>
                <table>
                    <tbody id='userTable'>

                    </tbody>
                </table>
                <form action="" id='userForm'>

                </form>
            </section>
            <section>
                <div id='roomHeader'>
                    <h3>Edit Rooms</h3>
                    <div>
                        <a>Edit Room Groups</a> |
                        <a>Edit Room Attributes</a>
                    </div>
                </div>
                <div class='adminRow'>
                    <div>
                        <select>
                            <option value="">Select a group...</option>
                        </select>
                        <input type='text' placeholder="Search for a room...">
                    </div>
                    <div>
                        <button>Add Room</button>
                        <button>Remove Room</button>
                    </div>
                </div>
                <table>
                    <tr></tr>
                </table>
                <form action="">
                    
                </form>
            </section>
        </main>
        <?PHP
            require('footer.php');
        ?>
    </body>
</html>