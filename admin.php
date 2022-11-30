<?php 
//header("Location: stub.php"); 
?>

<html>
    <head>
        <title>Admin</title>
        <?PHP
            require('head.php');
        ?>
        <link rel="stylesheet" href="./css/admin.css">
    </head>
    <body>
        <?PHP
            require('header.php');
        ?>
        <main id="main">
            <h2>Admin</h2>
            <div id='headerLinks'>
                <a>Edit Room Groups</a> |
                <a>Edit Room Attributes</a>
            </div>
            <section>
                <h3>Edit Users</h3>
                <div class='adminRow'>
                    <input type='text' placeholder="Search for a user...">
                    <div>
                        <button>Add User</button>
                        <button>Remove User</button>
                    </div>
                </div>
                <table>
                    <tr></tr>
                </table>
                <form action="">

                </form>
            </section>
            <section>
                <h3>Edit Rooms</h3>
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